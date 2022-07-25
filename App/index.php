<?php 
require_once './functions.php';
require_once './jwt-key/Key.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if(!isset($_COOKIE['sessid'])){
    header('Location: ./login.php');
    exit();
}

try {
    $jwt = $_COOKIE['sessid'];
    $user_data = mysqli_query($conn, "SELECT * FROM sessid WHERE sessid='$jwt'");

    // check user login or not using sessid
    if(mysqli_num_rows($user_data) < 1){
        header('Location: ./login.php');
        exit();
    }

    $decoded = JWT::decode($jwt, new Key($KEY, 'HS256'));
    $user_name = $decoded->nama;
    $user_status = $decoded->status;
    
    // check if the name and status is the same
    $user = mysqli_fetch_assoc($user_data);
    if(!$user['nama'] === $user_name || !$user['status'] === $user_status){
        header('Location: ./login.php');
        exit();
    }

} catch (Throwable $th) {
    header('Location: ./login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | Transaksi</title>
    <link rel="stylesheet" href="css/init.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <main class="page">
        <?php include_once './partials/nav.php' ?>
        <div class="content">
            <div class="home" id="home">
                <div class="home-content">
                    <h2>Welcome, <?= $user_name ?> 👋</h2>
                    <h1>Transaksi mastery demonstration</h1>
                    <p>Disini, hanya sebuah demonstrasi transaksi yang bisa dilakukan oleh admin</p>
                    <div class="arrow-down">
                        <i class="fa-solid fa-arrow-down"></i>  
                    </div>
                </div>
            </div>

            <div class="selections" id="selections">
                <div class="selection">
                    <div class="section-image">
                        <img src="./img/table/barang.jpg" alt="">
                    </div>
                    <div class="section-content">
                        <h5 class="head">Commodity and goods setup</h5>
                        <h2 class='title'>Pengelolaan Barang Dagangan</h2>
                        <p class="desc">Pengelolaan barang yang diharapkan berkualitas dalam bentuk pembuatan barang baru, mengubah barang, dan menghapus barang.</p>
                        <a href="./table/tbbarang/tbbarang.php" class="button-selection">lihat pengelolaan</a>
                    </div>
                </div>
                <div class="selection">
                    <div class="section-image">
                        <img src="./img/table/customer.jpg" alt="">
                    </div>
                    <div class="section-content">
                        <h5 class="head">customer convenience</h5>
                        <h2 class='title'>Pengelolaan Data Customer</h2>
                        <p class="desc">Data customer saat penting bagi kami. Demi kenyamanan, silakan dikelola dengan baik</p>
                        <a href="./table/tbpelanggan/tbpelanggan.php" class="button-selection">lihat pengelolaan</a>
                    </div>
                </div>
                <div class="selection">
                    <div class="section-image">
                        <img src="./img/table/supplier.jpg" alt="">
                    </div>
                    <div class="section-content">
                        <h5 class="head">supplier's stock and agreement</h5>
                        <h2 class="title">Pengelolaan data supplier</h2>
                        <p class="desc">Disini supplier telah bekerja sama dengan kami untuk bisa menyediakan barang yang sesuai. Data supplier dijaga melalui persetujuan.</p>
                        <a href="./table/tbsupplier/tbsupplier.php" class="button-selection">lihat pengelolaan</a>
                    </div>
                </div>
                <div class="selection">
                    <div class="section-image">
                        <img src="./img/table/sales.jpg" alt="">
                    </div>
                    <div class="section-content">
                        <h5 class="head">delighted sales</h5>
                        <h2 class='title'>Pengelolaan Sales</h2>
                        <p class="desc">Penjualan diharapkan bisa bertahan. Disini disimpan data mengenai penjualan dalam penggunaan aplikasi transaksi ini.</p>
                        <a href="./table/tbsales/tbsales.php" class="button-selection">lihat pengelolaan</a>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script src="./js/main/script.js"></script>
</body>
</html>