<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'fitur.php';
$siswa = query("SELECT * FROM siswa");

if (isset($_POST["cari"])) {
    $siswa = cariMhs($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsi PWD</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.13.0/dist/umd/popper.min.js" integrity="sha384-I6U5q6YKzfU5oJyvxmWU6POa9Xfv6+zD7JlLhQzU6cAbv6O+U14xJUquE1U2iZ2C" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/db7ae15f26.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css2?family=Montserrat&display=swap' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar fixed-top navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/logo_smkn2_sragen.png" alt="" width="40" height="34" class="d-inline-block align-text-top">
                <b>PORTAL SMK N 2 SRAGEN</b>
            </a>
            <div class="icon color-white">
                <a href="logout.php">
                    <h5 class="text-white">
                        Keluar <i class="fa-solid fa-right-from-bracket mr-5"></i>
                    </h5>
                </a>
            </div>
        </div>
    </nav>

    <div class="row no gutters mt-5">
        <div class="col-md-2 bg-dark mt-2 pt-3">
            <ul class="nav flex-column ml-3 mb-3">
                <li class="nav-item">
                    <a class="nav-link active text-white " href="index.php"><i class="fa-solid fa-table-columns mr-2"></i>Dashboard</a>
                </li>
                <hr class="bg-secondary">
                <li class="nav-item">
                    <a class="nav-link active text-white " href="tampilMhs.php"><i class="fa-solid fa-school mr-2"></i>Daftar Siswa</a>
                </li>
                <hr class="bg-secondary">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="tampilGuru.php"><i class="fa-solid fa-person-chalkboard mr-2"></i>Daftar Guru</a>
                </li>
                <hr class="bg-secondary">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="tampilOrg.php"><i class="fa-sharp fa-solid fa-sitemap mr-2"></i>Organisasi</a>

                </li>
                <!-- <hr class="bg-secondary">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="#"><i class="fa-solid fa-list-ol mr-2"></i></i>KRS</a>
                </li>
                <hr class="bg-secondary">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="#"><i class="fa-solid fa-star mr-2"></i>KHS</a>
                </li>
                <hr class="bg-secondary"> -->

        </div>
        <div class="col-md-10 p-5">
            <h1><i class="fa-solid fa-graduation-cap"></i>Daftar Siswa</h1>
            <div class="row">
                <div class="col">
                    <a href="InsertDataSiswa.php" class="btn btn-sm btn-primary"><i class="fa-sharp fa-solid fa-plus mr-2"></i>Tambah Data Mahasiswa</a>
                    <a href="cetakDataMhs.php" class="btn btn-sm btn-success" target="_blank"><i class="fa-solid fa-print mr-2"></i>Cetak Data</a>
                </div>
                <div class="col">
                    <form action="" method="post" class="layout-right">
                        <input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
                        <button type="submit" class="btn btn-sm btn-warning" name="cari"><i class="fa-solid fa-magnifying-glass"></i>Cari</button>
                    </form>
                </div>
            </div>

            <hr>
            <div class="card-body">
                <table class="table table-bordered ">
                    <thead class="table-warning">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($siswa as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row["Nama"]; ?></td>
                                <td><?= $row["NIS"]; ?></td>
                                <td><?= $row["Kelas"]; ?></td>
                                <td><?= $row["Jurusan"]; ?></td>
                                <td><?php if ($row["Jenis_Kelamin"] == 'L') {
                                        echo "Laki-Laki";
                                    } else if ($row["Jenis_Kelamin"] == 'P') {
                                        echo "Perempuan";
                                    } ?></td>
                                <td>
                                    <a href="UbahMhs.php?id_Siswa=<?= $row['id_Siswa']; ?>" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square mr-2"></i>Ubah</a>
                                    <a href="HapusSiswa.php?id_Siswa=<?= $row['id_Siswa']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus?');"><i class="fa-solid fa-trash mr-2"></i>Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
</body>

</html>