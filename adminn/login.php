<?php
include '../config/koneksi.php';
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
    <nav>
    <ul class="nav navbar-nav">
        <li><img width="60px" src="../img/logo.jpeg"></li>
        <a class="navbar-brand" >&nbsp;&nbsp;Perpustakaan<br><font size="4px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SMK PATRIOT 2 BEKASI</font></a>
      </div>
    </ul>
  </nav>
    <div class="container"> 
         <div class="row">
              <div class="col-lg-12">
                   <div class="login">
                     <p align="center"> <img src="../img/logo.jpeg" width="130" height="100" ></p>
                      <h3 align="center"> LOGIN ADMIN</h3>
                   <hr>

                   
                   <form action="proses-login.php" method="POST" >
                        <div class="input-group mb-3" >
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user fa-fw"></i></span>
                          </div>
                        <input type="text" name="no_induk" placeholder="e.g. 888192812" class="form-control" maxlength="40" autofocus size="30px">
                        </div>
                    <br>
                        <div class="input-group  mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock fa-fw"></i></span>
                          </div>
                          <input id="pass1" type="password" name="password" placeholder="Password" class="form-control" maxlength="15" size="30px">
                        </div>
                   <hr>
                   <br>
                   <button class="btn btn-primary btn-block" type="submit" value="Login">Login</button>
                   </form>
                   
    </div>
  </div>
 </div>
</div>
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
