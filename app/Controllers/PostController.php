<?php
namespace App\Controllers;

use App\Models\PostModel;

class PostController {
    public function show() {
        $id = $_GET['id'] ?? null;
        $model = new PostModel();
        $post = $model->find($id);
        echo json_encode($post);
    }

    public function create() {
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $author_id = $_SESSION['user_id'] ?? 1;

        $model = new PostModel();
        $model->create($title, $desc, $author_id);
        echo "Post created.";
    }

    public function update() {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $desc = $_POST['description'];

        $model = new PostModel();
        $model->update($id, $title, $desc);
        echo "Post updated.";
    }

    public function delete() {
        $id = $_POST['id'];
        $model = new PostModel();
        $model->delete($id);
        echo "Post deleted.";
    }
}