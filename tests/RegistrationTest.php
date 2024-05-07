<?php

use PHPUnit\Framework\TestCase;

class RegistrationTest extends TestCase
{
    public function testRegistrationForm()
    {
        // Подготовка данных для теста
        $username = 'Test User';
        $login = 'testuser';
        $email = 'testuser@example.com';
        $password = 'testpassword';

        // Отправка формы регистрации
        $_POST['username'] = $username;
        $_POST['login'] = $login;
        $_POST['email'] = $email;
        $_POST['password'] = $password;

        require '../controllers/registrationUser.php';

        // Проверка результата
        $pdo = Connection::get()->connect();
        $sql = 'SELECT * FROM public.users WHERE email = :email';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $result = $statement->fetch();

        $this->assertNotEmpty($result);
        $this->assertEquals($username, $result['username']);
        $this->assertEquals($login, $result['login']);
        $this->assertEquals($email, $result['email']);
        $this->assertNotEmpty($result['password']);
    }
}