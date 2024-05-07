<?php

use PHPUnit\Framework\TestCase;

class AddResumeTest extends TestCase
{
    public function testAddResume()
    {
        // Подготовка данных для теста
        $id = 1;
        $username = 'Test User';
        $email = 'testuser@example.com';
        $expResume = 'Test Experience';
        $skillResume = 'Test Skills';
        $achivResume = 'Test Achievements';
        $educationResume = 'Test Education';
        $nameVacancy = 'Test Vacancy';
        $aboutResume = 'Test About';

        // Отправка формы добавления резюме
        $_POST['id'] = $id;
        $_POST['username'] = $username;
        $_POST['email'] = $email;
        $_POST['exp_resume'] = $expResume;
        $_POST['skill_resume'] = $skillResume;
        $_POST['achiv_resume'] = $achivResume;
        $_POST['education_resume'] = $educationResume;
        $_POST['name_vacancy'] = $nameVacancy;
        $_POST['about_resume'] = $aboutResume;

        require '../controllers/addResume.php';

        // Проверка результата
        $pdo = Connection::get()->connect();
        $sql = 'SELECT * FROM public.resume WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetch();

        $this->assertNotEmpty($result);
        $this->assertEquals($expResume, $result['exp_resume']);
        $this->assertEquals($skillResume, $result['skill_resume']);
        $this->assertEquals($achivResume, $result['achiv_resume']);
        $this->assertEquals($educationResume, $result['education_resume']);
        $this->assertEquals($nameVacancy, $result['name_vacancy']);
        $this->assertEquals($aboutResume, $result['about_resume']);
    }
}
