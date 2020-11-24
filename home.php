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
<div id="content" class="p-4 p-md-5">

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
</div>
<?php require_once 'footer.php'; ?>