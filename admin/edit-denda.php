<?php

    error_reporting(0);

    include '../config/koneksi.php';

    $id_denda    = $_GET['id_denda'];
    $id_pinjam   = $_GET['id_pinjam'];

    $edit    = "SELECT * FROM tbl_dendaa, tbl_pinjam where tbl_dendaa.id_pinjam=tbl_pinjam.id_pinjam order by id_denda desc";
    $hasil   = mysqli_query($konek, $edit)or die(mysql_error());
    $data    = mysqli_fetch_array($hasil);

?>
<div class="main-panel">
<div class="col-md-12" style="padding:0px">
    <ol class="breadcrumb" style="margin:0;border-radius:0;">
        <li class="active"><a href="admin.php?content=home-admin">Home</a> / Edit Keterangan Denda</li>
    </ol>
</div>

<div class="col-md-12" style="min-height:500px">
    <hr>
    <form class="form-horizontal" action="../config/edit-keterangan-denda.php" method="POST">
        <div class="panel-group">
          <div class="panel panel-primary">
            <div class="panel-heading">Edit Data Denda</div>
            <div class="panel-body">
              <table class="table table-bordered">
            <input type="hidden" name="id_denda" value="<?php echo $id_denda ?>">
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Nomor Induk</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="no_induk" type="text" value="<?php echo $data['no_induk']; ?>" readonly required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Jumlah Denda</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="jml_denda" type="text" value="Rp. <?php echo $data['jml_denda']; ?>" required>
            </div>
        </div> 
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Tanggal Pinjam</label>
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
            <label class="col-sm-2">Status Denda</label>
            <label class="col-sm-1">:</label>
         <div class="col-sm-5">
                    <select class="form-control" id="status_denda" name="status_denda" value="<?php echo $data['status_denda']; ?>" >
                      <option value="0">Belum Lunas</option>
                      <option value="1">Sudah Lunas</option>
                    </select> 
        </div>
        </div>
         </table>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-6" align="right">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="admin.php?content=data-denda"><button type="button" class="btn btn-default">Kembali</button></a></p>
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
