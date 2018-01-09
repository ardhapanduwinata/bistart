<?php

include "../../database.php";
session_start();

if($_GET['action'] == 'login') {
    $q = $mysqli->query("SELECT * FROM users_data WHERE username='$_POST[username]'");
    $data = $q->fetch_assoc();

    if(!is_null($data) && $data['password'] == $_POST['password']) {
        $_SESSION['user'] = $data;
        header('Location: http://localhost/bistart/admin/index.php');
    } else {
        header('Location: http://localhost/bistart/admin/login.php');
    }
} else if($_GET['action'] == 'logout') {
    unset($_SESSION['user']);
    header('Location: http://localhost/bistart/admin/login.php');
}