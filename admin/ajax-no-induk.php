<?php

	include '../config/koneksi.php';

	$no_induk 	= $_GET['no_induk'];

	$select  = "SELECT * FROM tbl_siswa WHERE no_induk='$no_induk'";
	$query   = mysqli_query($konek, $select)or die(mysqli_error($konek));
	$tampil  = mysqli_fetch_array($query);  

	$nama_anggota = $tampil['nama_siswa'];

	echo $nama_anggota;


?>