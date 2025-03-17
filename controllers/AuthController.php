<?php
require_once __DIR__ . '/../models/Auth.php';
session_start();

$authModel = new Auth();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maSV = $_POST['MaSV'];
    $sv = $authModel->login($maSV);

    if ($sv) {
        $_SESSION['MaSV'] = $sv['MaSV'];
        $_SESSION['HoTen'] = $sv['HoTen'];
        header("Location: /views/hocphan/index.php");
    } else {
        $error = "Mã sinh viên không hợp lệ!";
    }
}
?>
