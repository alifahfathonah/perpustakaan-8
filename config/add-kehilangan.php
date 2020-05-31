<?php

	error_reporting(0);

	include 'koneksi.php';

	$no_induk		   	= $_POST['no_induk'];
	$nama_siswa			= $_POST['nama_siswa'];
	$kode_buku			= $_POST['kode_buku'];
	$judul				= $_POST['judul'];
	// $tgl_hilang			= date('Y-m-d');
	$status_fc			= $_POST['status_fc'];
	$tgl_hilang			= date('Y-m-d');
	$masa_berlaku		= date('Y-m-d', strtotime('+7 day', strtotime($tgl_hilang)));
	$keterangan			= $_POST['keterangan'];
	
	$insert			= "INSERT INTO tbl_hilang VALUES ('', '$no_induk','$nama_siswa', '$kode_buku', '$judul', '$status_fc', '$tgl_hilang','-', '$masa_berlaku', '$keterangan')";

	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	echo "<br><br><br><strong><center><i>Anda berhasil menambahkan data kehilangan!";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?content=data-kehilangan">';

	

?>
