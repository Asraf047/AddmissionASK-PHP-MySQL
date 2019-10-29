<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>Comments</title>
  <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="page31.css">
</head>

<body>

  <div class="comments">
		<div class="comment-wrap">
				<div class="photo">
						<div class="avatar" style="background-image: url('a.jpg')"></div>
				</div>
				<div class="comment-block">
						<form action="">
								<textarea name="" id="" cols="30" rows="3" placeholder="Add comment..."></textarea>
						</form>
				</div>
		</div>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'addmission');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

$sql = "SELECT comment.date, comment.text, register.name, register.img FROM comment, register WHERE comment.p_id='28' and comment.w_id=register.id order by comment.id desc";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

		<div class="comment-wrap">
				<div class="photo">
						<div class="avatar" style="background-image: url('<?php echo $row["img"];?>')"></div>
				</div>
				<div class="comment-block">
						<p class="comment-text"><?php echo $row["text"];?></p>
						<div class="bottom-comment">
								<ul class="comment-actions">
										<li class="complain"><?php echo $row["name"];?></li>
										<li class="reply"><?php echo $row["date"];?></li>
								</ul>
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
  
  

</body>

</html>
