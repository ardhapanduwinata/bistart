<?php
include "../../database.php";

if($_GET['action'] == 'all') {
    $tampil = $mysqli->query("SELECT * FROM users_data");
    $output = [];
    while($data = $tampil->fetch_assoc()) {
        array_push($output, $data);
    }
    header('Content-Type: application/json');
    echo json_encode($output, JSON_PRETTY_PRINT);

} else if($_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $mysqli->query("DELETE FROM users_data WHERE id_user = $id");
} else if($_GET['action'] == 'update') {
    $id = $_GET['id'];
    $mysqli->query("UPDATE users_data SET  WHERE id_user = $id");
} else if($_GET['action'] == 'add') {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mysqli->query("INSERT INTO users_data SET ");
}