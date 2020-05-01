<?php

	include 'koneksi.php';

    $id_user        = $_POST['id_user'];
    $no_induk       = $_POST['no_induk'];
	$nama    		= $_POST['nama'];
	$password	 	= md5($_POST['password']);


	$update 	= "UPDATE tbl_user SET no_induk='$no_induk', nama='$nama', password='$password' WHERE id_user='$id_user'";
	$updateuser	= mysqli_query($konek, $update)or die(mysqli_error());

	if ($updateuser)
    	{
    		echo "<br><br><br><strong><center><i>Data Berhasil Diubah!";
    		echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?content=manajemen-user">';
    	}
	else {
    		print"
    			<script>
    				alert(\"Data Gagal Diubah!\");
    				history.back(-1);
    			</script>";
    	}
?>