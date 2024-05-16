<?php
require_once '../vendor/autoload.php';
require_once '../models/project.php'; 

use PHPUnit\Framework\TestCase;

class AddProjectTest extends TestCase
{
    public function testAddProject()
    {
        // Подготовка данных для теста
        $cost_project = 'Test cost';
        $name_project = 'Test name';
        $type_project = 'Test type';
        $desc_project = 'Test desc';
        $img_project = 'Test img';

        // Вызов функции addVacancy()
        addProject($cost_project, $name_project, $type_project, $desc_project, $img_project);

        // Проверка результата
        $pdo = Connection::get()->connect();
        $sql = 'SELECT * FROM public.projects WHERE name_project = :name_project';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":name_project", $name_project);
        $statement->execute();
        $result = $statement->fetch();

        $this->assertNotEmpty($result);
        $this->assertEquals($name_project, $result['name_project']);
        $this->assertEquals($cost_project, $result['cost_project']);
        $this->assertEquals($type_project, $result['type_project']);
        $this->assertEquals($desc_project, $result['desc_project']);
        $this->assertEquals($img_project, $result['img_project']);
        $this->assertEquals(0, $result['status_project']);
    }
}