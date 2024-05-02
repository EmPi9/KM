<?php

include_once '../models/request.php';

$name_company = $_POST['name_company'];
$date_request = date("d.m.Y");
$username = $_POST['username'];
$id = $_POST['id'];
$comment_request = $_POST['comment_request'];

$filename = uploadDocument($_FILES['document_request']);

addRequestDocs($name_company, $date_request, $username, $id, $filename, $comment_request); // Передача подключения к базе данных в функцию

header('Location: ../src/send_request.php');