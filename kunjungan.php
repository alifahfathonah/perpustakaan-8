
<style>
  .table1 {
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #f2f5f7;
  }
 
  .table1 tr th{
    background: green;
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
<br>
<br>
<br>
<br>
<br>
<div class="container">
  <div class="alert alert-success">
    <strong>Info!</strong> Silahkan masukkan nomor induk anda untuk mengisi kunjungan perpustakaan, terima kasih
  </div>
  <br>

  
 <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
          <br>
          <img src="img/logo.jpeg" style="width:30%">
          <br>
          <div class="caption">
            <form action="config/add-kunjungan.php" method="POST">
                <div class="form-group">
                  <label for="number">Nomor Induk</label>
                  <input type="number" class="form-control" name="no_induk" placeholder="e.g. 888192812" required>
                </div>
                  <div class="checkbox" data-toggle="modal">
                  <label><input type="checkbox" id="myCheck" data-toggle="modal" data-target="#myModal" onclick="myFunction()"> Lupa nomor induk</label>
                  </div>
                <p align="right"><button type="submit" class="btn btn-success">Simpan
                </button></p>
            </form>
          </div>
      </div>
    </div>
</div>
<div class="col-md-4">
</div>
</div>
    <p id="text" style="display:none">
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Data Siswa</h4>
            </div>
            <div class="modal-body">
              <p>
                <div class="row">
                 <div class="col-md-12">
                 <input size="34px" type="text" name="pencarian" class="form-control" placeholder="Masukkan nama Anda" id="myInput" onkeyup="myFunctioncari()">
               </div>
<!--                  <div class="col-md-">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-fw"></i></button>
                    </div> -->
                    </div>
                    <br>
                <form class="form-horizontal" method="POST">
                 <table id="myTable" class="table1 table-striped">
                    <thead>
                      <tr>
                        <th>Nama Anggota</th>
                        <th>Nomor Induk</th>
                        <th>Jurusan</th>
                        <th>Kelas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      error_reporting();

                        include 'config/koneksi.php';

                        $query = mysqli_query($konek, "SELECT * FROM tbl_siswa ORDER BY id_siswa DESC")or die(mysqli_error());
                                if(mysqli_num_rows($query) == 0){
                                  echo '<tr><td colspan="4"><i>Tidak ada data!</i></td></tr>';
                                }
                                  else
                                {
                                  $no = 1;
                                  while($data = mysqli_fetch_array($query)){
                                    echo '<tr  class="header">';
                                    echo '<td>'.$data['nama_siswa'].'</td>';
                                    echo '<td>'.$data['no_induk'].'</td>';
                                    echo '<td>'.$data['jurusan'].'</td>';
                                    echo '<td>'.$data['kelas_siswa'].'</td>';
                                    echo '</tr>';
                                  $no++;
                                  }
                                }
                      ?>
                    </tbody>
                  </table>
                </form>
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </p>
   <script>
   function myFunction() {
     var checkBox = document.getElementById("myCheck");
     var text = document.getElementById("text");
     if (checkBox.checked == true){
       text.style.display = "block";
     } else {
        text.style.display = "none";
     }
   }

  function myFunctioncari() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
   </script>
   <br>
