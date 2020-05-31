<?php

    error_reporting(0);

    include '../config/koneksi.php';

    $id_hilang    = $_GET['id_hilang'];

    $edit    = "SELECT * FROM tbl_hilang where id_hilang='$id_hilang'";
    $hasil   = mysqli_query($konek, $edit)or die(mysql_error());
    $data    = mysqli_fetch_array($hasil);

?>
<div class="main-panel">
<div class="col-md-12" style="padding:0px">
    <ol class="breadcrumb" style="margin:0;border-radius:0;">
        <li class="active"><a href="admin.php?content=home-admin">Home</a> / Edit Keterangan Kehilangan</li>
    </ol>
</div>

<div class="col-md-12" style="min-height:500px">
    <hr>
    <form class="form-horizontal" action="../config/edit-keterangan-kehilangan.php" method="POST">
        <div class="panel-group">
          <div class="panel panel-primary">
            <div class="panel-heading">Edit Data Kehilangan</div>
            <div class="panel-body">
              <table class="table table-bordered">
            <input type="hidden" name="id_hilang" value="<?php echo $id_hilang ?>">
                <tr>
                  <tr>
                  <th><font size="2px">NIS</font></th>
                  <td width="800"><input class="form-control" name="no_induk" type="number" value="<?php echo $data['no_induk']; ?>" required></td>
                </tr>
                <tr>
                  <tr>
                  <th><font size="2px">Nama</font></th>
                  <td width="800"><input class="form-control" name="nama_siswa" type="text" value="<?php echo $data['nama_siswa']; ?>" readonly required></td>
                </tr>
                <tr>
                  <th><font size="2px">Kode Buku</font></th>
                  <td><input class="form-control" name="kode_buku" type="text" value="<?php echo $data['kode_buku']; ?>" required></td>
                </tr>
                <tr>
                  <th><font size="2px">Judul</font></th>
                  <td><input class="form-control" name="judul" type="text" value="<?php echo $data['judul']; ?>" readonly required></td>
                </tr>
                <tr>
                  <th><font size="2px">Status Fotocopy</font></th>
                  <td> 
                    <select class="form-control" id="status_fc" name="status_fc" value="<?php echo $data['status_fc']; ?>">
                      <option value="0">Belum Fotocopy</option>
                      <option value="1">Sudah Fotocopy</option>
                    </select>
                    </td>
                </tr>
                <tr>
                  <th><font size="2px">Tanggal Hilang</font></th>
                  <td><input class="form-control" name="tgl_hilang" type="date" value="<?php echo $data['tgl_hilang']; ?>" readonly required></td>
                </tr>
                <tr>
                  <th><font size="2px">Tanggal Fotocopy</font></th>
                  <td><input class="form-control" name="tgl_fc" type="date" value="<?php echo $data['tgl_fc']; ?>"  required></td>
                </tr>
                <tr>
                  <th><font size="2px">Masa Berlaku</font></th>
                  <td><input class="form-control" name="masa_berlaku" type="date" value="<?php echo $data['masa_berlaku']; ?>"  required></td>
                </tr>
                <tr>
                  <th><font size="2px">Keterangan</font></th>
                  <td><font size="2px"><?php if ($data['keterangan']==0) echo "Belum dikonfirmasi <i class='fa fa-times fa-fw'></i>"; else echo "Sudah dikonfirmasi <i class='fa fa-check fa-fw'></i>"; ?></td></i>
                </tr>
       <!--  <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">NIS</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="no_induk" type="number" value="<?php echo $data['no_induk']; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Nama Siswa</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="nama_siswa" type="text" value="<?php echo $data['nama_siswa']; ?>" readonly required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Kode Buku</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                  <input type="text" name="kode_buku" class="form-control" value="<?php echo $data['kode_buku']; ?>" required>

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Judul</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                  <input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" readonly required>

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Status Fotocopy</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                    <select class="form-control" id="status_fc" name="status_fc" value="<?php echo $data['status_fc']; ?>">
                      <option value="0">Belum Fotocopy</option>
                      <option value="1">Sudah Fotocopy</option>
                    </select> 
                </div>
            </div>
        </div> 
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Tanggal Hilang</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                <input class="form-control" name="tgl_hilang" type="date" value="<?php echo $data['tgl_hilang']; ?>" readonly required> 
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Tanggal Fotocopy</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                  <input class="form-control" name="tgl_fc" type="date" value="<?php echo $data['tgl_fc']; ?>" required>  
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Masa Berlaku</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
                  <input class="form-control" name="masa_berlaku" type="date" value="<?php echo $data['masa_berlaku']; ?>" required>  
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">keterangan</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">

                <td ><font size="2px"><?php if ($data['keterangan']==0) echo "Belum dikonfirmasi <i class='fa fa-times fa-fw'></i>"; else echo "Sudah dikonfirmasi <i class='fa fa-check fa-fw'></i>"; ?></td></i>     
       
            </div>
        </div> -->
         </table>
         <p align="right">
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="admin.php?content=data-kehilangan"><button type="button" class="btn btn-default">Kembali</button></a></p>
        <!-- <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-6" align="right">
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="admin.php?content=data-kehilangan"> <button type="button" class="btn btn-default">Kembali</button></a></p>
            </div>
        </div> -->
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
