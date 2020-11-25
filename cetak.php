<?php

use Mpdf\Mpdf;

require_once __DIR__ . '/vendor/autoload.php';
require_once 'connect.php';
require_once 'proses.php';
session_start();

$data = mysqli_query($conn, "SELECT m.id_matkul, m.kode_matkul, m.nama_matkul, m.sks, m.kelas, offr, d.nama FROM matakuliah m INNER JOIN jadwal j ON m.id_matkul = j.id_matkul INNER JOIN dosen d ON j.id_dosen = d.id_dosen ORDER BY kode_matkul ASC");
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

if (!isset($_SESSION['nim'])) {
    header("Location: login.php?error=younotsigin");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE email = '$email'");
$row = mysqli_fetch_assoc($result);

$mpdf = new Mpdf();

$html = '<p>UNIVERSITAS NEGERI MALANG (UM) <br>
Kartu Rencana Studi (KRS)</p>
<p>Prodi : S1 ' . $row['prodi'] . '<br>Fakultas : ' . $row['fakultas'] . '<br>Nama : ' . $row['nama'] . '</p>
<hr style="margin-top: 10px">
<table>
<tr>
        <th scope="col">#</th>
        <th scope="col">KODE</th>
        <th scope="col">NAMA MATKUL</th>
        <th scope="col">SKS</th>
        <th scope="col">KELAS</th>
        <th scope="col">OFFR</th>
        <th scope="col">DOSEN</th>
        <th scope="col"></th>
    </tr>';

$i = 1;
while ($jadwal = mysqli_fetch_assoc($data)) {
    $html .= '
        <tr>
            <td>' . $i++ . '</td>
            <td scope="col">' . $jadwal['kode_matkul'] . '</td>
            <td scope="col">' . $jadwal['nama_matkul'] . '</td>
            <td scope="col">' . $jadwal['sks'] . '</td>
            <td scope="col">' . $jadwal['kelas'] . '</td>
            <td scope="col">' . $jadwal['offr'] . '</td>
            <td scope="col">' . $jadwal['nama'] . '</td>
        </tr>';
}

$html .= '</table>';

$mpdf->WriteHTML($html);
$mpdf->Output('krs.pdf', 'I');
