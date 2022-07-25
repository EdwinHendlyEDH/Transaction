<?php 
require_once '../table/functions.php';
if(isset($_GET['search'])){
    $data = find($_GET['search'], 'tbsupplier');
}

?>

<?php if(count($data) === 0){ ?>
    <h1 class="not-found">Not found</h1>
<?php }else if(count($data) === 1){ ?>

    <a class="card card-only-one" href="single_supplier.php?id=<?=$data[0]['kodesup']?>">
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
    <a class="card" href="single_supplier.php?id=<?=$data[$i]['kodesup']?>">
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