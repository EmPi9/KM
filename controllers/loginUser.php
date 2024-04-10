<?php
include_once './../models/connection.php';
include_once './../models/authentication.php';

$login = $_POST['login'];
$password = $_POST['password'];

$pdo = Connection::get()->connect();
$auth = new Authentication($pdo);
$auth->login($login, $password);

$findUser = $auth->findUser($login);
$comparePassword = $auth->comparePasswords($login, $password);

$error = '';
if($findUser == 0){
    $error .= 'Такого пользователя не существует <br />';
}
if ($login === '') {
    $error .= 'Введите ваше логин <br />';
}
if ($password === '') {
    $error .= 'Введите пароль <br />';
}
if(!$comparePassword) {
    $error .= 'Пароль введен неверно <br />';
}
if (!empty($error)) {
    http_response_code(400);
    echo $error;
    die();
}

$auth->login($login, $password);
http_response_code(200);
header("Location: ./../src/index.php");