<?php
session_start();
$_SESSION['name'] = '';
session_destroy();
?>