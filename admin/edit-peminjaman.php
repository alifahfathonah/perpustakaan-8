<?php

    error_reporting(0);

    include '../config/koneksi.php';

    $id_pinjam  = $_GET['id_pinjam'];
    $id_buku    = $_GET['id_buku'];

    $edit    = "SELECT * FROM tbl_pinjam WHERE id_pinjam = '$id_pinjam'";
    $hasil   = mysqli_query($konek, $edit)or die(mysql_error());
    $data    = mysqli_fetch_array($hasil);

?>
<div class="main-panel">
<div class="col-md-12" style="padding:0px">
    <ol class="breadcrumb" style="margin:0;border-radius:0;">
        <li class="active"><a href="admin.php?content=home-admin">Home</a> / Edit Keterangan Peminjaman</li>
    </ol>
</div>

<div class="col-md-12" style="min-height:500px">
    <hr>
    <form class="form-horizontal" action="../config/edit-keterangan-peminjaman.php" method="POST">
        <div class="panel-group">
          <div class="panel panel-primary">
            <div class="panel-heading">Edit Data Peminjaman</div>
            <div class="panel-body">
              <table class="table table-bordered">
            <input type="hidden" name="id_pinjam" value="<?php echo $id_pinjam ?>">
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Tanggal Peminjaman</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="tgl_pinjam" type="date" value="<?php echo $data['tgl_pinjam']; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Tanggal Pengembalian</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="tgl_kembali" type="date" value="<?php echo $data['tgl_kembali']; ?>" required>
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
                      <option value="0">Belum Dikembalikan</option>
                      <option value="1">Sudah Dikembalikan</option>
                    </select> 
        </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Judul</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
            <select class="form-control" name="judul" aria-describedby="basic-addon1" required>
                  <?php
                    $buku = "SELECT * FROM tbl_buku";
                    $querybuku = mysqli_query($konek,$buku);
                    while ($buk = mysqli_fetch_array($querybuku)) { ?>
                    <option value="<?php echo $buk['id_buku'] ?>"> <?php echo $buk['judul'] ?>
                    </option>
                    <?php
                    }
                    ?>
                  </select>

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Jumlah Peminjaman</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
              <input type="text" name="jml_pinjam" class="form-control" value="<?php echo $data['jml_pinjam']; ?>" required>
            </div>
        </div>
        </table>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-6" align="right">
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="admin.php?content=data-peminjaman"><button type="button" class="btn btn-default">Kembali</button></a></p>
            </div>
        </div>
        <div>
            
        </div>
    </form>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
