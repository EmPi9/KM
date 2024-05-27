<?php
session_start();
include_once 'connection.php';

function addKanban($task_kanban, $id_request, $status_kanban) {
    $pdo = Connection::get()->connect();
    $sql = 'INSERT INTO public.kanban (task_kanban, id_request, status_kanban) VALUES(:task_kanban, :id_request, :status_kanban)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":task_kanban", $task_kanban);
    $statement->bindValue(":id_request", $id_request);
    $statement->bindValue(":status_kanban", $status_kanban);
    $statement->execute();
}

function getKanbans() {
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.kanban';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $kanban = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $kanban;
}

function getKanban($id_kanban){
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.kanban WHERE id_kanban = :id_kanban';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id_kanban', intval($id_kanban));
    $statement->execute();
    $post = $statement->fetch(PDO::FETCH_ASSOC);
    return $post;
}

function takeTask($employee_kanban, $status_kanban, $id, $id_request, $id_kanban) {
    $pdo = Connection::get()->connect();
    $sql = 'UPDATE public.kanban SET employee_kanban=:employee_kanban, status_kanban=:status_kanban, id=:id, id_request=:id_request  WHERE id_kanban=:id_kanban;';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":employee_kanban", $employee_kanban);
    $statement->bindValue(":status_kanban", $status_kanban);
    $statement->bindValue(":id", $id);
    $statement->bindValue(":id_request", $id_request);
    $statement->bindValue(":id_kanban", $id_kanban);
    $statement->execute();
}



