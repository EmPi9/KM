<?
include_once '../models/project.php';

$id_project = $_GET['id_project'];
$status_project = "0";

updateProject($status_project, $id_project);
 function updateproject($status_project, $id_project){
      $pdo = Connection::get()->connect();
      $sql = 'UPDATE public.projects
    SET status_project=:status_project
    WHERE id_project=:id_project;';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":status_project", $status_project);
    $statement->bindValue(":id_project", $id_project);
    $statement->execute();
 }
 
 header('Location: ../src/admin_project.php');