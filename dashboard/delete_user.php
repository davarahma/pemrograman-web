<?php
include '../user.php';
include '../database.php';


    $db = new Database();
    $conn = $db->connect();
    $user = new Users($conn);

$id = $_GET['id'];
$user->hapus($id);
header("Location: index.php");


?>