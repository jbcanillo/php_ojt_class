<?php
require_once __DIR__ . '../../../config/Database.php';

class Project {
    private $conn;
    private $table = 'projects';

    public function __construct() {
       $db = new Database();
       $this->conn = $db->connect();
    }

    public function all() {
        $sql = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO {$this->table} (title, description, link, created_by, is_active) VALUES (:title, :description, :link, :created_by, :is_active)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function show($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data) {
        $sql = "UPDATE {$this->table} SET title = :title, description = :description, link = :link, is_active = :is_active WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
