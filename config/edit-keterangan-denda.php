<?php

	include 'koneksi.php';

    $id_denda            = $_POST['id_denda'];
    $jml_denda           = $_POST['jml_denda'];
    $status_denda        = $_POST['status_denda'];
    $id_pinjam           = $_POST['no_induk'];
    $id_pinjam           = $_POST['tgl_pinjam'];
    
    $update     = "UPDATE tbl_dendaa SET id_denda='$id_denda', jml_denda='$jml_denda', status_denda='$status_denda', id_pinjam='$id_pinjam' WHERE id_denda='$id_denda'"; 
	$update	= mysqli_query($konek, $update)or die(mysqli_error());

	if ($update)
    	{
    		echo "<br><br><br><strong><center><i>Berhasil Edit Keterangan!";
    		echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?content=data-denda">';
    	}
	else {
    		print"
    			<script>
    				alert(\"Balasan gagal ditambah!\");
    				history.back(-1);
    			</script>";
    	}
?>
