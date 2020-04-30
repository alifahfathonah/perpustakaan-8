<?php

  error_reporting(0);

  include '../config/koneksi.php';

  $id_siswa = $_GET['id_siswa'];

  $edit    = "SELECT * FROM tbl_siswa WHERE id_siswa = '$id_siswa'";
  $hasil   = mysqli_query($konek, $edit)or die(mysql_error());
  $data    = mysqli_fetch_array($hasil);

?>
<div class="main-panel">
<div class="col-md-12" style="padding:0px">
  <ol class="breadcrumb" style="margin:0;border-radius:0;">
    <li class="active"><a href="admin.php?content=home-admin">Home</a> / <a href="admin.php?content=data-anggota">Data Anggota</a> / Data Lengkap Anggota</li>
  </ol>
</div>
  
<div class="col-md-12" style="min-height:500px">
  <h3><b>Data Lengkap</b> Anggota</h3>
    <hr>
    <form class="form-horizontal" action="../config/edit-keterangan-anggota.php" method="POST">
    <input type="hidden" name="id_siswa" value="<?php echo $id_siswa?>">
    <div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">Data Lengkap Anggota</div>
      <div class="panel-body">
        <table class="table">
          <tr>
          <th><br><p align="center"><img src="../img/logo.jpeg" height="100"></p></th>
          <td><br><p align="center"><font size="6px"><b>SMK PATRIOT 2 BEKASI</b></font><br>Jl. Sultan Agung No.28, RT.005/RW.003, Kali Baru, Kecamatan Medan Satria, Kota Bks, Jawa Barat 17132</p></td>
          </tr>
        </table>
    
    <table class="table table-bordered">  
      <tr>
        <input type="hidden" name="id_siswa" value="<?php echo $id_siswa?>">
        <th><font size="2px">Nomor Induk</font></th>
        <td width="800"> <input class="form-control" name="no_induk" type="text" value="<?php echo $data['no_induk']; ?>" required></td>
      </tr>
      <tr>
        <th><font size="2px">Nama Lengkap</font></th>
        <td width="800"> <input class="form-control" name="nama_siswa" type="text" value="<?php echo $data['nama_siswa']; ?>" required></td>
      </tr>
      <tr>
        <th><font size="2px">Kelas </font></th>
        <td width="800">
         <select class="form-control" id="kelas_siswa" name="kelas_siswa">
            <option><?php echo $data['kelas_siswa'];?></option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
        </select>
        </td>
      </tr>
      <tr>
        <th><font size="2px">Jurusan</font></th>
        <td width="800"> 
        <select class="form-control" id="jurusan" name="jurusan">
            <option><?php echo $data['jurusan'];?></option>
            <option value="Otomatisasi Tata Kelola Perkantoran">Otomatisasi Tata Kelola Perkantoran</option>
            <option value="Bisnis Daring dan Pemasaran">Bisnis Daring dan Pemasaran</option>
        </select>
        </td>
      </tr>
      <tr>
        <th><font size="2px">Agama</font></th>
        <td width="800"> <input class="form-control" name="agama_siswa" type="text" value="<?php echo $data['agama_siswa']; ?>" required></td>
      </tr>
      <tr>
        <th><font size="2px">Alamat Siswa</font></th>
        <td width="800"> <input class="form-control" name="alamat_siswa" type="text" value="<?php echo $data['alamat_siswa']; ?>" required></td>
      </tr>
       <tr>
        <th><font size="2px">Jenis Kelamin</font></th>
        <td width="800"> 
        <select class="form-control" id="jk_siswa" name="jk_siswa">
            <option><?php echo $data['jk_siswa'];?></option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        </td>
      </tr>
      <tr>
        <th><font size="2px">No Handphone</font></th>
        <td width="800"> <input class="form-control" name="hp_siswa" type="text" value="<?php echo $data['hp_siswa']; ?>" required></td>
      </tr>
      <tr>
        <th><font size="2px">Alamat Email</font></th>
        <td width="800"> <input class="form-control" name="email_siswa" type="text" value="<?php echo $data['email_siswa']; ?>" required></td>
      </tr>
       <tr>
        <th><font size="2px">Tahun Masuk</font></th>
        <td width="800"> <input class="form-control" name="tahun_masuk" type="text" value="<?php echo $data['tahun_masuk']; ?>" required></td>
      </tr>
      <tr>
        <th><font size="2px">Status Siswa</font></th>
        <td width="800">
          <select class="form-control" id="status_siswa" name="status_siswa">
            <option><?php echo $data['status_siswa'];?></option>
            <option value="0">0</option>
            <option value="1">1</option>
        </select>
        </td>
      </tr>
      
  </table>
  <p align="right">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="admin.php?content=data-anggota"><button type="button" class="btn btn-default">Kembali</button></a></p>

</div>
</div>
</form> 
</div>
</div>
</div>
</div>

<br>
<br>
<br>
<br>
<br>