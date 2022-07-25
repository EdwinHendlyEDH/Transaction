<?php
require_once '../functions.php';
$id = $_GET['id'];
$barang = query("SELECT * FROM tbbarang WHERE kodebarang=$id")[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang | <?=$barang['nama']?></title>
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
                    <li class="active"><a href="../tbbarang/tbbarang.php">Pengelolaan Barang</a></li>
                    <li><a href="../tbpelanggan/tbpelanggan.php">Pengelolaan Pelanggan</a></li>
                    <li><a href="../tbsupplier/tbsupplier.php">Pengelolaan Supplier</a></li>
                    <li><a href="../tbsales/tbsales.php">Pengelolaan Sales</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <h1 class="tb-title">Pengelolaan <span>Barang</span></h1>
            <div class="functionality">
                <a href="./tbbarang.php" class="function-button back">
                    <i class="fa-solid fa-angle-left"></i>
                    <div class="function-content">
                        <h2>Back</h2>
                        <p>Back to Pengelolaan Barang</p>
                    </div>
                </a>
                <a href="./update.php?id=<?= $id?>" class="function-button update">
                    <i class="fa-solid fa-drumstick-bite"></i>
                    <div class="function-content">
                        <h2>Update commodity</h2>
                        <p>just update thing</p>
                    </div>
                    <i class="fa-solid fa-pen icon-move"></i>
                </a>
                <a href="./delete.php?id=<?= $id?>" class="function-button delete" onclick='return confirm("Apakah benar ingin menghapusnya?")'>
                    <i class="fa-solid fa-drumstick-bite"></i>
                    <div class="function-content">
                        <h2>Delete commodity</h2>
                        <p>just delete thing</p>
                    </div>
                    <i class="fa-solid fa-trash-can icon-move"></i>
                </a>
            </div>
            <div class="cards single">
                <a class="card">
                    <div class="card-image">
                        <img src="<?= ($barang['gambar']) ? './img/' . $barang['gambar'] : '../img/gambar_kosong.png'?>" alt="">
                    </div>
                    <div class="card-content">
                        <p><?= $barang['jenis']?> | <?= $barang['merk']?></p>
                        <h2 class="title"><?=$barang['nama']?> (Stok : <?= $barang['jlh_stok']?>)</h2>
                        <p class="desc"><?= $barang['ket']?> | <span>Dibuat dengan modal Rp <?= $barang['hargaproduksi']?></span></p>
                        <?php for($i = 0; $i < intval($barang['rating']); $i++): ?>
                            <i class="fa-solid fa-star"></i>
                        <?php endfor; ?>    
                        <?php for($i = 0; $i < 5 - intval($barang['rating']); $i++): ?>
                            <i class="fa-regular fa-star"></i>
                        <?php endfor; ?>
                        <h4 class="price">Rp <?= number_format($barang['hargajual'])?></h4>
                    </div>
                </a>
            </div>
        </div>
    </div>

</body>
</html>