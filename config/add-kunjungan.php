<!-- <?php

// 	error_reporting(0);

// 	include 'koneksi.php';

// 	$tgl_kunjungan		= date('Y-m-d');
// 	$no_induk		   	= $_POST['no_induk'];


// $insert			= "INSERT INTO tbl_kunjungan VALUES ('', '$tgl_kunjungan', '$no_induk')";

// 	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

// 	echo "<br><br><br><strong><center><i>Terimakasih anda telah mengisi daftar kunjungan!";
// 	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../index.php?content=kunjungan">';




// $query=  mysql_fetch_array(mysql_query("SELECT no_induk FROM tbl_siswa WHERE no_induk='$no_induk'")); {
// if 

// 	$insert			= "INSERT INTO tbl_kunjungan VALUES ('', '$tgl_kunjungan', '$no_induk')";

// 	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));
// 	echo "<br><br><br><strong><center><i>Terimakasih anda telah mengisi daftar kunjungan!";
//  	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../index.php?content=kunjungan">';


// }
// else {

// 	echo "<br><br><br><strong><center><i>zzzz!";
//  	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../index.php?content=kunjungan">';


// }

// }
?> -->


<!-- <?php
include 'koneksi.php';


$no_induk           = $_POST['no_induk'];

$sql=mysqli_query("SELECT no_induk FROM tbl_siswa WHERE no_induk='$no_induk'");
$cek=mysqli_num_rows($sql);

if ($cek==0){
    echo "<br><br><br><strong><center><i>tidak terdaftar!";
    echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../index.php?content=kunjungan">';
}
else{
    // $insert         = "INSERT INTO tbl_kunjungan VALUES ('', '$tgl_kunjungan', '$no_induk')";

    // $simpan         = mysqli_query($konek, $insert)or die(mysqli_error($konek));

    echo "<br><br><br><strong><center><i>Terimakasih anda telah mengisi daftar kunjungan!";
    echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../index.php?content=kunjungan">';
}
?> -->
<!-- 
<?php
include 'koneksi.php';

$tgl_kunjungan      = date('Y-m-d');
$no_induk           = $_POST['no_induk'];

if (isset($_POST["no_induk"])) {
    $insert         = "INSERT INTO tbl_kunjungan VALUES ('', '$tgl_kunjungan', '$no_induk')";

    $simpan         = mysqli_query($konek, $insert)or die(mysqli_error($konek));

    echo "<br><br><br><strong><center><i>Terimakasih anda telah mengisi daftar kunjungan!";
    echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../index.php?content=kunjungan">';   
} else {    
    echo "N0, mail is not set";
}
	
?> -->

<?php
include 'koneksi.php';

$tgl_kunjungan      = date('Y-m-d');
$no_induk           = $_POST['no_induk'];

$sql=mysqli_query("SELECT no_induk FROM tbl_siswa WHERE no_induk='$no_induk'");
$cek=mysqli_num_rows($sql);

$no_induk = 0;


// True because $a is set
if (isset($no_induk)) {
  echo "Variable 'a' is set.<br>";
}

$no_induk = null;
// False because $b is NULL
if (isset($no_induk)) {
  echo "Variable 'b' is set.";
}
?>


