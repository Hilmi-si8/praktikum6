<?php
// Memanggil file koneksi database
require_once 'dbkoneksi.php';

// Menangkap data yang dikirimkan melalui form untuk INSERT

    if (isset($_POST['submit'])) {
        $_nama = $_POST['nama'];
        $_gender = $_POST['gender'];
        $_tmp_lahir = $_POST['tmp_lahir'];
        $_tgl_lahir = $_POST['tgl_lahir'];
        $_kategori = $_POST['kategori'];
        $_telpon = $_POST['telpon'];
        $_alamat = $_POST['alamat'];
        $_unit_kerja_id = $_POST['unit_kerja_id'];
    
        $sql = "INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt->execute([$_nama, $_gender, $_tmp_lahir, $_tgl_lahir, $_kategori, $_telpon, $_alamat, $_unit_kerja_id]);
        header("Location: data_paramedik.php");
}

// Menangani DELETE data paramedik
if (isset($_GET['id'])) {
    $id_paramedik = $_GET['id'];
    $sql = "DELETE FROM paramedik WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id_paramedik]);
    header("Location: data_paramedik.php");
}
?>
