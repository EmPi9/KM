<?php
require_once '../vendor/autoload.php';
require_once '../models/vacancy.php'; 

use PHPUnit\Framework\TestCase;

class AddVacancyTest extends TestCase
{
    public function testAddVacancy()
    {
        // Подготовка данных для теста
        $name_vacancy = 'Test Vacancy';
        $respons_vacancy = 'Test Responsibilities';
        $requir_vacancy = 'Test Requirements';
        $conditions_vacancy = 'Test Conditions';

        // Вызов функции addVacancy()
        addVacancy($name_vacancy, $respons_vacancy, $requir_vacancy, $conditions_vacancy);

        // Проверка результата
        $pdo = Connection::get()->connect();
        $sql = 'SELECT * FROM public.vacancy WHERE name_vacancy = :name_vacancy';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":name_vacancy", $name_vacancy);
        $statement->execute();
        $result = $statement->fetch();

        $this->assertNotEmpty($result);
        $this->assertEquals($name_vacancy, $result['name_vacancy']);
        $this->assertEquals($respons_vacancy, $result['respons_vacancy']);
        $this->assertEquals($requir_vacancy, $result['requir_vacancy']);
        $this->assertEquals($conditions_vacancy, $result['conditions_vacancy']);
        $this->assertEquals(0, $result['status_vacancy']);
    }
}