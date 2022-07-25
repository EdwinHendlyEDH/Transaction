<?php 
require_once "../functions.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(delete_barang($id) > 0){
        echo "
            <script>
                alert('Barang berhasil dihapus');
                document.location.href = './tbbarang.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Barang gagal dihapus');
            </script>
        ";
    }
}

?>