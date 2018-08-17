
<?php
   session_start();
  $con = mysqli_connect("localhost","root","","social");//Conecting to database variable

  if(mysqli_connect_errno()){
  	echo "Failed to connect:".mysqli_connect_errno();
  }
    ///##############DECLARING VARIABLES########################
	$fname ="";//Fisrtname
  	$lname ="";//Lastname
  	$em ="";//email
	$em2 ="";//email2
	$password="";//password
	$password2="";//password2
	$date="";//Date sing up
	$erro_array=array();//Holds error message
	
	
    
	if(isset($_POST["register_button"])){
		
		//Registrationr form value

        //first name
		$fname = strip_tags($_POST['reg_fname']);
		$fname = str_replace(' ', '', $fname);
		$fname= ucfirst(strtolower($fname));
		$_SESSION['reg_fname']=$fname;
			//last name
		$lname = strip_tags($_POST['reg_lname']);
		$lname = str_replace(' ', '', $lname);
		$lname= ucfirst(strtolower($lname));
		$_SESSION['reg_lname']=$lname;
			//email
		$em = strip_tags($_POST['reg_mail']);
		$em = str_replace(' ', '', $em);
		$em= ucfirst(strtolower($em));
			$_SESSION['reg_mail']=$em;
			//email2
		$em2 = strip_tags($_POST['reg_mail2']);
		$em2 = str_replace(' ', '', $em2);
		$em2= ucfirst(strtolower($em2));
			$_SESSION['reg_mail2']=$em2;
			//password
		$password = strip_tags($_POST['reg_password']);
		$password2 = strip_tags($_POST['reg_password2']);
		$date=date("Y-m-d");//Current day 
      ////////////////////////////////////////////////////////////////////

		if($em == $em2){

					if(filter_var($em,FILTER_VALIDATE_EMAIL)){

					$em= filter_var($em,FILTER_VALIDATE_EMAIL);
					$e_check=mysqli_query($con,"SELECT email FROM users WHERE email='$em'");
					//count number of rows returned
					$num_rows=mysqli_num_rows($e_check);
					
					if($num_rows > 0){
					array_push($erro_array,"email is already in use");
					}
			}
			else{
				array_push($erro_array,"invalid format");
			}
		}
		
		else{
			array_push($erro_array,"Emails do not match<br>"); 
		}

	 if(strlen($fname)>30 || strlen($fname)< 2){
	 	 array_push($erro_array,"Your   name  must be betwen 2 and 30 characters<br>");
	 }
	 if(strlen($lname)>30 || strlen($fname)< 2){
	 	 array_push($erro_array,"Your last  name  must be betwen 2 qnd 30 characters<br>");
	 }
	 if($password != $password2){
	 	array_push($erro_array,"the password do not match <br>");

	 }
	 else{

	 	if(preg_match('/[^A-Za-z0-9]/', $password)){
	 		array_push($erro_array,"Your password can only contain letters oor numbers");
	 	}	
	 }

	 if(strlen($password)>30 || strlen($fname)< 5){
	 	array_push($erro_array,"Your password must be betwen 5 and 30 characters ");
       }

	 	 if(empty($erro_array)) {
	 	   $password = md5($password);//encryp password before sending


	 	//Generate username by concatenenting firstnameand last name
	 	$username=strtolower($fname."_".$lname);
	 	$check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
	 	
	 	$i=0;
	 	
	    while(mysqli_num_rows($check_username_query)!=0){
           
           $i++;
           $username=$username."_".$i;
           $check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");

	 }
	 	$rand=rand(1,2);//Random number between 1 and 2

	 	if($rand==1){
	 		$profile_pic ="assets\images\profile_pics\Default\head_emerald.png";
			}
		else if($rand==2){
			$profile_pic="assets\images\profile_pics\Default\head_deep_blue.png";

		}

		$query=mysqli_query($con,"INSERT INTO users VALUES('','$fname','$lname','$username','$em','$password','$date','$profile_pic','0','0','no',',')"); 
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>welcome to MILBOOK</title>
</head>
<body>
	<form action="register.php" method="POST">
		<input type="text" name="reg_fname" placeholder="First Name" value="<?php if(isset($_SESSION['reg_fname'])){echo $_SESSION['reg_fname'];}?>" required>
		<br>
		<?php
			if(in_array("Your   name  must be betwen 2 and 30 characters<br>",$erro_array)){
			echo "Your   name  must be betwen 2 and 30 characters<br>";	
			}
		?>
		<input type="text" name="reg_lname" placeholder="Last Name" value="<?php if(isset($_SESSION['reg_lname'])){echo $_SESSION['reg_lname'];}?>" required>
		<br>
		<?php
			if(in_array("Your last  name  must be betwen 2 qnd 30 characters<br>", $erro_array)){
			echo "Your last  name  must be betwen 2 qnd 30 characters<br>";	
			}
		?>

		
		<input type="email" name="reg_mail" placeholder="Email"value="<?php if(isset($_SESSION['reg_mail'])){echo $_SESSION['reg_mail'];}?>" require>
		<br>
		
		<input type="email" name="reg_mail2" placeholder="Confirm email" required value="<?php if(isset($_SESSION['reg_mail2'])){echo $_SESSION['reg_mail2'];}?>" required>
		<br>
			<?php
			if(in_array("email is already in use", $erro_array))echo "email already in use<br>";
			if(in_array("invalid format", $erro_array))echo "invalid format<br>";
			if(in_array("Emails do not match<br>", $erro_array))echo "Emails do not match<br>";	
			?>

		<input type="password" name="reg_password" placeholder="Password" require>
		<br>
		<input type="password" name="reg_password2" placeholder="Confirm  Password" required>
		<br>
			<br>
			<?php
			
			if(in_array("the password do not match <br>", $erro_array))echo"the password do not match <br>";
			if(in_array("Your password can only contain letters oor numbers", $erro_array))echo"Your password can only contain letters oor numbers<br>";	
			if(in_array("Your password must be betwen 5 and 30 characters ", $erro_array))echo "Your password must be betwen 5 and 30 characters <br>";
	
		?>


		<input type="submit" name="register_button" value="Register">
    
	</form>
</body>
</html>