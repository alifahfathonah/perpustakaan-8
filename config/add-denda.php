<?php

	error_reporting(0);

	include 'koneksi.php';

	$jml_denda		   	= $_POST["jml_denda"];
	$status_denda		= $_POST["status_denda"];
	$id_pinjam			= $_POST["no_induk"];
	$id_pinjam			= $_POST["tgl_pinjam"];
	
	$insert			= "INSERT INTO tbl_dendaa VALUES ('', '$jml_denda', '$status_denda', '$id_pinjam')";


	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	echo "<br><br><br><strong><center><i>Anda berhasil menambahkan data denda!";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?content=data-denda">';

?>
