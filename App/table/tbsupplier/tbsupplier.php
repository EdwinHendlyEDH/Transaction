<?php 
require_once '../functions.php';
$data = query('SELECT * FROM `tbsupplier`');

if(isset($_GET['search'])){
    $data = find($_GET['search'], 'tbsupplier');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Supplier | Transaksi</title>
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
                        <input type="text" placeholder="Search..." name="search" class="search-input tbsupplier" id="search-input">
                        <button type='submit' class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </section>
                <section class="sidebar-section">
                    <h1>Pengelolaan</h1>
                    <ul class="pengelolaan-links">
                        <li><a href="../tbbarang/tbbarang.php">Pengelolaan Barang</a></li>
                        <li><a href="../tbpelanggan/tbpelanggan.php">Pengelolaan Pelanggan</a></li>
                        <li class="active"><a href="../tbsupplier/tbsupplier.php">Pengelolaan Supplier</a></li>
                        <li><a href="../tbsales/tbsales.php">Pengelolaan Sales</a></li>
                    </ul>
                </section>
            </div>
        </div>
        <div class="content">
            <h1 class="tb-title">Pengelolaan <span>Supplier</span></h1>
            <div class="functionality">
                <a href="./create.php" class="function-button create">
                    <i class="fa-solid fa-drumstick-bite"></i>
                    <div class="function-content">
                        <h2>New Supplier</h2>
                        <p>just add new supplier</p>
                    </div>
                    <i class="fa-solid fa-plus icon-move"></i>
                </a>
            </div>
            <div class="cards" id="cards">
                <?php if(count($data) === 0){ ?>
                    <h1 class="not-found">Not found</h1>
                <?php }else if(count($data) === 1){ ?>

                    <a class="card card-only-one" href="single_supplier.php?id=<?=$data[0]['kodesup']?>">
                        <div class="card-image">
                            <img src="<?= ($data[0]['gambar']) ? './img/' . $data[0]['gambar'] : '../img/gambar_kosong.png'?>" alt="">
                        </div>
                        <div class="card-content">
                            <h2 class="nama"><?=$data[0]['nama']?></h2>
                            <h4 class="telp"><?= $data[0]['telp']?></h4>
                        </div>
                    </a>

                <?php }else{; ?>

                    <?php //foreach($data as $d): ?>
                    <?php for($i = count($data) - 1; $i >= 0; $i--): ?>
                    <a class="card" href="single_supplier.php?id=<?=$data[$i]['kodesup']?>">
                        <div class="card-image">
                            <img src="<?= ($data[$i]['gambar']) ? './img/' . $data[$i]['gambar'] : '../img/gambar_kosong.png'?>" alt="">
                        </div>
                        <div class="card-content">
                            <h2 class="nama"><?=$data[$i]['nama']?></h2>
                            <h4 class="telp"><?= $data[$i]['telp']?></h4>
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