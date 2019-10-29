<?php
session_start();
if(isset($_GET['action']) && $_GET['action']=='logout'){
	unset($_SESSION['name']);
	setcookie('name', "", 0, "/");
	setcookie('password', "", 0, "/");
	header('location:page23.php');
}
echo "welcome ".$_SESSION['name'];
?>
<br>
<a href="page24.php?action=logout">Logout</a>