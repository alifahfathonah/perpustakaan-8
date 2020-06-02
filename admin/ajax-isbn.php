<?php
include '../config/koneksi.php';

$isbn = $_GET['isbn'];

$select  = "SELECT * FROM tbl_buku WHERE isbn='$isbn'";
$query   = mysqli_query($konek, $select)or die(mysqli_error($konek));
$tampil  = mysqli_fetch_array($query); 


$judul = $tampil['judul'];

echo $judul;

?> 
