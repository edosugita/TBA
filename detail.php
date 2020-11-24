<?php
require_once 'connect.php';
require_once 'proses.php';
session_start();

$id = !empty($_GET['id']) ? $_GET['id'] : '';

if (!isset($_SESSION['nim'])) {
    header("Location: login.php?error=younotsigin");
    exit();
}
$data = mysqli_query($conn, "SELECT * FROM matakuliah WHERE id_matkul = '$id'");
$title = ['title' => 'Deskripsi Mata Kuliah | Siakad'];

require_once 'navbar.php';
?>

<div class="row">
    <div class="col-md-12 p-4 p-md-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><a class="color" href="home.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a class="color" href="rencanastudi.php">Rencana Studi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Deskripsi Mata Kuliah</li>
            </ol>
        </nav>
    </div>
    <?php while ($matkul = mysqli_fetch_assoc($data)) : ?>
        <div class="col-md-12">
            <h4>Deskripsi Mata Kuliah <?= $matkul['kode_matkul'] . ' ' . $matkul['nama_matkul']; ?></h4>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <td style="background-color: #343a40; color: #fff; width: 13%;">Mata Kuliah</td>
                        <td><?= $matkul['nama_matkul']; ?></td>
                    </tr>
                    <tr>
                        <td style="background-color: #343a40; color: #fff;">Kode</td>
                        <td><?= $matkul['kode_matkul']; ?></td>
                    </tr>
                    <tr>
                        <td style="background-color: #343a40; color: #fff;">SKS</td>
                        <td><?= $matkul['sks']; ?></td>
                    </tr>
                    <tr>
                        <td style="background-color: #343a40; color: #fff;">SCPL</td>
                        <td><?= $matkul['scpl']; ?></td>
                    </tr>
                    <tr>
                        <td style="background-color: #343a40; color: #fff;">CPMK</td>
                        <td><?= $matkul['cpmk']; ?></td>
                    </tr>
                    <tr>
                        <td style="background-color: #343a40; color: #fff;">Deskripsi</td>
                        <td><?= $matkul['deskripsi']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php
require_once 'footer.php';
?>