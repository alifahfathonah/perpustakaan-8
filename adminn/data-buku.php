<style>
  table {
      border-collapse: collapse;
      width: 100%;
  }

  th, td {
      text-align: left;
      padding: 8px;
  }

  tr:nth-child(even){background-color: #bbdfed;}

  th {
      background-color: #3bacd6;
      color: white;
  }

  td {
    font-size: 14px;
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
      <a href="admin.php?content=manajemen-user"><button type="button" class="btn btn-warning"><i class="fa fa-refresh fa-fw"></i></button></a>
    </div>
  </form>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-fw"></i>Tambah Buku</button>
    <br><br>
    <form class="form-horizontal" method="POST">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Nama Penerbit</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Gambar</th>
            <th>Jumlah Buku</th>
            <th colspan="2"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </form>
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
          <div class="modal-body">
            <form action="" class="form-horizontal" method="POST">
              <div class="form-group">
                <label class="col-sm-2"></label>
                <label class="col-sm-2">Judul</label>
                <label class="col-sm-1">:</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" name="judul" placeholder="Judul" required>
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2"></label>
                <label class="col-sm-2">Nama Penerbit</label>
                <label class="col-sm-1">:</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" name="nama-penerbit" placeholder="Nama Penerbit" required>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2"></label>
                  <label class="col-sm-2">Pengarang</label>
                  <label class="col-sm-1">:</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" name="pengarang" placeholder="Pengarang" required>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2"></label>
                  <label class="col-sm-2">Tahun Terbit</label>
                  <label class="col-sm-1">:</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" name="tahun-terbit" placeholder="Tahun Terbit" required>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2"></label>
                  <label class="col-sm-2">Gambar</label>
                  <label class="col-sm-1">:</label>
                  <div class="col-sm-5">
                      <input class="form-control" type="file" name="file" >
                      <input class="btn-warning" type="submit" name="upload" value="Upload">
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2"></label>
                  <label class="col-sm-2">Jumlah Buku</label>
                  <label class="col-sm-1">:</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" name="jumlah_buku" placeholder="Jumlah Buku" required>
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
  </div>


    