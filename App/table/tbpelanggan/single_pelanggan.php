<?php
require_once '../functions.php';
$id = $_GET['id'];
$data = query("SELECT * FROM tbpelanggan WHERE kodepel=$id")[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelanggan | <?=$data['nama']?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- user css -->
    <link rel="stylesheet" href="../../css/init.css">
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/table.css">
</head>
<body>
    <?php include_once "../../partials/nav.php" ?>
    <div class="page">
        <div class="sidebar">
            <div class="sidebar-content">
                <h1>Pengelolaan</h1>
                <ul class="pengelolaan-links">
                    <li><a href="../tbbarang/tbbarang.php">Pengelolaan Barang</a></li>
                    <li class="active"><a href="../tbpelanggan/tbpelanggan.php">Pengelolaan Pelanggan</a></li>
                    <li><a href="../tbsupplier/tbsupplier.php">Pengelolaan Supplier</a></li>
                    <li><a href="../tbsales/tbsales.php">Pengelolaan Sales</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <h1 class="tb-title">Pengelolaan <span>Pelanggan</span></h1>
            <div class="functionality">
                <a href="./tbpelanggan.php" class="function-button back">
                    <i class="fa-solid fa-angle-left"></i>
                    <div class="function-content">
                        <h2>Back</h2>
                        <p>Back to Pengelolaan Pelanggan</p>
                    </div>
                </a>
                <a href="./update.php?id=<?= $id?>" class="function-button update">
                    <i class="fa-solid fa-drumstick-bite"></i>
                    <div class="function-content">
                        <h2>Update Customer</h2>
                        <p>just update customer</p>
                    </div>
                    <i class="fa-solid fa-pen icon-move"></i>
                </a>
                <a href="./delete.php?id=<?= $id?>" class="function-button delete" onclick='return confirm("Apakah benar ingin menghapusnya?")'>
                    <i class="fa-solid fa-drumstick-bite"></i>
                    <div class="function-content">
                        <h2>Delete Customer</h2>
                        <p>just delete customer</p>
                    </div>
                    <i class="fa-solid fa-trash-can icon-move"></i>
                </a>
            </div>
            <div class="cards single">
                <a class="card">
                    <div class="card-image">
                        <img src="<?= ($data['gambar']) ? './img/' . $data['gambar'] : '../img/gambar_kosong.png'?>" alt="">
                    </div>
                    <div class="card-content">
                        <h2 class="nama"><?=$data['nama']?></h2>
                        <p class="desc">Alamat: <?= $data['alamat']?></p>
                        <h4 class="telp"> <i class="fa-solid fa-phone"></i> <?= $data['telp']?></h4>
                    </div>
                </a>
            </div>
        </div>
    </div>

</body>
</html>