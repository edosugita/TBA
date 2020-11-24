<?php
require_once 'connect.php';
require_once 'proses.php';
session_start();


if (!isset($_SESSION['nim'])) {
    header("Location: login.php?error=younotsigin");
    exit();
}

$data = mysqli_query($conn, "SELECT * FROM jadwal");
$sum = mysqli_query($conn, "SELECT SUM(sks) AS sks FROM jadwal");
$sks = mysqli_fetch_assoc($sum);

$title = ['title' => 'Rencana Studi | Siakad'];
require_once 'navbar.php';
?>

<main>
    <div class="row">
        <div class="col-md-12 p-4 p-md-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    <li class="breadcrumb-item active" aria-current="page">Rencana Studi</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <h3>Rencana Studi Periode Gasal 2020/2021 </h3>
            <hr>
        </div>
        <div class="col-md-12 mb-4">
            <ul style="line-height: 2em;"><b>CATATAN:</b>
                <li style="line-height: 2em;"><strong>Silahkan klik tombol "Tambah Mata Kuliah" untuk menambah mata kuliah yang diinginkan.</strong></li>
                <li style="line-height: 2em;">Jika sajian mata kuliah belum tersedia. silahkan hubungi subag akademik Fakultas.</li>
                <li style="line-height: 2em;">KRS yang dicetak belum merupakan dokumen resmi tanpa adanya tanda tangan dari dosen PA.</li>
                <li style="line-height: 2em;">Pastikan kuliah yang anda ikuti sesuai dengan KRS yang dicetak dan disahkan oleh Dosen PA, agar nama anda tercantum di DNA pada akhir semester.</li>
                <li style="line-height: 2em;">Sesuai Pedoman Pendidikan Tahun 2018 Pasal 26 ayat (8), beban belajar maksimal mahasiswa pada semester 1 dan 2 maksimal adalah 22 SKS.</li>
                <li style="line-height: 2em;">Jika anda telah melakukan pendaftaran Mata Kuliah Universitas, maka Mata Kuliah Universitas tersebut <strong>tidak dapat dihapus dari daftar rencana studi.</strong></li>
            </ul>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">KODE</th>
                    <th scope="col">NAMA MATKUL</th>
                    <th scope="col">SKS</th>
                    <th scope="col">KELAS</th>
                    <th scope="col">OFFR</th>
                    <th scope="col">DOSEN</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php while ($jadwal = mysqli_fetch_assoc($data)) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td scope="col"><?= $jadwal['kode_matkul']; ?></td>
                        <td scope="col"><?= $jadwal['nama_matkul']; ?></td>
                        <td scope="col"><?= $jadwal['sks']; ?></td>
                        <td scope="col"><?= $jadwal['kelas']; ?></td>
                        <td scope="col"><?= $jadwal['offr']; ?></td>
                        <td scope="col"><?= $jadwal['dosen']; ?></td>
                        <td>
                            <a class="btn btn-primary" href="edit.php?id=<?= $jadwal['id_jadwal']; ?>">Detail</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col" colspan="2">Jumlah SKS</th>
                    <th scope="col" colspan="4"><?= $sks['sks']; ?></th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
        </table>
    </div>
</main>
<?php require_once 'footer.php'; ?>