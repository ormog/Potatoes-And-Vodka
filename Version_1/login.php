<?php
mysql_connect("localhost", "root", "");
mysql_select_db("blog1");
?>

<html>
<head>
<title>Login</title>
</head>
<body>

<?php
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$pass = $_POST['password'];

	$result = mysql_query("SELECT * FROM users WHERE name='$name' AND pass='$pass'");
	$num = mysql_num_rows($result);
	if($num == 0) 
	{
		echo "Bad login, go <a href='login.php'>back</a>";
	}
	else
	{
		session_start();
		$_SESSION['name'] = $name;
		header("Location: profile.php");
	}
	}
	else
	{
	?>
    
<form action='login.php' method='post'>
Username: <input type='text' name='name' /><br />
Password: <input type='password' name'password' /><br />
<input type='submit' name'submit' value'Login!' />
</form>

<?php
}
?>

</body>
</html>