
 <?php

	// error_reporting(0);

	include 'koneksi.php';

	// $tgl_pinjam         = date('d-m-Y');
 //    $tgl_kembali       = date('d-m-Y', strtotime('+14 days', strtotime($tgl_pinjam)));
	$tgl_pinjam			= date('Y-m-d');
	$tgl_kembali		= date('Y-m-d', strtotime('+14 day', strtotime($tgl_pinjam)));
    $no_induk           = $_POST['no_induk'];
    $status_buku        = $_POST['status_buku'];
    $jml_pinjam			= $_POST['jml_pinjam'];
    $id_buku			= $_POST['judul'];


    $querycek	= "SELECT SUM(jml_pinjam) as jumlah_pinjem FROM tbl_pinjam WHERE status_buku=0 AND no_induk=$no_induk";
    $query    	= mysqli_query($konek,$querycek)or die($konek);
    $sum 		= mysqli_fetch_array($query);
    
    if ($sum['jumlah_pinjem'] == 5)
    {
    	echo "Siswa sudah meminjam 5 buku";
    }
    else {
    	$insert					= "INSERT INTO tbl_pinjam VALUES ('', '$tgl_pinjam', '$tgl_kembali', '$no_induk', '$status_buku', '$jml_pinjam', '$id_buku')";

		$simpan					= mysqli_query($konek, $insert)or die(mysqli_error($konek));

		if ($simpan)
		{
			$querydata = "SELECT * FROM tbl_buku WHERE id_buku='$id_buku'";
			$query     = mysqli_query($konek, $querydata)or die(mysqli_error($konek));
			$tampil    = mysqli_fetch_array($query);
			// var_dump($tampil);

			$sisaawal	= $tampil['sisa_buku'];
			$sisa 		= $sisaawal - $jml_pinjam;
			// var_dump($sisa);

			$queryupdate = "UPDATE `tbl_buku` SET `sisa_buku`='$sisa' WHERE id_buku='$id_buku'";
			$update		 = mysqli_query($konek, $queryupdate)or die(mysqli_error($konek));

			echo "<br><br><br><strong><center><i>Anda berhasil menambahkan data Peminjaman!";
			echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?content=data-peminjaman">';
		}
    }
	// var_dump($simpan);

?>