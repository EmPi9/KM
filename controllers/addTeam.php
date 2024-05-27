<?php
include_once '../models/team.php';
 
$name_team = $_POST['name_team'];
$desc_team = $_POST['desc_team'];

addTeam($name_team, $desc_team);

header('Location: ../src/admin_team.php');
