<?php
require_once __DIR__ . '/../../models/SinhVien.php';
$model = new SinhVien();
$model->delete($_GET['id']);
header("Location: index.php");
?>
