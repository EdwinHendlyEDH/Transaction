<?php 
require_once '../vendor/autoload.php';
require_once './jwt-key/Key.php';
use Firebase\JWT\JWT;

$conn = mysqli_connect('localhost', 'root', '', 'transaksi');

function register($request){
    global $conn;
    $nama = htmlspecialchars($request['nama']);
    $password = password_hash(mysqli_real_escape_string($conn, $request['password']), PASSWORD_BCRYPT);
    $deskripsi = htmlspecialchars($request['deskripsi']);
    $status = 'customer';

    $query = "INSERT INTO `tbuser` VALUES ('', '$nama', '$status', '$password', '$deskripsi')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function login($request){
    global $conn, $KEY;
    $nama = htmlspecialchars($request['nama']);
    $password = mysqli_real_escape_string($conn, $request['password']);

    $user_data = mysqli_query($conn, "SELECT * FROM `tbuser` WHERE nama = '$nama'");
    if(mysqli_num_rows($user_data) === 1){
        $user = mysqli_fetch_assoc($user_data);
        if(password_verify($password, $user['pass'])){
            // algorithm tidak disarankan untuk generate sessidnya dan keynya
            $nums= 50;
            $status = $user['status'];
            $payload = [
                "sessid" => bin2hex(random_bytes($nums)),
                "nama" => $user['nama'],
                'status' => $status
            ];
            $jwt = JWT::encode($payload, $KEY, 'HS256');
            mysqli_query($conn, "INSERT INTO `sessid` VALUES ('', '$jwt', '$nama', '$status')");
            setcookie('sessid', $jwt, 0, '/php-self/transaksi/App'); // end in one session
            return true;
        };
    }

    return false;
}


