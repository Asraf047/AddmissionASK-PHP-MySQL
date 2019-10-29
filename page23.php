<?php
session_start();
if(isset($_COOKIE['name']) && isset($_COOKIE['password'])){
	if($_COOKIE['name']=='aaa' && $_COOKIE['password']=='111'){
		$_SESSION['name']=$_COOKIE['name'];
		header('location:page24.php');
	}else{
		$error="Account invalied";
	}
}
if(isset($_POST['login']) ){
	if($_POST['name']=='aaa' && $_POST['password']=='111'){
		$_SESSION['name']=$_POST['name'];
		if($_POST['remember'] != null){
			setcookie('name',$_POST['name'], time()+(86400*30),"/");
			setcookie('password',$_POST['password'], time()+(86400*30),"/");
		}
		header('location:page24.php');
	}else{
		$error="Account invalied";
	}
}
?>

<html>
<head>
	<title>ha ha</title>
</head>
<body>
<form method="post">  
  Name: <input type="text" name="name">
  <br><br>
  password: <input type="text" name="password">
  <br><br>
  remember me:<input type="checkbox" name="remember">
  <input type="submit" name="login" value="login">  
</form>
</body>
</html>
