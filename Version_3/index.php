<!-- 
File name: index.php
Authors: Alexander Baraniak & Erik Van Maren
Web site name: Potatoes and Vodka
Description: This is the index and the home page our of site. All written blogs are viewed form this page. We had experimented with a comment.php page in version 2, but decided to scrap it as we could not implement the functionality into our existing code.
-->

<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("blog1"); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Potatoes and Vodka</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
    	<header id="head" >
			<p>Potatoes and Vodka "BETA" - Our Attempt at a Blogging site!</p>
		 	<p><a href="register.php"><span id="register">Register</span></a></p>
            <p><a href="login.php"><span id="login">Login</span></a></p>
            <p><a href="index.php"><span id="home">Home</span></a></p>
            <p><a href="profile.php"><span id="profile">Profile</span></a></p>
		</header>

		<div id="dev-wrapper"><br />Developed By Alexander Baraniak and Erik Van Maren<hr /></div>

		<?php
		$sql = mysql_query("SELECT * FROM blogData ORDER BY id DESC");
		while($row = mysql_fetch_array($sql))
		{
			$title = $row['title'];
			$content = $row['content'];
			$category = $row['category'];
		?>
        
        <div id="main-wrapper">
		 	<div id="index-wrapper">

				<table border='1'>
					<tr>
            			<td style="font-size:24px"><?php echo $title; ?></td><td></td><td style="font-size:20px"><?php echo $category; ?>
               			</td>
            		</tr>
					<tr>
            			<td colspan='2' style="text-align:justify"><br><br><?php echo $content; ?>
                		</td>
            		</tr>
				</table>
   
        	</div>
        </div>

		<?php
		}
		?>

	</body>
</html>