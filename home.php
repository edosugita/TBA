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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h5>Selamat Datang <?= $row['nama']; ?></h5>
    <a href="logout.php">Logout</a>
</body>

</html>