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
          <img src="img/logo.jpeg"style="width:30%">
          <br>
          <div class="caption">
            <form>
                <div class="form-group">
                  <label for="number">Nomor Induk</label>
                  <input type="number" class="form-control" id="nomor-induk" placeholder="e.g. 888192812" required>
                </div>
               <div class="checkbox">
                  <label><input type="checkbox"> Lupa nomor induk</label>
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


		<!-- 	<label class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Lupa No Induk?</label>
			<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Data Siswa</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
                        <label for="nim">Nama</label>
                        <input type="text" class="form-control" name="nim" placeholder="Isikan NIM">
                    </div>
                    <div class="form-group">
                        <label for="nama">Kelas</label><br>
                        <select class="form-control" id="kelas" name="kelas">
                        	<option>-- Pilih Kelas --</option>
                      		<option>X</option>
                      		<option>XI</option>
                      		<option>XII</option>
                   			</select> 
                   	</div>
                    <div class="form-group">
                        <label for="nama">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                      	<option>-- Pilih Jurusan --</option>
                      	<option>Otomatisasi Tata Kelola Perkantoran</option>
                      	<option>Bisnis Daring Dan Pemasaran</option>
                   		</select> 
                    <div class="form-group">
                        <label for="nama">Tahun Masuk</label>
                        <select class="form-control" id="tahun-masuk" name="tahun-masuk">
                      	<option>-- Pilih Jurusan --</option>
                            <?php
                				$thn_skr = date('Y');
                				for ($x = $thn_skr; $x >= 2010; $x--) {
                			?>
                    		<option value="<?php echo $x ?>"><?php echo $x ?></option>
                			<?php
                			}
                			?>
                		</select>
                	</div>
                    <button type="submit" class="btn btn-info">Cari</button>
                    <button type="reset" class="btn btn-info">Batal</button>
          
			
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">kembali</button>
				</div>
			</div>
		</div>
	</form>
</div> -->


<br>
