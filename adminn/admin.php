<?php
include '../config/koneksi.php';
  if(isset($_GET['content'])) $content = $_GET['content']; 
      else $content = "home-admin";
?>

<!doctype html>
<html lang="en">
<head>
	

	<title>Admin</title>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="bootstrap3/js/bootstrap.min.js" rel="stylesheet">



    <script src="assets/js/jquery.3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>



</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="black" data-image="../img/bg1.jpg">

    	<div class="sidebar-wrapper">
            <div class="logo">
               <img width="30px" src="../img/logo.jpeg">
               <div style="margin-top: -15%"><center> PERPUSTAKAAN</center>
               <center><font size="1px">SMK PATRIOT 2 BEKASI</font></center></div>
            </div>
            <ul class="nav">
                <li class="active">
                </li>
                <li>
                    <a href="admin.php?content=home-admin">
                        <p>Home</p>
                    </a>
                </li>
                 <li>
                    <a href="admin.php?content=data-buku">
                        <p>Data Buku</p>
                    </a>
                </li>
                <li>
                    <a href="admin.php?content=data-anggota">
                        <p>Data Anggota</p>
                    </a>
                </li>
                <li>
                    <a href="admin.php?content=cetak-kartu-anggota">
                        <p>Cetak Kartu Anggota</p>
                    </a>
                </li>
                <li>
                    <a href="admin.php?content=data-peminjaman">
                        <p>Data Peminjaman</p>
                    </a>
                </li>
                <li>
                    <a href="admin.php?content=data-karyawan">
                        <p>Data Karyawan</p>
                    </a>
                </li>
                <li>
                    <a href="admin.php?content=laporan-kehilangan">
                        <p>Laporan Kehilangan</p>
                    </a>
                </li>
                <li>
                    <a href="admin.php?content=data-denda">
                        <p>Data Denda</p>
                    </a>
                </li>
				<li>
                    <a href="admin.php?content=laporan-kunjungan">
                        <p>Laporan Kunjungan</p>
                    </a>
                </li>
                <li>
                    <a href="admin.php?content=manajemen-user">
                        <p>Manajemen User</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

   <!--  <div class="main-panel"> -->
        <nav class="navbar navbar-default navbar-fixed">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <span class="fa-stack fa-2x has-badge" data-count="99">
                    <i class="fa fa-bell fa-stack-1x"></i>
                    </span>
                </li>
                <li>
                    <a href="admin.php?content=akun">
                    <p>Account</p>
                    </a>
                </li>
                <li>
                <a href="../config/logout.php">
                <p>Logout</p>
                </a>
                </li>
            </ul>
        </nav>
<!--     </div> -->
 <div>
 <?php

        if ($content=='home-admin')
    include 'home-admin.php';
        else if ($content=='akun')
    include 'akun.php';
        else if ($content=='data-buku')
    include 'data-buku.php';
        else if ($content=='data-anggota')
    include 'data-anggota.php';
        else if ($content=='cetak-kartu-anggota')
    include 'cetak-kartu-anggota.php';
        else if ($content=='data-peminjaman')
    include 'data-peminjaman.php';
        else if ($content=='data-karyawan')
    include 'data-karyawan.php';
        else if ($content=='laporan-kehilangan')
    include 'laporan-kehilangan.php';
        else if ($content=='data-denda')
    include 'data-denda.php';
        else if ($content=='laporan-kunjungan')
    include 'laporan-kunjungan.php';
     else if ($content=='manajemen-user')
    include 'manajemen-user.php';

?>
</div>
 <div class="footer-bottom">
    <div class="container">
      <div style="visibility: visible; animation-name: zoomIn;" class="col-md-12 text-center wow zoomIn">
        <div class="footer_copyright">
          <p> 2020 © Kerja Praktek | Sapitri Anggraini | 2017230016</p>
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
</html>
