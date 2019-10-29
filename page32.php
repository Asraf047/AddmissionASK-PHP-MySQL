<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>REACTing Codepen Comment Editor - DRAFTJS</title>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="page32.css">
</head>

<body>

  
<div class="comments-section">
  <div class="comments">
    <h4>COMMENTS</h4>
    <div id="comments-container">

<?php
$conn = mysqli_connect('localhost', 'root', '', 'addmission');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
$sql = "SELECT p_id, w_id, date, text FROM comment order by id desc";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

      <div class="comment">
        <div class="comment-user">
          <div class="avatar"><img src="a.jpg" alt="Riccardo"/></div>
          <span class="user-details"><span class="username"><?php echo $row["p_id"];?></span>
            <span>on </span>
            <span><?php echo $row["date"];?></span>
          </span>
        </div>
        <div class="comment-text"><?php echo $row["text"];?><br><br>
        </div>
      </div>
<?php
    }
}
else {echo "<script>alert('0 result found')</script>";}
?>

    </div>
  </div>

  <div class="comment-editor">
    <h4>LEAVE A COMMENT</h4>
    <div id="comment-form"></div>
  </div>

</div>

<script  src="page32.js"></script>

</body>

</html>
