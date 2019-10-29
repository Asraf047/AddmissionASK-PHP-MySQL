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
$fname = $lname = $email = $gender = $comment = $website = "";

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
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["country"])) {
    $country = "";
  } else {
    $country = test_input($_POST["country"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}


?>


<h3>Let's Sign Up</h3>

<div class="container">
  <form method="post">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="fname" placeholder="Your name.." value="<?php echo $fname;?>">

    <label for="lname">Last Name</label>
    <input type="text" id="email" name="email" placeholder="Your last name.." value="<?php echo $email;?>">

    <label for="country">Country</label>
    <select id="country" name="country" value="<?php echo $country;?>">
      <option value="australia">Australia</option>
      <option value="bangladesh">Bangladesh</option>
      <option value="india">India</option>
      <option value="china">China</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="comment" placeholder="Write something.." style="height:200px"><?php echo $comment;?></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

<?php
echo "<h2>Your Input:</h2>";
echo $fname;
echo "<br>";
echo $email;
echo "<br>";
echo $country;
echo "<br>";
echo $comment;
?>

<?php include "footer.php"?>

</body>
</html>
