<?php 
include_once("config.php"); //Include the config.php file.
?>

<?php 
	//Show the registration field if the user did not click the registration button.
	if( !(isset( $_POST['register'] ) ) ) { 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>User Registration</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>

	<body>
		<header id="head" >
			<p>Potatoes and Vodka - User Registration</p>
		 	<p><a href="register.php"><span id="register">Register</span></a></p>
		</header>
		
		<div id="main-wrapper">
		 	<div id="register-wrapper">
			 	<form method="post">
					<ul>
						<li>
							<label for="usn">Username : </label>
						 	<input type="text" id="usn" maxlength="30" required autofocus name="username" />
						</li>
					
						<li>
							<label for="passwd">Password : </label>
							<input type="password" id="passwd" maxlength="30" required name="password" />
						</li>
						
						<li>
							<label for="conpasswd">Confirm Password : </label>
							<input type="password" id="conpasswd" maxlength="30" required name="conpassword" />
						</li>
						<li class="buttons">
							<input type="submit" name="register" value="Register" />
							<input type="button" name="cancel" value="Cancel" onclick="location.href='index.php'" />
					 	</li>
					
					</ul>
				</form>
			</div>
		</div>
	
	</body>
</html>

<?php 
	//This is what happens when the register button is clicked.
	} 
	else
	{
		$usr = new Users; //Create a new instance of the class 'Users'.
		$usr->storeFormValues( $_POST ); //Store the form values.

		//Register the user if both passwords are matching.
		if( $_POST['password'] == $_POST['conpassword'] ) 
		{
			echo $usr->register($_POST); 
		} 
		
		else 
		{
			//Display thismessage if the passwords do not match.
			echo "Password and Confirm password not match"; 
		}
	}
?>