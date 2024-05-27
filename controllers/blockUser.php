<?
include_once '../models/authentication.php';
include_once './../models/connection.php';
$id = $_GET['id'];
$admin = "Заблокирован";

updateUser($admin, $id);
 function updateUser($admin, $id){
    $pdo = Connection::get()->connect();
    $sql = 'UPDATE public.users
    SET admin=:admin
    WHERE id=:id;';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":admin", $admin);
    $statement->bindValue(":id", $id);
    $statement->execute();
 }
 header('Location: ' . $_SERVER['HTTP_REFERER']);