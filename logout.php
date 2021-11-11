<?php 
session_start();

unset ($_SESSION['id']);
unset ($_SESSION['name']);
unset ($_SESSION['phone']);
unset ($_SESSION['email']);
unset ($_SESSION['pass']);
unset ($_SESSION['user_login']);

header("Location: index.php");



?>