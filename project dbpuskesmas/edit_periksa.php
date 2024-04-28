<?php
require 'dbkoneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = $_POST['tanggal'];
    $berat_bdn = $_POST['berat'];
    $tinggi_bdn = $_POST['tinggi'];
    $tensi = $_POST['tensi'];
    $keterangan = $_POST['keterangan'];
    $id_pasien = $_POST['pasien_id'];
    $id_dokter = $_POST['dokter_id'];

    $data = [$_tanggal, $_berat_bdn, $_tinggi_bdn, $_tensi, $_keterangan, $_id_pasien, $_id_dokter];

    if (!empty($tanggal) && !empty($berat_bdn) && !empty($tinggi_bdn) && !empty($tensi) && !empty($keterangan) && !empty($id_pasien) && !empty($id_dokter)) {
        if (isset($_GET['id'])) {
           //mode edit
            $id = $_GET['id'];
            $query = $dbh->prepare('UPDATE periksa SET tanggal=?, berat=?, tinggi=?, tensi=?, keterangan=?, pasien_id=?, dokter_id=?, kelurahan_id=? WHERE id=?');
            $query->execute([$tanggal, $berat_bdn, $tinggi_bdn, $tensi, $keterangan, $id_pasien, $id_dokter, $id]);
        } else {
            // mode tambah
            $query = $dbh->prepare('INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id) VALUES (?, ?, ?, ?, ?, ?, ?)');
            $query->execute([$tanggal, $berat_bdn, $tinggi_bdn, $tensi, $keterangan, $id_pasien, $id_dokter]);
        }

        header("Location: data_periksa.php");
        exit();
    } else {
        echo "Semua field harus diisi.";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $dbh->prepare('SELECT * FROM periksa WHERE id=?');
    $query->execute([$id]);
    $periksa = $query->fetch();
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
    <title>Edit Data periksa</title>
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

    <div class="container mt-1">
        <h2 class="text-center ">Form Pemeriksaan</h2>
        <form action="proses_periksa.php" method="POST">
            <div class="form-group row mt-3">
                <label for="tanggal" class="col-4 col-form-label">Tanggal</label>
                <div class="col-8">
                    <input required id="tanggal" name="tanggal" type="date" class="form-control" value="<?php if (isset($periksa)) echo $periksa['tanggal']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="berat" class="col-4 col-form-label">Berat Badan</label>
                <div class="col-8">
                    <input required id="berat" name="berat" type="number" class="form-control" value="<?php if (isset($periksa)) echo $periksa['berat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tinggi" class="col-4 col-form-label">Tinggi Badan</label>
                <div class="col-8">
                    <input required id="tinggi" name="tinggi" type="number" class="form-control" value="<?php if (isset($periksa)) echo $periksa['tinggi']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tensi" class="col-4 col-form-label">Tensi</label>
                <div class="col-8">
                    <input required id="tensi" name="tensi" type="number" class="form-control" value="<?php if (isset($periksa)) echo $periksa['tensi']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="keterangan" class="col-4 col-form-label">Keterangan</label>
                <div class="col-8">
                    <textarea name="keterangan" id="keterangan" rows="5" class="form-control" value="<?php if (isset($periksa)) echo $periksa['keterangan']; ?>"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="pasien_id" class="col-4 col-form-label">Id Pasien</label>
                <div class="col-8">
                    <input required id="pasien_id" name="pasien_id" type="number" class="form-control"value="<?php if (isset($periksa)) echo $periksa['pasien_id']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="dokter_id" class="col-4 col-form-label">Id Dokter</label>
                <div class="col-8">
                    <input required id="dokter_id" name="dokter_id" type="number" class="form-control" value="<?php if (isset($periksa)) echo $periksa['dokter_id']; ?>">
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
