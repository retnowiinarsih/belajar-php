<?php

//tangkap data
if (isset($_POST["submit"])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $pekerjaan = $_POST['pekerjaan'];
    $keterangan = $_POST['keterangan'];

    //1. Buat koneksi dengan MySql
$con = mysqli_connect("localhost","root","","todo");

//2. Cek koneksi dengan MySql
if(mysqli_connect_errno()){
    echo "Koneksi gagal". mysqli_connect_error();
}else{
    echo "Koneksi berhasil";
}  
//buat sql query untuk insert database
//buat insert dan jalankan
$sql = "insert into list (id, nama, pekerjaan, keterangan)
        values ($id, '$nama', '$pekerjaan', '$keterangan')";


//jalankan query
if (mysqli_query($con,$sql)){
    echo "Data Berhasil Ditambah";
}else{
    echo "Ada Error ". mysqli_error();
}

mysqli_close($con);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah List</title>
</head>
<body>
<form action="" method="post">
    id: <input type="number" name="id"><br>
    nama: <input type="text" name="nama"><br>
    pekerjaan: <input type="text" name="pekerjaan"><br>
    keterangan: <input type="text" name="keterangan"><br>
    <button type="submit" name="submit">Tambah List</button>
    <p>
        <button type="submit" class="btn btn-outline-info">
                    <a href="index.php"> Halaman Utama</a> 
                    </button>
    </p>
</form>
</body>
</html>