<?
include_once '../models/resume.php';

$id_resume = $_GET['id_resume'];
$status_resume = "2";

updateResume($status_resume, $id_resume);
 function updateresume($status_resume, $id_resume){
    $pdo = Connection::get()->connect();
    $sql = 'UPDATE public.resume
    SET status_resume=:status_resume
    WHERE id_resume=:id_resume;';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":status_resume", $status_resume);
    $statement->bindValue(":id_resume", $id_resume);
    $statement->execute();
 }
 
 header('Location: ../src/admin_resume.php');