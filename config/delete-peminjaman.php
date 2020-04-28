<?php

	include 'koneksi.php';

	$id_peminjaman = $_GET ['id_peminjaman'];

	$hapus 	 = "DELETE FROM tbl_peminjaman WHERE id_peminjaman='$id_peminjaman'";
	$query	 = mysqli_query($konek, $hapus);

	if ($query)
	    {
	    	echo "<br><br><br><strong><center><i>Data berhasil dihapus!";
	    	echo "<META HTTP-EQUIV='REFRESH' CONTENT ='1; URL=../admin/admin.php?content=data-peminjaman'>";
	    }
	else {
	    	print"
	    		<script>
	    			alert(\"Data Gagal Diubah!\");
	    			history.back(-1);
	    		</script>";
	    }

?>