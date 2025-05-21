<?php
namespace App\Models;

use PDO;

class UserModel {
    private PDO $db;

    public function __construct() {
        $env = parse_ini_file(__DIR__ . '/../../.env');
        $this->db = new PDO(
            "mysql:host={$env['DB_HOST']};dbname={$env['DB_NAME']};charset=utf8mb4",
            $env['DB_USER'],
            $env['DB_PASS']
        );
    }

    public function getByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function create($name, $email, $password) {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $password]);
    }
}