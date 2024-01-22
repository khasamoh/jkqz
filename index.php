<?php
session_start();

include 'class/authentication.php';
$call = new Authentication();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JUMUIYA YA KUHIFADHISHA QUR-AN ZANZIBAR</title>
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
</head>
<style>
  body {
      background: #563c55 url(images/bg.jpg) no-repeat center top;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      background-size: cover;
  }
  .box-info, .login-box-body{
  box-shadow: 0.4px 5px 12px #000 !important;
  }

  .login-box-message{
    box-shadow: 0px 1px 3px #000 !important;
    border-left: 4px solid #04ae00;
    padding: 10px !important;
  }

  .btn-info{
    color: #fff !important;
    font-weight: bold;
  }

  .btn-info:hover{
    box-shadow: 0 5px 7px 0 rgba(0,0,0,0.4), 0 6px 20px 0 rgba(0,0,0,0.2);
    webkit-transition: background-color .3s,color .15s,box-shadow .3s,opacity 0.3s;
      transition: background-color .3s,color .15s,box-shadow .3s,opacity 0.3s;

  }

  .container > header h1,
  .container > header h2 {
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,0.7);
  }
</style>
<body>
<div class="container-flud"><br>

    <h1></h1>
    <div class="login-box">
    <div class="login-logo">
      <center>
        <a href="index.php">
          <img src="images/jkqz_logo.png" class="img-responsive" style="max-width:180px;" alt="loading..."/>
          <b style="color:white;">Login</b>
        </a>
      </center>
    </div>
    <div class="row">
      <?php

        if (isset($_POST['login'])) {
            echo $call->login();
        }
      ?>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Only authorized users</p>

      <form action="index.php" method="post" autocomplete="off">
        <div class="input-group">
          <input class="form-control" placeholder="username" type="text" name="username" autofocus required>
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
        </div><br>
        <div class="input-group">
          <input class="form-control" placeholder="Password" type="password" name="password" required>
          <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
        </div><br>
        <div class="row">
          <div class="col-xs-8">
            
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!--<a href="#">I forgot my password</a><br>-->
    </div>
    <!-- /.login-box-body -->
  </div>
</div>
</body>
</html>