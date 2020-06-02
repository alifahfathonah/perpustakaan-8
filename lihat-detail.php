<?php

    error_reporting(0);

    include '../config/koneksi.php';

    $id_buku = $_GET['id_buku'];

    $edit    = "SELECT * FROM tbl_buku WHERE id_buku = '$id_buku'";
    $hasil   = mysqli_query($konek, $edit)or die(mysql_error());
    $data    = mysqli_fetch_array($hasil);

?>
<br>
<br>
<br>
<br>

<div class="container">
<div class="col-md-12" style="padding:0px">
    <ol class="breadcrumb" style="margin:0;border-radius:0;">
        <li class="active"> <a data-toggle="tooltip" data-placement="top" title="Halaman Pencarian Buku" href="index.php?content=pencarian_buku">Pencarian Buku</a> / Lihat Detail</li>
    </ol>
</div>

<div class="col-md-12" style="min-height:500px">
  <h3><b>Lihat Detail</b> 
    <hr>
    <br>

    <div class="thumbnail">
        <div class="caption">
            <h2 align="center"><b>" <?php echo $data['judul']; ?> "</b></h2>
            <hr>
            <p align="center"><img src="galeri/<?php echo $data['gambar'] ?>"></p>
            <br>
            <p><h4>ISBN <?php echo $data['isbn']; ?></p></h4>
            <p><?php echo $data['nama_penerbit']; ?></p>
            <p><?php echo $data['pengarang']; ?></p>
            <p><?php echo $data['tahun_terbit']; ?></p>

        </div>
    </div>
</div>
</div>