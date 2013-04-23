<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("blog1"); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Potatoes and Vodka</title>
	</head>
	<body>

		Welcome to our Blog<hr />

		<?php
		$sql = mysql_query("SELECT * FROM blogData ORDER BY id DESC");
		while($row = mysql_fetch_array($sql))
		{
			$title = $row['title'];
			$content = $row['content'];
			$category = $row['category'];
		?>

		<table border='1'>
			<tr>
            	<td><?php echo $title; ?></td><td><?php echo $category; ?>
                </td>
            </tr>
			<tr>
            	<td colspan='2'><?php echo $content; ?>
                </td>
            </tr>
		</table>

		<?php
		}
		?>
        
        <form method="post" action="/path/to/comments.php">
			<label for="author">Your name:</label><input name="author" id="author" />
			<textarea name="comment"></textarea>
			<input type="hidden" name="url" value="<?php echo htmlentities($_SERVER['REQUEST_URI'])?>" />
			<input type="submit" />
		</form>

	</body>
</html>

<?php
 	/* ---This was commented out, as we could not figure out the correct to access the database without generating a fatal error.---
    $db = DB::connect('localhost', 'root', '');

    $result = $db->query("SELECT * FROM `comments` WHERE `url`=?", array($_SERVER['REQUEST_URI']));

    while($row = $result->fetchRow()) {
        echo "<div class=\"comment\">";
        echo "<div class=\"author\">Comment By:".htmlentities($row['author'])."</div>";
        echo htmlentities($row['comment']);
        echo "</div>";
    } */
?>