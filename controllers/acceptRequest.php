<?
include_once '../models/request.php';


$id_request = $_POST['id_request'];
$worker_request = $_POST['worker_request'];
$status_request = "1";
$comment_request = "Принято! Осталось подписать договор и отправить нам.";

updateRequest($status_request, $id_request, $comment_request, $worker_request);
 function updateRequest($status_request, $id_request, $comment_request, $worker_request){
    $pdo = Connection::get()->connect();
    $sql = 'UPDATE public.requests
    SET status_request=:status_request, comment_request=:comment_request, worker_request=:worker_request
    WHERE id_request=:id_request;';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":worker_request", $worker_request);
    $statement->bindValue(":comment_request", $comment_request);
    $statement->bindValue(":status_request", $status_request);
    $statement->bindValue(":id_request", $id_request);
    $statement->execute();
 }
 
 header('Location: ../src/admin_dashboard.php');