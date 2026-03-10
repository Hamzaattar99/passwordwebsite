<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "password_security_system";

/*
$host = "sql110.infinityfree.com";
$user = "if0_41339352";
$password = "VuUk6THNqTkpZ0";
$dbname = "if0_41339352_XXX";

*/

// إنشاء الاتصال
$conn = new mysqli($host, $user, $password, $dbname);

// تحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// تعيين الترميز إلى UTF-8
// $conn->set_charset("utf8");

?>