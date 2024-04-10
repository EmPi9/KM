<?php
session_start();
include_once 'connection.php';

function addResume($exp_resume, $skill_resume, $achiv_resume, $education_resume, $about_resume, $id, $name_vacancy, $username) {
    $pdo = Connection::get()->connect();
    $sql = 'INSERT INTO public.resume (exp_resume, skill_resume, achiv_resume, education_resume, about_resume, id, name_vacancy, username, status_resume) VALUES(:exp_resume, :skill_resume, :achiv_resume, :education_resume, :about_resume, :id, :name_vacancy, :username, 0)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":exp_resume", $exp_resume);
    $statement->bindValue(":skill_resume", $skill_resume);
    $statement->bindValue(":achiv_resume", $achiv_resume);
    $statement->bindValue(":education_resume", $education_resume);
    $statement->bindValue(":about_resume", $about_resume);
    $statement->bindValue(":name_vacancy", $name_vacancy);
    $statement->bindValue(":username", $username);
    $statement->bindValue(":id", $id); 
    $statement->execute();
}

function getResumes() {
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.resume';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $resume = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $resume;
}

function getResume($id_resume){
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.resume WHERE id_resume = :id_resume';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id_resume', intval($id_resume));
    $statement->execute();
    $post = $statement->fetch(PDO::FETCH_ASSOC);
    return $post;
}