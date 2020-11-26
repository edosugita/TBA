<?php
require_once 'connect.php';
require_once 'proses.php';

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
    <title><?= $title['title']; ?></title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="home.php" class="img logo rounded-circle mb-5" style="background-image: url(img/logo.png);"></a>
                <center>
                    <p>Dashboard Siakad UM</p>
                </center>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="jadwal.php">Jadwal Kuliah</a>
                    </li>
                    <li>
                        <a href="rencanastudi.php">Rencana Studi</a>
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

                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $row['nama']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>