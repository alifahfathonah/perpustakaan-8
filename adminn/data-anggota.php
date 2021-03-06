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
    <li class="active"><a href="admin.php?content=home-admin">Home</a> / Data Anggota</li>
  </ol>
</div>
   
<div class="col-md-12" style="min-height:500px">
  <h3><b>Data</b> Anggota</h3>
  <hr>
  <form class="form-inline" action="" method="POST">
    <div class="form-group" style="float: right;">
      <input size="34px" type="text" name="pencarian" class="form-control" placeholder="Pencarian">
      <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-fw"></i></button>
      <a href=""><button type="button" class="btn btn-warning"><i class="fa fa-refresh fa-fw"></i></button></a>
      <a target ="_blank" role="button" href="print-data-anggota.php"><button type="button" class="btn btn-success"><i class="fa fa-print fa-fw"></i></button></a>
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
                $query = "SELECT * FROM tbl_siswa WHERE status_siswa='1' ORDER BY id_calon_murid DESC LIMIT $posisi, $batas ";
                $queryJml = "SELECT * FROM tbl_siswa WHERE status='1' ORDER BY id_siswa DESC";
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
                        echo '<td  width="20" colspan="2"><center><a data-toggle="tooltip" data-placement="left" title="Lihat Data Lengkap" href=tu.php?content=edit-murid&&id_calon_murid='.$data['id_siswa'].'><i class="fa fa-bars fa-fw"></i></a></center></td>';
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header" style="background-color:#3bacd6";>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p align="center"><font size="2px"><i>Sistem Informasi Perpustakaan SMK Patriot 2 Bekasi</i></font></p>
            <h4 class="modal-title" align="center"><b>Tambahkan Anggota</b></h4>
          </div>
      <div class="modal-body">
          <form action="" class="form-horizontal" method="POST">
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
          <label class="col-sm-2">Nama Lengkap</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="nama-lengkap" placeholder="Nama Lengkap" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2"></label>
          <label class="col-sm-2">Kelas</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="kelas" placeholder="Kelas" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2"></label>
          <label class="col-sm-2">Jurusan</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="jurusan" placeholder="Jurusan" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2"></label>
          <label class="col-sm-2">Agama</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="comment" class="form-control" name="agama" placeholder="Agama" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2"></label>
          <label class="col-sm-2">Alamat</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <textarea class="form-control" rows="5" id="comment" Placeholder="Alamat"required></textarea>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2"></label>
          <label class="col-sm-2">Jenis Kelamin</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
             <input type="radio" class="form-check-input" name="optradio">Laki-Laki
              <input type="radio" class="form-check-input" name="optradio">Perempuan
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2"></label>
          <label class="col-sm-2">No Handphone</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="no_hp" placeholder="No Handphone" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2"></label>
          <label class="col-sm-2">Email</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="email" placeholder="e.g tuti12@gmail.com" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2"></label>
          <label class="col-sm-2">Tahun Masuk</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="tahun_masuk" placeholder="Tahun Masuk" required>
          </div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4"></label>
         <div class="col-sm-6" align="right">
            <a target ="_blank" role="button" href="print-data-calon-murid-detail.php?id_calon_murid=<?php echo $data['id_calon_murid']; ?>"><button type="button" class="btn btn-success btn-md"><i class="fa fa-print fa-fw"></i> Print</button></a>&nbsp;&nbsp;<button type="button" class="btn btn-primary">Simpan</button></a></p>
          </div>
        <!--   <label class="control-label col-sm-4"></label>
          <div class="col-sm-6" align="right">
            <button class="btn btn-primary">Simpan</button>
          </div> -->
      </div>
    </form>
    </div>
          <div class="modal-footer">
            
          </div>
    </div>
    </div>
  </div>




    