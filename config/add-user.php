<?php

	error_reporting(0);

	include 'koneksi.php';

	$no_induk		   	= $_POST["no_induk"];
	$nama				= $_POST["nama"];
	$password			= md5($_POST["password"]);
	$id_level			= $_POST["level"];
	
	$insert			= "INSERT INTO tbl_user VALUES ('', '$no_induk', '$nama', '$password', '$id_level')";


	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	echo "<br><br><br><strong><center><i>Anda berhasil menambahkan data admin!";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?content=manajemen-user">';

?>
