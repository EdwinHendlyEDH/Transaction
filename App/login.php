<?php 
require_once 'functions.php';

if(isset($_COOKIE['sessid'])){
    $jwt = $_COOKIE['sessid'];
    $user_data = mysqli_query($conn, "SELECT * FROM sessid WHERE sessid='$jwt'");
    if(mysqli_num_rows($user_data) === 1){
        header('Location: ./index.php');
        exit();
    }
}

if($_SERVER['REQUEST_METHOD']  === 'POST'){
    if(isset($_POST['login'])){
        if(login($_POST)){
            echo "
                <script>
                    alert('Kamu berhasil login!');
                    document.location.href = './index.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('Kamu gagal login!');
                </script>
            ";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
    <div class="container">
        <h1>Login Form</h1>
        <form action="" method="post">
            <section class="input-box">
                <label for="nama">nama</label>
                <input type="text" name="nama" id="nama">
            </section>
            <section class="input-box">
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </section>
            <button type="submit" name="login">Login</button>
        </form>
        <a href="register.php" class='other'>Dont have account? Register here!</a>
    </div>
</body>
</html>