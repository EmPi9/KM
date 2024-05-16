<?php
session_start();
include_once 'connection.php';

function addTeam($name_team, $employee1_team, $employee2_team, $employee3_team, $employee4_team, $employee5_team) {
    $pdo = Connection::get()->connect();
    $sql = 'INSERT INTO public.teams (name_team, employee1_team, employee2_team, employee3_team, employee4_team, employee5_team, status_team) VALUES(:name_team, :employee1_team, :employee2_team, :employee3_team, :employee4_team, :employee5_team, 0)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":name_team", $name_team);
    $statement->bindValue(":employee1_team", $employee1_team);
    $statement->bindValue(":employee2_team", $employee2_team);
    $statement->bindValue(":employee3_team", $employee3_team);
    $statement->bindValue(":employee4_team", $employee4_team);
    $statement->bindValue(":employee5_team", $employee5_team);
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