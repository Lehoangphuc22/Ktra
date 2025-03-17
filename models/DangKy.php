<?php
require_once __DIR__ . '/../config/Database.php';

class DangKy {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Lấy danh sách học phần đã đăng ký của sinh viên
    public function getRegisteredCourses($maSV) {
        $sql = "SELECT hp.MaHP, hp.TenHP, hp.SoTinChi 
                FROM ChiTietDangKy ctdk
                JOIN HocPhan hp ON ctdk.MaHP = hp.MaHP
                JOIN DangKy dk ON ctdk.MaDK = dk.MaDK
                WHERE dk.MaSV = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$maSV]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Xóa từng học phần đã đăng ký
    public function deleteCourse($maSV, $maHP) {
        $sql = "DELETE FROM ChiTietDangKy 
                WHERE MaDK IN (SELECT MaDK FROM DangKy WHERE MaSV = ?) 
                AND MaHP = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$maSV, $maHP]);
    }

    // Xóa toàn bộ học phần đã đăng ký của sinh viên
    public function deleteAllCourses($maSV) {
        $sql = "DELETE FROM ChiTietDangKy 
                WHERE MaDK IN (SELECT MaDK FROM DangKy WHERE MaSV = ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$maSV]);
    }
}
?>
