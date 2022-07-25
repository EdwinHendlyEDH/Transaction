<?php 
require_once '../table/functions.php';
if(isset($_GET['search'])){
    $tbl = $_GET['table'];
    $data = find($_GET['search'], $tbl);
}

?>


<?php if($tbl === 'tbbarang'){ ?>
    <?php if(count($data) === 0){ ?>
        <h1 class="not-found">Not found</h1>
    <?php }else if(count($data) === 1){ ?>

        <a class="card card-only-one" href="single_barang.php?id=<?=$data[0]['kodebarang']?>">
            <div class="card-image">
                <img src="<?= ($data[0]['gambar']) ? $data[0]['gambar'] : '../img/gambar_kosong.png'?>" alt="">
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
                <img src="<?= ($data[$i]['gambar']) ? $data[$i]['gambar'] : '../img/gambar_kosong.png'?>" alt="">
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

<?php } else if($tbl === 'tbpelanggan' || $tbl === 'tbsupplier' || $tbl === 'tbsales'){ ?>

    <?php if(count($data) === 0){ ?>
        <h1 class="not-found">Not found</h1>
    <?php }else if(count($data) === 1){ ?>

        <a class="card card-only-one" href="single_<?= substr($tbl, 2);?>.php?id=<?=$data[0]['kodepel']?>">
            <div class="card-image">
                <img src="<?= ($data[0]['gambar']) ? $data[0]['gambar'] : '../img/gambar_kosong.png'?>" alt="">
            </div>
            <div class="card-content">
                <h2 class="nama"><?=$data[0]['nama']?></h2>
                <h4 class="telp"><?= $data[0]['telp']?></h4>
            </div>
        </a>

    <?php }else{; ?>

        <?php //foreach($data as $d): ?>
        <?php for($i = count($data) - 1; $i >= 0; $i--): ?>
        <a class="card" href="single_pelanggan.php?id=<?=$data[$i]['kodepel']?>">
            <div class="card-image">
                <img src="<?= ($data[$i]['gambar']) ? $data[$i]['gambar'] : '../img/gambar_kosong.png'?>" alt="">
            </div>
            <div class="card-content">
                <h2 class="nama"><?=$data[$i]['nama']?></h2>
                <h4 class="telp"><?= $data[$i]['telp']?></h4>
            </div>
        </a>
        <?php endfor;?>
        <?php //endforeach;?>

    <?php } ?>

<?php }; ?>