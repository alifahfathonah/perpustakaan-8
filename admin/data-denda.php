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
    <li class="active"><a href="admin.php?content=home-admin">Home</a> / Data Denda</li>
  </ol>
</div>
   
<div class="col-md-12" style="min-height:500px">
  <h3><b>Data</b> Denda</h3>
  <hr>
  <form class="form-inline" action="" method="POST">
    <div class="form-group" style="float: right;">
      <input size="34px" type="text" name="pencarian" class="form-control" placeholder="Pencarian">
      <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-fw"></i></button>
      <a href=""><button type="button" class="btn btn-warning"><i class="fa fa-refresh fa-fw"></i></button></a>
    </div>
  </form>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-fw"></i>Tambah Denda</button>
    <br><br>
    <form class="form-horizontal" method="POST">
      <table class="table1 table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Jumlah Denda</th>
            <th>Status Denda</th>
            <th>Nomor Induk</th>
            <th>Tanggal Peminjaman</th>
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
                $sql = "SELECT DISTINCT tbl_denda.id_denda, tbl_denda.jml_denda, tbl_denda.status_denda, tbl_peminjaman.no_induk, tbl_peminjaman.tgl_peminjaman,  FROM tbl_denda, tbl_peminjaman WHERE tbl_peminjaman.id_peminjaman=tbl_denda.id_peminjaman AND tbl_denda.id_peminjaman LIKE '%$pencarian%'";
                $query = $sql;
                $queryJml = $sql;
              } else {
                $query = "SELECT DISTINCT tbl_denda.id_denda, tbl_denda.jml_denda, tbl_denda.status_denda, tbl_peminjaman.no_induk, tbl_peminjaman.tgl_peminjaman,  FROM tbl_denda, tbl_peminjaman LIMIT $posisi, $batas ";
                $queryJml = "SELECT DISTINCT tbl_denda.id_denda, tbl_denda.jml_denda, tbl_denda.status_denda, tbl_peminjaman.no_induk, tbl_peminjaman.tgl_peminjaman,  FROM tbl_denda, tbl_peminjaman WHERE tbl_peminjaman.id_peminjaman=tbl_denda.id_peminjaman";
                $no = $posisi + 1;
              }
            } else {
              $query ="SELECT DISTINCT tbl_denda.id_denda, tbl_denda.jml_denda, tbl_denda.status_denda, tbl_peminjaman.no_induk, tbl_peminjaman.tgl_peminjaman,  FROM tbl_denda, tbl_peminjaman WHERE tbl_peminjaman.id_peminjaman=tbl_denda.id_peminjaman LIMIT $posisi, $batas ";
              $queryJml = "SELECT DISTINCT tbl_denda.id_denda, tbl_denda.jml_denda, tbl_denda.status_denda, tbl_peminjaman.no_induk, tbl_peminjaman.tgl_peminjaman,  FROM tbl_denda, tbl_peminjaman WHERE tbl_peminjaman.id_peminjaman=tbl_denda.id_peminjaman";
              $no = $posisi + 1;
            }

            $querydata = mysqli_query($konek, $query)or die(mysqli_error());
                    if(mysqli_num_rows($querydata) == 0){
                      echo '<tr><td colspan="6" align="center">Tidak ada data!</td></tr>';
                    }
                      else
                    {
                      $no = 1;
                      while($data = mysqli_fetch_array($querydata)){
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.$data['jml_denda'].'</td>';
                        echo '<td>'.$data['status_denda'].'</td>';
                        echo '<td>'.$data['no_induk'].'</td>';
                        echo '<td>'.$data['tgl_peminjaman'].'</td>';
                        echo '<td  width="20"><a data-toggle="tooltip" data-placement="right" title="Edit Keterangan" href=admin.php?content=edit-denda&&id_denda='.$data['id_denda'].'&&id_peminjaman='.$data['id_peminjaman'].'><i class="fa fa-edit fa-fw"></i></a></td>';
                        echo '<td  width="20"><a data-toggle="tooltip" data-placement="left" title="Delete" href=../config/delete-denda.php?id_denda='.$data['id_denda'].'><i class="fa fa-trash fa-fw"></i></a></td>';
                        echo '</tr>';
                        $no++;
                      }
                    }

                ?>

        </tbody>
      </table>
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
            <h4 class="modal-title" align="center"><b>Tambahkan Denda</b></h4>
          </div>
      <div class="modal-body">
          <form action="" class="form-horizontal" method="POST">
          <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Jumlah Denda</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="jml-denda" placeholder="Jumlah Denda"required>
            </div>
          </div>
      <div class="modal-body">
          <form action="" class="form-horizontal" method="POST">
          <div class="form-group">
            <label class="col-sm-2"></label>
            <label class="col-sm-2">Status Denda</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
              <input type="data-toggle" class="form-control" name="status-denda" placeholder="status-denda" required>
            </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2"></label>
          <label class="col-sm-2">Nomor Induk</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="no-induk" placeholder="e.g. 888192812" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2"></label>
          <label class="col-sm-2">Tanggal Peminjaman</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="data-toggle" class="form-control" name="tgl-peminjaman" required>
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



    