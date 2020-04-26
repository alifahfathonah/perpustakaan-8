<?php

	include 'koneksi.php';

    $id_buku        = $_POST['id_buku'];
    $judul          = $_POST['judul'];
    $nama_penerbit  = $_POST['nama_penerbit'];
    $pengarang      = $_POST['pengarang'];
    $tahun_terbit   = $_POST['tahun_terbit'];
    $gambar         = $_POST['gambar'];
    $jml_buku       = $_POST['jml_buku'];

    $update     = "UPDATE tbl_buku SET judul='$judul', nama_penerbit='$nama_penerbit', pengarang='$pengarang', tahun_terbit='$tahun_terbit', gambar='$gambar', jml_buku='$jml_buku' WHERE id_buku='$id_buku'";

	$update	= mysqli_query($konek, $update)or die(mysqli_error());

	if ($update)
    	{
    		echo "<br><br><br><strong><center><i>Berhasil Edit Data Buku!";
    		echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../adminn/admin.php?content=data-buku">';
    	}
	else {
    		print"
    			<script>
    				alert(\"Balasan gagal ditambah!\");
    				history.back(-1);
    			</script>";
    	}
?>


