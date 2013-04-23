<?php
    $db = DB::connect('localhost', 'root', ''); // Connect to the database. This may not actually work.

    $db->insert("INSERT INTO `comments` (`url`, `author`,`comment`) VALUES (?,?,?)", array($_POST['url'], $_POST['author'], $_POST['comment']));

    header("Location: ".$_POST['index.php']); // Redirect back to the commented page, which is part of the index.
?>