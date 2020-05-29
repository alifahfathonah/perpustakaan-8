
<?php
  //menyambungkan koneksi
  include '../config/koneksi.php';

//session_start();
//if(isset($_SESSION['username']) ){
//header("Location: 404.php");}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles template ini-->
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <!-- Custom Fonts Awesome-->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        
        <style type="text/css">
        .login{
          width:350px;
          min-height:350px;
          border:#CCC solid 1px;
          background:white;
          padding:20px;
          margin:20px auto;
          box-shadow: 0 2px 7px rgba(0, 0, 0, 0.1);
        }
        .login h1{
          font-size:50px;
          color:#00FFFF;
          text-align:center;
        }
        .footer_copyright a {
          color: green;
        }
        </style>
    </head>
    <body>
       <div class="container"> 
        <br>
        <br>
    <nav>
    <ul class="nav navbar-nav">
        <li><img width="60px" src="../img/logo.jpeg"></li>
        <div class="navbar-brand" style="margin-top: -1.5%">&nbsp;Perpustakaan<br><font size="4px">&nbsp;SMK PATRIOT 2 BEKASI</font></div>
    </ul>
  </nav>
  <br>
  <br>
  <br>
  <br>
         <div class="row">
              <div class="col-lg-12">
                   <div class="login">
                     <p align="center"> <img src="../img/logo.jpeg" width="130"></p>
                      <h3 align="center"> <b>LOGIN ADMIN</b></h3>
                   <hr>

                   
                   <form action="../config/proses-login.php" method="POST">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="no_induk" placeholder="e.g. 888192812"  class="form-control" required>
                        </div>
                    <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="password" placeholder="Password"  class="form-control" required>
                        </div>
                  
                   <br>
                   <button class="btn btn-success btn-block" type="submit" value="Login">Login</button>
                   </form>
                   
    </div>
  </div>
 </div>
</div>
<br>
  <br>
<br>
<br>
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
      
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>

    </body>
</html>
