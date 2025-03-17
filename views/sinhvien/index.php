<?php
require_once __DIR__ . '/../../models/SinhVien.php';
$model = new SinhVien();
$stmt = $model->getAll();
?>
<a href="create.php">Thêm sinh viên</a>
<table border="1">
    <tr>
        <th>Mã SV</th>
        <th>Họ Tên</th>
        <th>Giới Tính</th>
        <th>Ngày Sinh</th>
        <th>Hình Ảnh</th>
        <th>Ngành Học</th>
        <th>Hành Động</th>
    </tr>
    <?php while ($sv = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $sv['MaSV']; ?></td>
            <td><?= $sv['HoTen']; ?></td>
            <td><?= $sv['GioiTinh']; ?></td>
            <td><?= $sv['NgaySinh']; ?></td>
            <td><img src="<?= $sv['Hinh']; ?>" width="50"></td>
            <td><?= $sv['TenNganh']; ?></td>
            <td>
    <a href="detail.php?id=<?= $sv['MaSV']; ?>">Xem</a> |
    <a href="edit.php?id=<?= $sv['MaSV']; ?>">Sửa</a> |
    <a href="delete.php?id=<?= $sv['MaSV']; ?>" onclick="return confirm('Xóa sinh viên?')">Xóa</a>
</td>

        </tr>
    <?php endwhile; ?>
</table>
