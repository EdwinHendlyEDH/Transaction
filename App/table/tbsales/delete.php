<?php 
require_once "../functions.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(delete_sales($id) > 0){
        echo "
            <script>
                alert('Sales berhasil dihapus');
                document.location.href = './tbsales.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Sales gagal dihapus');
            </script>
        ";
    }
}

?>