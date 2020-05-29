<?php

	include 'koneksi.php';

	$id_pinjam = $_GET ['id_pinjam'];

	$hapus 	 = "DELETE FROM tbl_pinjam WHERE id_pinjam='$id_pinjam'";
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