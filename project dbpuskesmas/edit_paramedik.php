<?php
require 'dbkoneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kategori = $_POST['kategori'];
    $telpon = $_POST['telpon'];
    $alamat = $_POST['alamat'];
    $unit_kerja_id = $_POST['unit_kerja_id'];

    if (!empty($nama) && !empty($gender) && !empty($tmp_lahir) && !empty($tgl_lahir) && !empty($kategori) && !empty($telpon) && !empty($alamat) && !empty($unit_kerja_id)) {
        if (isset($_GET['id'])) {
           //mode edit
            $id = $_GET['id'];
            $query = $dbh->prepare('UPDATE paramedik SET nama=?, gender=?, tmp_lahir=?, tgl_lahir=?, kategori=?, telpon=?, alamat=?, unit_kerja_id=? WHERE id=?');
            $query->execute([$nama, $_gender,  $tmp_lahir, $tgl_lahir, $kategori, $telpon, $alamat, $unit_kerja_id]);
        } else {
            // mode tambah
            $query = $dbh->prepare('INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $query->execute([$nama, $gender, $tmp_lahir, $tgl_lahir, $kategori, $telpon, $alamat, $unit_kerja_id]);
        }

        header("Location: data_paramedik.php");
        exit();
    } else {
        echo "Semua field harus diisi.";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $dbh->prepare('SELECT * FROM paramedik WHERE id=?');
    $query->execute([$id]);
    $paramedik = $query->fetch();
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
    <title>Edit Data Paramedis</title>
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
        <h2 class="text-center ">Form Paramedik</h2>
        <form action="proses_paramedik.php" method="POST">
            <div class="form-group row mt-3">
                <label for="nama" class="col-4 col-form-label">Nama</label>
                <div class="col-8">
                    <input required id="nama" name="nama" type="text" class="form-control" value="<?php if (isset($paramedik)) echo $paramedik['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
                <div class="col-8">
                    <select id="gender" name="gender" class="custom-select" value="<?php if (isset($paramedik)) echo $paramedik['gender']; ?>">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                <div class="col-8">
                    <input required id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" value="<?php if (isset($paramedik)) echo $paramedik['tmp_lahir']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                <div class="col-8">
                    <input required id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="<?php if (isset($paramedik)) echo $paramedik['tgl_lahir']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="kategori" class="col-4 col-form-label">Kategori</label>
                <div class="col-8">
                    <select id="kategori" name="kategori" class="custom-select" value="<?php if (isset($paramedik)) echo $paramedik['kategori']; ?>">
                        <option value="">Pilih kategori</option>
                        <option value="perawat">Perawat</option>
                        <option value="paramedis">Paramedis</option>
                        <option value="teknisi medis">Teknisi Medis</option>
                        <option value="asisten medis">Asisten Medis</option>
                        <option value="ahli gizi">Ahli Gizi</option>
                        <option value="ahli farmasi">Ahli Farmasi</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mt-3 ">
                <label for="telpon" class="col-4 col-form-label">Telepon</label>
                <div class="col-8">
                    <input required id="telpon" name="telpon" type="tel" class="form-control" value="<?php if (isset($paramedik)) echo $paramedik['telpon']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-4 col-form-label">Alamat</label>
                <div class="col-8">
                    <input required id="alamat" name="alamat" type="text" class="form-control" value="<?php if (isset($paramedik)) echo $paramedik['alamat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="unit_kerja_id" class="col-4 col-form-label">Id Unit Kerja</label>
                <div class="col-8">
                    <input required id="unit_kerja_id" name="unit_kerja_id" type="number" class="form-control" value="<?php if (isset($paramedik)) echo $paramedik['unit_kerja_id']; ?>">
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
