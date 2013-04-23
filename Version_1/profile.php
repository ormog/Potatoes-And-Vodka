<?php
mysql_connect("localhost", "root", "");
mysql_select_db("blog1");
?>

<html>
<head>
<title>profile - Post a new entry</title>
</head>
<body>

<?php
if(isset($_POST['submit']))
{
	$title = $_POST['title'];
	$category = $_POST['category'];
	$content = $_POST['content'];
	
	mysql_query("INSERT INTO blogDATA (title, category, content) VALUE('$title', '$category', '$content')");
	echo "Data has been posted, click <a href='index.php'>here</a> to see it!";
}
else
{
	?>

<form action='profile.php' method='post'>
Title: <input type='text' name='title' /><br />
Category: <input type='text' name='category' /><br />
Content: <textarea name='content' ></textarea><br />
<input type='submit' name='submit' value='Post!' />
</form>

<?php
}
?>

</body>
</html>