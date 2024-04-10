<?php
session_start();
include_once 'connection.php';

function addVacancy($name_vacancy, $respons_vacancy, $requir_vacancy, $conditions_vacancy) {
    $pdo = Connection::get()->connect();
    $sql = 'INSERT INTO public.vacancy (name_vacancy, respons_vacancy, requir_vacancy, conditions_vacancy, status_vacancy) VALUES(:name_vacancy, :respons_vacancy, :requir_vacancy, :conditions_vacancy, 0)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":name_vacancy", $name_vacancy);
    $statement->bindValue(":respons_vacancy", $respons_vacancy);
    $statement->bindValue(":requir_vacancy", $requir_vacancy);
    $statement->bindValue(":conditions_vacancy", $conditions_vacancy);
    $statement->execute();
}

function getVacancys() {
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.vacancy';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $vacancy = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $vacancy;
}

function getVacancy($id_vacancy){
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.vacancy WHERE id_vacancy = :id_vacancy';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id_vacancy', intval($id_vacancy));
    $statement->execute();
    $post = $statement->fetch(PDO::FETCH_ASSOC);
    return $post;
}