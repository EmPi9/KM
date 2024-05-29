<?php
include_once '../models/project.php';

$id_project= $_POST['id_project'];
$cost_project = $_POST['cost_project'];
$name_project = $_POST['name_project'];
$type_project = $_POST['type_project'];
$desc_project = $_POST['desc_project'];
// $img_project = $_FILES['img_project'];

// $filename = uploadImage($img_project);

editProject($cost_project, $name_project, $type_project, $desc_project, $id_project);

header('Location: ../src/admin_project.php');