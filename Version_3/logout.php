<!-- 
File name: logout.php
Authors: Alexander Baraniak & Erik Van Maren
Web site name: Potatoes and Vodka
Description: This is the logout page. The current user session is destroyed upon logging out. Users are given the option to click on a hyperlink that will redirect them to the home page.
-->

<?php
	//This destroys the current session and logs the user out.
	session_start();
	$_SESSION['name'] = '';
	session_destroy();
	//This informs the user that they have been logged out, and provides a hyperlink to the home page.
	return "You have been logged out.<br/> <a href='index.php'>Return to the home page.</a>";
?>