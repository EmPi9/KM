<?php
session_start();
include_once 'connection.php';

function uploadDocument($document) {
    $extension = pathinfo($document['name'], PATHINFO_EXTENSION); // узнаем расширение файла
    $filename = uniqid() . "." . $extension; // делаем уникальное название файла и добавляем в конец расширение
    $uploadPath = "./../assets/documents/" . $filename; // полный путь к файлу
    move_uploaded_file($document['tmp_name'], $uploadPath); // перемещаем файл в папку для документов
    return $filename; // возвращаем только имя файла
}

function addRequestDocs($name_company, $date_request, $username, $id, $document_request, $comment_request) {
    $pdo = Connection::get()->connect();
    $sql = 'INSERT INTO public.requests (name_company, status_request, date_request, username, id, document_request, comment_request) VALUES(:name_company, 0, :date_request, :username, :id, :document_request, :comment_request)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":name_company", $name_company);
    $statement->bindValue(":date_request", $date_request);
    $statement->bindValue(":username", $username);
    $statement->bindValue(":id", $id);
    $statement->bindValue(":document_request", $document_request);
    $statement->bindValue(":comment_request", $comment_request);
    $statement->execute();
}

function addRequest($name_request, $name_company, $price_request, $description_request, $date_request, $username, $id, $document_request, $comment_request, $reliability_request, $manufacturability_request, $security_request, $documentation_equipment_request, $program_request, $acceptance_request, $warranty_request, $sign_request) {
    $pdo = Connection::get()->connect();
    $sql = 'INSERT INTO public.requests (name_request, name_company, price_request, description_request, status_request, date_request, username, id, document_request, comment_request, reliability_request, manufacturability_request, security_request, documentation_equipment_request, program_request, acceptance_request, warranty_request, sign_request) VALUES(:name_request, :name_company, :price_request, :description_request, 0, :date_request, :username, :id, :document_request, :comment_request, :reliability_request, :manufacturability_request, :security_request, :documentation_equipment_request, :program_request, :acceptance_request, :warranty_request, :sign_request)';
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
    $statement->bindValue(":reliability_request", $reliability_request);
    $statement->bindValue(":manufacturability_request", $manufacturability_request);
    $statement->bindValue(":security_request", $security_request);
    $statement->bindValue(":documentation_equipment_request", $documentation_equipment_request);
    $statement->bindValue(":program_request", $program_request);
    $statement->bindValue(":acceptance_request", $acceptance_request);
    $statement->bindValue(":warranty_request", $warranty_request);
    $statement->bindValue(":sign_request", $sign_request);    
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
