<?php
session_start(); 
$db = mysqli_connect("localhost","root", "", "addmission");
if( isset($_SESSION['ids']) ) { $id=$_SESSION['ids'];}
$uploadOk = 0;
$pdfn="";
$sql8 = "UPDATE notice SET pdf='$pdfn' WHERE id=$id";

    if (mysqli_multi_query($db, $sql8)) {
        if(isset($_SESSION['namepdf'])){unset($_SESSION['namepdf']);}
        if(isset($_SESSION['pdf'])){unset($_SESSION['pdf']);}
        $deleteOk = 1;
        echo "<script>alert('Delete records successfully')</script>";
    } else {
        $deleteOk = 0;
        echo "<script>alert('Sorry, No records Deleted. Try again.')</script>";
    }

$_SESSION['deleteOk']=$deleteOk;
header('location:page37.php?id='.$id);
?>