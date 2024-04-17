<?php
include_once '../models/project.php';

$cost_project = $_POST['cost_project'];
$name_project = $_POST['name_project'];
$type_project= $_POST['type_project'];
$desc_project = $_POST['desc_project'];
$img_project = $_FILES['img_project'];

// $date = time(); //timestamp
$filename = uploadImage($img_project);

addProject($cost_project, $name_project, $type_project, $desc_project, $filename);

// header("Location: ./../news.php?id=$id_posts");
header('Location: ../src/admin_project.php');
//header('Location: ./../prod-store.php');