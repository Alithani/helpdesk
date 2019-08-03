<?php
     require("../link.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CRS</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brands" href="index.php">HELP DESK</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto " id="navs">
          <li class="nav-item" id="linavs">
            <a class="nav-link" href="bookassets.php">New Ticket
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item" id="linavs">
            <a class="nav-link" href="alltickets.php">All Tickets</a>
          </li>
          <li class="nav-item" id="linavs">
            <a class="nav-link" href="request.php">Request For Resource</a>
          </li>
          <li class="nav-item" id="linavs">
            <a class="nav-link" href="resorcestatus.php">All Resource Requests</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
        </ul>
        
      </div>
    </div>
  </nav>
 

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 
