<?php
include_once '../models/connection.php';
include_once '../models/authentication.php';

$pdo = Connection::get()->connect();
$auth = new Authentication($pdo);

$login = $_POST['login'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$userId = $auth->register($login, $username, $email, $password);

if (isset($userId)) {
  header("Location: ./../src/index.php");
} else {
  header("Location: ./../src/registration.php");
}