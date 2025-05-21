<?php
namespace App\Entities;

class Post {
    private string $title;
    private string $description;
    private int $author_id;

    public function __construct($title, $description, $author_id) {
        $this->title = $title;
        $this->description = $description;
        $this->author_id = $author_id;
    }

    public function getTitle() {
        return $this->title;
    }
}