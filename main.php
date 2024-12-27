<?php
session_start();
include("functions.php");


$host="localhost";
$user="root";
$password="mySql";
$dbname="mydb";

$connection = mysqli_connect($host, $user, $password, $dbname);

$login = '';
$email = '';
$password = '';
$err = '';


if (isset($_POST['send'])) {
    $login = $_SESSION['login'];
    $message = htmlspecialchars($_POST['message']);
    $_SESSION['message'] = $message;
    $time = date("H:i:s");
    $photo = $_POST['file'];
    if (strlen($message) < 130) {
        $query = "INSERT INTO chat (login, message, time)
    VALUES ('$login', '$message', '$time')";
        mysqli_query($connection, $query);
    } else {
        $err = 'Сообщение слишком длинное';
    }
    unset($_POST['send']);
    unset($_POST['message']);
}


if (isset($_POST['sign'])) {
    if (!empty($_POST["login"]) and !empty($_POST['email']) and !empty($_POST["password"])) {
        $login = htmlspecialchars($_POST['login']);
        $_SESSION['login'] = $login;
        $email = htmlspecialchars($_POST['email']);
        $_SESSION['email'] = $email;
        $pass = htmlspecialchars($_POST['password']);
        $password = hash('sha256', $pass);
        $queryCheck = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $queryCheck);
        if (preg_match('#\w+@\w+\.\w+#', $email)) {
            if (strlen($login) < 16 and preg_match('#\w[a-zA-Z0-9]+#', $login)) {
                if (mysqli_num_rows(mysqli_query($connection, "select * from users where email = '$email'")) != 1) {
                    $query = "INSERT INTO users (login, passwordhash, email) VALUES ('$login', '$password', '$email')";
                    unset($_POST['password']);
                    $err = 'Вы успешно зарегистрировались';
                } else {
                    $err = 'Пользователь с такой элетронной почтой уже существует';
                    unset($_POST['login']);
                }
            } else {
                $err = 'Логин введён не правильно';
                unset($_POST['login']);
            }
        } else {
            $err = 'Неверный формат электронной почты';
        }
    } else {
        $err = 'Заполните поля';
    }
    unset($_POST['sign']);
}


if (isset($_POST['log'])) {
    if (!empty($_POST["login"]) and !empty($_POST['email']) and !empty($_POST["password"])) {
        $login = htmlspecialchars($_POST['login']);
        $_SESSION['login'] = $login;
        $email = htmlspecialchars($_POST['email']);
        $_SESSION['email'] = $email;
        $pass = htmlspecialchars($_POST['password']);
        $password = hash('sha256', $pass);
        $queryCheck = "SELECT * FROM users WHERE email = '$email'";
        if (preg_match('#\w+@\w+\.\w+#', $email)) {
            if (strlen($login) < 16 and preg_match('#\w[a-zA-Z0-9]]#', $login)) {
                if (mysqli_num_rows(mysqli_query($connection, "select * from users where email = '$email'")) == 1) {
                    unset($_POST['password']);
                    $err = 'Вы успешно авторизовались';
                } else {
                    $err = 'Пользователя с такой элетронной почтой не существует';
                    unset($_POST['login']);
                }
            } else {
                $err = 'Введите правильный формат логина';
                unset($_POST['login']);
            }
        } else {
            $err = 'Введите правильный формат электронной почты';
        }
    } else {
        $err = 'Заполните поля';
    }
    unset($_POST['log']);
}



if (isset($_POST['clear'])) {
    $query = "DELETE FROM chat";
    mysqli_query($connection, $query);
    $login = $_SESSION['login'];
}


if (isset($_SESSION["login"]) and isset($_SESSION['email'])) {
    $login = $_SESSION['login'];
    $email = $_SESSION['email'];
}


if (isset($_POST['logout'])) {
    $_SESSION['login'] = '';
    $_SESSION['email'] = '';
}


