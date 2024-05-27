<?php
session_start();
include_once 'connection.php';

function addTeam($name_team, $desc_team) {
    $pdo = Connection::get()->connect();
    $sql = 'INSERT INTO public.teams (name_team, desc_team, status_team) VALUES(:name_team, :desc_team, 0)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":name_team", $name_team);
    $statement->bindValue(":desc_team", $desc_team);
    $statement->execute();
}

function getTeams() {
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.teams';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $team = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $team;
}

function getTeam($id_team){
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM public.teams WHERE id_team = :id_team';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id_team', intval($id_team));
    $statement->execute();
    $post = $statement->fetch(PDO::FETCH_ASSOC);
    return $post;
}