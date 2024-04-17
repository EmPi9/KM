<?php

class Authentication{
    private $pdo;
    private $hash = 'asdasdadadfktwtwl234';

    public function __construct($pdo){
        $this->pdo = $pdo;
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function findUser($login) {
<<<<<<< HEAD
        $sql = 'SELECT id, login, username, email, admin FROM public.users WHERE login = :login LIMIT 1';
=======
        $sql = 'SELECT id, login, username, email FROM public.users WHERE login = :login LIMIT 1';
>>>>>>> f05f0bb391c21d8117dac76ef02659e8494e8d24
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':login', $login);
        $stmt->execute();
        $row_count = $stmt->rowCount();
        if($row_count !== 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function comparePasswords($login, $oldPassword) {
        $sql = 'SELECT id, password FROM public.users WHERE login = :login LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':login', $login);
        $stmt->execute();
        $row_count = $stmt->rowCount();
        if($row_count !== 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $oldPassword = md5($oldPassword . $this->hash);
            if ($user['password'] !== $oldPassword) {
                return false;
            }
            return true;
        }
        return false;
    }

    public function register($login, $username, $email, $password) {
        $findUser = $this->findUser($login);
        $password = md5($password . $this->hash);
        if ($findUser === false){
<<<<<<< HEAD
            $sql = 'INSERT INTO public.users (login, username, email, password, admin) VALUES (:login, :username, :email, :password, 0)';
=======
            $sql = 'INSERT INTO public.users (login, username, email, password) VALUES (:login, :username, :email, :password)';
>>>>>>> f05f0bb391c21d8117dac76ef02659e8494e8d24
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':login', $login);
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->execute();
            $_SESSION['user'] = $login;
            $last_id = $this->pdo->lastInsertId();
            return $last_id;
        }
        return false;
    }

    public function edit($id, $login, $username, $email, $password) {
        $findUser = $this->findUser($login);
        $password = md5($password . $this->hash);
        if ($findUser !== false){
            $sql = 'UPDATE public.users SET username = :username, email = :email, password = :password WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->execute();
            return true;
        }
        return false;
    }

    public function delete($login) {
        $findUser = $this->findUser($login);
        if ($findUser !== null){
            $sql = 'DELETE FROM public.users WHERE login = :login';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':login', $login);
            $stmt->execute();
            return true;
        }
        return false;
    }

    public function login($login, $password) {
        $findUser = $this->findUser($login);
        $password = md5($password . $this->hash);
        if ($findUser !== null){
            $sql = 'SELECT * FROM public.users WHERE login = :login AND password = :password LIMIT 1';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':login', $login);
            $stmt->bindValue(':password', $password);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $row_count = $stmt->rowCount();
            if($row_count === 1) {
                $_SESSION['user'] = $user['login'];
                return true;
            }
        }
        return false;
    }

    public function logout() {
        unset($_SESSION['user']);
<<<<<<< HEAD
        unset($_SESSION['cart']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.cost']);
    }
   
=======
    }

>>>>>>> f05f0bb391c21d8117dac76ef02659e8494e8d24
    public function isAuthed() {
        if (array_key_exists('user', $_SESSION) && $_SESSION['user'] !== null) {
            return true;
        } else {
            return false;
        }
    }

    public function getCurrentUser() {
        if ($this->isAuthed()) {
            return $this->findUser($_SESSION['user']);
        }
        return false;
    }
}