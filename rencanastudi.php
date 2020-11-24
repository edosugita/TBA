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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="img/login.css">
    <title>Document</title>
</head>

<body>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>