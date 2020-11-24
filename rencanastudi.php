<?php
require_once 'connect.php';
require_once 'proses.php';
session_start();


if (!isset($_SESSION['nim'])) {
    header("Location: login.php?error=younotsigin");
    exit();
}

$data = mysqli_query($conn, "SELECT * FROM jadwal");
?>

<?php
require_once 'navbar.php';
?>

<main>
    <div class="container">
        <table class="table">
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
                            <a class="btn btn-primary" href="">Detail</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>

<?php
require_once 'footer.php';
?>