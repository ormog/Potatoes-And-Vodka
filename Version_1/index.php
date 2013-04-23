<?php
mysql_connect("localhost", "root", "");
mysql_select_db("blog1");
?>

<html>
<head>
<title>Potatoes and Vodka</title>
</head>
<body>

Here Is My Blog<hr />

<?php
$sql = mysql_query("SELECT * FROM blogData ORDER BY id DESC");
while($row = mysql_fetch_array($sql))
{
	$title = $row['title'];
	$content = $row['content'];
	$category = $row['category'];
	?>

<table border='1'>
<tr><td><?php echo $title; ?></td><td><?php echo $category; ?></td></tr>
<tr><td colspan='2'><?php echo $content; ?></td></tr>
</table>

<?php
}
?>

</body>
</html>