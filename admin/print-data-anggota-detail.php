 <!DOCTYPE html>
<html>
<head>
  <title>Print Data Anggota</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="layout.css">
  <script src="../bootstrap/jquery-3.2.1.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>

<?php

  error_reporting(0);

  include '../config/koneksi.php';

  $id_siswa = $_GET['id_siswa'];

  $edit    = "SELECT * FROM tbl_siswa WHERE id_siswa = '$id_siswa'";
  $hasil   = mysqli_query($konek, $edit)or die(mysql_error());
  $data    = mysqli_fetch_array($hasil);

?>
           <body onload="window.print()">
            <form class="form-horizontal" action="#" method="POST">
           <!--  <input type="hidden" name="id_siswa" value="<?php echo $id_siswa?>"> -->
            <div class="panel-group">
            <div class="panel panel-primary">
              <div class="panel-body">
                <table class="table">
                  <tr>
                  <th><br><p align="center"><img src="../img/logo.jpeg" height="100"></p></th>
                  <td><br><p align="center">
                          <font size="6px"><b>SMK PATRIOT 2 BEKASI</b></font><br>Jl. Sultan Agung No.28, RT.005/RW.003, Kali Baru, Kecamatan Medan Satria, Kota Bks, Jawa Barat 17132</p></td>
                  </tr>
                </table>
            
            <table class="table table-bordered">  
              <tr>
                <input type="hidden" name="id_siswa" value="<?php echo $id_siswa?>">
                <th><font size="3px">Nomor Induk</font></th>
                <td width="500"><i><font size="3px"><?php echo $data['no_induk'];?></font></i></td>
              </tr>
              <tr>
                <th><font size="3px">Nama Lengkap</font></th>
                <td width="500"><i><font size="3px"><?php echo $data['nama_siswa'];?></font></i></td>
              </tr>
              <tr>
                <th><font size="3px">Kelas</font></th>
                <td width="500"><i><font size="3px"><?php echo $data['kelas_siswa'];?></font></i></td>
              </tr>
              <tr>
                <th><font size="3px">Jurusan</font></th>
                <td width="500"><i><font size="3px"><?php echo $data['jurusan'];?></font></i></td>
              </tr>
              <tr>
                <th><font size="3px">Alamat </font></th>
                <td width="500"><i><font size="3px"><?php echo $data['alamat_siswa'];?></font></i></td>
              </tr>
              <tr>
                <th><font size="3px">No Handphone</font></th>
                <td width="500"><i><font size="3px"><?php echo $data['hp_siswa'];?></font></i></td>
              </tr>
              <tr>
                <th><font size="3px">Tahun Masuk</font></th>
                <td width="500"><i><font size="3px"><?php echo $data['tahun_masuk'];?></font></i></td>
              </tr>
          </table>
        </div>
      </div>
    </div>
  </form>
</body>
</html>

