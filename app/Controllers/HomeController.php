<?php
namespace App\Controllers;

use App\Models\PostModel;

class HomeController {
    public function index() {
        $postModel = new PostModel();
        $posts = $postModel->all();
        foreach ($posts as $post) {
            echo "<h2>{$post['title']}</h2><p>{$post['description']}</p>";
        }
    }
}
