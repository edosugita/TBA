<?php
require_once 'connect.php';
require_once 'proses.php';
session_start();

if (!isset($_SESSION['nim'])) {
    header("Location: login.php?error=younotsigin");
    exit();
}

$title = ['title' => 'Kurikulum | Siakad'];

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
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped tb">
                    <thead class="thead-dark">
                    </thead>
                </table>
            </div>
        </div>
    </div>
</main>

<?php require_once 'footer.php'; ?>