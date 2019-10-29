<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="fonts.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="13page.css">
</head>
<body>

<?php include 'header2.php' ?>

<div class="containers">
  <img src="aaaaa.jpg" alt="Norway" style="width:100%;">
  <div class="hero-text">
    <h1 class="h1text">Learn what you need</h1>
    <p class="ptext">There are 34 Public University in Bangladesh and Private University has more than 65. Every Public University take admission test for the honours program. You will get all public university admission test information from this website.</p>
    <?php echo "<button onclick=\"location.href='".$linkwritter."'\">Become A Writter</button>"?>
  </div>
</div>
<br>

<!--notice-->

<div class="div2">
  <h1 class="h1text2">Learn what you need</h1>
  <p class="ptext2">There are 34 Public University in Bangladesh and Private University has more than 65. Every Public University take admission test for the honours program. You will get all public university admission test information from this website.</p>
</div>

<?php include '18page.html' ?>

<div class="div2">
  <h1 class="h1text2">Know leatest notice</h1>
  <p class="ptext2">There are 34 Public University in Bangladesh and Private University has more than 65. Every Public University take admission test for the honours program. You will get all public university admission test information from this website.</p>
</div>

<div class="wrapper">
 <div class="slider-wrapper">
  <div class=inner>   
<?php
$conn = mysqli_connect('localhost', 'root', '', 'addmission');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
$sql = "SELECT id, name, title, date, detail, img, heading FROM notice WHERE catagory='notice' order by id desc LIMIT 3";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

  <div class="column">
    <div class="card">
      <?php echo "<img src=\"".$row["img"]."\" style=\"width:100%;\">"; ?>
      <div class="container">
        <h2 class="margin"><?php echo $row["title"];?></h2>
        <p class="title margin"><?php echo $row["heading"];?></p>
        <p class="margin p1">
          <?php
           $string=$row["detail"];
           $string = strip_tags($string); if (strlen($string) > 90) { 
           $stringCut = substr($string, 0, 90);     
           $endPoint = strrpos($stringCut, ' '); 
           $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);     
           $string .= '...'; } 
           echo $string;
         ?>
          </p>
        <p><button class="button" onclick="location.href='page28.php?id=<?php echo $row["id"];?>'"><span>READ MORE </span></button></p>
      </div>
    </div>
  </div>
<?php
    }
}
else {echo "<script>alert('0 result found')</script>";}
?>
</div>
</div>
</div>

<!--result-->

<div class="div2">
  <h1 class="h1text2">Know leatest result</h1>
  <p class="ptext2">There are 34 Public University in Bangladesh and Private University has more than 65. Every Public University take admission test for the honours program. You will get all public university admission test information from this website.</p>
</div>

<div class="wrapper">
 <div class="slider-wrapper">
  <div class=inner>   
<?php
$conn = mysqli_connect('localhost', 'root', '', 'addmission');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
$sql = "SELECT id,name, title, date, detail, img, heading FROM notice WHERE catagory='result' order by id desc LIMIT 3";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

  <div class="column">
    <div class="card">
      <?php echo "<img src=\"".$row["img"]."\" style=\"width:100%;\">"; ?>
      <div class="container">
        <h2 class="margin"><?php echo $row["title"];?></h2>
        <p class="title margin"><?php echo $row["heading"];?></p>
        <p class="margin p1">
          <?php
           $string=$row["detail"];
           $string = strip_tags($string); if (strlen($string) > 90) { 
           $stringCut = substr($string, 0, 90);     
           $endPoint = strrpos($stringCut, ' '); 
           $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);     
           $string .= '...'; } 
           echo $string;
         ?>
          </p>
        <p><button class="button" onclick="location.href='page28.php?id=<?php echo $row["id"];?>'"><span>READ MORE </span></button></p>
      </div>
    </div>
  </div>
<?php
    }
}
else {echo "<script>alert('0 result found')</script>";}
?>
</div>
</div>
</div>

<!--scholarship-->

<div class="div2">
  <h1 class="h1text2">Know leatest scholarship</h1>
  <p class="ptext2">There are 34 Public University in Bangladesh and Private University has more than 65. Every Public University take admission test for the honours program. You will get all public university admission test information from this website.</p>
</div>

<div class="wrapper">
 <div class="slider-wrapper">
  <div class=inner>   
<?php
$conn = mysqli_connect('localhost', 'root', '', 'addmission');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
$sql = "SELECT id, name, title, date, detail, img, heading FROM notice WHERE catagory='scholarship' order by id desc LIMIT 3";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

  <div class="column">
    <div class="card">
      <?php echo "<img src=\"".$row["img"]."\" style=\"width:100%;\">"; ?>
      <div class="container">
        <h2 class="margin"><?php echo $row["title"];?></h2>
        <p class="title margin"><?php echo $row["heading"];?></p>
        <p class="margin p1">
          <?php
           $string=$row["detail"];
           $string = strip_tags($string); if (strlen($string) > 90) { 
           $stringCut = substr($string, 0, 90);     
           $endPoint = strrpos($stringCut, ' '); 
           $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);     
           $string .= '...'; } 
           echo $string;
         ?>
          </p>
        <p><button class="button" onclick="location.href='page28.php?id=<?php echo $row["id"];?>'"><span>READ MORE </span></button></p>
      </div>
    </div>
  </div>
<?php
    }
}
else {echo "<script>alert('0 result found')</script>";}
?>
</div>
</div>
</div>
<br><br>

<?php include "footer.php"?>

</body>
</html>