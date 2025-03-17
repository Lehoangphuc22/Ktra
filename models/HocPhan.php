<?php
require_once __DIR__ . '/../config/Database.php';

class HocPhan {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Lấy danh sách học phần
    public function getAll() {
        $sql = "SELECT * FROM HocPhan";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy mã đăng ký của sinh viên
    private function getMaDK($maSV) {
        $sql = "SELECT MaDK FROM DangKy WHERE MaSV = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$maSV]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['MaDK'];
        } else {
            $sqlInsert = "INSERT INTO DangKy (MaSV) VALUES (?)";
            $stmtInsert = $this->conn->prepare($sqlInsert);
            $stmtInsert->execute([$maSV]);
            return $this->conn->lastInsertId();
        }
    }

    // Hàm đăng ký học phần & cập nhật số lượng sinh viên dự kiến
    public function register($maSV, $maHP) {
        $maDK = $this->getMaDK($maSV);

        // Kiểm tra số lượng sinh viên còn trống
        $sqlCheck = "SELECT SoLuongDuKien FROM HocPhan WHERE MaHP = ?";
        $stmtCheck = $this->conn->prepare($sqlCheck);
        $stmtCheck->execute([$maHP]);
        $result = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if ($result && $result['SoLuongDuKien'] > 0) {
            // Thêm đăng ký vào ChiTietDangKy
            $sql = "INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES (?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$maDK, $maHP]);

            // Giảm số lượng dự kiến
            $sqlUpdate = "UPDATE HocPhan SET SoLuongDuKien = SoLuongDuKien - 1 WHERE MaHP = ?";
            $stmtUpdate = $this->conn->prepare($sqlUpdate);
            $stmtUpdate->execute([$maHP]);

            return true;
        }
        return false; // Không thể đăng ký nếu hết chỗ
    }
}
?>
