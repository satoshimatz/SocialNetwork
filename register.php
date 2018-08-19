
<?php
   require 'config/config.php';
   require 'includes/form_handlers/register_handler.php'
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

		<br>

		<?php
			if(in_array("<span style='color:#14C800'> You´re all set! Goahead and login</span><br>",$erro_array))echo "You´re all set! Goahead and login <br>"; 
		 ?>
    
	</form>
</body>
</html>