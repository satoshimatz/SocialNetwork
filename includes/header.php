<?php
  require 'config/config.php';

  if(isset($_SESSION['username'])){
  	$userLoggedIn=$_SESSION['username'];
  	$user_details_query =  mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
  	$user=mysqli_fetch_array($user_details_query);

  }else{
  	header("Location:register.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to MILBOOK</title>
	<!-- Javascript-->
	<script src="assets/js/bootstrap.js"> </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!--   CSS   -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!-- Google Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> 
	
</head>
<body>
	
	<div class="top_bar">
		<div class="logo">
			<a href="index.php">Milbook!</a>
		 </div>
		 <nav class="navi">
		 	<a href="#"> <?php 
		 		echo$user['first_name']
		 	 ?></a>
		 	<a href="#"><i class="fas fa-envelope fa-lg"></i></a>
		 	<a href="#"> <i class="fas fa-home fa-lg"></i></a>
		 	<a href="#"> <i class="fas fa-bell fa-lg"></i></a>
			<a href="#"><i class="fas fa-users fa-lg"></i></a>
		 	<a href="#"><i class="fas fa-cog fa-lg"></i></a>
		 	<a href="#"><i class="fas fa-users fa-lg"></i></a>
		 </nav>
	</div>
	  

  

	 


