<?php

require 'connect.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $fakultas = $_POST['fakultas'];
    $angkatan = $_POST['angkatan'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass1 = $_POST['password1'];
    $temp = $_FILES['gambar']['tmp_name'];
    $name = rand(0, 9999) . $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
    $folder = "img/";

    $tahun = date("Y");
    $jur = 19;

    if (empty($nama) || empty($prodi) || empty($fakultas) || empty($angkatan) || empty($alamat) || empty($email) || empty($pass) || empty($pass1)) {
        header("Location: register.php?error=emptyfields&nama=" . $nama);
        exit();
    } elseif ($pass !== $pass1) {
        header("Location: register.php?error=passwordsdonotmatch&firstname=" . $nama);
        exit();
    } elseif ($size > 2048000) {
        header("Location: register.php?error=errorimagesize");
    } else {
        $result = mysqli_query($conn, "SELECT email FROM mahasiswa WHERE email = '$email'");
        $query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE substr(nim,1,2) = '$jur' order by nim desc");
        $data = mysqli_fetch_assoc($query);
        $id_old = $data['nim'];

        if (mysqli_fetch_assoc($result)) {
            header("Location: register.php?error=emailtaken");
            exit();
        } elseif (mysqli_num_rows($query) < 1) {
            $primary = $jur . $tahun . "6401";
        } else {
            echo '<script language="javascript">
                alert ("Registrasi Berhasil Di Lakukan!");
                window.location="login.php";
                </script>';
        }

        $pass = password_hash($pass, PASSWORD_DEFAULT);

        move_uploaded_file($temp, $folder . $name);

        mysqli_query($conn, "INSERT INTO mahasiswa(nim, nama, prodi, fakultas, angkatan, alamat, email, password, picture) VALUE ('$primary', '$nama', '$prodi', '$fakultas', '$angkatan', '$alamat', '$email', '$pass', '$name')");
        return mysqli_affected_rows($conn);
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (empty($email) || empty($pass)) {
        header("Location: login.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM mahasiswa WHERE email =  ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($pass, $row['password']);

                if ($passCheck == false) {
                    header("Location: login.php?error=wrongpass");
                    exit();
                } elseif ($passCheck == true) {
                    session_start();

                    $_SESSION['nim'] = $row['nim'];
                    $_SESSION['email'] = $row['email'];

                    echo '<script language="javascript">
                alert ("Login Berhasil Di Lakukan!");
                window.location="home.php";
                </script>';
                    exit();
                } else {
                    header("Location: login.php?error=wrongpass");
                    exit();
                }
            } else {
                header("Location: login.php?error=nouser");
                exit();
            }
        }
    }
}

if (isset($_POST['ambil'])) {
    $idmatkul = $_POST['idmatkul'];
    $nim = $_POST['nim'];
    $dosen = $_POST['iddosen'];
    $sksnilai = $_POST['sksnilai'];
    $sumsks = $_POST['sumsks'];
    $matkul = $_POST['matkul'];

    $maxmatkul = mysqli_query($conn, "SELECT id_matkul FROM jadwal WHERE id_matkul = '$idmatkul'");
    $maxnama = mysqli_query($conn, "SELECT nama FROM jadwal WHERE nama = '$matkul' AND nim = '$nim'");
    $nimmax = mysqli_query($conn, "SELECT nim FROM jadwal WHERE nim = '$nim'");

    $max = $sksnilai + $sumsks;

    if ($max > 24) {
        echo '<script language="javascript">
                alert ("Mahasiswa Hanya Dapat Mengambil 24 SKS!");
                window.location="rencanastudi.php";
                </script>';
    } else {

        if (mysqli_num_rows($maxmatkul) == 0 || mysqli_num_rows($nimmax) >= 0) {
            if (mysqli_num_rows($maxnama) == 0) {
                $ambilk = mysqli_query($conn, "INSERT INTO jadwal(id_matkul, id_dosen, nim, nama) VALUE ('$idmatkul', '$dosen', '$nim', '$matkul')");
                echo '<script language="javascript">
                alert ("Matakuliah Berhasil ditambahkan !");
                window.location="rencanastudi.php";
                </script>';
            } else {
                echo '<script language="javascript">
                    alert ("Mahasiswa Hanya Dapat Mengambil 1 Matakuliah Yang Sama!");
                    window.location="rencanastudi.php";
                    </script>';
            }
        } else {
            echo '<script language="javascript">
                alert ("Mahasiswa Hanya Dapat Mengambil 1 Matakuliah Yang Sama!");
                window.location="rencanastudi.php";
                </script>';
        }
    }
}
