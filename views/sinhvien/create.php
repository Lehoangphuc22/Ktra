<?php
require_once __DIR__ . '/../../models/SinhVien.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model = new SinhVien();
    $model->add($_POST['MaSV'], $_POST['HoTen'], $_POST['GioiTinh'], $_POST['NgaySinh'], $_POST['Hinh'], $_POST['MaNganh']);
    header("Location: index.php");
}
?>
<form method="post">
    Mã SV: <input type="text" name="MaSV"><br>
    Họ Tên: <input type="text" name="HoTen"><br>
    Giới Tính: <input type="text" name="GioiTinh"><br>
    Ngày Sinh: <input type="date" name="NgaySinh"><br>
    Hình: <input type="text" name="Hinh"><br>
    Mã Ngành: <input type="text" name="MaNganh"><br>
    <button type="submit">Thêm</button>
</form>
