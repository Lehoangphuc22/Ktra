<?php
require_once __DIR__ . '/../../models/SinhVien.php';

$model = new SinhVien();
$sv = $model->getById($_GET['id']);

if (!$sv) {
    echo "Sinh viên không tồn tại!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sinh Viên</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <h2>Chi Tiết Sinh Viên</h2>
    <table border="1">
        <tr>
            <th>Mã SV:</th>
            <td><?= htmlspecialchars($sv['MaSV']) ?></td>
        </tr>
        <tr>
            <th>Họ Tên:</th>
            <td><?= htmlspecialchars($sv['HoTen']) ?></td>
        </tr>
        <tr>
            <th>Giới Tính:</th>
            <td><?= htmlspecialchars($sv['GioiTinh']) ?></td>
        </tr>
        <tr>
            <th>Ngày Sinh:</th>
            <td><?= htmlspecialchars($sv['NgaySinh']) ?></td>
        </tr>
        <tr>
            <th>Hình Ảnh:</th>
            <td><img src="<?= htmlspecialchars($sv['Hinh']) ?>" width="100"></td>
        </tr>
        <tr>
            <th>Ngành Học:</th>
            <td><?= htmlspecialchars($sv['TenNganh']) ?></td>
        </tr>
    </table>
    <br>
    <a href="index.php">Quay lại danh sách</a>
</body>
</html>
