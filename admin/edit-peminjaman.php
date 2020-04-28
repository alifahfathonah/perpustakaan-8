<?php

    error_reporting(0);

    include '../config/koneksi.php';

    $id_peminjaman  = $_GET['id_peminjaman'];
    $id_buku        = $_GET['id_buku'];

    $edit    = "SELECT * FROM tbl_peminjaman WHERE id_peminjaman = '$id_peminjaman'";
    $hasil   = mysqli_query($konek, $edit)or die(mysql_error());
    $data    = mysqli_fetch_array($hasil);

?>

<div class="col-md-10" style="padding:0px">
    <ol class="breadcrumb" style="margin:0;border-radius:0;">
        <li class="active"><a href="admin.php?content=home-admin">Home</a> / Edit Keterangan Peminjaman</li>
    </ol>
</div>

<div class="col-md-10" style="min-height:500px">
  <h3><b>Edit</b> Keterangan Peminjaman</h3>
    <hr>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <form class="form-horizontal" action="../config/edit-keterangan-peminjaman.php" method="POST">
        <input type="" name="id_peminjaman" value="<?php echo $id_peminjaman ?>">
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Tanggal Peminjaman</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="tgl_peminjaman" type="text" value="<?php echo $data['tgl_peminjaman']; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Tanggal Pengembalian</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="tgl_pengembalian" type="text" value="<?php echo $data['tgl_pengembalian']; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Nomor Induk</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="no_induk" type="text" value="<?php echo $data['no_induk']; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Status Buku</label>
            <label class="col-sm-1">:</label>
         <div class="col-sm-5">
                    <select class="form-control" id="status_buku" name="status_buku" value="<?php echo $data['status_buku']; ?>">
                      <option>Belum Diterima</option>
                      <option>Sudah Diterima</option>
                    </select> 
        </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Judul</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="judul" type="text" value="<?php echo $data['judul']; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Jumlah Buku</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="jml_buku" type="text" value="<?php echo $data['jml_buku']; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-6" align="right">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </form>
</div>