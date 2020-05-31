<?php
include '../config/koneksi.php';

$kode_buku = $_GET['kode_buku'];
$query = mysqli_query($konek, "select * from tbl_buku where kode_buku='$kode_buku'");
$buku = mysqli_fetch_array($query);
$data = array(
	  $buku['judul']
	);

echo json_encode($data);

?> 

