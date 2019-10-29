<?php include 'header2.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="7page.css">
  <link rel="stylesheet" href="page33.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
<body>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'addmission');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

$id="3";  
$id_w="20";
$prepost="20";
$nextpost="20";
$catagory="notice";
$com="Please login to ";

if( isset($_GET['id']) ) { $id=$_GET['id']; $_SESSION['ids']=$_GET['id']; }
elseif ( isset($_SESSION['ids']) ) { $id=$_SESSION['ids']; $_GET['id']=$_SESSION['ids']; }

if ( isset($_SESSION['id']) ) { $id_w=$_SESSION['id']; $com="";}
  
if( isset($_POST['add']) ){
  if( !isset($_SESSION["texts"]) ){$_SESSION["texts"]="";}
  if( $_SESSION["texts"] != $_POST["text"] ){

     $p_id=$id;
     $w_id=$id_w;
     $text=$_POST["text"];

     date_default_timezone_set("America/New_York");
     $d=strtotime("+10 Hours");
     $date= date("d M Y h:i a", $d);

     if(isset($_POST["check"])) {$w_id="20";}

     $sql="INSERT INTO comment( p_id, w_id, date, text) VALUES('$p_id', '$w_id', '$date', '$text')";

     if (mysqli_multi_query($conn, $sql)) {
       $_SESSION["texts"]=$_POST["text"];
       echo "<script>alert('New comment add successfully')</script>";
     }    
     else {echo "<script>alert('Sorry, No comment added. Try again.')</script>";}
  }
}
?>



<div class="c">
  <img src="2222.jpg" alt="Norway" style="width:100%;">
  <div class="cc"><h1 class="h1text">Details</h1></div>

</div>

<!-- Blog entries -->
<?php
$sql = "SELECT name, title, date, detail, img, heading, catagory FROM notice WHERE id='$id' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $catagory=$row["catagory"];
?>

<div class="col l8 s12">
  <div class="card-4 margin white2">
    <?php echo "<img src=\"".$row["img"]."\" style=\"width:100%;\">"; ?>
    <div class="container white2 padding-large">
      <h3><b><?php echo $row["title"];?></b></h3>
      <h5><?php echo $row["name"];?>, <span class="opacity"><?php echo $row["date"];?></span></h5>
    </div>
    <div class="container padding-large">
      <p><?php echo $row["detail"];?></p>
    </div>

<!-- Comments List -->
<div class="comments-app">
  <h3>Comments..</h3>
  <div class="comments">
<?php
$sql = "SELECT comment.date, comment.text, register.name, register.img FROM comment, register WHERE comment.p_id='$id' and comment.w_id=register.id order by comment.id desc";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="comment">
      <div class="comment-avatar">
        <img src='<?php echo $row["img"];?>'>
      </div>
      <div class="comment-box">
        <div class="comment-text"><?php echo $row["text"];?></div>
        <div class="comment-footer">
          <div class="comment-info">
            <span class="comment-author">
              <a href="#"><?php echo $row["name"];?></a>
            </span>
            <span class="comment-date"><?php echo $row["date"];?></span>
          </div>
          <div class="comment-actions">
            <a href="#">Reply</a>
          </div>
        </div>
      </div>
    </div>
<?php
    }
}
else {echo "";}
?>
  </div>
  <div class="comment-form">
    <div class="comment-avatar">
      <img src="a.jpg">
    </div>
    <form class="form" name="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      <div class="form-row">
        <textarea name="text" class="input" placeholder="<?php echo $com; ?>Add comment..." required></textarea>
      </div>
      <div class="form-row text-right dnone">
        <input id="comment-anonymous" name="check" type="checkbox" value="checked">
        <label for="comment-anonymous">Anonymous</label>
      </div>
      <div class="form-row dnone">
        <input type="submit" value="Add Comment" name="add">
      </div>
    </form>
  </div>

</div>

<?php

$sqlpre="SELECT id FROM `notice` WHERE id<$id AND catagory='$catagory' order by id desc LIMIT 1";
$result = mysqli_query($conn, $sqlpre);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $prepost=$row["id"];
    }
}else {
  $prepost=$id;
  echo "<script>alert('This is first post of this catagory.')</script>";
}

$sqlnext="SELECT id FROM `notice` WHERE id>$id AND catagory='$catagory' order by id LIMIT 1";
$result = mysqli_query($conn, $sqlnext);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $nextpost=$row["id"];
    }
}else {
  $nextpost=$id;
  echo "<script>alert('This is last post of this catagory.')</script>";
}

?>

<div style="width: 100%">
  <p><button class="button2 padding-large white2 border margin left" onclick="location.href='page28.php?id=<?php echo $prepost;?>'"><b><span>Previous Post </span></button></b></button></p>
  <p><button class="button1 padding-large white2 border margin" onclick="location.href='page28.php?id=<?php echo $nextpost;?>'"><b><span>Next Post </span></button></b></button></p>
</div>

</div>
</div>
<?php
    }
}
else {echo "<script>alert('Sorry, no result found')</script>";}
?>

<!-- Introduction menu -->
<div class="col l4">
  <div class="card margin">
    <div class="container padding white3">
      <h4>Recent Notice</h4>
    </div>
    <marquee direction = "up" HEIGHT=250 SCROLLAMOUNT=5>
     <ul class="ul hoverable white2">
<?php

$sql = "SELECT id, title, detail, img FROM notice WHERE catagory='notice' order by id desc";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

      <li class="padding-16" onclick="location.href='page28.php?id=<?php echo $row["id"];?>'">
        <?php echo "<img src=\"".$row["img"]."\" class=\"left margin-right\" style=\"width:90px;height: 53px;\">"; ?>
        <span class="large"><?php echo $row["title"];?></span><br>
        <span>
        <?php
           $string=$row["detail"];
           $string = strip_tags($string); if (strlen($string) > 30) { 
           $stringCut = substr($string, 0, 30);     
           $endPoint = strrpos($stringCut, ' '); 
           $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);     
           $string .= '...'; } 
           echo $string;
         ?>
        </span>
      </li>
 <?php
    }
}
else {echo "<script>alert('0 result found')</script>";}
?>
     </ul>
   </marquee>
  </div>
</div>


<div class="col l4">
  <div class="card margin">
    <div class="container padding white3">
      <h4>Recent Result</h4>
    </div>
    <marquee direction = "up" HEIGHT=250 SCROLLAMOUNT=5>
     <ul class="ul hoverable white2">
<?php
$conn = mysqli_connect('localhost', 'root', '', 'addmission');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
$sql = "SELECT id, title, detail, img FROM notice WHERE catagory='result' order by id desc";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

      <li class="padding-16" onclick="location.href='page28.php?id=<?php echo $row["id"];?>'">
        <?php echo "<img src=\"".$row["img"]."\" class=\"left margin-right\" style=\"width:90px;height: 53px;\">"; ?>
        <span class="large"><?php echo $row["title"];?></span><br>
        <span>
        <?php
           $string=$row["detail"];
           $string = strip_tags($string); if (strlen($string) > 30) { 
           $stringCut = substr($string, 0, 30);     
           $endPoint = strrpos($stringCut, ' '); 
           $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);     
           $string .= '...'; } 
           echo $string;
         ?>
        </span>
      </li>
 <?php
    }
}
else {echo "<script>alert('0 result found')</script>";}
?>
     </ul>
   </marquee>
  </div>
</div>


<div class="col l4">
  <div class="card margin">
    <div class="container padding white3">
      <h4>Recent Scholarship</h4>
    </div>
    <marquee direction = "up" HEIGHT=250 SCROLLAMOUNT=5>
     <ul class="ul hoverable white2">
<?php
$conn = mysqli_connect('localhost', 'root', '', 'addmission');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
$sql = "SELECT id, title, detail, img FROM notice WHERE catagory='scholarship' order by id desc";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

      <li class="padding-16" onclick="location.href='page28.php?id=<?php echo $row["id"];?>'">
        <?php echo "<img src=\"".$row["img"]."\" class=\"left margin-right\" style=\"width:90px;height: 53px;\">"; ?>
        <span class="large"><?php echo $row["title"];?></span><br>
        <span>
        <?php
           $string=$row["detail"];
           $string = strip_tags($string); if (strlen($string) > 30) { 
           $stringCut = substr($string, 0, 30);     
           $endPoint = strrpos($stringCut, ' '); 
           $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);     
           $string .= '...'; } 
           echo $string;
         ?>
        </span>
      </li>
 <?php
    }
}
else {echo "<script>alert('0 result found')</script>";}
?>
     </ul>
   </marquee>
  </div>
</div>

</body>
</html>