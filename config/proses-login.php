<?php

	include "koneksi.php";

	$no_induk  = $_POST["no_induk"];
	$password  = md5($_POST["password"]);

	$query     ="SELECT * FROM tbl_user WHERE no_induk='$no_induk' AND password='$password'";

	$login     = mysqli_query($konek,$query) or die(mysqli_error($konek));
	$jlhrecord = mysqli_num_rows($login);

	$data      = mysqli_fetch_array($login,MYSQLI_BOTH);

	$no_induk  = $data['no_induk'];
	$password  = $data['password'];
	$id_level  = $data['id_level'];


if($jlhrecord > 0){

	session_start();
	$_SESSION['id_user']=$id_user;
	$_SESSION['no_induk']=$no_induk;
	$_SESSION['id_level']=$id_level;

	//redirect level
		if($id_level == 1){
			header('Location:../admin/admin.php?content=home-admin');
		}
}

else{

	echo "<br><br><br><strong><center><i>Maaf anda gagal login. Mungkin Username atau Password yang anda masukkan salah.<br>Silahkan masukkan Username atau Password dengan benar!";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "2; URL=../admin/index.php">';  
}

?>