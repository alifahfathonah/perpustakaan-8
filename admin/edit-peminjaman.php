<?php

    error_reporting(0);

    include '../config/koneksi.php';

    $id_pinjam  = $_GET['id_pinjam'];

    $edit    = "SELECT * FROM tbl_pinjam WHERE id_pinjam = '$id_pinjam'";
    $hasil   = mysqli_query($konek, $edit)or die(mysql_error());
    $data    = mysqli_fetch_array($hasil);

?>
<div class="main-panel">
<div class="col-md-12" style="padding:0px">
    <ol class="breadcrumb" style="margin:0;border-radius:0;">
        <li class="active"><a href="admin.php?content=home-admin">Home</a> / Rubah Status Peminjaman</li>
    </ol>
</div>

<div class="col-md-12" style="min-height:500px">
    <hr>
    <form class="form-horizontal" action="../config/edit-keterangan-peminjaman.php" method="POST">
        <div class="panel-group">
          <div class="panel panel-primary">
            <div class="panel-heading">Rubah Status Peminjaman</div>
            <div class="panel-body">
              <table class="table table-bordered">
            <input type="hidden" name="id_pinjam" value="<?php echo $id_pinjam ?>">
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Tanggal Peminjaman</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="tgl_pinjam" type="date" value="<?php echo $data['tgl_pinjam']; ?>" readonly required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Tanggal Pengembalian</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="tgl_kembali" type="date" value="<?php echo $data['tgl_kembali']; ?>" readonly required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Nomor Induk</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="no_induk" type="text" value="<?php echo $data['no_induk']; ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Nama</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                  <input type="text" name="nama_siswa" id="nama" class="form-control" value="<?php echo $data['nama_siswa']; ?>" readonly>

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">ISBN</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                  <input type="text" name="isbn" class="form-control" value="<?php echo $data['isbn']; ?>" readonly>

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Judul</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                  <input type="text" name="judul" class="form-control" id="judul" value="<?php echo $data['judul']; ?>" readonly>

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
        <!-- <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Jumlah Peminjaman</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
              <input type="text" name="jml_pinjam" class="form-control" value="<?php echo $data['jml_pinjam']; ?>" readonly  required>
            </div>
        </div> -->
        </table>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-6" align="right">
                <button type="submit" class="btn btn-primary">Simpan</button>
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
