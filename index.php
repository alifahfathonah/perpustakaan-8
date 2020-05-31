<?php
include 'config/koneksi.php';

  if(isset($_GET['content'])) $content = $_GET['content']; 
      else $content = "index";
?>
<!DOCTYPE html>
<html lang="en" class="js no-touch">

<head>
  <title>Perpustakaan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,600|Raleway:600,300|Josefin+Slab:400,700,600italic,600,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/slick-team-slider.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
    .navbar-default .navbar-brand {
    color: green;
    }
    .navbar-default .navbar-nav > .active > a,.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus
    {
      border-bottom: 2px solid green;
        outline: none;
    }
    .footer_copyright a {
        color: green;
    }
  </style>
</head>

<body>

  <div class="main-navigation navbar-fixed-top">
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			  </button>
    <ul class="nav navbar-nav">
        <li><img width="60px" src="img/logo.jpeg"></li>
        <a class="navbar-brand" href="index.php?content=index">&nbsp;&nbsp;Perpustakaan<br><font size="4px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SMK PATRIOT 2 BEKASI</font></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php?content=index">Home</a></li>
          <li><a href="index.php?content=kunjungan">Kunjungan</a></li>
          <li><a href="index.php?content=pencarian_buku">Pencarian Buku</a></li>
          </ul>
      </div>
    </div>
    </nav>
  </div>

<br>
<br>
<br>
 
    <div>
      <?php
      if ($content=='index')
      include 'home_user.php'; 
      else if ($content=='kunjungan')
      include 'kunjungan.php';
      else if ($content=='pencarian_buku')
      include 'pencarian_buku.php';
      else if($content=='pencarian_buku1')
      include 'pencarian_buku1.php';
      else if($content=='pencarian_buku2')
      include 'pencarian_buku2.php';
      else if($content=='pencarian_buku3')
      include 'pencarian_bukunext.php';
      else if($content=='lihat-detail')
      include 'lihat-detail.php';
      
      ?>
    </div> 


  <footer class="footer section-padding">
    <div class="container">
      <div class="row">
        <div style="visibility: visible; animation-name: zoomIn;" class="col-sm-12 text-center wow zoomIn">
          <h3>Follow us on</h3>
          <div class="footer_social">
            <ul>
              <li><a class="f_facebook" href="https://www.facebook.com/SMKPatriot2Bks/"><i class="fa fa-facebook"></i></a></li>
              <li><a class="f_instagram" href="https://www.instagram.com/osissmkpatriot2/"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="footer-bottom">
    <div class="container">
      <div style="visibility: visible; animation-name: zoomIn;" class="col-md-12 text-center wow zoomIn">
        <div class="footer_copyright">
          <p> 2020 © Kerja Praktek</p>
          <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">Sapitri Anggraini</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/slick.min.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
