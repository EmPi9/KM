<?php
include_once './../models/connection.php';
include_once './../models/authentication.php';

$pdo = Connection::get()->connect();
$auth = new Authentication($pdo);

$id = $_POST['id']; // id user
$login = $_POST['login'];
$username = $_POST['username'];
$email = $_POST['email'];
$oldPassword = $_POST['oldPassword'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$error = '';

$comparePassword = $auth->comparePasswords($login, $oldPassword);

if ($username === '') {
    $error .= 'Введите ваше имя <br />';
}
if ($email === '') {
    $error .= 'Введите email <br />';
}
if (!$comparePassword) {
    $error .= 'Старый пароль введен неверно <br />';
}
if ($password === $oldPassword) {
    $error .= 'Новый пароль не отличается от старого <br />';
}
if ($oldPassword === '') {
    $error .= 'Введите старый пароль <br />';
}
if ($password === '') {
    $error .= 'Введите новый пароль <br />';
}
if ($password !== $confirmPassword) {
    $error .= 'Новые пароли не совпадают <br />';
}
if (!empty($error)) {
    http_response_code(400);
    echo $error;
    die();
}

$user = $auth->edit($id, $login, $username, $email, $password);
http_response_code(200);
echo 'Данные успешно обновлены';