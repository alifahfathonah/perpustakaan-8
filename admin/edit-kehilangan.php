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
                  <td width="800"><input class="form-control" name="no_induk" id="no" type="number" value="<?php echo $data['no_induk']; ?>" readonly required></td>
                </tr>
                <tr>
                  <tr>
                  <th><font size="2px">Nama</font></th>
                  <td width="800"><input class="form-control" id="nama" name="nama_siswa" type="text" value="<?php echo $data['nama_siswa']; ?>" readonly required></td>
                </tr>
                <tr>
                  <th><font size="2px">ISBN</font></th>
                  <td><input class="form-control" name="isbn" type="text" readonly id="kode" value="<?php echo $data['isbn']; ?>" required></td>
                </tr>
                <tr>
                  <th><font size="2px">Judul</font></th>
                  <td><input class="form-control" name="judul" type="text" id="judul" value="<?php echo $data['judul']; ?>" readonly required></td>
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
         </table>
         <p align="right">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="admin.php?content=data-kehilangan"><button type="button" class="btn btn-default">Kembali</button></a></p>
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
<script type="text/javascript">

    $( "#kode" ).change(function() {
      var isbn = $("#kode").val();
      console.log(kode);
      $.ajax({
        url: "./ajax-isbn.php?isbn=" + isbn,
        success: function(result){
            console.log(result);
          $("#judul").val(result);
        }
      });
    });
</script>

<script type="text/javascript">

    $( "#no" ).change(function() {
      var no_induk = $("#no").val();
      console.log(no);
      $.ajax({
        url: "./ajax-no-induk.php?no_induk=" + no_induk,
        success: function(result){
            console.log(result);
          $("#nama").val(result);
        }
      });
    });
</script>




