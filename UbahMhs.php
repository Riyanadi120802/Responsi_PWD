<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'fitur.php';

$id = $_GET["id_Siswa"];

$siswa = query("SELECT * FROM siswa WHERE id_Siswa = $id")[0];


if (isset($_POST["submit"])) {

    if (ubahSiswa($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil Diubah!');
				document.location.href = 'tampilMhs.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal Diubah!');
				document.location.href = 'tampilMhs.php';
			</script>
		";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            <h1>Ubah Data Siswa</h1>
            <hr>
            <div class="">
                <div class="row">
                    <div class="col-md-9">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="<?= $siswa["id_Siswa"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?= $siswa["Nama"]; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="NIS" name="nis" value="<?= $siswa["NIS"]; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Kelas" name="kelas" value="<?= $siswa["Kelas"]; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Jurusan" name="jurusan" value="<?= $siswa["Jurusan"]; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <div class="maxl">
                                                    <label class="radio inline">
                                                        <input type="radio" name="jk" value="<?= $siswa["Jenis_Kelamin"]; ?>" checked>
                                                        <span>Laki-laki</span>
                                                    </label>
                                                    <label class="radio inline">
                                                        <input type="radio" name="jk" value="<?= $siswa["Jenis_Kelamin"]; ?>">
                                                        <span>Perempuan</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn-sm btn-success" name="submit">Ubah Data</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>