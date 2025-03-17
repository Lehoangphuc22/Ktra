<?php
require_once __DIR__ . '/../models/DangKy.php';
session_start();

// Kiểm tra sinh viên đã đăng nhập chưa
if (!isset($_SESSION['MaSV'])) {
    header("Location: /views/auth/login.php");
    exit;
}

$maSV = $_SESSION['MaSV'];
$dangKyModel = new DangKy();
$registeredCourses = $dangKyModel->getRegisteredCourses($maSV);

// Xử lý xóa từng học phần
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteOne'])) {
    $maHP = $_POST['maHP'];
    $dangKyModel->deleteCourse($maSV, $maHP);
    header("Location: index.php");
    exit;
}

// Xử lý xóa toàn bộ học phần đã đăng ký
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteAll'])) {
    $dangKyModel->deleteAllCourses($maSV);
    header("Location: index.php");
    exit;
}
?>
