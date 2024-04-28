<?php
// Memanggil file koneksi database
require_once 'dbkoneksi.php';

// Menangkap data yang dikirimkan melalui form untuk INSERT
if (isset($_POST['submit'])) {
        $_tanggal = $_POST['tanggal'];
        $_berat_bdn = $_POST['berat'];
        $_tinggi_bdn = $_POST['tinggi'];
        $_tensi = $_POST['tensi'];
        $_keterangan = $_POST['keterangan'];
        $_id_pasien = $_POST['pasien_id'];
        $_id_dokter = $_POST['dokter_id'];
    
        $data = [$_tanggal, $_berat_bdn, $_tinggi_bdn, $_tensi, $_keterangan, $_id_pasien, $_id_dokter];
        $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt->execute($data);
        header("Location: data_periksa.php");
}

// Menangani DELETE data periksa
if (isset($_GET['id'])) {
    $id_periksa = $_GET['id'];
    $sql = "DELETE FROM periksa WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id_periksa]);
    header("Location: data_periksa.php");
}
?>
