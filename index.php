<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Hệ thống quản lý đoàn khách </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <!--imported by me-->
  <link rel="stylesheet" type="text/css" href="style.css"/>
  <style>
    *{
      margin: 0px; padding: 0px;
    }
  </style>
</head>


<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">




<!--NAVBAR-->
<?php 
error_reporting(E_ERROR | E_PARSE); //hide Warning message
include "navbar.php"; 
include "database.php"; 
include "function.php";
session_start(); 
?>

<img src="images/banner.jpg" style="width:100%; margin: 0px 0px 20px 0px;"/>



<div class="container">


    <?php
      $page = "homepage.php";

      if(isset($_GET['key'])){
        $page=$_GET['key'];
      }
      
      include $page;
    ?>





<!-- Footer -->
<div class="panel panel-default">
  <div class="panel-body">
    Footer
  </div>
</div>





</div><!--container-->



</body>
</html>
