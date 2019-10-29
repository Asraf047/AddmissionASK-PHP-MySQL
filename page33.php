<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Comments App - AngularJS</title>
  <link rel="stylesheet" href="page33.css">
</head>

<body>

<?php

session_start(); 
$db = mysqli_connect("localhost","root", "", "addmission");
if (!$db) {die("Connection failed: " . mysqli_connect_error());}

if( isset($_POST['add']) ){
  if( !isset($_SESSION["texts"]) ){$_SESSION["texts"]="";}
  if( $_SESSION["texts"] != $_POST["text"] ){

     $p_id="28";
     $w_id="11";
     $text=$_POST["text"];

     date_default_timezone_set("America/New_York");
     $d=strtotime("+10 Hours");
     $date= date("d M Y h:i a", $d);

     if(isset($_POST["check"])) {$w_id="20";}

     $sql="INSERT INTO comment( p_id, w_id, date, text) VALUES('$p_id', '$w_id', '$date', '$text')";

     if (mysqli_multi_query($db, $sql)) {
       $_SESSION["texts"]=$_POST["text"];
       echo "<script>alert('New comment add successfully')</script>";
     }    
     else {echo "<script>alert('Sorry, No comment added. Try again.')</script>";}
  }
}

?>  

  <div class="comments-app" ng-app="commentsApp" ng-controller="CommentsController as cmntCtrl">
  <h1>Comments</h1>
  
 
  <!-- Comments List -->
  <div class="comments">

<?php
$sql = "SELECT comment.date, comment.text, register.name, register.img FROM comment, register WHERE comment.p_id='28' and comment.w_id=register.id order by comment.id desc";
$result = mysqli_query($db, $sql);
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
else {echo "<script>alert('0 result found')</script>";}
?>

  </div>

   <!-- From -->
  <div class="comment-form">
    <!-- Comment Avatar -->
    <div class="comment-avatar">
      <img src="a.jpg">
    </div>

    <form class="form" name="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      <div class="form-row">
        <textarea
                  name="text"
                  class="input"
                  ng-model="cmntCtrl.comment.text"
                  placeholder="Add comment..."
                  required></textarea>
      </div>

      <div class="form-row text-right">
        <input
               id="comment-anonymous"
               name="check"
               type="checkbox"
               value="checked">
        <label for="comment-anonymous">Anonymous</label>
      </div>

      <div class="form-row">
        <input type="submit" value="Add Comment" name="add">
      </div>
    </form>
  </div>

</div>

</body>

</html>
