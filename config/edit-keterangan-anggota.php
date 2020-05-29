<?php

	include 'koneksi.php';

    $id_siswa       = $_POST['id_siswa'];
    $no_induk       = $_POST['no_induk'];
    $nama_siswa     = $_POST['nama_siswa'];
    $kelas_siswa    = $_POST['kelas_siswa'];
    $jurusan        = $_POST['jurusan'];
    $agama_siswa    = $_POST['agama_siswa'];
    $alamat_siswa   = $_POST['alamat_siswa'];
    $jk_siswa       = $_POST['jk_siswa'];
    $hp_siswa       = $_POST['hp_siswa'];
    $email_siswa    = $_POST['email_siswa'];
    $tahun_masuk    = $_POST['tahun_masuk'];
    $status_siswa   = $_POST['status_siswa'];

    $update     = "UPDATE tbl_siswa SET no_induk='$no_induk', nama_siswa='$nama_siswa', kelas_siswa='$kelas_siswa', jurusan='$jurusan', agama_siswa='$agama_siswa', alamat_siswa='$alamat_siswa', jk_siswa='$jk_siswa', hp_siswa='$hp_siswa', email_siswa='$email_siswa', tahun_masuk='$tahun_masuk', status_siswa='$status_siswa'  WHERE id_siswa='$id_siswa'";

	$update	= mysqli_query($konek, $update)or die(mysqli_error());

	if ($update)
    	{
    		echo "<br><br><br><strong><center><i>Berhasil Edit Data Anggota!";
    		echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?content=data-anggota">';
    	}
	else {
    		print"
    			<script>
    				alert(\"Balasan gagal ditambah!\");
    				history.back(-1);
    			</script>";
    	}
?>


