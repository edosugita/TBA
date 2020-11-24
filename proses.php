<?php

require 'connect.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass1 = $_POST['password1'];

    if (empty($nama) || empty($alamat) || empty($email) || empty($pass) || empty($pass1)) {
        header("Location: register.php?error=emptyfields&nama=" . $nama);
        exit();
    } elseif ($pass !== $pass1) {
        header("Location: register.php?error=passwordsdonotmatch&firstname=" . $nama);
        exit();
    } else {
        $result = mysqli_query($conn, "SELECT email FROM mahasiswa WHERE email = '$email'");

        if (mysqli_fetch_assoc($result)) {
            header("Location: register.php?error=emailtaken");
            exit();
        } else {
            header("Location: register.php?success=registered");
        }

        $pass = password_hash($pass, PASSWORD_DEFAULT);

        mysqli_query($conn, "INSERT INTO mahasiswa(nama, alamat, email, password) VALUE ('$nama', '$alamat', '$email', '$pass')");
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

                    header("Location: home.php?succsess=loggedin");
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