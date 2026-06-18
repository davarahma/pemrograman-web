<?php

require_once "database.php";
require_once "user.php";


$username = $_POST["username"];
$email = $_POST["email"];
$asal = $_POST["asal"];
$password = $_POST["password"];
$password_ulang = $_POST["password_ulang"];


if(isset($_POST["setuju"])){
   echo "Anda telah menyutujui form";

   if($password != $password_ulang){
        echo "Password tidak sama";
        die;
   }
   
   $database = new Database;
    $koneksi_db = $database->connect();
   
    $user = new Users($koneksi_db);
    $user->create($username, $email, $asal, $password);
}else{
    echo "Anda harus menyetujui form";
}

?>