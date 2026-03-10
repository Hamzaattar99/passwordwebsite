<?php
header("Content-Type: application/json");

// قراءة البيانات القادمة من JS
$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['password'])) {
    echo json_encode(["error" => "No password provided"]);
    exit;
}

$password = $input['password'];

if (empty($password)) {
    echo json_encode(["error" => "Empty password"]);
    exit;
}

/*
|--------------------------------------------------------------------------
| إرسال كلمة المرور إلى Python AI API
|--------------------------------------------------------------------------
*/

$python_api_url = "https://password-securiy-analyzer.onrender.com/analyze"; // عدل الرابط حسب API عندك

$data = json_encode([
    "password" => $password
]);

$ch = curl_init($python_api_url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode([
        "error" => "Python API connection failed"
    ]);
    curl_close($ch);
    exit;
}

curl_close($ch);

/*
|--------------------------------------------------------------------------
| log the analysis with password before returning result
|--------------------------------------------------------------------------
*/

// include database helpers if available
$configDir = dirname(__DIR__) . '/config';
if (file_exists($configDir . '/db.php')) {
    require_once $configDir . '/db.php';
}
if (file_exists($configDir . '/db_insert.php')) {
    require_once $configDir . '/db_insert.php';
}

// decode the python API reply so we can forward accordingly
$decoded = json_decode($response, true);
$entropy = $decoded['entropy'] ;
$strength_label = $decoded['strength_label'];
$features = $decoded['features'] ;

if (is_array($decoded) && function_exists('store_analysis_record')) {
    // use the decoded array directly; if it doesn't include the right
    // keys the helper will either error or you can adjust the mapping
    store_analysis_record($password, $decoded);
}

/*
|--------------------------------------------------------------------------
| send original data back to the frontend unchanged
|--------------------------------------------------------------------------
*/

echo $response;