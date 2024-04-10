<?php
include_once './../models/connection.php';
$id = $_GET['id'];

function deleteUser($id) {
    $pdo = Connection::get()->connect();
    $sql = 'DELETE FROM public.users WHERE id = :id';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $row_count = $statement->rowCount();
    if($row_count !== 0) {
        return true;
    }
    return false;
}

deleteUser($id);

header('Location: ' . $_SERVER['HTTP_REFERER']);