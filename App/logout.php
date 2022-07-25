<?php  
require_once 'functions.php';

if(!isset($_COOKIE['sessid'])){
    header('Location: ./login.php');
    exit();
}
$jwt = $_COOKIE['sessid'];
mysqli_query($conn, "DELETE FROM sessid WHERE sessid = '$jwt'");
setcookie('sessid', time() - 3600);
header('Location: ./login.php');
exit();
