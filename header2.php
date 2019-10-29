<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|East+Sea+Dokdo|Handlee|Kalam|Pacifico|Sacramento|Shadows+Into+Light" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="fonts.css" rel="stylesheet">
<style type="text/css">

* {
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: Whitney SSm A,Whitney SSm B;
}
 
body {
  width: 100%;
  height: 100%;
  padding: 0;
  margin: 0;
}

/* Navigation */
.navigation {
  position: absolute;
  width: 100%;
  height: 100px;
  padding: 0 100px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  z-index: 2000;
  position: fixed;
  transition: all 900ms ease-in-out;
}
 
.navigation-left {
  margin-left: -398px;
}
 
.logo{
  color: #ffe;
  font-weight: bold;
  letter-spacing: 0.5px;
  font-size: 23px;
  margin: 0;
  padding: 0;
  margin-bottom: 6px;
}

.navigation-left a {
  text-decoration: none;
  .text-transform: uppercase;
  color: #ffe;
  font-size: 13px;
  font-weight: normal;
  letter-spacing: 0.5px;
  width: 90px;
  height: 30px;
  border: 2px solid transparent;
  border-radius: 15px;
  display: inline-block;
  text-align: center;
  line-height: 25px;
  transition: all .2s;
}
 
.navigation-left a:hover,
.navigation-left a:focus {
  border-color: rgb(234, 46, 73);
  background-color: rgba(44, 45, 47, 0);
}
 
.navigation-center {
  margin-right: 85px;
}
 
.navigation-right {
  display: flex;
  align-items: center;
}
 
.login-btn {
  background-color: #b8b8b9;
  width: 97px;
  height: 30px;
  display: inline-block;
  text-align: center;
  text-decoration: none;
  font-size: 15px;
  font-weight: bold;
  border-radius: 15px;
  border: none;
  color: #333745;
  text-transform: none;
  margin-left: 20px;
  transition: all .2s;
  cursor: pointer;
}
.login-btn:hover {
  transform: scale(1.06);
}

	</style>
</head>
<body>

<?php 
session_start(); 
if(isset($_GET['action']) && $_GET['action']=='logout'){
  unset($_SESSION['id']);
  unset($_SESSION['name']);
  unset($_SESSION['register']);
  setcookie('name', "", 0, "/");
  setcookie('password', "", 0, "/");
  header('location:13page.php');
}
if( isset( $_SESSION['name'] ) ) {
      $string=$_SESSION['name'];
      $string = strip_tags($string); if (strlen($string) > 9) { 
      $stringCut = substr($string, 0, 9);     
      $endPoint = strrpos($stringCut, ' '); 
      $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);     
      $string .= '..'; } 
      $login= $string;
      $linklogin= "page34.php";
      $linkwritter= "page27.php";
}else {
      $login= "Join us";
      $linklogin= "14page.php";
      $linkwritter= "#";
}
if( isset( $_SESSION['register'] ) ) {
      $register= $_SESSION['register'];
      $linkregister= "13page.php?action=logout";
      $display="<style> .dnone { display:block;} .navigation-left {margin-left: -270px;} </style>";
}else {
      $register= "Register";
      $linkregister= "14page.php";
      $display="<style>.dnone { display:none;} .navigation-left {margin-left: -388px;} </style>";
}

?>

<!-- Navigation -->

<div class="navigation" id="navigation">

  <div class="logo">
    <p>AddmissionASK</p>
  </div>

  <div class="navigation-left">
    <a href="13page.php">Home</a>
    <a href="page26.php">Notice</a>
    <a href="page29.php">Result</a>
    <a href="page30.php">Scholarship</a>
  </div>

  <div class="navigation-right">
    <?php echo $display; ?>
    <?php echo "<button class=\"login-btn\" onclick=\"location.href='".$linklogin."'\">".$login."</button>"; ?>
    <?php echo "<button class=\"login-btn dnone\" onclick=\"location.href='".$linkregister."'\">".$register."</button>"; ?>
  </div>

</div>


<script type="text/javascript">

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
      document.getElementById("navigation").style.height = "60px";
      document.getElementById("navigation").style.backgroundColor = "rgba(0,0,0,0.8)";
    } else {
      document.getElementById("navigation").style.height = "100px";
      document.getElementById("navigation").style.backgroundColor = "transparent";
    }
}

</script>


</body>
</html>

<!--

font-family: 'Pacifico', cursive;
font-family: 'Shadows Into Light', cursive;
font-family: 'Dancing Script', cursive;
font-family: 'Kalam', cursive;
font-family: 'Handlee', cursive;
font-family: 'Sacramento', cursive;
font-family: 'East Sea Dokdo', cursive;

-->