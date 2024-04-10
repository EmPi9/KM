<?php
include_once '../models/resume.php';
 
$exp_resume = $_POST['exp_resume'];
$skill_resume = $_POST['skill_resume'];
$achiv_resume = $_POST['achiv_resume'];
$education_resume= $_POST['education_resume'];
$about_resume= $_POST['about_resume'];
$id = $_POST['id'];
$name_vacancy = $_POST['name_vacancy'];
$username = $_POST['username'];

addResume($exp_resume, $skill_resume, $achiv_resume, $education_resume, $about_resume, $id, $name_vacancy, $username);

header('Location: ../src/profile.php');
