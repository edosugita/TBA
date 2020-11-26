<?php
require_once 'connect.php';
require_once 'proses.php';
session_start();

if (!isset($_SESSION['nim'])) {
    header("Location: login.php?error=younotsigin");
    exit();
}

$matkul = mysqli_query($conn, "SELECT * FROM matakuliah ORDER BY kode_matkul");

$title = ['title' => 'Jadwal | Siakad'];

require_once 'navbar.php';
?>

<main>
    <div class="row">
        <div class="col-md-12 p-4 p-md-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a class="color" href="home.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Jadwal Kuliah</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <h3>Jadwal Kuliah Gasal 2020/2021 </h3>
            <hr>
        </div>
        <div class="col-md-12">
            <ul class="list-group">
                <li class="list-group-item" style="border: 1px solid #d3d3d3 !important;">Keterangan:</li>
                <li class="list-group-item" style="border: 1px solid #d3d3d3 !important;">
                    <hr class="pcolor" style="border: 1px solid #5bc0de; background-color: #5bc0de;">
                    <p>Program Studi</p>
                </li>
                <li class="list-group-item" style="border: 1px solid #d3d3d3 !important;">
                    <hr class="pcolor" style="border: 1px solid #818a91; background-color: #818a91;">
                    <p>Jurusan</p>
                </li>
                <li class="list-group-item" style="border: 1px solid #d3d3d3 !important;">
                    <hr class="pcolor" style="border: 1px solid #f0ad4e; background-color: #f0ad4e;">
                    <p>Fakultas</p>
                </li>
                <li class="list-group-item" style="border: 1px solid #d3d3d3 !important;">
                    <hr class="pcolor" style="border: 1px solid #d9534f; background-color: #d9534f;">
                    <p>Angkatan</p>
                </li>
            </ul>
        </div>
        <div class="col-md-12" style="margin-top: 30px;">
            <div class="table-responsive">
                <table class="table table-striped tb">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">KODE</th>
                            <th scope="col">NAMA MATKUL</th>
                            <th scope="col">SKS</th>
                            <th scope="col">KELAS-OFFR</th>
                            <th scope="col">JADWAL & RUANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php while ($display = mysqli_fetch_assoc($matkul)) : ?>
                            <tr>
                                <td scope="col" colspan="6">
                                    <span class="badge badge-info">S1 Teknik Informatika</span>
                                    <span class="badge badge-secondary">Teknik Elektro</span>
                                    <span class="badge badge-warning" style="color: #fff;">FT</span>
                                    <span class="badge badge-danger"><?= $display['angkatan']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td scope=" col"><?= $i++; ?></td>
                                <td scope="col"><?= $display['kode_matkul']; ?></td>
                                <td scope="col"><?= $display['nama_matkul']; ?></td>
                                <td scope="col"><?= $display['sks']; ?></td>
                                <td scope="col"><?= $display['kelas'] . '-' . $display['offr']; ?></td>
                                <td scope="col">1. <?= $display['hari'] . ' ' . $display['jam'] . '<br>' . $display['ruangan']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php require_once 'footer.php'; ?>