<?php 
require_once "../functions.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(delete_pelanggan($id) > 0){
        echo "
            <script>
                alert('Barang berhasil dihapus');
                document.location.href = './tbpelanggan.php';
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