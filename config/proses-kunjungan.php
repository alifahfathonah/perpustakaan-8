<?php

	include "koneksi.php";

	$no_induk  = $_POST["no_induk"];


	$query     ="SELECT * FROM tbl_kunjungan WHERE no_induk='$no_induk'";

	$kunjung     = mysqli_query($konek,$query) or die(mysqli_error($konek));
	$jlhrecord	 = mysqli_num_rows($kunjung);

	$data      = mysqli_fetch_array($kunjung,MYSQLI_BOTH);

	$no_induk  		= $data['no_induk'];
	$tgl_kunjungan  = $data['tgl_kunjungan'];


if($jlhrecord > 0){

	session_start();
	$_SESSION['id_kunjungan']=$id_kunjungan;
	$_SESSION['no_induk']=$no_induk;
	$_SESSION['tgl_kunjungan']=$tgl_kunjungan;

	//redirect level
		if($no_induk == ['no_induk']){
			header('Location:../index.php?content=kunjungan');
		}
}

else{

	echo "<br><br><br><strong><center><i>Maaf anda belum terdaftar sebagai anggota perpustakaan SMK Patriot 2 Bekasi";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "2; URL=../index.php?content=kunjungan">';  
}

?>