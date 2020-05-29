<?php

	include 'koneksi.php';

    $id_hilang       = $_POST['id_hilang'];
    $no_induk        = $_POST['no_induk'];
    $nama_siswa      = $_POST['nama_siswa'];
    $status_fc       = $_POST['status_fc'];
    $tgl_hilang      = $_POST['tgl_hilang'];
    $tgl_fc          = $_POST['tgl_fc'];
    $masa_berlaku    = $_POST['masa_berlaku'];
    $keterangan      = $_POST['keterangan'];
    $update     = "UPDATE tbl_hilang SET no_induk='$no_induk', nama_siswa='$nama_siswa', status_fc='$status_fc', tgl_hilang='$tgl_hilang', tgl_fc='$tgl_fc', masa_berlaku='$masa_berlaku', keterangan='$keterangan' WHERE id_hilang='$id_hilang'";

	$update	= mysqli_query($konek, $update)or die(mysqli_error());

	if ($update)
    	{
    		echo "<br><br><br><strong><center><i>Berhasil Edit Data Kehilangan!";
    		echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?content=data-kehilangan">';
    	}
	else {
    		print"
    			<script>
    				alert(\"Balasan gagal ditambah!\");
    				history.back(-1);
    			</script>";
    	}
?>


