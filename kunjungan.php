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
  <form class="form-horizontal" action="config/add-kunjungan.php" method="POST" enctype="multipart/form-data">
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
               <div class="checkbox" data-toggle="modal">
                  <label><input type="checkbox" id="lupanomor" > Lupa nomor induk</label>
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
    <script>
      // if ($('#lupanomor').is(":checked"))
      //   {
      //      console.log("berhasil di cek");
      //   }
      val test = $('lupanomor').val();
      console.log(test);
    </script>
    <!--  <tbody>
         <?php

            include 'config/koneksi.php';

            
            $query = mysqli_query($konek, "SELECT DISTINCT * FROM tbl_siswa")or die(mysqli_error($konek));

                    if(mysqli_num_rows($query) == 0){
                      echo '<tr><td colspan="6" align="center">Tidak ada data!</td></tr>';
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
                        $no++;
                      }
                    }

                ?>
              </tbody>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <div class="modal-content">
          <div class="modal-header" style="background-color:#3bacd7";>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" align="center"><b>Daftar Anggota</b></h4>
          </div>
      <div class="modal-body">
      </div>
      </div>
          <div class="modal-footer">
            
          </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#3bacd7";>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" align="center"><b>Daftar Anggota</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label class="col-sm-1"></label>
                      <label class="col-sm-3">Nomor Induk</label>
                      <label class="col-sm-1">:</label>
                      <div class="col-sm-6">
                      <input type="text" class="form-control" name="no_induk" placeholder="e.g. 888192812" value="<?=$no_induk?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-1"></label>
                      <label class="col-sm-3">Nama Lengkap</label>
                      <label class="col-sm-1">:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama_siswa" placeholder="Nama Lengkap" value="<?=$nama_siswa?>" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-1"></label>
                      <label class="col-sm-3">Kelas</label>
                      <label class="col-sm-1">:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="kelas_siswa" placeholder="Nama Lengkap" value="<?=$kelas_siswa?>" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-1"></label>
                      <label class="col-sm-3">Jurusan</label>
                      <label class="col-sm-1">:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="jurusan" placeholder="Nama Lengkap" value="<?=$jurusan?>" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-1"></label>
                      <label class="col-sm-3">Agama</label>
                      <label class="col-sm-1">:</label>
                      <div class="col-sm-6">
                        <input type="comment" class="form-control" name="agama_siswa" placeholder="Agama" value="<?=$agama_siswa?>" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-1"></label>
                      <label class="col-sm-3">Alamat</label>
                      <label class="col-sm-1">:</label>
                      <div class="col-sm-6">
                        <textarea class="form-control" rows="5" id="comment" Placeholder="Alamat" name="alamat_siswa" value="<?=$alamat_siswa?>" required></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-1"></label>
                      <label class="col-sm-3">Jenis Kelamin</label>
                      <label class="col-sm-1">:</label>
                      <div class="col-sm-6">
                          <input type="text" class="form-control" name="jk_siswa" placeholder="Nama Lengkap" value="<?=$jk_siswa?>" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-1"></label>
                      <label class="col-sm-3">No Handphone</label>
                      <label class="col-sm-1">:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="hp_siswa" placeholder="No Handphone" value="<?=$hp_siswa?>" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-1"></label>
                      <label class="col-sm-3">Email</label>
                      <label class="col-sm-1">:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="email_siswa" placeholder="e.g tuti12@gmail.com" value="<?=$email_siswa?>" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-1"></label>
                      <label class="col-sm-3">Tahun Masuk</label>
                      <label class="col-sm-1">:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="tahun_masuk" placeholder="Tahun Masuk" value="<?=$tahun_masuk?>" required>
                      </div>
                  </div>
                </form>
                </div>
                      <div class="modal-footer">
                        
                      </div>
                </div>
            </div>
        </div>
</div> -->







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
