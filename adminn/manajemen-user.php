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
    <li class="active"><a href="admin.php?content=home-admin">Home</a> / Manajemen User</li>
  </ol>
</div>
   
<div class="col-md-12" style="min-height:500px">
  <h3><b>Manajemen</b> User</h3>
  <hr>
  <form class="form-inline" action="" method="POST">
    <div class="form-group" style="float: right;">
      <input size="34px" type="text" name="pencarian" class="form-control" placeholder="Pencarian">
      <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-fw"></i></button>
      <a href=""><button type="button" class="btn btn-warning"><i class="fa fa-refresh fa-fw"></i></button></a>
    </div>
  </form>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-fw"></i>Tambah User</button>
    <br><br>
    <form class="form-horizontal" method="POST">
      <table class="table1 table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>No Induk</th>
            <th>Password</th>
            <th>Level</th>
            <th colspan="2"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          
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
            <h4 class="modal-title" align="center"><b>Tambahkan User</b></h4>
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
          <label class="col-sm-2">Password</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="Password" class="form-control" name="Password" placeholder="Password" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2"></label>
          <label class="col-sm-2">Level</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="level" placeholder="level" required>
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



    