<?php
class Database {
    private $host = 'db.fr-pari1.bengt.wasmernet.com';//'localhost';
    private $db_name = 'dbPNfixPshrk9HZuxhYxSS2v';//'portfolio';
    private $username = '179840eb78ad80005d3301d4272a';//'root';
    private $password = '06911798-40ec-7a63-8000-82cc049454bd';
    private $conn;

    public function connect() {
        if ($this->conn) return $this->conn;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};port=10272;dbname={$this->db_name};charset=utf8mb4",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("DB Connection Failed: " . $e->getMessage());
        }

        return $this->conn;
    }
}
