<?php
include_once '../models/project.php';

$text_comment = $_POST['text_comment'];
$id_project = $_POST['id_project'];
$username= $_POST['username'];
$id = $_POST['id'];
$date_comment = date("d.m.Y");
$rating_comment= $_POST['rating_comment'];

addComment($text_comment, $id_project, $username, $id, $date_comment, $rating_comment);

header('Location: ../src/project_details.php?id_project='.$id_project);
