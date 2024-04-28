<?php
// koneksi database
require 'dbkoneksi.php';
include_once 'header.php';
include_once 'sidebar.php';

//Query untuk mendapatkan data pasien
$query = $dbh->query('SELECT * FROM periksa');
//$query = $dbh->query('SELECT pasien.*, kelurahan.nama AS kategori FROM pasien INNER JOIN kelurahan ON kelurahan.id = pasien.kelurahan_id');
$nomor = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemeriksaan</title>
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
                        <h1>Data Pemeriksaan</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <a href="form_periksa.php"><button class="btn btn-dark mb-1">Tambah Data</button></a>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Berat Badan</th>
                                            <th>Tinggi Badan</th>
                                            <th>Tensi</th>
                                            <th>Keterangan</th>
                                            <th>Id Pasien</th>
                                            <th>Id Dokter</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        // Loop menggunakan foreach untuk menampilkan data pasien
                                        foreach ($query as $row) {
                                            echo "<tr>";
                                            echo "<td>" . $nomor++ . "</td>";
                                            echo "<td>" . $row['tanggal'] . "</td>";
                                            echo "<td>" . $row['berat'] . "</td>";
                                            echo "<td>" . $row['tinggi'] . "</td>";
                                            echo "<td>" . $row['tensi'] . "</td>";
                                            echo "<td>" . $row['keterangan'] . "</td>";
                                            echo "<td>" . $row['pasien_id'] . "</td>";
                                            echo "<td>" . $row['dokter_id'] . "</td>";
                                            echo "<td><a href='edit_periksa.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>  <a href='hapus_periksa.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>




    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


    <?php
    include_once 'footer.php';
