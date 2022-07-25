<?php 
require_once "../functions.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(delete_supplier($id) > 0){
        echo "
            <script>
                alert('Supplier berhasil dihapus');
                document.location.href = './tbsupplier.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Supplier gagal dihapus');
            </script>
        ";
    }
}

?>