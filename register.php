<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Daftar</title>
</head>

<body>
    <div class="container">
        <h5>Daftar ke SIAKAD</h5>
        <form action="proses.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="Teknik Informatika" disabled>
                <input type="hidden" class="form-control" id="prodi" name="prodi" placeholder="Prodi" value="Teknik Informatika">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="Teknik" disabled>
                <input type="hidden" class="form-control" id="fakultas" name="fakultas" placeholder="Fakultas" value="Teknik">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" value="2019" disabled>
                <input type="hidden" class="form-control" id="angkatan" name="angkatan" placeholder="Angkatan" value="2019">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password1" name="password1" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <label for="upload">Upload Gambar</label>
                <input type="file" class="form-control" name="gambar">
            </div>
            <button type="submit" name="register" class="btn btn-primary">Daftar</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>