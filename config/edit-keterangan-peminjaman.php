<?php

	include 'koneksi.php';

    $tgl_peminjaman         = $_POST['tgl_peminjaman'];
    $tgl_pengembalian       = $_POST['tgl_pengembalian'];
    $no_induk               = $_POST['no_induk'];
    $status_buku            = $_POST['status_buku'];
    $judul                  = $_POST['judul'];
    $jml_buku               = $_POST['jml_buku'];

    $update     = "UPDATE tbl_peminjaman SET tgl_peminjaman='$tgl_peminjaman', tgl_pengembalian='$tgl_pengembalian', no_induk='$no_induk', status_buku='$status_buku', judul='$judul', jml_buku='$jml_buku' WHERE id_peminjaman='$id_peminjaman'";

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
