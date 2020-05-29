<?php

	include 'koneksi.php';

    $id_pinjam         = $_POST['id_pinjam'];
    $tgl_pinjam        = $_POST['tgl_pinjam'];
    $tgl_kembali       = $_POST['tgl_kembali'];
    $no_induk          = $_POST['no_induk'];
    $status_buku       = $_POST['status_buku'];
    $jml_pinjam        = $_POST['jml_pinjam'];
    $judul             = $_POST['judul'];
    
    $update     = "UPDATE tbl_pinjam SET tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali', no_induk='$no_induk', judul='$judul', status_buku='$status_buku', jml_pinjam='$jml_pinjam' WHERE id_pinjam='$id_pinjam'"; 
	$update	= mysqli_query($konek, $update)or die(mysqli_error());

	if ($update)
    	{
    		echo "<br><br><br><strong><center><i>Berhasil Edit Keterangan!";
    		echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?content=data-peminjaman">';
    	}
	else {
    		print"
    			<script>
    				alert(\"Balasan gagal ditambah!\");
    				history.back(-1);
    			</script>";
    	}
?>
