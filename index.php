<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'fitur.php';
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
        <div class="col-md-10 p-5 pt-5">
            <h2 class="text-dashboard"><i class="fa-solid fa-table-columns mr-3"></i> DASHBOARD</h2>
            <hr class="bg-secondary">
            <p>Selamat datang, <b><?php echo $_SESSION["username"]; ?></b> <i class="fa-solid fa-face-smile-wink"></i></p>

            <div class="row text-white pt-2">
                <div class="card bg-warning margin-left-5 hover" style="width: 18rem;">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa-solid fa-graduation-cap fa-flip" style="--fa-animation-duration: 3s;"></i>
                        </div>
                        <h3 class="card-title">Jumlah Siswa</h3>
                        <div class="display-4"><?php $nama = "siswa";
                                                jumlahSiswa($nama); ?></div>
                        <a href="tampilMhs.php">
                            <p class="card-text text-white">Lihat Selengkapnya <i class="fas fa-angle-double-right ml-2"></i></p>
                        </a>
                    </div>
                </div>

                <div class="card bg-danger margin-left-10 " style="width: 18rem;">
                    <div class="card-body">
                        <div class="card-body-icon"><i class="fa-solid fa-person-chalkboard fa-flip" style="--fa-animation-duration: 3s;"></i></div>
                        <h3 class="card-title">Jumlah Guru</h3>
                        <div class="display-4"><?php $nama = "guru";
                                                jumlahSiswa($nama); ?></div>
                        <a href="tampilGuru.php">
                            <p class="card-text text-white">Lihat Selengkapnya <i class="fas fa-angle-double-right ml-2"></i></p>
                        </a>
                    </div>
                </div>

                <div class="card bg-success margin-left-10" style="width: 18rem;">
                    <div class="card-body">
                        <div class="card-body-icon"><i class="fa-sharp fa-solid fa-sitemap fa-flip" style="--fa-animation-duration: 3s;"></i></div>
                        <h3 class="card-title"> Organisasi</h3>
                        <div class="display-4"><?php $nama = "organisasi";
                                                jumlahSiswa($nama); ?></div>
                        <a href="tampilOrg.php">
                            <p class="card-text text-white">Lihat Selengkapnya <i class="fas fa-angle-double-right ml-2"></i></p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row no gutters ml-5">
                <div id="carouselExampleCaptions" class="carousel slide mt-5 col-md-5" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/1.jpg" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Pelantikan Taruna Tahun 2022</h5>
                                <p>Prosesi mandi kembang pasukan khusus.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/2.jpg" class="d-block w-200">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/3.jpg" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="maps col-md-3 mt-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.355373112879!2d111.00629611404497!3d-7.425867075208029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a035b73d20c21%3A0xf504ba3c6900675c!2sSMK%20Negeri%202%20Sragen!5e0!3m2!1sid!2sid!4v1673376127733!5m2!1sid!2sid" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>


        </div>

</body>

</html>