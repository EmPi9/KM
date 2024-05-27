<?php
include_once './../models/connection.php';
include_once './../models/authentication.php';

$id= $_POST['id'];
$admin = $_POST['admin'];
$specialty = $_POST['specialty'];
$team_name = $_POST['team_name'];

editRole($admin, $specialty, $team_name, $id);

header('Location: ../src/admin_employee.php');