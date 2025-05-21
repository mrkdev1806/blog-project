<?php
use PHPUnit\Framework\TestCase;
use App\Models\PostModel;

class PostModelTest extends TestCase {
    private PostModel $postModel;

    protected function setUp(): void {
        $this->postModel = new PostModel();
    }

    public function testCreateAndFetchPost() {
        $title = "Test Title";
        $description = "Test description.";
        $author_id = 1;

        // Create post
        $this->postModel->create($title, $description, $author_id);

        // Find last inserted post
        $pdo = (new ReflectionClass($this->postModel))->getProperty('db');
        $pdo->setAccessible(true);
        $db = $pdo->getValue($this->postModel);

        $stmt = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 1");
        $post = $stmt->fetch();

        $this->assertNotEmpty($post);
        $this->assertEquals($title, $post['title']);
        $this->assertEquals($description, $post['description']);
    }
}
