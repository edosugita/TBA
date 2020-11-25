<?php
require_once 'connect.php';
require_once 'proses.php';
session_start();

if (!isset($_SESSION['nim'])) {
    header("Location: login.php?error=younotsigin");
    exit();
}
$data = mysqli_query($conn, "SELECT m.kode_matkul, m.nama_matkul, m.sks, m.kelas, d.nama FROM matakuliah m JOIN dosen d ON m.id_dosen = d.id_dosen ORDER BY kode_matkul ASC");

$title = ['title' => 'Tambah Mata Kuliah | Siakad'];
require_once 'navbar.php';
?>

<main>
    <div class="table-responsive">
        <table class="table table-striped tb">
            <thead class="thead-dark">
                <th scope="col">#</th>
                <th scope="col">KODE</th>
                <th scope="col">NAMA MATKUL</th>
                <th scope="col">SKS</th>
                <th scope="col">KELAS</th>
                <th scope="col">DOSEN</th>
                <!-- <th scope="col">KAPASITAS</th> -->
                <th scope="col"></th>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php while ($matkul = mysqli_fetch_assoc($data)) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td scope="col"><?= $matkul['kode_matkul']; ?></td>
                        <td scope="col"><?= $matkul['nama_matkul']; ?></td>
                        <td scope="col"><?= $matkul['sks']; ?></td>
                        <td scope="col"><?= $matkul['kelas']; ?></td>
                        <td scope="col"><?= $matkul['nama']; ?></td>
                        <td>
                            <a name="ambil" class="btn btn-primary" href="<?= $matkul['id_matkul']; ?>">Ambil</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>

<?php require_once 'footer.php'; ?>