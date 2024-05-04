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

$error = '';
if ($username === '') {
    $error .= 'Введите ваше имя пользователя <br />';
}
if ($email === '') {
    $error .= 'Введите ваш email <br />';
}
if ($password === '') {
    $error .= 'Введите пароль <br />';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error .= 'Некорректный email <br />';
}
if (!empty($error)) {
    http_response_code(400);
    echo $error;
    die();
}

$stmt = $pdo->prepare("SELECT * FROM public.users WHERE email=:email");
$stmt->bindParam(":email", $email);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $error .= '<p class="error">Этот адрес уже зарегистрирован!</p>';
} else {
    $userId = $auth->register($login, $username, $email, $password);
    if (!$userId) {
        $error .= '<p class="error">Неверные данные!</p>';
    }

}

if (!empty($error)) {
    http_response_code(400);
    echo $error;
    die();
}

http_response_code(200);
if (isset($userId)) {
  header("Location: ./../src/index.php");
} else {
  header("Location: ./../src/registration.php");
}