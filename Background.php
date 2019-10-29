<?php
$q = $_REQUEST["q"];
$db = mysqli_connect("localhost","root", "", "addmission");
  $result = mysqli_query($db,"select * from register where email = '$q'");
  $row_cnt = mysqli_num_rows($result);

  if($row_cnt>0 ){
    while ($row = mysqli_fetch_assoc($result)) { $hint = "Sorry, email has been used. Use another email."; }

  }else{$hint = "";}

echo $hint ;
?>