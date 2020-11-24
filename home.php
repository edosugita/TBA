<?php
require_once 'connect.php';
require_once 'proses.php';
session_start();

$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

if (!isset($_SESSION['nim'])) {
    header("Location: login.php?error=younotsigin");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE email = '$email'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Siakad</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nav.css">
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(img/logo.png);"></a>
                <center>
                    <p>Dashboard Siakad UM</p><br>
                </center>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="#">Kurikulum</a>
                    </li>
                    <li>
                        <a href="#">Jadwal Kuliah</a>
                    </li>
                    <li>
                        <a href="#">Kartu Hasil Studi</a>
                    </li>
                    <li>
                        <a href="#">Rencana Studi</a>
                    </li>
                    <li>
                        <a href="#">Daftar Hasil Studi</a>
                    </li>
                </ul>

            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <center>
                <h1>Selamat Datang <?= $row['nama']; ?></h1>
            </center>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th class="table-info" scope="row">NIM</th>
                                    <td><?= $row['nim']; ?></td>
                                </tr>
                                <tr>
                                    <th class="table-info" scope="row">Program Studi</th>
                                    <td><?= $row['prodi']; ?></td>
                                </tr>
                                <tr>
                                    <th class="table-info" scope="row">Fakultas</th>
                                    <td><?= $row['fakultas']; ?></td>
                                </tr>
                                <tr>
                                    <th class="table-info" scope="row">Angkatan</th>
                                    <td><?= $row['angkatan']; ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        2 of 2
                    </div>
                </div>
            </div>

            <script src="js/bootstrap.js"></script>
            <script src="js/bootstrap.min.js"></script>

            <script src="js/jquery.min.js"></script>
            <script src="js/popper.js"></script>
            <script src="js/main.js"></script>

</body>

</html>