<?php
require_once __DIR__ . '/../config/Database.php';

class NganhHoc {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Lấy danh sách tất cả ngành học
    public function getAll() {
        $sql = "SELECT * FROM NganhHoc";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Kiểm tra ngành học có tồn tại không
    public function exists($MaNganh) {
        $sql = "SELECT * FROM NganhHoc WHERE MaNganh = :MaNganh";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':MaNganh', $MaNganh);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }

    // Lấy thông tin ngành học theo mã
    public function getById($MaNganh) {
        $sql = "SELECT * FROM NganhHoc WHERE MaNganh = :MaNganh";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':MaNganh', $MaNganh);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
