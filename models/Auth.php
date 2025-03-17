<?php
require_once __DIR__ . '/../config/Database.php';

class Auth {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function login($maSV) {
        $sql = "SELECT * FROM SinhVien WHERE MaSV = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$maSV]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
