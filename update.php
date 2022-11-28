<?php
if(isset($_GET['id'])){
    // ambil id dari url atau method get
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

    $sql = "SELECT * FROM list WHERE id='$id'";

    if ($result = mysqli_query($con, $sql)) {
        echo "<br>Data Tersedia";
        while($user_data = mysqli_fetch_assoc($result)) {
            $id = $user_data['id'];
            $nama = $user_data['nama'];
            $pekerjaan = $user_data['pekerjaan'];
            $keterangan = $user_data['keterangan'];
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

if (isset($_POST['submit'])){
    //var_dump($_POST);
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $pekerjaan = $_POST['pekerjaan'];
    $keterangan = $_POST['keterangan'];

    //1. Buat koneksi dengan MySql
    $con = mysqli_connect("localhost","root","","todo");

    //2. Cek koneksi dengan MySql
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }else{
        echo '<br>Koneksi Berhasil';
    }

    $sql = "UPDATE list SET id='$id',nama='$nama',pekerjaan='$pekerjaan',keterangan='$keterangan' WHERE id='$id' ";

    if (mysqli_query($con, $sql)) {
        echo "<br>Data Berhasil Diupdate";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
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
    <title>Update List</title>
</head>
<body>
    <?php if(isset($_GET['id'])): ?>
    <form action="" method="post">
        id: <input type="number" name="id" value="<?php echo $id; ?>"><br>
        nama: <input type="text" name="nama" value="<?php echo $nama; ?>"><br>
        pekerjaan: <input type="text" name="pekerjaan" value="<?php echo $pekerjaan; ?>"><br>
        keterangan: <input type="text" name="keterangan" value="<?php echo $keterangan; ?>"><br>
        <button type="submit" name="submit">Update List</button>
        <p>
        <button type="submit" class="btn btn-outline-info">
                    <a href="index.php"> Halaman Utama</a> 
                    </button>
    </p>
    </form>
    <?php endif; ?>
</body>
</html>
