<!-- 
File name: profile.php
Authors: Alexander Baraniak & Erik Van Maren
Web site name: Potatoes and Vodka
Description: This is the profile page. This page is accessible by all users for the duration of the BETA. For now, it allows users to create their own blogs, which are then displayed on the home page.
-->

<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("blog1");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>profile - Post a new entry</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>

    	<header id="head" >
			<p>Potatoes and Vodka "BETA" - Profile - Write a new Blog!</p>
		 	<p><a href="register.php"><span id="register">Register</span></a></p>
            <p><a href="login.php"><span id="login">Login</span></a></p>
            <p><a href="index.php"><span id="home">Home</span></a></p>
            <p><a href="profile.php"><span id="profile">Profile</span></a></p>
		</header>
        
        <div id="dev-wrapper"><br />Developed By Alexander Baraniak and Erik Van Maren<hr /></div>

		<?php
		if(isset($_POST['submit']))
		{
			$title = $_POST['title'];
			$category = $_POST['category'];
			$content = $_POST['content'];
	
			mysql_query("INSERT INTO blogData (title, category, content) VALUE('$title', '$category', '$content')");
			echo "Data has been posted, click <a href='index.php'>here</a> to see it!";
		}
		else
		{
		?>

		<div id="main-wrapper">
		 	<div id="profile-wrapper">

				<form action='profile.php' method='post'>
					Title: <input type='text' name='title' /><br />
					Category: <input type='text' name='category' /><br />
					<div> Content: </div><textarea style="width:500px; height:400px;" name='content' ></textarea><br />
				<input type='submit' name='submit' value='Post!' />
			</form>

            </div>
        </div>

		<?php
		}
		?>

	</body>
</html>