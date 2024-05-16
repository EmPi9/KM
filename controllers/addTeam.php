<?php
include_once '../models/team.php';
 
$name_team = $_POST['name_team'];
$employee1_team = $_POST['employee1_team'];
$employee2_team = $_POST['employee2_team'];
$employee3_team = $_POST['employee3_team'];
$employee3_team = $_POST['employee3_team'];
$employee4_team = $_POST['employee4_team'];
$employee5_team = $_POST['employee5_team'];

addTeam($name_team, $employee1_team, $employee2_team, $employee3_team, $employee4_team, $employee5_team);

header('Location: ../src/admin_team.php');
