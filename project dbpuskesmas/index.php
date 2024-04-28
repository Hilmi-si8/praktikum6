<?php
require_once 'header.php';
require_once 'sidebar.php';


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengisian data diri</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
        <div class="container mt-2">
        <h2 class="text-center"></h2>
        <form action="proses_pasien.php" method="POST">
            <div class="form-group row mt-3 ">
                <label for="kode" class="col-4 col-form-label">Kode</label>
                <div class="col-8">
                    <input required id="kode" name="kode" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama</label>
                <div class="col-8">
                <input required id="nama" name="nama" type="text" class="form-control" values="">
                </div>
            </div>
            <div class="form-group row">
                <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                <div class="col-8">
                    <input required id="tmp_lahir" name="tmp_lahir" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                <div class="col-8">
                    <input required id="tgl_lahir" name="tgl_lahir" type="date" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
                <div class="col-8">
                    <select id="gender" name="gender" class="custom-select">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input required id="email" name="email" type="email" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-4 col-form-label">Alamat</label>
                <div class="col-8">
                    <input required id="alamat" name="alamat" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="kelurahan_id" class="col-4 col-form-label">Kelurahan ID</label>
                <div class="col-8">
                    <input required id="kelurahan_id" name="kelurahan_id" type="text" class="form-control">
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once 'footer.php';
?>