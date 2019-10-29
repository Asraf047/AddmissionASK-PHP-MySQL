<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="7page.css">
</head>
<body>




<div class="col l4">
  <div class="card margin">
    <div class="container padding white2">
      <h4>Popular Posts</h4>
    </div>
    <marquee direction = "up" HEIGHT=250 SCROLLAMOUNT=5>
     <ul class="ul hoverable white">

<?php
$conn = mysqli_connect('localhost', 'root', '', 'addmission');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
$sql = "SELECT name, title, date, detail, img, heading FROM notice WHERE catagory='notice'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

      <li class="padding-16">
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


