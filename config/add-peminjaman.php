
 <?php

	error_reporting(0);

	include 'koneksi.php';

	$tgl_peminjaman         = date("Y-m-d");
    $tgl_pengembalian       = date('Y-m-d', strtotime('+14 days', strtotime($tgl_peminjaman)));
    $no_induk               = $_POST['no_induk'];
    $status_buku            = 1;
    $id_buku                = $_POST['judul'];

	$insert					= "INSERT INTO tbl_peminjaman VALUES ('', '$tgl_peminjaman', '$tgl_pengembalian', '$no_induk', '$status_buku', '$id_buku')";

	$simpan					= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	echo "<br><br><br><strong><center><i>Anda berhasil menambahkan data Peminjaman!";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?content=data-peminjaman">';

?>