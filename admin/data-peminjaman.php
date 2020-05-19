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
                $sql = "SELECT DISTINCT tbl_pinjam.id_pinjam, tbl_pinjam.tgl_pinjam, tbl_pinjam.tgl_kembali, tbl_pinjam.no_induk, tbl_pinjam.status_buku,tbl_pinjam.jml_pinjam,  tbl_buku.judul FROM tbl_pinjam, tbl_buku WHERE tbl_buku.id_buku=tbl_pinjam.id_buku AND tbl_pinjam.id_buku AND status_buku='0' AND no_induk LIKE '%$pencarian%' OR judul LIKE '%$pencarian%'";
                $query = $sql; 
                $queryJml = $sql;
              } else {
                $query = "SELECT DISTINCT tbl_pinjam.id_pinjam, tbl_pinjam.tgl_pinjam, tbl_pinjam.tgl_kembali, tbl_pinjam.no_induk, tbl_pinjam.status_buku,tbl_pinjam.jml_pinjam tbl_buku.judul FROM tbl_pinjam, tbl_buku WHERE  status_buku='0' LIMIT $posisi, $batas ";
                $queryJml = "SELECT DISTINCT tbl_pinjam.id_pinjam, tbl_pinjam.tgl_pinjam, tbl_pinjam.tgl_kembali, tbl_pinjam.no_induk, tbl_pinjam.status_buku, tbl_pinjam.jml_pinjam, tbl_buku.judul FROM tbl_pinjam, tbl_buku WHERE tbl_buku.id_buku=tbl_pinjam.id_buku AND  status_buku='0'";
                $no = $posisi + 1;
              }
            } else {
              $query ="SELECT DISTINCT tbl_pinjam.id_pinjam, tbl_pinjam.tgl_pinjam, tbl_pinjam.tgl_kembali, tbl_pinjam.no_induk, tbl_pinjam.status_buku,tbl_pinjam.jml_pinjam, tbl_buku.judul FROM tbl_pinjam, tbl_buku WHERE tbl_buku.id_buku=tbl_pinjam.id_buku AND  status_buku='0' LIMIT $posisi, $batas ";
              $queryJml = "SELECT DISTINCT tbl_pinjam.id_pinjam, tbl_pinjam.tgl_pinjam, tbl_pinjam.tgl_kembali, tbl_pinjam.no_induk, tbl_pinjam.status_buku, tbl_pinjam.jml_pinjam, tbl_buku.judul FROM tbl_pinjam, tbl_buku WHERE tbl_buku.id_buku=tbl_pinjam.id_buku AND  status_buku='0'";
              $no = $posisi + 1;
            }
            // $baru = "SELECT a.* , b.* from tbl_pinjam a LEFT JOIN tbl_buku b on a.id_buku = b.id_buku" ;
            // $baru = "SELECT * FROM tbl_pinjam INNER JOIN tbl_buku on tbl_pinjam.id_buku = tbl_buku.id_buku";
            $querydata = mysqli_query($konek, $query)or die(mysqli_error());
                    if(mysqli_num_rows($querydata) == 0){
                      echo '<tr><td colspan="8" align="center">Tidak ada data!</td></tr>';
                    }
                      else
                    {
                      $no = 1;
                      while($data = mysqli_fetch_array($querydata)){ 
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.$data['tgl_pinjam'].'</td>';
                        echo '<td>'.$data['tgl_kembali'].'</td>';
                        echo '<td>'.$data['no_induk'].'</td>';
                        echo '<td>'.$data['judul'].'</td>';
                        echo '<td>'.$data['jml_pinjam'].'</td>';
                        echo '<td  width="20"><a data-toggle="tooltip" data-placement="right" title="Edit Keterangan" href=admin.php?content=edit-peminjaman&&id_pinjam='.$data['id_pinjam'].'&&id_buku='.$data['id_buku'].'><i class="fa fa-edit fa-fw"></i></a></td>';
                        echo '<td  width="20"><a data-toggle="tooltip" data-placement="left" title="Delete" href=../config/delete-peminjaman.php?id_pinjam='.$data['id_pinjam'].'><i class="fa fa-trash fa-fw"></i></a></td>';
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
          <label class="col-sm-4">Nomor Induk</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
           <input type="text" class="form-control" name="no_induk" placeholder="e.g. 888192812" required>
           <!-- <select class="form-control" name="no_induk" aria-describedby="basic-addon1" required>
           <?php
                    $siswa = "SELECT * FROM tbl_siswa";
                    $querysiswa = mysqli_query($konek,$siswa);
                    while ($dtsiswa = mysqli_fetch_array($querysiswa)) { ?>
                    <option value="<?php echo $dtsiswa['id_siswa'] ?>"> <?php echo $dtsiswa['no_induk'] ?>
                    </option>
                    <?php
                    }
                    ?>
            </select> -->
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-4">Judul Buku</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
          <!-- <input type="text" class="form-control" name="judul" placeholder="Judul" required>  -->
          <select class="form-control" name="judul" aria-describedby="basic-addon1" required>
                    <?php
                    $buku = "SELECT * FROM tbl_buku WHERE sisa_buku != 0";
                    $querybuku = mysqli_query($konek,$buku);
                    while ($bk = mysqli_fetch_assoc($querybuku)) { ?>
                    <option value="<?php echo $bk['id_buku'] ?>"> <?php echo $bk['judul'] ?>
                    </option>
                    <?php
                    }
                    ?>
                  </select> 
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-4">Jumlah Buku</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="number" min="1" max="5" class="form-control" name="jml_pinjam" placeholder="Jumlah Buku" required> 
            <input type="hidden" name="status_buku" value="0">
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
  