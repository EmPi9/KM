<?php
session_start();
include_once 'connection.php';


function uploadImage($image) {
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION); // узнаем расширение файла
    $filename = uniqid() . "." . $extension; // делаем уникальное название файла и добавляем в конец расширение
    move_uploaded_file($image['tmp_name'], "./../assets/img/" . $filename);
    return $filename;
}

function addProject($cost_project, $name_project, $type_project, $desc_project, $img_project) {
    $pdo = Connection::get()->connect();
    $sql = 'INSERT INTO public.projects (cost_project, name_project, type_project, desc_project, img_project) VALUES( :cost_project, :name_project, :type_project, :desc_project, :img_project)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":cost_project", $cost_project);
    $statement->bindValue(":name_project", $name_project);
    $statement->bindValue(":type_project",  $type_project);
    $statement->bindValue(":desc_project",  $desc_project);
    $statement->bindValue(":img_project", $img_project);
    $statement->execute();
}

function getProjects() {
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.projects';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $projects = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $projects;
}

function getProject($id_project){
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.projects WHERE id_project = :id_project';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id_project', intval($id_project));
    $statement->execute();
    $post = $statement->fetch(PDO::FETCH_ASSOC);
    return $post;
}

function delProject($id_project){
    $pdo = Connection::get()->connect();
    $sql = 'DELETE FROM public.projects WHERE id_project = :id_project';
    $statement = $pdo->prepare($sql);
    $statement->execute([$id_project]);
    return true;
}

// Комментарии к проектам 
function addComment($text_comment, $id_project, $username, $id, $date_comment) {
    $pdo = Connection::get()->connect();
    $sql = 'INSERT INTO public.comments (text_comment, id_project, username, id, date_comment) VALUES( :text_comment, :id_project, :username, :id, :date_comment)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":text_comment", $text_comment);
    $statement->bindValue(":id_project", $id_project);
    $statement->bindValue(":username",  $username);
    $statement->bindValue(":id",  $id);
    $statement->bindValue(":date_comment", $date_comment);
    $statement->execute();
}

function getComments() {
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.comments';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
}
