<?php
include '../config/koneksi.php';

$no_induk = $_GET['no_induk'];
$query = mysqli_query($konek, "select * from tbl_siswa where no_induk='$no_induk'");
$siswa = mysqli_fetch_array($query);
$data = array(
	  $siswa['nama_siswa']
	);

echo json_encode($data);

?> 

