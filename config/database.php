<?php
class Database {
    private $host = "localhost"; // Đổi nếu cần
    private $db_name = "test1";
    private $username = "root"; // Đổi nếu có user khác
    private $password = ""; // Đổi nếu có mật khẩu
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Lỗi kết nối CSDL: " . $exception->getMessage());
        }
        return $this->conn;
    }
}
?>
