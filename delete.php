<?php 

if(isset($_GET['id'])){
    // ambil id dari get
    $id = $_GET['id'];

    //1. Buat koneksi dengan MySql
    $con = mysqli_connect("localhost","root","","todo");

    //2. Cek koneksi dengan MySql
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
    }else{
    echo '<br>Koneksi Berhasil';
    }

    $sql = "DELETE FROM list WHERE id='$id' ";

    if (mysqli_query($con, $sql)) {
        echo "Delete data berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
      
    mysqli_close($con);
}


?>

<html>
    <p>
<button type="submit" class="btn btn-outline-info">
                    <a href="index.php"> Halaman Utama</a> 
                    </button>
</p>
    </html>