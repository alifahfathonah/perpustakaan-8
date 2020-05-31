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
    <li class="active"><a href="admin.php?content=home-admin">Home</a> / Data Buku</li>
  </ol>
</div>
   
<div class="col-md-12" style="min-height:500px">
  <h3><b>Data</b> Buku</h3>
  <hr>
  <form class="form-inline" action="" method="POST">
    <div class="form-group" style="float: right;">
      <input size="34px" type="text" name="pencarian" class="form-control" placeholder="Pencarian">
      <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-fw"></i></button>
      <a href=""><button type="button" class="btn btn-warning"><i class="fa fa-refresh fa-fw"></i></button></a>
      <a target ="_blank" role="button" href="print-data-buku.php"><button type="button" class="btn btn-success"><i class="fa fa-print fa-fw"></i></button></a>
    </div>
  </form>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-fw"></i>Tambah Buku</button>
    <br><br>
    <form class="form-horizontal" method="POST">
      <table class="table1 table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Nama Penerbit</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Gambar</th>
            <th>Jumlah Buku</th>
            <!-- <th>Sisa Buku</th> -->
            <th colspan="2"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          <?php

          include '../config/koneksi.php';
                       error_reporting(0);

                       $batas  = 6;
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
                           $sql = "SELECT * FROM tbl_buku WHERE id_buku AND judul LIKE '%$pencarian%' OR nama_penerbit LIKE '%$pencarian%' OR pengarang LIKE '%$pencarian%' OR tahun_terbit LIKE '%$pencarian%' OR gambar LIKE '%$pencarian%' OR kode_buku LIKE '%$pencarian%' ORDER BY id_buku DESC";

                              $query = $sql;
                              $queryJml = $sql;
                            } else {
                              $query = "SELECT * FROM tbl_buku ORDER BY id_buku DESC LIMIT $posisi, $batas ";
                              $queryJml = "SELECT * FROM tbl_buku ORDER BY id_buku DESC";
                              $no = $posisi + 1;
                            }
                          } else {
                            $query = "SELECT * FROM tbl_buku ORDER BY id_buku DESC LIMIT $posisi, $batas ";
                            $queryJml = "SELECT * FROM tbl_buku ORDER BY id_buku DESC";
                            $no = $posisi + 1;
                          }
                            $querydata = mysqli_query($konek, $query)or die(mysqli_error());
                                    if(mysqli_num_rows($querydata) == 0){ 
                                      echo '<tr><td colspan="9" align="center">Tidak ada data!</td></tr>';    
                                    }
                                      else
                                    { 
                                      $no = 1;        
                                      while($data = mysqli_fetch_array($querydata)){  
                                        echo '<tr>';
                                        echo '<td>'.$no.'</td>';
                                        echo '<td>'.$data['kode_buku'].'</td>';
                                        echo '<td>'.$data['judul'].'</td>';
                                        echo '<td>'.$data['nama_penerbit'].'</td>';
                                        echo '<td>'.$data['pengarang'].'</td>';
                                        echo '<td>'.$data['tahun_terbit'].'</td>';
                                        echo '<td>'.$data['gambar'].'</td>';
                                        echo '<td>'.$data['jml_buku'].'</td>';


                                        // echo '<td>'.$data['sisa_buku'].'</td>';
                                        echo '<td  width="20"><a data-toggle="tooltip" data-placement="left" title="Edit" href=admin.php?content=edit-buku&&id_buku='.$data['id_buku'].'><i class="fa fa-edit fa-fw"></i></a></td>';
                                        echo '<td  width="20"><a data-toggle="tooltip" data-placement="left" title="Delete" href=../config/delete-buku.php?id_buku='.$data['id_buku'].'><i class="fa fa-trash fa-fw"></i></a></td>';
                                        echo '</tr>';
                                        $no++;  
                                      }
                                    }
                              
                ?>
        </tbody>
      </table>
      <br>
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
                echo "<li><a href=\"admin.php?content=data-buku&&hal=$i\">$i</a></li>";
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
          <div class="modal-header" style="background-color:#3bacd6";>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p align="center"><font size="2px"><i>Sistem Informasi Perpustakaan SMK Patriot 2 Bekasi</i></font></p>
            <h4 class="modal-title" align="center"><b>Tambahkan Buku</b></h4>
          </div>
      <div class="modal-body" >
          <form action="../config/add-buku.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-sm-1"></label>
            <label class="col-sm-3">Kode Buku</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="kode_buku" placeholder="Kode Buku" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1"></label>
            <label class="col-sm-3">Judul</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="judul" placeholder="Judul" required>
            </div>
          </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Nama Penerbit</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="nama_penerbit" placeholder="Nama Penerbit" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Pengarang</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="pengarang" placeholder="Pengarang" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Tahun Terbit</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="number" class="form-control" name="tahun_terbit" placeholder="Tahun Terbit" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Gambar</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
             <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Jumlah Buku</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="number" class="form-control" name="jml_buku" placeholder="Jumlah Buku" required>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-4"></label>
          <div class="col-sm-6" align="right">
            <button class="btn btn-primary">Simpan</button>
          </div>
      </div>
    </form>
    </div>
          <div class="modal-footer">
            
          </div>
    </div>
    </div>
  </div>




    