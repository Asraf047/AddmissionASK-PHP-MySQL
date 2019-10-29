<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login/Registration Form Transition</title>
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script|East+Sea+Dokdo|Handlee|Kalam|Pacifico|Sacramento|Shadows+Into+Light" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet prefetch'>
  <link rel="stylesheet" href="2page.css">
</head>

<style type="text/css">
.navigationl {
  background-color: rgba(0,0,0,0.5);
  position: absolute;
  width: 100%;
  height: 0px;
  top: 0px;
  display: flex;
  align-items: center;
  padding: 30px;
  justify-content: space-between;
  z-index: 20000;
  position: fixed;
  transition: all 900ms ease-in-out;
}
.logol{
  color: #ffe;
  font-weight: bold;
  font-size: 23px;
  margin-left: 70px;
}
.logor{
  color: #ffe;
  font-size: 13px;
  float: left;
  margin-right: 30px;
}
</style>

<body>
  
<?php

session_start(); 
$db = mysqli_connect("localhost","root", "", "addmission");

$nameErr = $emailErr = $passwordErr = "";
$name = $email = $password = $cpassword = "";

if(isset($_COOKIE['name']) && isset($_COOKIE['password'])){
  $name = $_COOKIE['name'];
  $password = $_COOKIE['password'];

  $result = mysqli_query($db,"select * from register where name = '$name' and password = '$password'");
  $row_cnt = mysqli_num_rows($result);

  if($row_cnt>0 ){
    $_SESSION['name']=$_COOKIE['name'];
    $_SESSION['register']="Logout";
    header('location:13page.php');
  }else{echo "<script>alert('Invalid username or password')</script>";}
}

if(isset($_POST['login'])){

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  $result = mysqli_query($db,"select id, name from register where name = '$name' and password = '$password'");
  $row_cnt = mysqli_num_rows($result);

  if($row_cnt>0 ){
    while ($row = mysqli_fetch_assoc($result)) { $_SESSION['id']= $row["id"]; $_SESSION['name']= $row["name"]; }
    $_SESSION['register']="Logout";
    if(isset($_POST["checkbox"])){
    setcookie('name',$_POST['name'], time()+(86400*30),"/");
    setcookie('password',$_POST['password'], time()+(86400*30),"/");}
    echo "<script>alert('Login successfull')</script>"; 
    header("location: 13page.php");
  }else{echo "<script>alert('Invalid username or password')</script>";}
}


if(isset($_POST['signup'])){

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["cpassword"])) {
    $passwordErr = "password is required";
  } else {
    $cpassword = test_input($_POST["cpassword"]);
  }

  $sql="INSERT INTO register( name, email, password) VALUES('$name', '$email', '$password')";

  if($password===$cpassword){

  if (mysqli_multi_query($db, $sql)) {
    echo "<script>alert('New records created successfully')</script>";
  } else {
    echo "<script>alert('Sorry, No records created. Try again.')</script>";
  }
 }else {
    echo "<script>alert('Sorry, No records created. Try again.')</script>";
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<div class="navigationl" id="navigation">

  <div class="logol">
    <p>AddmissionASK</p>
  </div>

  <div class="logor">
    <a style="float: left; padding-right: 5px; text-decoration: none; color: #ffe;" href="13page.php">Home</a>
    <p style="float: left;">/ Join us</p>
  </div>

</div>

<div class="cont">

  <div class="form sign-in" align="center">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <h2>Welcome back</h2>
    <label>
      <span>Name</span>
      <input type="text" name="name" required/>
    </label>
    <label>
      <span>Password</span>
      <input type="password" name="password" required />
    </label><br>
    <input type="checkbox" style="float: left; width: 83%;" name="checkbox"/>
    <a class="forgot-pass" style="margin-left: -470px;" href="#">Remember me</a>
    <button style="margin-top: 15px;" type="submit" name="login" value="Submit" class="submit">Sign In</button>
    <a class="forgot-pass" href="#">Forgot password?</a>
    </form>
  </div>

  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>New here?</h2>
        <p>Sign up and discover great amount of new opportunities!</p>
      </div>
      <div class="img__text m--in">
        <h2>One of us?</h2>
        <p>If you already has an account, just sign in. We've missed you!</p>
      </div>
      <div class="img__btn">
        <span class="m--up">Sign Up</span>
        <span class="m--in">Sign In</span>
      </div>
    </div>

    <div class="form sign-up">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      <h2>Time to feel like home</h2>
      <label>
        <span>Name</span>
        <input type="text" name="name" required/>
      </label>
      <label>
        <span>Email</span>
        <input type="email" name="email" required/>
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="password" required/>
      </label>
      <label>
        <span>Confirm Password</span>
        <input type="password" name="cpassword" required/>
      </label>
      <button type="submit" name="signup" class="submit">Sign Up</button>
    </form>
    </div>

  </div>

</div>

<script type="text/javascript">
  
document.querySelector('.img__btn').addEventListener('click', function() {
  document.querySelector('.cont').classList.toggle('s--signup');
});

</script>

</body>

</html>