<?php
require_once 'connect.php';
require_once 'proses.php';
session_start();

$id = !empty($_GET['id']) ? $_GET['id'] : '';

if (!isset($_SESSION['nim'])) {
    header("Location: login.php?error=younotsigin");
    exit();
}

$data = mysqli_query($conn, "SELECT m.id_matkul, m.kode_matkul, m.nama_matkul, m.sks, m.kelas, m.jam, m.offr, d.id_dosen, d.nama
                                FROM matakuliah m 
                                    JOIN dosen d ON m.id_dosen = d.id_dosen 
                                        WHERE id_matkul = '$id'");
$matkul = mysqli_fetch_assoc($data);

$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$nim = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE email = '$email'");
$ambilnim = mysqli_fetch_assoc($nim);

$sum = mysqli_query($conn, "SELECT SUM(m.sks) AS sks, n.email
                                FROM matakuliah m 
                                    INNER JOIN jadwal j ON m.id_matkul = j.id_matkul
                                        INNER JOIN mahasiswa n ON j.nim = n.nim 
                                            WHERE email = '$email'");
$sks = mysqli_fetch_assoc($sum);

$title = ['title' => 'Ambil Mata Kuliah | Siakad'];

require_once 'navbar.php';
?>

<main>
    <div class="conainer">
        <div class="col-md-12 p-4 p-md-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a class="color" href="tambah.php">Ambil Matakuliah</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ambil <?= $matkul['nama_matkul'] ?></li>
                </ol>
            </nav>
            <div class="form mt-5">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="matkul">Matakuliah</label>
                        <input type="text" class="form-control" id="matkul" name="matkul" value="<?= $matkul['nama_matkul'] ?>" disabled>
                        <input type="hidden" class="form-control" id="sumsks" name="sumsks" value="<?= $sks['sks'] ?>">
                        <input type="hidden" class="form-control" id="idmatkul" name="idmatkul" value="<?= $matkul['id_matkul'] ?>">
                        <input type="hidden" class="form-control" id="nim" name="nim" value="<?= $ambilnim['nim'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="matkul">Kode Matakuliah</label>
                        <input type="text" class="form-control" id="kodematkul" name="kodematkul" value="<?= $matkul['kode_matkul'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="matkul">SKS</label>
                        <input type="text" class="form-control" id="sks" name="sks" value="<?= $matkul['sks'] ?>" disabled>
                        <input type="hidden" class="form-control" id="sksnilai" name="sksnilai" value="<?= $matkul['sks'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="matkul">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $matkul['kelas'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="matkul">Jam</label>
                        <input type="text" class="form-control" id="jam" name="jam" value="<?= $matkul['jam'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="matkul">Dosen</label>
                        <input type="text" class="form-control" id="dosen" name="dosen" value="<?= $matkul['nama'] ?>" disabled>
                        <input type="hidden" class="form-control" id="iddosen" name="iddosen" value="<?= $matkul['id_dosen'] ?>">
                    </div>
                    <button type="submit" onclick="return confirm('Yakin ingin menambahkan <?= $matkul['nama_matkul']; ?>');" class="btn btn-primary float-right" name="ambil">Ambil</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once 'footer.php' ?>