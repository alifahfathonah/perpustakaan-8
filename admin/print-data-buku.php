 <!DOCTYPE html>
<html>
<head>
  <title>Print Data Buku</title>
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
        <div class="panel-heading"><p align="center"><b>Print Data Buku</b></p></div>
        <div class="panel-body">
          <table class="table">
            <tr>
            <td><p align="center">
                  <img src="../img/logo.jpeg" height="100"><br>
                    <font size="5px"><b>SMK PATRIOT 2 BEKASI</b></font><br>Jl. Sultan Agung No.28, RT.005/RW.003, Kali Baru, Kecamatan Medan Satria, Kota Bks, Jawa Barat 17132</p><hr></td>
            </tr>
          </table>
          <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Nama Penerbit</th>
                    <th>Pengarang</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Buku</th>
                  </tr>
                </thead>
                <tbody>
                    <?php

                        include '../config/koneksi.php';

                        
                        $query = mysqli_query($konek, "SELECT DISTINCT * FROM tbl_buku ")or die(mysqli_error($konek));

                                if(mysqli_num_rows($query) == 0){
                                  echo '<tr><td colspan="6" align="center">Tidak ada data!</td></tr>';
                                }
                                  else
                                {
                                  $no = 1;
                                  while($data = mysqli_fetch_array($query)){
                                        echo '<tr>';
                                        echo '<td>'.$no.'</td>';
                                        echo '<td>'.$data['judul'].'</td>';
                                        echo '<td>'.$data['nama_penerbit'].'</td>';
                                        echo '<td>'.$data['pengarang'].'</td>';
                                        echo '<td>'.$data['tahun_terbit'].'</td>';
                                        echo '<td>'.$data['jml_buku'].'</td>';
                                    $no++;
                                  }
                                }

                            ?>
                </tbody>
      </table>
    </body>