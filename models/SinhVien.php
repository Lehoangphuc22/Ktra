<?php
require_once __DIR__ . '/../config/Database.php';

class SinhVien {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Lấy danh sách sinh viên
    public function getAll() {
        $sql = "SELECT sv.*, nh.TenNganh FROM SinhVien sv 
                JOIN NganhHoc nh ON sv.MaNganh = nh.MaNganh";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    // Lấy thông tin sinh viên theo mã
    public function getById($id) {
        $sql = "SELECT sv.*, nh.TenNganh FROM SinhVien sv 
                JOIN NganhHoc nh ON sv.MaNganh = nh.MaNganh
                WHERE sv.MaSV = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm sinh viên mới
    public function add($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh) {
        $sql = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh]);
    }

    // Cập nhật sinh viên
    public function update($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh) {
        $sql = "UPDATE SinhVien SET HoTen = :HoTen, GioiTinh = :GioiTinh, NgaySinh = :NgaySinh, Hinh = :Hinh, MaNganh = :MaNganh WHERE MaSV = :MaSV";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':MaSV', $MaSV);
        $stmt->bindParam(':HoTen', $HoTen);
        $stmt->bindParam(':GioiTinh', $GioiTinh);
        $stmt->bindParam(':NgaySinh', $NgaySinh);
        $stmt->bindParam(':Hinh', $Hinh);
        $stmt->bindParam(':MaNganh', $MaNganh);
        
        return $stmt->execute();
    }
    

    // Xóa sinh viên
    public function delete($id) {
        $sql = "DELETE FROM SinhVien WHERE MaSV = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
