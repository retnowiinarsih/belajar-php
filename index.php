<?php

//1. Buat koneksi dengan MySql
$con = mysqli_connect("localhost","root","","todo");

//2. Cek koneksi dengan MySql
if(mysqli_connect_errno()){
    echo "Koneksi gagal". mysqli_connect_error();
}else{
    echo "Koneksi berhasil";
}  

// 3. membaca data dari table mysql.
$query = "SELECT * FROM list";

// 4. tampilkan data, dengan menjalankan sql query
$result = mysqli_query($con,$query);
$list = [];
if ($result){
    // tampilkan data satu per satu
    while($row = mysqli_fetch_assoc($result)){
        $list[] = $row;
    }
    mysqli_free_result($result);
}

//5. tutup koneksi mysql
mysqli_close($con);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar bg-light">
    <p>
    <button class="btn btn-outline-success me-2" type="button">Retno Winarsih</button>
    <button class="btn btn-sm btn-outline-secondary" type="button">Kelompk Jogja</button>
</p>
</nav>
    <h1>List Tugas Kelompok</h1>
    <button type="submit" class="btn btn-outline-primary">
                    <a href="insert.php?id=<?= $row['id'] ?>"> Tambah List</a> 
                    </button>
    <section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card rounded-3">
          <div class="card-body p-4">

            <h4 class="text-center my-3 pb-3">To Do App</h4>

            <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
              <div class="col-12">
                <div class="form-outline">
                  <input type="text" id="form1" class="form-control" />
                  <label class="form-label" for="form1">Enter a task here</label>
                </div>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-warning">Get tasks</button>
              </div>
            </form>

            <table class="table mb-4">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">nama</th>
                  <th scope="col">pekerjaan</th>
                  <th scope="col">keterangan</th>
                  <th scope="col">action</th>
                </tr>
                <?php foreach ($list as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['pekerjaan'] ?></td>
                <td><?= $row['keterangan'] ?></td>
            
                <td>
                <button type="submit" class="btn btn-outline-primary">
                    <a href="delete.php?id=<?= $row['id'] ?>">Delete</a> 
                    </button>
                    <button type="submit" class="btn btn-outline-info">
                    <a href="update.php?id=<?= $row['id'] ?>"> Update</a> 
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
