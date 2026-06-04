<?php
session_start();

require_once("database.php");
require_once("user.php");

$username = $_POST['input_username'];
$password = $_POST['input_password'];

// if(!isset($_POST['input_username'])){
//     $password = $_POST["input_password"];

// }

    $db = new Database();
    $conn = $db->connect();
    $user = new Users($conn);

$ditemukan = $user->login($username, $password);

// DEBUG (sementara) biar jelas kenapa redirect terjadi
error_log("LOGIN DEBUG: username=".$username." ditemukan=".($ditemukan ? 'true':'false')." ");

if($ditemukan == false){
    // pastikan session login tidak tersisa
    unset($_SESSION['is_logged_in']);
    $_SESSION['pesan_kesalahan'] = "Login gagal";
    header("Location: index.php");
    exit;

}else{
    $_SESSION['is_logged_in'] = true;
    header("Location: dashboard/index.php");
    exit;
}



$_SESSION['is_logged_in'] = true;    
header("Location: dashboard/index.php");
exit;

if($password == $password_valid &&
    $username == $username_valid)

echo "Selamat Datang" . $username ;
echo "<br />" ;
echo "Password anda" . $password ;


?>