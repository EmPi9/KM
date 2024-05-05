<?
include_once '../models/vacancy.php';

$id_vacancy = $_GET['id_vacancy'];
$status_vacancy = "0";

updateVacancy($status_vacancy, $id_vacancy);
 function updateVacancy($status_vacancy, $id_vacancy){
      $pdo = Connection::get()->connect();
      $sql = 'UPDATE public.vacancy
    SET status_vacancy=:status_vacancy
    WHERE id_vacancy=:id_vacancy;';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":status_vacancy", $status_vacancy);
    $statement->bindValue(":id_vacancy", $id_vacancy);
    $statement->execute();
 }
 
 header('Location: ../src/admin_vacancy.php');