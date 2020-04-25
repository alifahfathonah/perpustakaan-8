<?php

    //error_reporting(0);

    include '../config/koneksi.php';

    $id_buku   = $_GET['id_buku'];

    $edit    = "SELECT * FROM tbl_buku WHERE id_buku = '$id_buku'";
    $hasil   = mysqli_query($konek, $edit)or die(mysqli_error());
    $data    = mysqli_fetch_array($hasil);

?>

<div class="col-md-10" style="padding:0px">
    <ol class="breadcrumb" style="margin:0;border-radius:0;">
        <li class="active"><a href="admin.php?content=home-admin">Home</a> / Edit Data Buku</li>
    </ol>
</div>

<div class="col-md-10" style="min-height:500px">
    <hr> 
        <form class="form-horizontal" method="POST">
          <div class="panel-group">
          <div class="panel panel-primary">
            <div class="panel-heading">Edit Data Buku</div>
            <div class="panel-body">
              <table class="table table-bordered">
                <input type="hidden" name="id_buku">
                <tr>
                  <tr>
                  <th><font size="2px">Judul</font></th>
                  <td width="800"><i><font size="2px"><?php echo $data['judul'];?></font></i></td>
                </tr>
                <tr>
                  <th><font size="2px">Nama Penerbit</font></th>
                  <td><font size="2px"><i><?php echo $data['nama_penerbit']; ?></i></font></td>
                </tr>
                <tr>
                  <th><font size="2px"></font></th>
                  <td><font size="2px"><i><?php echo $data['pengarang']; ?></i></font></td>
                </tr>
                <tr>
                  <th><font size="2px">Nama Penerbit</font></th>
                  <td><font size="2px"><i><?php echo $data['tahun_terbit']; ?></i></font></td>
                </tr>
                <tr>
                  <th><font size="2px">Nama Penerbit</font></th>
                  <td><font size="2px"><i><?php echo $data['gambar']; ?></i></font></td>
                </tr>
                <tr>
                  <th><font size="2px">Nama Penerbit</font></th>
                  <td><font size="2px"><i><?php echo $data['jml_buku']; ?></i></font></td>
                </tr>
              </table>
              <p align="right">
                <button type="submit" formaction="../config/update-buku.php?id_buku=<?php echo $data['id_buku'] ?>" class="btn btn-primary">Simpan</button>
                <a href="kepsek.php?content=data-request-kelas"><button type="button" class="btn btn-default">Kembali</button></a></p>
            </div>
          </div>
      </form>
  </div>
</div>
