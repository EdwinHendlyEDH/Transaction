<?php 
require_once 'functions.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['register'])){
        if(register($_POST) > 0){
            echo "
                <script>
                    alert('Kamu telah register!');
                    document.location.href = './login.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Kamu gagal register. Coba lag!');
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
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
    <div class="container">
        <h1>Registration Form</h1>
        <form action="" method="post">
            <section class="input-box">
                <label for="nama">nama</label>
                <input type="text" name="nama" id="nama">
            </section>
            <section class="input-box">
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </section>
            <section class="input-box">
                <label for="deskripsi">deskripsi</label>
                <textarea name="deskripsi" id="deskripsi"></textarea>
            </section>
            <button type="submit" name="register">Register</button>
        </form>
        <a href="login.php" class="other">Already have account? Login here!</a>
    </div>
</body>
</html>