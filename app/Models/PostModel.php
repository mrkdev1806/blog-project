<?php
namespace App\Models;

use PDO;

class PostModel {
    private PDO $db;

    public function __construct() {
        $env = parse_ini_file(__DIR__ . '/../../.env');
        $this->db = new PDO(
            "mysql:host={$env['DB_HOST']};dbname={$env['DB_NAME']};charset=utf8mb4",
            $env['DB_USER'],
            $env['DB_PASS']
        );
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($title, $desc, $author_id) {
        $stmt = $this->db->prepare("INSERT INTO posts (title, description, author_id, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$title, $desc, $author_id]);
    }

    public function update($id, $title, $desc) {
        $stmt = $this->db->prepare("UPDATE posts SET title = ?, description = ?, updated_at = NOW() WHERE id = ?");
        $stmt->execute([$title, $desc, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->execute([$id]);
    }
}