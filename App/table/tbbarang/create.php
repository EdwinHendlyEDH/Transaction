<?php 
require_once "../functions.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['submit'])){
        if(create_barang($_POST, $_FILES) > 0){
            echo "
                <script>
                    alert('Barang baru berhasil ditambahkan!');
                    document.location.href = './tbbarang.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Barang gagal ditambahkan!');
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
    <title>Create Barang</title>
    <link rel="stylesheet" href="../../css/crud.css">
</head>
<body>
    <?php include('../../partials/nav.php'); ?>
    <section class="content">
        <h1>Tambah Barang baru</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-box">
                <label for='nama'>nama barang</label>
                <input type='text' name='nama' id='nama'>
            </div>
            <div class="input-box">
                <label for='jenis'>jenis barang</label>
                <input type='text' name='jenis' id='jenis'>
            </div>
            <div class="input-box">
                <label for='merk'>merk barang</label>
                <input type='text' name='merk' id='merk'>
            </div>
            <div class="input-box">
                <label for='jlh_stok'>jumlah stok</label>
                <input type='number' name='jlh_stok' id='jlh_stok'>
            </div>
            <div class="input-box">
                <label for='hargajual'>harga jual barang</label>
                <input type='text' name='hargajual' id='hargajual'>
            </div>
            <div class="input-box">
                <label for='hargaproduksi'>harga produksi barang</label>
                <input type='text' name='hargaproduksi' id='hargaproduksi'>
            </div>
            <div class="input-box">
                <label for='ket'>keterangan</label>
                <input type='text' name='ket' id='ket'>
            </div>
            <div class="input-box">
                <label for='rating'>rating </label>
                <input type='number' max='5' name='rating' id='rating'>
            </div>
            <div class="input-box">
                <label for="gambar">gambar</label>
                <input type="file" name="gambar" id="gambar">
            </div>

            <button type="submit" name="submit">Tambah</button>
        </form>
    </section>
</body>
</html>