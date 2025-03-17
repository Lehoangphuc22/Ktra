<?php
require_once __DIR__ . '/../models/SinhVien.php';

class SinhVienController
{
    public function index()
    {
        require_once __DIR__ . '/../views/sinhvien/index.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/sinhvien/create.php';
    }

    public function updateSinhVien()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $MaSV = $_POST["MaSV"];
            $HoTen = $_POST["HoTen"];
            $GioiTinh = $_POST["GioiTinh"];
            $NgaySinh = $_POST["NgaySinh"];
            $Hinh = $_POST["Hinh"];
            $MaNganh = $_POST["MaNganh"];

            // Kiểm tra xem mã ngành có tồn tại không
            $nganhHoc = new NganhHoc();
            if (!$nganhHoc->exists($MaNganh)) {
                die("Lỗi: Mã ngành không hợp lệ!");
            }

            $sinhVienModel = new SinhVien();
            if ($sinhVienModel->update($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh)) {
                header("Location: index.php");
                exit();
            } else {
                echo "Cập nhật thất bại!";
            }
        }
    }


    public function detail()
    {
        require_once __DIR__ . '/../views/sinhvien/detail.php';
    }

    public function delete()
    {
        require_once __DIR__ . '/../views/sinhvien/delete.php';
    }
}
