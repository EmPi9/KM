<?php
include_once '../models/vacancy.php';
 
$name_vacancy = $_POST['name_vacancy'];
$respons_vacancy = $_POST['respons_vacancy'];
$requir_vacancy = $_POST['requir_vacancy'];
$conditions_vacancy= $_POST['conditions_vacancy'];

addVacancy($name_vacancy, $respons_vacancy, $requir_vacancy, $conditions_vacancy);

 header('Location: ../src/admin_vacancy.php');
