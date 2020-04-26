<?php

	include 'koneksi.php';

	$id_buku = $_GET ['id_buku'];

	$hapus 	 = "DELETE FROM tbl_buku WHERE id_buku='$id_buku'";
	$query	 = mysqli_query($konek, $hapus);

	if ($query)
	    {
	    	echo "<br><br><br><strong><center><i>Data berhasil dihapus!";
	    	echo "<META HTTP-EQUIV='REFRESH' CONTENT ='1; URL=../adminn/admin.php?content=data-buku'>";
	    }
	else {
	    	print"
	    		<script>
	    			alert(\"Data Gagal Diubah!\");
	    			history.back(-1);
	    		</script>";
	    }

?>