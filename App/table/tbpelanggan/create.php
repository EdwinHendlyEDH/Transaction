<?php 
require_once "../functions.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['submit'])){
        if(create_pelanggan($_POST, $_FILES) > 0){
            echo "
                <script>
                    alert('Pelanggan baru berhasil ditambahkan!');
                    document.location.href = './tbpelanggan.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Pelanggan gagal ditambahkan!');
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
        <h1>Tambah Pelanggan</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-box">
                <label for='nama'>nama</label>
                <input type='text' name='nama' id='nama'>
            </div>
            <div class="input-box">
                <label for='alamat'>alamat</label>
                <input type='text' name='alamat' id='alamat'>
            </div>
            <div class="input-box">
                <label for='telp'>nomor telpon</label>
                <input type='text' name='telp' id='telp'>
            </div>
            <div class="input-box">
                <label for='gambar'>gambar </label>
                <input type='file' name='gambar' id='gambar'>
            </div>

            <button type="submit" name="submit">Tambah</button>
        </form>
    </section>
</body>
</html>