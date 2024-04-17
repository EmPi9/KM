<?php
session_start();
include_once 'connection.php';

function addRequest($name_request, $name_company, $price_request, $description_request, $date_request, $username, $id, $document_request, $comment_request) {
    $pdo = Connection::get()->connect();
    $sql = 'INSERT INTO public.requests (name_request, name_company, price_request, description_request, status_request, date_request, username, id, document_request, comment_request) VALUES(:name_request, :name_company, :price_request, :description_request, 0, :date_request, :username, :id, :document_request, :comment_request)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":name_request", $name_request);
    $statement->bindValue(":name_company", $name_company);
    $statement->bindValue(":price_request", $price_request);
    $statement->bindValue(":description_request", $description_request);
    $statement->bindValue(":date_request", $date_request);
    $statement->bindValue(":username", $username);
    $statement->bindValue(":id", $id); 
    $statement->bindValue(":document_request", $document_request);
    $statement->bindValue(":comment_request", $comment_request); 
    $statement->execute();
}

function getRequests() {
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.requests';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $requests = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $requests;
}

function getRequest($id_request){
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.requests WHERE id_request = :id_request';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id_request', intval($id_request));
    $statement->execute();
    $post = $statement->fetch(PDO::FETCH_ASSOC);
    return $post;
}

function delRequest($id_request){
    $pdo = Connection::get()->connect();
    $sql = 'DELETE FROM public.requests WHERE id_request = :id_request';
    $statement = $pdo->prepare($sql);
    $statement->execute([$id_request]);
    return true;
}
