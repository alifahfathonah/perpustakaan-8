<?php

    //error_reporting(0);

    include '../config/koneksi.php';

    $id_buku   = $_GET['id_buku'];

    $edit    = "SELECT * FROM tbl_buku WHERE id_buku = '$id_buku'";
    $hasil   = mysqli_query($konek, $edit)or die(mysqli_error());
    $data    = mysqli_fetch_array($hasil);

?>

<div class="main-panel">
<div class="col-md-12" style="padding:0px">
    <ol class="breadcrumb" style="margin:0;border-radius:0;">
        <li class="active"><a href="admin.php?content=home-admin">Home</a> / Edit Data Buku</li>
    </ol>
</div>

<div class="col-md-12" style="min-height:500px">
    <hr> 
        <form class="form-horizontal" action="../config/edit-keterangan-buku.php"  method="POST">
          <div class="panel-group">
          <div class="panel panel-primary">
            <div class="panel-heading">Edit Data Buku</div>
            <div class="panel-body">
              <table class="table table-bordered">
                <input type="hidden" name="id_buku" value="<?php echo $id_buku ?>">
                <tr>
                  <tr>
                  <th><font size="2px">Judul</font></th>
                  <td width="800"><input class="form-control" name="judul" type="text" value="<?php echo $data['judul']; ?>" required></td>
                </tr>
                <tr>
                  <th><font size="2px">Nama Penerbit</font></th>
                  <td><input class="form-control" name="nama_penerbit" type="text" value="<?php echo $data['nama_penerbit']; ?>" required></td>
                </tr>
                <tr>
                  <th><font size="2px">Pengarang</font></th>
                  <td><input class="form-control" name="pengarang" type="text" value="<?php echo $data['pengarang']; ?>" required></td>
                </tr>
                <tr>
                  <th><font size="2px">Tahun Terbit</font></th>
                  <td><input class="form-control" name="tahun_terbit" type="text" value="<?php echo $data['tahun_terbit']; ?>" required></td>
                </tr>
                <tr>
                  <th><font size="2px">Gambar</font></th>
                  <td>
                  <a data-toggle="tooltip" data-placement="right" title="Lihat Gambar" href="<?php echo $data['gambar'] ?>" target="_blank"><img width="70" height="50" src="<?php echo $data['gambar'] ?>"></a>
                  </td>
                </tr>
                <tr>
                  <th><font size="2px">Jumlah Buku</font></th>
                  <td><input class="form-control" name="jml_buku" type="text" value="<?php echo $data['jml_buku']; ?>" required></td>
                </tr>
              </table>
              <p align="right">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="admin.php?content=data-buku"><button type="button" class="btn btn-default">Kembali</button></a></p>
            </div>
          </div>
      </form>
  </div>
</div>
</div>
