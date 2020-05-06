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

 <body onload="window.print()">
   <div class="panel-group">
      <div class="panel panel-primary">
        <div class="panel-heading"><p align="center"><b>Print Data Anggota</b></p></div>
        <div class="panel-body">
          <table class="table">
            <tr>
            <td><p align="center">
                  <img src="../img/logo.jpeg" height="100"><br>
                    <font size="5px"><b>SMK PATRIOT 2 BEKASI</b></font><br>Jl. Sultan Agung No.28, RT.005/RW.003, Kali Baru, Kecamatan Medan Satria, Kota Bks, Jawa Barat 17132</p><hr></td>
            </tr>
          </table>
 <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Induk</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Agama</th>
          </tr>
        </thead>
       <tbody>
 <?php
          error_reporting(0);

            include '../config/koneksi.php';

            $query = mysqli_query($konek, "SELECT * FROM tbl_siswa WHERE status_siswa='1' ORDER BY id_siswa DESC")or die(mysqli_error($konek));
                    if(mysqli_num_rows($query) == 0){
                      echo '<tr><td colspan="8" align="center"><i>Tidak ada data!</i></td></tr>';
                    }
                      else
                    {
                      $no = 1;
                      while($data = mysqli_fetch_array($query)){
                     echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.$data['no_induk'].'</td>';
                        echo '<td>'.$data['nama_siswa'].'</td>';
                        echo '<td>'.$data['kelas_siswa'].'</td>';
                        echo '<td>'.$data['jurusan'].'</td>';
                        echo '<td>'.$data['agama_siswa'].'</td>';
                        echo '</tr>';
                        $no++;
                      }
                    }
                                ?>
                                        </tbody>
      </table>
    </body>
    </html>