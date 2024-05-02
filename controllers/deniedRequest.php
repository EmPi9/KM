<?
include_once '../models/request.php';

$id_request = $_POST['id_request'];
$status_request = "2";
$comment_request = $_POST['comment_request'];


updateRequest($status_request, $id_request, $comment_request);

 function updateRequest($status_request, $id_request, $comment_request){
      $pdo = Connection::get()->connect();
      $sql = 'UPDATE public.requests
    SET status_request=:status_request, comment_request=:comment_request
    WHERE id_request=:id_request;';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":comment_request", $comment_request);
    $statement->bindValue(":status_request", $status_request);
    $statement->bindValue(":id_request", $id_request);
    $statement->execute();
 }
 
 header('Location: ../src/admin_dashboard.php');