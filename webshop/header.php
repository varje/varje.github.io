<?php session_start();
require_once("config.php");?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Local file imports in case ethernet doesn't work -->
    <link rel="stylesheet" href="outsource/bootstrap.min.css">

    <!-- CDN imports for Bootstrap, Jquery and Font Awesome Icons -->
    <script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.min.css">
    <title>Looga Talupood</title>
</head>
<body>
<div class="jumbotron header">
    <div class="header-box">
        <h2 class="header_text">Looga Talupood</h2>
        <br/>
        <br/>
        <p class="header_text">
            <a href="https://www.linkedin.com/in/varje-kass/"><i class="fa fa-linkedin"></i></a>
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=varjekass@gmail.com"><i class="glyphicon glyphicon-envelope"></i></a>
            <a href="https://www.facebook.com/varje.kass"><i class="fa fa-facebook"></i></a>
            <a href="skype:varje..?add"><i class="fa fa-skype"></i></a>
        </p>
    </div>
</div>
<ul class="nav nav-pills nav-justified">
    <li class="btn-success"><a href="index.php">Esileht</a></li>
    <li class="btn-success"><a href="pood.php">Pood</a></li>
    <li class="btn-success"><a href="ostukorv.php">Ostukorv</a></li>
    <li class="btn-success"><a href="info.php">Info ja KKK</a></li>
    <li class="btn-success"><a href="kontakt.php">Kontakteeru</a></li>
        <?php
        if($_SESSION)
        {
            echo '<li class="btn-success"><a href="logout.php"><span>Logi välja</span></a></li><li class="btn-success">Tere, ', $_SESSION['username'], '</li>';
        }
        else
        {
            echo ' <li class="btn-success"><a href="login.php">Logi sisse</a></li>
    <li class="btn-success"><a href="registreeru.php">Registreeru</a></li>';
        }
        ?>
</ul>
