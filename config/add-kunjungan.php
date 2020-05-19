<?php

	error_reporting(0);

	include 'koneksi.php';

	$tgl_kunjungan		= $_POST["tgl_kunjungan"];
	$no_induk		   	= $_POST["no_induk"];
	
	$insert			= "INSERT INTO tbl_kunjungan VALUES ('', '$tgl_kunjungan', '$no_induk', '$id_siswa')";

	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../index.php?content=kunjungan">';

	

?>
