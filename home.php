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
$title = ['title' => 'Dashboard | Siakad'];
require_once 'navbar.php';

?>

<!-- Page Content  -->
<div id="content" class="p-4 p-md-1">

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
            <div class="col-4">
                <div class="text-left">
                    <img src="img/<?= $row['picture']; ?>" class="rounded-circle" alt="foto profil" width="75%">
                </div>
            </div>
            <div class="col-8">
                <table class="table">
                    <tbody>
                        <br>
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
        </div>
    </div><br><br>
    <center>
        <div class="col d-flex justify-content-center">
            <div class="card-deck">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Success card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Info card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Danger card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </center>
</div>
<?php require_once 'footer.php'; ?>