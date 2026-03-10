<?php
error_reporting(E_ERROR | E_PARSE); // إخفاء تحذيرات و notices
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['password'])) {
    $_SESSION['password_to_analyze'] = $_POST['password'];
    echo json_encode(['success' => true]);
    exit; // تأكد من إنهاء السكريبت هنا
} else {
    echo json_encode(['success' => false]);
    exit;
}