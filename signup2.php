<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="nine.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
</head>
<body>

<?php include 'header1.php' ?>
<?php
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$fname = $lname = $email = $address = $comment = $ipass = $cpass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $nameErr = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["lname"])) {
    $nameErr = "Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  
    
 if (empty($_POST["address"])) {
    $address = "";
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

}


?>


<h3>Let's Sign Up</h3>

<div class="container">
  <form method="post">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="fname" placeholder="Your name.." value="<?php echo $fname;?>" required>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lname" placeholder="Your last name.." value="<?php echo $lname;?>">

    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Your email.." value="<?php echo $email;?>">

    <label for="ipass">Input Password</label>
    <input type="password" id="ipass" name="ipass" placeholder="Your password.." value="<?php echo $ipass;?>" required>

    <label for="cpass">Confirm Password</label>
    <input type="password" id="cpass" name="cpass" placeholder="Type again.." value="<?php echo $cpass;?>" required>

    <label for="address">Address</label>
     <input type="text" id="address" name="address" placeholder="Your address.." value="<?php echo $address;?>">

    <label for="comment">Comment</label>
    <textarea id="comment" name="comment" placeholder="Write something.." style="height:200px"><?php echo $comment;?></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

<?php
echo "<h2>Your Input:</h2>";
echo $fname;
echo "<br>";
echo $lname;
echo "<br>";
echo $email;
echo "<br>";
echo $ipass;
echo "<br>";
echo $address;
echo "<br>";
echo $comment;
?>

<?php include "footer.php"?>

</body>
</html>
