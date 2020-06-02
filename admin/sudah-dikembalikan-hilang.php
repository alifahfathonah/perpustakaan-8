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
<div class="main-panel">
<div class="col-md-12" style="padding:0px">
  <ol class="breadcrumb" style="margin:0;border-radius:0;">
    <li class="active"><a href="admin.php?content=home-admin">Home</a> / Data Kehilangan</li>
  </ol>
</div>
   
<div class="col-md-12" style="min-height:500px">
  <h3><b>Data</b> Kehilangan</h3>
  <hr>
  <form class="form-inline" action="" method="POST">
    <div class="form-group" style="float: right;">
       <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Filters
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="admin.php?content=all-hilang">All</a></li>
            <li><a href="admin.php?content=belum-dikembalikan-hilang">Belum Dikembalikan</a></li>
            <li><a href="admin.php?content=sudah-dikembalikan-hilang">Sudah Dikembalikan</a></li>
          </ul>
      <input size="34px" type="text" name="pencarian" class="form-control" placeholder="Pencarian">
      <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-fw"></i></button>
      <a href=""><button type="button" class="btn btn-warning"><i class="fa fa-refresh fa-fw"></i></button></a>
    </div>
    
    </div>
  </form>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-fw"></i>Tambah Kehilangan</button>
    <br><br>
    <form class="form-horizontal" method="POST">
      <table class="table1 table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama </th>
            <th>ISBN</th>
            <th>Judul</th>
            <th>Tanggal Hilang</th>
            <th>Masa Berlaku</th>
            <th>Tanggal Fotocopy</th>
            <th>Keterangan</th>
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
                $sql = "SELECT * FROM tbl_hilang WHERE status_fc='1' AND no_induk LIKE '%$pencarian%' ORDER BY id_hilang DESC";
                $query = $sql;
                $queryJml = $sql;
              } else {
                $query = "SELECT * FROM tbl_hilang WHERE status_fc='1' ORDER BY id_hilang DESC LIMIT $posisi, $batas ";
                $queryJml = "SELECT * FROM tbl_hilang WHERE status_fc='1' ORDER BY id_hilang DESC";
                $no = $posisi + 1;
              }
            } else {
              $query = "SELECT * FROM tbl_hilang WHERE status_fc='1' ORDER BY id_hilang DESC LIMIT $posisi, $batas ";
              $queryJml = "SELECT * FROM tbl_hilang WHERE status_fc='1' ORDER BY id_hilang DESC";
              $no = $posisi + 1;
            }
            
            $querydata = mysqli_query($konek, $query)or die(mysqli_error());
                    if(mysqli_num_rows($querydata) == 0){
                      echo '<tr><td colspan="10" align="center">Tidak ada data!</td></tr>';
                    }
                      else
                    {
                      $no = 1;
                      while($data = mysqli_fetch_array($querydata)){
                      ?>
                        <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['no_induk'] ?></td>
                        <td><?php echo $data['nama_siswa'] ?></td>
                        <td><?php echo $data['isbn'] ?></td>
                        <td><?php echo $data['judul'] ?></td>
                        <td><?php echo($data['tgl_hilang']);?></td>
                        <td><?php echo($data['masa_berlaku']);?></td>
                        <td><?php echo($data['tgl_fc']);?></td>
                        <td><a data-toggle="tooltip" data-placement="right" title="Belum Dikembalikan"> <?php if ($data['keterangan']==0) echo "<i class='fa fa-times fa-fw'></i>"; else echo "<i class='fa fa-check fa-fw'></i>"; ?></td></a>
                        <td><a data-toggle="tooltip" data-placement="right" title="Edit Keterangan" href=admin.php?content=edit-kehilangan&&id_hilang=<?php echo $data['id_hilang'] ?>><i class='fa fa-edit fa-fw'></i></a></td>
                        <td width="20"><a data-toggle="tooltip" data-placement="left" title="Delete" href=../config/delete-kehilangan.php?id_hilang=<?php echo$data['id_hilang']?>><i class='fa fa-trash fa-fw'></i></a></td></tr>

                         <?php
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
                echo "<li><a href=\"admin.php?content=data-kehilangan&&hal=$i\">$i</a></li>";
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
            <h4 class="modal-title" align="center"><b>Tambahkan Kehilangan</b></h4>
          </div>
      <div class="modal-body">
          <form action="../config/add-kehilangan.php" class="form-horizontal" method="POST">
          <div class="form-group">
            <label class="col-sm-1"></label>
            <label class="col-sm-3">NIS</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-6">
              <input type="number" class="form-control" name="no_induk" id="no" placeholder="e.g. 888192812" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1"></label>
            <label class="col-sm-3">Nama</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-6">
              <input type="text"  class="form-control" name="nama_siswa" placeholder="Nama Siswa" readonly  id="nama"  required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1"></label>
            <label class="col-sm-3">ISBN</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-6">
              <input type="text"  class="form-control" name="isbn" placeholder="Kode Buku"  id="kode"  required>       
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1"></label>
            <label class="col-sm-3">Judul</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul"  value="" readonly="" required> 
              <input type="hidden" name="status_fc" value="0">
              <input type="hidden" name="keterangan" value=""><a data-toggle="tooltip" data-placement="left" title="Belum Dikembalikan"></a>
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

 <script type="text/javascript">

    $( "#kode" ).change(function() {
      var isbn = $("#kode").val();
      console.log(kode);
      $.ajax({
        url: "./ajax-kode-buku.php?isbn=" + isbn,
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



    