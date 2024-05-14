<?php
include_once '../models/request.php';
require_once '../vendor/autoload.php';

$phpWord = new \PhpOffice\PhpWord\PhpWord();

$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../assets/documents/services_full.docx');

$documentSign = new \PhpOffice\PhpWord\TemplateProcessor('../assets/documents/services.docx');


$id_request = $_POST['id_request'];
$name_request = $_POST['name_request'];
$name_company= $_POST['name_company'];
$price_request = $_POST['price_request'];
$description_request= $_POST['description_request'];
$date_request = date ("d.m.Y");
$username = $_POST['username'];
$id = $_POST['id'];
$comment_request = $_POST['comment_request'];
$reliability_request = $_POST['reliability_request'];
$manufacturability_request = $_POST['manufacturability_request'];
$security_request = $_POST['security_request'];
$documentation_equipment_request = $_POST['documentation_equipment_request'];
$program_request = $_POST['program_request'];
$acceptance_request = $_POST['acceptance_request'];
$warranty_request = $_POST['warranty_request'];

  

// Загрузка в документ ТЗ
$templateProcessor->setValue('id_request', $id_request);
$templateProcessor->setValue('name_request', $name_request);
$templateProcessor->setValue('name_company', $name_company);
$templateProcessor->setValue('price_request', $price_request);
$templateProcessor->setValue('description_request', $description_request);
$templateProcessor->setValue('date_request', $date_request);
$templateProcessor->setValue('username', $username);
$templateProcessor->setValue('reliability_request', $reliability_request);
$templateProcessor->setValue('manufacturability_request', $manufacturability_request);
$templateProcessor->setValue('security_request', $security_request);
$templateProcessor->setValue('documentation_equipment_request', $documentation_equipment_request);
$templateProcessor->setValue('program_request', $program_request);
$templateProcessor->setValue('acceptance_request', $acceptance_request);
$templateProcessor->setValue('warranty_request', $warranty_request);

// Загрузка в документ ДВОУ
$documentSign->setValue('id_request', $id_request);
$documentSign->setValue('name_request', $name_request);
$documentSign->setValue('name_company', $name_company);
$documentSign->setValue('price_request', $price_request);
$documentSign->setValue('description_request', $description_request);
$documentSign->setValue('date_request', $date_request);
$documentSign->setValue('username', $username);


$doc_folder = './../assets/documents/'; 
$doc_extension = 'docx';

$document_request = uniqid() . '.' . $doc_extension;
$doc = $doc_folder . $document_request;

$sign_request = uniqid() . '.' . $doc_extension;
$doc_sign = $doc_folder . $sign_request;

$templateProcessor->saveAs($doc);
$documentSign->saveAs($doc_sign);



editRequest($name_request, $name_company, $price_request, $description_request, $date_request, $username, $id, $document_request, $comment_request, $reliability_request, $manufacturability_request, $security_request, $documentation_equipment_request, $program_request, $acceptance_request, $warranty_request, $sign_request, $id_request);

header('Location: ../src/request_return.php');
