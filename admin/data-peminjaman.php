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
    <li class="active"><a href="admin.php?content=home-admin">Home</a> / Data Peminjaman</li>
  </ol>
</div>
   
<div class="col-md-12" style="min-height:500px">
  <h3><b>Data</b> Peminjaman</h3>
  <hr>
  <form class="form-inline" action="" method="POST">
    <div class="form-group" style="float: right;">
      <input size="34px" type="text" name="pencarian" class="form-control" placeholder="Pencarian">
      <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-fw"></i></button>
      <a href=""><button type="button" class="btn btn-warning"><i class="fa fa-refresh fa-fw"></i></button></a>
    </div>
  </form>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-fw"></i>Tambah Peminjaman</button>
    <br><br>
    <form class="form-horizontal" method="POST">
      <table class="table1 table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Nomor Induk</th>
            <th>Status Buku</th>
            <th>Judul</th>
            <th>Jumlah Buku</th>
            <th colspan="2"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
           <?php

           error_reporting(0);

            include '../config/koneksi.php';

            $batas  = 10;
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
                $sql = "SELECT DISTINCT tbl_peminjaman.id_peminjaman, tbl_peminjaman.tgl_peminjaman, tbl_peminjaman.tgl_pengembalian, tbl_peminjaman.no_induk, tbl_peminjaman.status_buku, tbl_buku.judul, tbl_buku.jml_buku FROM tbl_peminjaman, tbl_buku WHERE tbl_buku.id_buku=tbl_peminjaman.id_buku AND tbl_peminjaman.id_buku LIKE '%$pencarian%'";
                $query = $sql; 
                $queryJml = $sql;
              } else {
                $query = "SELECT DISTINCT tbl_peminjaman.id_peminjaman, tbl_peminjaman.tgl_peminjaman, tbl_peminjaman.tgl_pengembalian, tbl_peminjaman.no_induk, tbl_peminjaman.status_buku, tbl_buku.judul, tbl_buku.jml_buku FROM tbl_peminjaman, tbl_buku LIMIT $posisi, $batas ";
                $queryJml = "SELECT DISTINCT tbl_peminjaman.id_peminjaman, tbl_peminjaman.tgl_peminjaman, tbl_peminjaman.tgl_pengembalian, tbl_peminjaman.no_induk, tbl_peminjaman.status_buku, tbl_buku.judul, tbl_buku.jml_buku FROM tbl_peminjaman, tbl_buku WHERE tbl_buku.id_buku=tbl_peminjaman.id_buku";
                $no = $posisi + 1;
              }
            } else {
              $query ="SELECT DISTINCT tbl_peminjaman.id_peminjaman, tbl_peminjaman.tgl_peminjaman, tbl_peminjaman.tgl_pengembalian, tbl_peminjaman.no_induk, tbl_peminjaman.status_buku, tbl_buku.judul, tbl_buku.jml_buku FROM tbl_peminjaman, tbl_buku WHERE tbl_buku.id_buku=tbl_peminjaman.id_buku LIMIT $posisi, $batas ";
              $queryJml = "SELECT DISTINCT tbl_peminjaman.id_peminjaman, tbl_peminjaman.tgl_peminjaman, tbl_peminjaman.tgl_pengembalian, tbl_peminjaman.no_induk, tbl_peminjaman.status_buku, tbl_buku.judul, tbl_buku.jml_buku FROM tbl_peminjaman, tbl_buku WHERE tbl_buku.id_buku=tbl_peminjaman.id_buku";
              $no = $posisi + 1;
            }
            $baru = "SELECT a.* , b.* from tbl_peminjaman a LEFT JOIN tbl_buku b on a.id_buku = b.id_buku" ;
            $querydata = mysqli_query($konek, $baru)or die(mysqli_error());
                    if(mysqli_num_rows($querydata) == 0){
                      echo '<tr><td colspan="8" align="center">Tidak ada data!</td></tr>';
                    }
                      else
                    {
                      $no = 1;
                      while($data = mysqli_fetch_array($querydata)){ 
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.$data['tgl_peminjaman'].'</td>';
                        echo '<td>'.$data['tgl_pengembalian'].'</td>';
                        echo '<td>'.$data['no_induk'].'</td>';
                        // if ($data['status_buku'] == 1){
                        //   $status = "Sudah Diterima"
                        // } else { $status = "Belum Diterima"};
                        echo '<td>'.$data['status_buku'].'</td>';
                        echo '<td>'.$data['judul'].'</td>';
                        echo '<td>'.$data['jml_buku'].'</td>';
                        echo '<td  width="20"><a data-toggle="tooltip" data-placement="right" title="Edit Keterangan" href=admin.php?content=edit-peminjaman&&id_peminjaman='.$data['id_peminjaman'].'&&id_buku='.$data['id_buku'].'><i class="fa fa-edit fa-fw"></i></a></td>';
                        echo '<td  width="20"><a data-toggle="tooltip" data-placement="left" title="Delete" href=../config/delete-peminjaman.php?id_peminjaman='.$data['id_peminjaman'].'><i class="fa fa-trash fa-fw"></i></a></td>';
                        echo '</tr>';
                        $no++;
                      }
                    }

                ?>

        </tbody>
      </table>
         <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
    </form>
</div>
</div>
<!-- 
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">


      <div class="modal-content">
          <div class="modal-header" style="background-color:#3bacd6";>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p align="center"><font size="2px"><i>Sistem Informasi Perpustakaan SMK Patriot 2 Bekasi</i></font></p>
            <h4 class="modal-title" align="center"><b>Tambahkan Peminjaman</b></h4>
          </div>
      <div class="modal-body">
          <form action="../config/add-peminjaman.php" class="form-horizontal" method="POST">
          <div class="form-group">
            <label class="col-sm-1"></label>
            <label class="col-sm-4">Tanggal Peminjaman</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
              <input type="date" class="form-control" name="tgl_peminjaman" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1"></label>
            <label class="col-sm-4">Tanggal Pengembalian</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
              <input type="date" class="form-control" name="tgl_pengembalian" required>
            </div>
          </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-4">Nomor Induk</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="no_induk" placeholder="e.g. 888192812" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-4">Status Buku</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <select class="form-control" id="status_buku" name="status_buku">
                      <option>Belum Diterima</option>
                      <option>Sudah Diterima</option>
            </select> istilah 1 atau 0 itu sama
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-4">Judul Buku</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="judul" placeholder="Judul" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-4">Jumlah Buku</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="jml_buku" placeholder="Jumlah Buku" required>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-4"></label>
          <div class="col-sm-6" align="right">
            <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
    </form>
    </div>
          <div class="modal-footer">
            
          </div>
    </div>
    </div>
  </div>
 -->
 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header" style="background-color:#3bacd6";>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p align="center"><font size="2px"><i>Sistem Informasi Perpustakaan SMK Patriot 2 Bekasi</i></font></p>
            <h4 class="modal-title" align="center"><b>Tambahkan Peminjaman</b></h4>
          </div>
      <div class="modal-body">
          <form action="../config/add-peminjaman.php" class="form-horizontal" method="POST">
          
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-4">Nomor Induk</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
          <select class="form-control" name="no_induk" aria-describedby="basic-addon1" required>
                    <?php
                    $sis = "SELECT * FROM tbl_siswa";
                    $querysis = mysqli_query($konek,$sis);
                    while ($dtsiswa = mysqli_fetch_array($querysis)) { ?>
                    <option value="<?php echo $dtsiswa['no_induk'] ?>"> <?php echo $dtsiswa['no_induk'] ?>
                    </option>
                    <?php
                    }
                    ?>
                  </select>
                  
            </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-4">Judul Buku</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <select class="form-control" name="judul" aria-describedby="basic-addon1" required>
                    <?php
                    $buk = "SELECT * FROM tbl_buku";
                    $querybuk = mysqli_query($konek,$buk);
                    while ($bk = mysqli_fetch_array($querybuk)) { ?>
                    <option value="<?php echo $bk['id_buku'] ?>"> <?php echo $bk['judul'] ?>
                    </option>
                    <?php
                    }
                    ?>
                  </select>
                  
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-4"></label>
          <div class="col-sm-6" align="right">
            <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
    </form>
    </div>
          <div class="modal-footer">
            
          </div>
    </div>
    </div>


    