<?php
require_once __DIR__ . '/../models/HocPhan.php';

$model = new HocPhan();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maSV = $_POST['MaSV'];
    $maHP = $_POST['MaHP'];

    if ($model->register($maSV, $maHP)) {
        $message = "Đăng ký thành công!";
    } else {
        $message = "Không thể đăng ký, học phần đã đầy!";
    }

    header("Location: index.php?message=" . urlencode($message));
    exit();
}

$hocphans = $model->getAll();
require_once __DIR__ . '/../views/hocphan/index.php';
?>
