<?php 
require_once "../functions.php";
$id = $_GET['id'];
$barang = query("SELECT * FROM tbbarang WHERE kodebarang=$id")[0];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['submit'])){
        if(update_barang($id, $_POST, $_FILES) > 0){
            echo "
                <script>
                    alert('Barang berhasil diubah!');
                    document.location.href = './tbbarang.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Barang gagal diubah!');
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
    <title>Update Barang</title>
    <link rel="stylesheet" href="../../css/crud.css">
</head>
<body>
    <?php include('../../partials/nav.php'); ?>
    <section class="content">
        <h1>Ubah Barang</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-box">
                <label for='nama'>nama barang</label>
                <input type='text' name='nama' id='nama' value="<?= $barang['nama']?>">
            </div>
            <div class="input-box">
                <label for='jenis'>jenis barang</label>
                <input type='text' name='jenis' id='jenis' value="<?= $barang['jenis']?>">
            </div>
            <div class="input-box">
                <label for='merk'>merk barang</label>
                <input type='text' name='merk' id='merk' value="<?= $barang['merk']?>">
            </div>
            <div class="input-box">
                <label for='jlh_stok'>jumlah stok</label>
                <input type='number' name='jlh_stok' id='jlh_stok' value="<?= $barang['jlh_stok']?>">
            </div>
            <div class="input-box">
                <label for='hargajual'>harga jual barang</label>
                <input type='text' name='hargajual' id='hargajual' value="<?= $barang['hargajual']?>">
            </div>
            <div class="input-box">
                <label for='hargaproduksi'>harga produksi barang</label>
                <input type='text' name='hargaproduksi' id='hargaproduksi' value="<?= $barang['hargaproduksi']?>">
            </div>
            <div class="input-box">
                <label for='ket'>keterangan</label>
                <textarea name='ket' id='ket'><?= $barang['ket'] ?></textarea>
            </div>
            <div class="input-box">
                <label for='rating'>rating: </label>
                <input type='number' max='5' name='rating' id='rating' value="<?= $barang['rating']?>">
            </div>
            <div class="input-box">
                <label for="gambar">gambar</label>
                <input type="file" name="gambar" id="gambar">
            </div>

            <button type="submit" name="submit">Ubah</button>
        </form>
    </section>
</body>
</html>