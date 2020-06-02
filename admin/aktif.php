<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style>
  .table1 {
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #f2f5f7;
  }
 
  .table1 tr th{
    background: #35A9DB;
    color: #fff;
    font-weight: normal;
  }
 
  .table1, th, td {
    padding: 8px 20px;
    text-align: center;
  }
 
  .table1 tr:hover {
    background-color: #f5f5f5;
  }
 
  .table1 tr:nth-child(even) {
    background-color: #f2f2f2;
  }

</style>
<script type="text/javascript">
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>
<div class="main-panel">
<div class="col-md-12" style="padding:0px">
  <ol class="breadcrumb" style="margin:0;border-radius:0;">
    <li class="active"><a href="admin.php?content=home-admin">Home</a> / Data Anggota</li>
  </ol>
</div>
   
<div class="col-md-12" style="min-height:500px">
  <h3><b>Data</b> Anggota</h3>
  <hr>
  <form class="form-inline" action="" method="POST">
    <div class="form-group" style="float: right;">
      <div class="dropdown">
      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Filters
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="admin.php?content=all-anggota">All</a></li>
        <li><a href="admin.php?content=aktif">Aktif</a></li>
        <li><a href="admin.php?content=tidak-aktif">Tidak Aktif</a></li>
      </ul>
        <input size="20px" type="text" name="pencarian" class="form-control" placeholder="Pencarian">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-fw"></i></button>
        <a href=""><button type="button" class="btn btn-warning"><i class="fa fa-refresh fa-fw"></i></button></a>
        <a target ="_blank" role="button" href="print-data-anggota.php"><button type="button" class="btn btn-success"><i class="fa fa-print fa-fw"></i></button></a>
      </div>

    </div>

  </form>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-fw"></i>Tambah Anggota</button>
    <br><br>
    <form class="form-horizontal" method="POST">
      <table class="table1 table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Induk</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Agama</th>
            <th colspan="2"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          error_reporting(0);

            include '../config/koneksi.php';
            $batas  = 8;
            $hal    = @$_GET['hal'];
            if (empty($hal)) {
              $posisi = 0;
              $hal    = 1;
            } else {
              $posisi = ($hal - 1) * $batas;
            }
            if($_SERVER['REQUEST_METHOD'] == "POST") {
              $pencarian = trim(mysqli_real_escape_string($konek, $_POST['pencarian']));
              if ($pencarian != '') {
                $sql = "SELECT * FROM tbl_siswa WHERE status_siswa='1' AND nama_siswa LIKE '%$pencarian%' OR id_siswa LIKE '%$pencarian' OR no_induk LIKE '%$pencarian' OR jurusan LIKE '%$pencarian' OR kelas_siswa LIKE '%$pencarian' OR agama_siswa LIKE '%$pencarian' ORDER BY id_siswa DESC";
                $query = $sql;
                $queryJml = $sql;
              } else {
                $query = "SELECT * FROM tbl_siswa WHERE status_siswa='1' ORDER BY id_siswa DESC LIMIT $posisi, $batas ";
                $queryJml = "SELECT * FROM tbl_siswa WHERE status_siswa='1' ORDER BY id_siswa DESC";
                $no = $posisi + 1;
              }
            } else {
              $query = "SELECT * FROM tbl_siswa WHERE status_siswa='1' ORDER BY id_siswa DESC LIMIT $posisi, $batas ";
              $queryJml = "SELECT * FROM tbl_siswa WHERE status_siswa='1' ORDER BY id_siswa DESC";
              $no = $posisi + 1;
            }
            
            $querydata = mysqli_query($konek, $query)or die(mysqli_error());
                    if(mysqli_num_rows($querydata) == 0){
                      echo '<tr><td colspan="12" align="center">Tidak ada data!</td></tr>';
                    }
                      else
                    {
                      $no = 1;
                      while($data = mysqli_fetch_array($querydata)){
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.$data['no_induk'].'</td>';
                        echo '<td>'.$data['nama_siswa'].'</td>';
                        echo '<td>'.$data['kelas_siswa'].'</td>';
                        echo '<td>'.$data['jurusan'].'</td>';
                        echo '<td>'.$data['agama_siswa'].'</td>';
                        echo '<td  width="20" ><center><a data-toggle="tooltip" data-placement="left" title="Lihat Data Lengkap" href=admin.php?content=edit-anggota&&id_siswa='.$data['id_siswa'].'><i class="fa fa-bars fa-fw"></i></a></center></td>';
                        echo '<td  width="20"><a data-toggle="tooltip" data-placement="left" title="Delete" href=../config/delete-anggota.php?id_siswa='.$data['id_siswa'].'><i class="fa fa-trash fa-fw"></i></a></td>';
                        echo '</tr>';
                        $no++;
                      }
                    }

                ?>
        </tbody>
      </table>
      <?php
     if($_SERVER['REQUEST_METHOD'] == "POST") {
            $pencarian = trim(mysqli_real_escape_string($konek, $_POST['pencarian']));
        echo "<div style=\"float:left;\">";
        $jml = mysqli_num_rows(mysqli_query($konek, $queryJml));
        echo "Data Hasil Pencarian: <b>$jml</b>";
        echo "</div>";
      } else { ?>
        <div style="float:left;">
          <?php
          $jml = mysqli_num_rows(mysqli_query($konek, $queryJml));
          echo "Jumlah Data: <b>$jml</b>";
          ?>
        </div>
        <div style="float:right;">
          <ul class="pagination pagination-sm" style="margin: 0">
            <?php
            $jml_hal = ceil($jml / $batas);
            for ($i=1; $i <= $jml_hal; $i++) {
              if ($i != $hal) {
                echo "<li><a href=\"admin.php?content=data-anggota&&hal=$i\">$i</a></li>";
              } else {
                echo "<li class=\"active\"><a>$i</a></li>";
              }
            }
            ?>
          </ul>
        </div>
        <?php
      }
?>
    </form>
</div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header" style="background-color:#3bacd7";>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p align="center"><font size="2px"><i>Sistem Informasi Perpustakaan SMK Patriot 2 Bekasi</i></font></p>
            <h4 class="modal-title" align="center"><b>Tambahkan Anggota</b></h4>
          </div>
      <div class="modal-body">
          <form action="../config/add-anggota.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-sm-1"></label>
            <label class="col-sm-3">Nomor Induk</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-6">
              <input type="number"  class="form-control" name="no_induk" placeholder="e.g. 888192812" required>
              
            </div>
          </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Nama Lengkap</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="nama_siswa" placeholder="Nama Lengkap" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Kelas</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-6">
            <select class="form-control" id="sel1" name="kelas_siswa">
              <option value="X">X</option>
              <option value="XI">XI</option>
              <option value="XII">XII</option>
            </select>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Jurusan</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-6">
            <select class="form-control" id="sel1" name="jurusan">
              <option value="Otomatisasi Tata Kelola Perkantoran">Otomatisasi Tata Kelola Perkantoran</option>
              <option value="Bisnis Daring dan Pemasaran">Bisnis Daring dan Pemasaran</option>
            </select>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Agama</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-6">
              <select class="form-control" id="sel1" name="agama_siswa">
              <option value="Islam">Islam</option>
              <option value="Kristen Protestan">Kristen Protestan</option>
              <option value="Katolik">Katolik</option>
              <option value="Hindu">Hindu</option>
              <option value="Buddha">Buddha</option>
              <option value="Kong Hu Cu"> Kong Hu Cu</option>
            </select>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Alamat</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-6">
            <textarea class="form-control" rows="5" id="comment" Placeholder="Alamat" name="alamat_siswa" required></textarea>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Jenis Kelamin</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-6">
             <input type="radio" class="form-check-input" name="jk_siswa"  value="Laki-Laki" >Laki-Laki
              <input type="radio" class="form-check-input" name="jk_siswa"  value="Perempuan">Perempuan
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">No Handphone</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-6">
            <input type="number" class="form-control" name="hp_siswa" placeholder="No Handphone"  required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Email</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-6">
            <input type="email" class="form-control" name="email_siswa" placeholder="e.g tuti12@gmail.com" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Gambar</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-6">
            <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Tahun Masuk</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-6">
            <input type="number" class="form-control" name="tahun_masuk" placeholder="Tahun Masuk"  required>
            <input type="hidden" name="status_siswa" value="1">
          </div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-5"></label>
         <div class="col-sm-6" align="right">
           <button type="submit" class="btn btn-primary">Simpan</button></a></p>
          </div>
      </div>
    </form>
    </div>
          <div class="modal-footer">
            
          </div>
    </div>
    </div>
  </div>
<!-- <script>
  var notelepon=document.getElementById('notelepon').value; 
if (notelepon.length!=12) {
alert("no telepon harus 12 karakter");
return false;
}
</script> -->




    