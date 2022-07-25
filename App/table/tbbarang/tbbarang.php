<?php 
require_once '../functions.php';
$data = query('SELECT * FROM `tbbarang`');

if(isset($_GET['search'])){
    $data = find($_GET['search'], 'tbbarang');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Barang | Transaksi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- user css -->
    <link rel="stylesheet" href="../../css/init.css">
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/table.css">
</head>
<body>
    <?php include_once '../../partials/nav.php' ?>
    <div class="page">
        <div class="sidebar">
            <div class="sidebar-content">
                <section class="sidebar-section search-bar">
                    <form action="" method="get">
                        <input type="text" placeholder="Search..." name="search" class="search-input tbbarang" id="search-input">
                        <button type='submit' class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </section>
                <section class="sidebar-section">
                    <h1>Pengelolaan</h1>
                    <ul class="pengelolaan-links">
                        <li class="active"><a href="../tbbarang/tbbarang.php">Pengelolaan Barang</a></li>
                        <li><a href="../tbpelanggan/tbpelanggan.php">Pengelolaan Pelanggan</a></li>
                        <li><a href="../tbsupplier/tbsupplier.php">Pengelolaan Supplier</a></li>
                        <li><a href="../tbsales/tbsales.php">Pengelolaan Sales</a></li>
                    </ul>
                </section>
            </div>
        </div>
        <div class="content">
            <h1 class="tb-title">Pengelolaan <span>Barang</span></h1>
            <div class="functionality">
                <a href="./create.php" class="function-button create">
                    <i class="fa-solid fa-drumstick-bite"></i>
                    <div class="function-content">
                        <h2>New Commodity</h2>
                        <p>just add new thing</p>
                    </div>
                    <i class="fa-solid fa-plus icon-move"></i>
                </a>
            </div>
            <div class="cards" id="cards">
                <?php if(count($data) === 0){ ?>
                    <h1 class="not-found">Not found</h1>
                <?php }else if(count($data) === 1){ ?>

                    <a class="card card-only-one" href="single_barang.php?id=<?=$data[0]['kodebarang']?>">
                        <div class="card-image">
                            <img src="<?= ($data[0]['gambar']) ? './img/' . $data[0]['gambar'] : '../img/gambar_kosong.png'?>" alt="">
                        </div>
                        <div class="card-content">
                            <h2 class="title"><?=$data[0]['nama']?> (<?= $data[0]['jlh_stok']?>)</h2>
                            <?php for($x = 0; $x < intval($data[0]['rating']); $x++): ?>
                                <i class="fa-solid fa-star"></i>
                            <?php endfor; ?>    
                            <?php for($x = 0; $x < 5 - intval($data[0]['rating']); $x++): ?>
                                <i class="fa-regular fa-star"></i>
                            <?php endfor; ?>
                            <h4 class="price">Rp <?= number_format($data[0]['hargajual'])?></h4>
                        </div>
                    </a>

                <?php }else{; ?>

                    <?php //foreach($data as $d): ?>
                    <?php for($i = count($data) - 1; $i >= 0; $i--): ?>
                    <a class="card" href="single_barang.php?id=<?=$data[$i]['kodebarang']?>">
                        <div class="card-image">
                            <img src="<?= ($data[$i]['gambar']) ? './img/' . $data[$i]['gambar'] : '../img/gambar_kosong.png'?>" alt="">
                        </div>
                        <div class="card-content">
                            <h2 class="title"><?=$data[$i]['nama']?> (<?= $data[$i]['jlh_stok']?>)</h2>
                            <?php for($x = 0; $x < intval($data[$i]['rating']); $x++): ?>
                                <i class="fa-solid fa-star"></i>
                            <?php endfor; ?>    
                            <?php for($x = 0; $x < 5 - intval($data[$i]['rating']); $x++): ?>
                                <i class="fa-regular fa-star"></i>
                            <?php endfor; ?>
                            <h4 class="price">Rp <?= number_format($data[$i]['hargajual'])?></h4>
                        </div>
                    </a>
                    <?php endfor;?>
                    <?php //endforeach;?>

                <?php } ?>
            </div>
        </div>
    </div>
    

    <script src="../../js/ajax.js"></script>

</body>
</html>