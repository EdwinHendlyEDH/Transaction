<?php 

$conn = mysqli_connect('localhost', 'root', '', 'transaksi');

function query($q){
    global $conn;
    $data = mysqli_query($conn, $q);
    $arr = [];
    while($d = mysqli_fetch_assoc($data)){
        $arr[] = $d;
    }
    return $arr;
}


// tbbarang
function create_barang($request, $files){
    global $conn;

    unset($request['submit']);
    // empty field validation - i am lazy using required attr in the input
    foreach($request as $req){
        if($req === ''){            
            echo "
                <script>
                    alert('Please fill up the empty field!');
                </script>
            ";
            return 0;
        }
    }
    $nama = htmlspecialchars($request['nama']);
    $merk = htmlspecialchars($request['merk']);
    $jenis = htmlspecialchars($request['jenis']);
    $jlh_stok = htmlspecialchars($request['jlh_stok']);
    $hargajual = htmlspecialchars($request['hargajual']);
    $hargaproduksi = htmlspecialchars($request['hargaproduksi']);
    $ket = htmlspecialchars($request['ket']);
    $rating = htmlspecialchars($request['rating']);

    $image = getImage($files);

    if(!$image){
        return false;
    }
    
    $query = "INSERT INTO tbbarang VALUES ('','$nama', '$jenis', '$merk', '$jlh_stok', '$hargajual', '$hargaproduksi', '$ket', '$rating', '$image')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function delete_barang($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tbbarang WHERE kodebarang=$id");
    return mysqli_affected_rows($conn);
}

function update_barang($id, $request, $files){
    global $conn;

    unset($request['submit']);
    // empty field validation - i am lazy using required attr in the input
    foreach($request as $req){
        if($req === ''){
            echo "
                <script>
                    alert('Please fill up the empty field!');
                </script>
            ";
            return 0;
        }
    }

    $nama = htmlspecialchars($request['nama']);
    $merk = htmlspecialchars($request['merk']);
    $jenis = htmlspecialchars($request['jenis']);
    $jlh_stok = htmlspecialchars($request['jlh_stok']);
    $hargajual = htmlspecialchars($request['hargajual']);
    $hargaproduksi = htmlspecialchars($request['hargaproduksi']);
    $ket = htmlspecialchars($request['ket']);
    $rating = htmlspecialchars($request['rating']);


    $data = query("SELECT * FROM tbbarang WHERE kodebarang=$id")[0];
    if($files['gambar']['error'] === 4){
        $image = $data['gambar'];
    }else{
        $image = getImage($files);
        if(!$image){
            return false;
        }   
        unlink("./img/" . $data['gambar']);
    }
    
    unset($data['gambar']);
    if($request == $data){
        return 1;
    }

    $query = "UPDATE tbbarang SET nama = '$nama',
            merk = '$merk', 
            jenis = '$jenis',
            jlh_stok = '$jlh_stok', 
            hargajual = '$hargajual',
            hargaproduksi = '$hargaproduksi', 
            ket = '$ket', 
            rating = '$rating', 
            gambar = '$image' WHERE kodebarang=$id";  

    mysqli_query($conn, $query);



    return mysqli_affected_rows($conn);
}


// tbpelanggan
function create_pelanggan($request, $files){
    global $conn;

    unset($request['submit']);
    // empty field validation - i am lazy using required attr in the input
    foreach($request as $req){
        if($req === ''){
            echo "
                <script>
                    alert('Please fill up the empty field!');
                </script>
            ";
            return 0;
        }
    }
    $nama = htmlspecialchars($request['nama']);
    $alamat = htmlspecialchars($request['alamat']);
    $telp = htmlspecialchars($request['telp']);
    $image = getImage($files);

    if(!$image){
        return false;
    }

    $query = "INSERT INTO tbpelanggan VALUES ('', '$nama', '$alamat', '$telp', '$image')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function delete_pelanggan($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tbpelanggan WHERE kodepel=$id");
    return mysqli_affected_rows($conn);
}

function update_pelanggan($id, $request, $files){
    global $conn;

    unset($request['submit']);
    // empty field validation - i am lazy using required attr in the input
    foreach($request as $req){
        if($req === ''){
            echo "
                <script>
                    alert('Please fill up the empty field!');
                </script>
            ";
            return 0;
        }
    }
    $nama = htmlspecialchars($request['nama']);
    $alamat = htmlspecialchars($request['alamat']);
    $telp = htmlspecialchars($request['telp']);

    $data = query("SELECT * FROM tbpelanggan WHERE kodepel=$id")[0];
    if($files['gambar']['error'] === 4){
        $image = $data['gambar'];
    }else{
        $image = getImage($files);
        if(!$image){
            return false;
        }   
        unlink("./img/" . $data['gambar']);
    }
    
    unset($data['gambar']);
    if($request == $data){
        return 1;
    }

    $query = "UPDATE tbpelanggan SET 
    nama = '$nama',
    alamat = '$alamat',
    telp = '$telp',
    gambar = '$image' 
    WHERE kodepel=$id";  

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// tbsupplier
function create_supplier($request, $files){
    global $conn;

    unset($request['submit']);
    // empty field validation - i am lazy using required attr in the input
    foreach($request as $req){
        if($req === ''){
            echo "
                <script>
                    alert('Please fill up the empty field!');
                </script>
            ";
            return 0;
        }
    }
    $nama = htmlspecialchars($request['nama']);
    $alamat = htmlspecialchars($request['alamat']);
    $telp = htmlspecialchars($request['telp']);
    $image = getImage($files);

    if(!$image){
        return false;
    }

    $query = "INSERT INTO tbsupplier VALUES ('', '$nama', '$alamat', '$telp', '$image')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function delete_supplier($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tbsupplier WHERE kodesup=$id");
    return mysqli_affected_rows($conn);
}

function update_supplier($id, $request, $files){
    global $conn;

    unset($request['submit']);
    // empty field validation - i am lazy using required attr in the input
    foreach($request as $req){
        if($req === ''){
            echo "
                <script>
                    alert('Please fill up the empty field!');
                </script>
            ";
            return 0;
        }
    }
    $nama = htmlspecialchars($request['nama']);
    $alamat = htmlspecialchars($request['alamat']);
    $telp = htmlspecialchars($request['telp']);

    $data = query("SELECT * FROM tbsupplier WHERE kodesup=$id")[0];
    if($files['gambar']['error'] === 4){
        $image = $data['gambar'];
    }else{
        $image = getImage($files);
        if(!$image){
            return false;
        }   
        unlink("./img/" . $data['gambar']);
    }
    
    unset($data['gambar']);
    if($request == $data){
        return 1;
    }

    $query = "UPDATE tbsupplier SET 
    nama = '$nama',
    alamat = '$alamat',
    telp = '$telp',
    gambar = '$image' 
    WHERE kodesup=$id";  

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// tbsales
function create_sales($request, $files){
    global $conn;

    unset($request['submit']);
    // empty field validation - i am lazy using required attr in the input
    foreach($request as $req){
        if($req === ''){
            echo "
                <script>
                    alert('Please fill up the empty field!');
                </script>
            ";
            return 0;
        }
    }
    $nama = htmlspecialchars($request['nama']);
    $alamat = htmlspecialchars($request['alamat']);
    $telp = htmlspecialchars($request['telp']);
    $image = getImage($files);

    if(!$image){
        return false;
    }

    $query = "INSERT INTO tbsales VALUES ('', '$nama', '$alamat', '$telp', '$image')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function delete_sales($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tbsales WHERE kodesales=$id");
    return mysqli_affected_rows($conn);
}

function update_sales($id, $request, $files){
    global $conn;

    unset($request['submit']);
    // empty field validation - i am lazy using required attr in the input
    foreach($request as $req){
        if($req === ''){
            echo "
                <script>
                    alert('Please fill up the empty field!');
                </script>
            ";
            return 0;
        }
    }
    $nama = htmlspecialchars($request['nama']);
    $alamat = htmlspecialchars($request['alamat']);
    $telp = htmlspecialchars($request['telp']);

    $data = query("SELECT * FROM tbsales WHERE kodesales=$id")[0];
    if($files['gambar']['error'] === 4){
        $image = $data['gambar'];
    }else{
        $image = getImage($files);
        if(!$image){
            return false;
        }   
        unlink("./img/" . $data['gambar']);
    }

    unset($data['gambar']);
    if($request == $data){
        return 1;
    }

    $query = "UPDATE tbsales SET 
    nama = '$nama',
    alamat = '$alamat',
    telp = '$telp',
    gambar = '$image' 
    WHERE kodesales=$id";  

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



// searching
function find($q, $tbl){
    global $conn;
    if($tbl === 'tbbarang'){
        $query = "SELECT * FROM `$tbl` WHERE 
                    nama LIKE '%$q%' OR
                    jenis LIKE '%$q%' OR
                    merk LIKE '%$q%' OR
                    jlh_stok LIKE '%$q%' OR
                    hargajual LIKE '$q%' OR
                    hargaproduksi LIKE '%$q%' OR
                    ket LIKE '%$q%'";
    }else if($tbl === 'tbpelanggan' || $tbl === 'tbsupplier' || $tbl === 'tbsales'){
        $query = "SELECT * FROM `$tbl` WHERE 
                    nama LIKE '%$q%' OR
                    alamat LIKE '%$q%' OR
                    telp LIKE '%$q%'";
    }
    return query($query);
}


// image uploading
function getImage($files){
    $name = $files['gambar']['name'];
    $tmp_name = $files['gambar']['tmp_name'];
    // $error = $files['gambar']['size']; // kita tidak membutuhkan ini, soalnya bebas mau upload atau tidak
    $size = $files['gambar']['size'];


    // check the extension of the img (actually you can use type key)
    $valid_ext = ['jpg', 'png', 'jpeg'];
    $img_data = explode('.', $name);
    $img_ext = strtolower(end($img_data));

    if(!in_array($img_ext, $valid_ext)){
        echo "
            <script>
                alert('Ekstensi Gambar tidak valid. Coba jpg, png, dan jpeg!');
            </script>
        ";
        return false;
    }


    // cek ukuran file (1mb == 1000000byte)
    if($size > 5000000){
        echo "
            <script>
                alert('Ukuran Gambar melebihi 5mb, cari yang lain!');
            </script>
        ";
        return false;
    }

    $nama_file_baru = uniqid();
    $nama_file_baru .= '.' . $img_ext;
    move_uploaded_file($tmp_name, './img/' . $nama_file_baru);
    return $nama_file_baru;
}