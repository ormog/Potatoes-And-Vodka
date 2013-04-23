<!-- 
File name: login.php
Authors: Alexander Baraniak & Erik Van Maren
Web site name: Potatoes and Vodka
Description: This is the login page. Existing users can login into their accounts from this page.
-->

<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("blog1");
	
	include_once("config.php");

	if( !(isset( $_POST['login'] ) ) ) {
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>

	<body>
    	<header id="head" >
		<p>Potatoes and Vodka "BETA" - User Login</p>
        <p><a href="register.php"><span id="register">Register</span></a></p>
        <p><a href="login.php"><span id="login">Login</span></a></p>
        <p><a href="index.php"><span id="home">Home</span></a></p>
        <p><a href="profile.php"><span id="profile">Profile</span></a></p>
        </header>
        
        <div id="dev-wrapper"><br />Developed By Alexander Baraniak and Erik Van Maren<hr /></div>

		<?php
		if(isset($_POST['submit']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];

			$result = mysql_query("SELECT * FROM userData WHERE username='$username' AND pass='$password'");
			$num = mysql_num_rows($result);
			if($num == 0) 
			{
				echo "Bad login, go <a href='login.php'>back</a>";
			}
			else
			{
				session_start();
				$_SESSION['username'] = $username;
				header("Location: profile.php");
			}
			}
			else
			{
			?>
        <div id="main-wrapper">
		 	<div id="login-wrapper">
    
				<form action='login.php' method='post'>
                	<ul>
                    	<li>
							<label for="usn">Username : </label><input type='text' maxlength="30" required autofocus name='username' /><br />
                        </li>
                        <li>
							<label for="passwd">Password : </label><input type='password' maxlength="30" required name'password' /><br />
                        </li>
                        <li class="buttons">
							<input type='submit' name'submit' value'Login!' />
                            <input type="button" name="register" value="Register" onclick="location.href='register.php'" />
                        </li>    
                    </ul>
				</form>

			</div>
        </div>

		<?php
		}
		?>

	</body>
</html>

<?php 
} 
else 
{
	$usr = new Users; //This creates a new instance of the Users class.
	$usr->storeFormValues( $_POST ); //Use the function 'storeFormValues' to store the form values.

	if( $usr->userLogin() ) 
	{
		echo "Welcome"; 
	} 
	else 
	{
		echo "Incorrect Username/Password"; 
	}
}
?>