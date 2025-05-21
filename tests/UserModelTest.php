<?php
use PHPUnit\Framework\TestCase;
use App\Models\UserModel;

class UserModelTest extends TestCase {
    private UserModel $userModel;

    protected function setUp(): void {
        $this->userModel = new UserModel();
    }

    public function testUserRegistrationAndFetch() {
        $name = "Test User";
        $email = "testuser@example.com";
        $password = password_hash("123456", PASSWORD_DEFAULT);

        // Register
        $this->userModel->create($name, $email, $password);

        // Fetch
        $user = $this->userModel->getByEmail($email);

        $this->assertNotEmpty($user);
        $this->assertEquals($name, $user['name']);
        $this->assertEquals($email, $user['email']);
    }
}
