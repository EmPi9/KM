<?php

include_once '../models/request.php';
require_once '../vendor/autoload.php';

$document = new \PhpOffice\PhpWord\TemplateProcessor('../services.docx');

$uploadDir =  __DIR__;
$outputFile = 'services_full.docx';

$uploadFile = $uploadDir . '\\' . basename($_FILES['file']['name']);
move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile);

$id_request = $_POST['id_request'];
$name_request = $_POST['name_request'];
$name_company= $_POST['name_company'];
$price_request = $_POST['price_request'];
$description_request= $_POST['description_request'];
$date_request = date (" d/m/Y");
$username = $_POST['username'];
$id = $_POST['id'];

addRequest($name_request, $name_company, $price_request, $description_request, $date_request, $username, $id);

// Загрузка в документ
$document->setValue('id_request', $id_request);
$document->setValue('name_request', $name_request);
$document->setValue('name_company', $name_company);
$document->setValue('price_request', $price_request);
$document->setValue('description_request', $description_request);
$document->setValue('date_request', $date_request);


$document->saveAs($outputFile);

//Имя скачиваемого файла
$downloadFile = $outputFile;

// Контент-тип означающий скачивание
header("Content-Type: application/octet-stream");

//Размер в байтах
header("Accept-Ranges: bytes");

// Размер файла
header("Content-Length: ".filesize($downloadFile));

// Расположение скачиваемого файла
header("Content-Disposition: attachment; filename=".$downloadFile);  

// Прочитать файл
readfile($downloadFile);


// unlink($uploadFile);
// unlink($outputFile);

header('Location: ../src/send_request.php');
