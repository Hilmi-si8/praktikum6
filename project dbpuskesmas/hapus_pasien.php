<?php
// Memanggil file koneksi database
require_once 'dbkoneksi.php';

// Menangkap data yang dikirimkan melalui form untuk INSERT
if (isset($_POST['submit'])) {
    $_kode = $_POST['kode'];
    $_nama = $_POST['nama'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_gender = $_POST['gender'];
    $_email = $_POST['email'];
    $_alamat = $_POST['alamat'];
    $_kelurahan_id = $_POST['kelurahan_id'];

    $sql = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt->execute([$_kode, $_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_email, $_alamat, $_kelurahan_id]);
    header("Location: data_pasien.php");
}

// Menangani DELETE data pasien
if (isset($_GET['id'])) {
    $id_pasien = $_GET['id'];
    $sql = "DELETE FROM pasien WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id_pasien]);
    header("Location: data_pasien.php");
}
?>
