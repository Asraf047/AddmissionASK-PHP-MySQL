<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="7page.css">
</head>
<body>

<?php include 'header2.php' ?>

<div class="c">
  <img src="2222.jpg" alt="Norway" style="width:100%;">
  <div class="cc"><h1 class="h1text">Result</h1></div>

</div>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'addmission');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
$sql = "SELECT id, name, title, date, detail, img, heading, pdf FROM notice WHERE catagory='result' order by id desc";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

$pdf=$row["pdf"];
if($pdf != ""){
  $bpdf="<button class=\"submit2\" onclick=\"location.href='page40.php?file=".$pdf."'\">↓ pdf</button>";
} else {
  $bpdf="";
}

$id2=$row["id"];
$sql2 = "SELECT id FROM comment WHERE p_id=$id2 ";
$result2 = mysqli_query($conn, $sql2);
$count2=mysqli_num_rows($result2);
?>

<div class="container overflow card-4 margin">
  <div id="first">
    <?php echo "<img src=\"".$row["img"]."\">"; ?>
    <div class="container">
      <p><?php echo $row["heading"];?></p>
    </div>
  </div>
  <div class="white2 overflow left-small"> 
    <div class="container">
      <?php echo $bpdf; ?>
      <h3><b><?php echo $row["title"];?></b></h3>
      <h5><?php echo $row["name"].", ";?><span class="opacity"><?php echo $row["date"];?></span></h5>
    </div>
    <div class="container">
             <p style="min-height: 60px;"><?php
               $string=$row["detail"];
               $string = strip_tags($string); if (strlen($string) > 190) { 
               $stringCut = substr($string, 0, 190);     
               $endPoint = strrpos($stringCut, ' '); 
               $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);     
               $string .= '...'; } 
               echo $string;
             ?>
             </p>
      <div class="row margin-top">
        <div class="col m8 s12">
          <p><button class="button padding-large white2 border" onclick="location.href='page28.php?id=<?php echo $row["id"];?>'"><b><span>READ MORE </span></b></button></p>
        </div>
        <div class="col m4 hide-small">
          <p><span class="padding-large right"><b>Comments  </b> <span class="tag"><?php echo $count2 ;?></span></span></p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
    }
}
else {echo "<script>alert('0 result found')</script>";}
?>

<?php include "footer.php"?>

</body>
</html>