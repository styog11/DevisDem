<?php
abstract class BaseModel {
    protected $db;

    public function __construct() {
        $this->db = $this->connect();
    }

    protected function connect() {
        // Database connection logic here
        // Example: return new PDO('mysql:host=localhost;dbname=your_db', 'username', 'password');
    }

    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetchAll($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}