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
                <div class="checkbox">
                  <label><input type="checkbox" id="chkImm" ata-target="#myModal" onclick="myFunction()"> Lupa nomor induk</label>
                </div>
                <p align="right"><button type="submit" class="btn btn-success">Simpan
                </button></p>
            </form>
          </div>
      </div>
    </div>
    <div class="col-md-4">
    </div>
</div>
<br>
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
                 <div class="col-md-10">
                 <input size="34px" type="text" name="pencarian" class="form-control" placeholder="Masukkan nama Anda">
               </div>
                 <div class="col-md-">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-fw"></i></button>
                    </div>
                    </div>
                    <br>
                <form class="form-horizontal" method="POST">
                 <!-- data siswanya nanti muncul disini kalo sudah dilakukan pencarian -->
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
   </script>
   <br>
