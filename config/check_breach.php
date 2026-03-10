<?php

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["password"])) {
    echo json_encode(["error" => true]);
    exit;
}

$password = $data["password"];

// SHA1 Hash
$hash = strtoupper(sha1($password));

// K-Anonymity
$prefix = substr($hash, 0, 5);
$suffix = substr($hash, 5);

$url = "https://api.pwnedpasswords.com/range/" . $prefix;

$response = file_get_contents($url);

if ($response === false) {
    echo json_encode(["error" => true]);
    exit;
}

$lines = explode("\n", $response);

$found = false;
$count = 0;

foreach ($lines as $line) {
    list($hashSuffix, $times) = explode(":", trim($line));
    if ($hashSuffix === $suffix) {
        $found = true;
        $count = (int)$times;
        break;
    }
}

echo json_encode([
    "found" => $found,
    "count" => $count
]);