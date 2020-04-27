<?php

	error_reporting(0);

	include 'koneksi.php';

	$no_induk		   	= $_POST["no_induk"];
	$nama_siswa			= $_POST["nama_siswa"];
	$kelas_siswa		= $_POST["kelas_siswa"];
	$jurusan			= $_POST["jurusan"];
	$agama_siswa		= $_POST["agama_siswa"];
	$alamat_siswa		= $_POST["alamat_siswa"];
	$jk_siswa			= $_POST["jk_siswa"];
	$hp_siswa			= $_POST["hp_siswa"];
	$email_siswa		= $_POST["email_siswa"];
	$tahun_masuk		= $_POST["tahun_masuk"];
	$status_siswa		= $_POST["status_siswa"];
	
	$insert			= "INSERT INTO tbl_siswa VALUES ('', '$no_induk', '$nama_siswa', '$kelas_siswa', '$jurusan', '$agama_siswa', '$alamat_siswa', '$jk_siswa', '$hp_siswa', '$email_siswa', '$tahun_masuk', '$status_siswa')";

	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	echo "<br><br><br><strong><center><i>Anda berhasil menambahkan data anggota!";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?content=data-anggota">';

?>
