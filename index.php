<?php
  $con = mysqli_connect("localhost","root","","social");//Conecting to database variable

  if(mysqli_connect_errno()){
  	echo "Failed to connect:".mysqli_connect_errno();
  }
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to MILBOOK</title>
</head>
<body>
	Hello Bruce!!!
</body>
</html>