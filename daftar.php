<?php
require 'fitur.php';
if (isset($_POST["daftar"])) {

    if (daftar($_POST) > 0) {
        echo "<script>
            alert('User telah berhasil ditambahkan!')</script>";
        header("Location: index.php");
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css\style.css">
</head>

<body>
    <section class="vh-100" style="background-color: #00092C;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Daftar Akun</p>

                                    <form class="mx-1 mx-md-4" action="" method="post">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Username</label>
                                                <input type="text" id="username" class="form-control" name="username" />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Password</label>
                                                <input type="password" id="password" class="form-control" name="password" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4cd">Ulangi Password</label>
                                                <input type="password" id="form3Example4cd" class="form-control" name="password2" />
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content mx-4 mb-3 mb-lg-4 p-2">
                                            <button type="button" name="kembali" class="btn btn-danger btn-lg mr-3 mr-5"><a href="login.php" class="text-white">Kembali</a></button>
                                            <button type="submit" name="daftar" class="btn btn-primary btn-lg">Daftar</button>
                                        </div>

                                        <!-- <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="button" name="kembali" class="btn btn-danger btn-lg mr-5"><a href="login.php" class="text-white">Kembali</a></button>
                                            <button type="submit" name="daftar" class="btn btn-primary btn-lg">Daftar</button>
                                        </div> -->

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="img/daftar.gif" class="img-fluid">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>