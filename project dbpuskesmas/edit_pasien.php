<?php
require 'dbkoneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tmp_lahir'];
    $tanggal_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['gender'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $kelurahan_id = $_POST['kelurahan_id'];

    if (!empty($kode) && !empty($nama) && !empty($tempat_lahir) && !empty($tanggal_lahir) && !empty($jenis_kelamin) && !empty($email) && !empty($alamat) && !empty($kelurahan_id)) {
        if (isset($_GET['id'])) {
           //mode edit
            $id = $_GET['id'];
            $query = $dbh->prepare('UPDATE pasien SET kode=?, nama=?, tmp_lahir=?, tgl_lahir=?, gender=?, email=?, alamat=?, kelurahan_id=? WHERE id=?');
            $query->execute([$kode, $nama, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $email, $alamat, $kelurahan_id, $id]);
        } else {
            // mode tambah
            $query = $dbh->prepare('INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $query->execute([$kode, $nama, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $email, $alamat, $kelurahan_id]);
        }

        header("Location: data_pasien.php");
        exit();
    } else {
        echo "Semua field harus diisi.";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $dbh->prepare('SELECT * FROM pasien WHERE id=?');
    $query->execute([$id]);
    $pasien = $query->fetch();
}

// Tampilkan form
include_once 'header.php';
include_once 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pasien</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah data diri</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container mt-2">
            <h2 class="text-center">Form Pasien</h2>
            <form action="proses_pasien.php" method="POST">
                <div class="form-group row mt-3 ">
                    <label for="kode" class="col-4 col-form-label">Kode</label>
                    <div class="col-8">
                        <input required id="kode" name="kode" type="text" class="form-control" value="<?php if (isset($pasien)) echo $pasien['kode']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-4 col-form-label">Nama</label>
                    <div class="col-8">
                    <input required id="nama" name="nama" type="text" class="form-control" value="<?php if (isset($pasien)) echo $pasien['nama']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                    <div class="col-8">
                        <input required id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" value="<?php if (isset($pasien)) echo $pasien['tmp_lahir']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                    <div class="col-8">
                        <input required id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="<?php if (isset($pasien)) echo $pasien['tgl_lahir']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-8">
                        <select id="gender" name="gender" class="custom-select" value="<?php if (isset($pasien)) echo $pasien['gender']; ?>">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-4 col-form-label">Email</label>
                    <div class="col-8">
                        <input required id="email" name="email" type="email" class="form-control" value="<?php if (isset($pasien)) echo $pasien['email']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-4 col-form-label">Alamat</label>
                    <div class="col-8">
                        <input required id="alamat" name="alamat" type="text" class="form-control" value="<?php if (isset($pasien)) echo $pasien['alamat']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelurahan_id" class="col-4 col-form-label">Kelurahan ID</label>
                    <div class="col-8">
                        <input required id="kelurahan_id" name="kelurahan_id" type="text" class="form-control" value="<?php if (isset($pasien)) echo $pasien['kelurahan_id']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
    </div>
</div>

    <?php include_once 'footer.php'; ?>
</body>

</html>
