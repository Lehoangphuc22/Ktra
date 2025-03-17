<?php
require_once __DIR__ . '/../../models/SinhVien.php';
$model = new SinhVien();
$sv = $model->getById($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model->update($_POST['MaSV'], $_POST['HoTen'], $_POST['GioiTinh'], $_POST['NgaySinh'], $_POST['Hinh'], $_POST['MaNganh']);
    header("Location: index.php");
}
?>
<form method="post">
    Mã SV: <input type="text" name="MaSV" value="<?= $sv['MaSV'] ?>" readonly><br>
    Họ Tên: <input type="text" name="HoTen" value="<?= $sv['HoTen'] ?>"><br>
    Giới Tính: <input type="text" name="GioiTinh" value="<?= $sv['GioiTinh'] ?>"><br>
    Ngày Sinh: <input type="date" name="NgaySinh" value="<?= $sv['NgaySinh'] ?>"><br><br>
    Hình: <input type="text" name="Hinh" value="<?= $sv['Hinh'] ?>"><br>
    Mã Ngành: <input type="text" name="MaNganh" value="<?= $sv['MaNganh'] ?>"><br>
    <button type="submit">Cập nhật</button>
</form>
