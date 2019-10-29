<?php
session_start(); 
$db = mysqli_connect("localhost","root", "", "addmission");
if( isset($_SESSION['ids']) ) { $id=$_SESSION['ids'];}

$target_dir = "C:/xampp/htdocs/web/";
$uploadOk = 1;
if(isset($_POST["submitpdf"])) {
    $target_file = $target_dir . basename($_FILES["pdfToUpload"]["name"]);
    $Type = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = pathinfo($_FILES["pdfToUpload"]["tmp_name"]);
    if($Type != "jpg" && $Type != "png" && $Type != "jpeg" && $Type != "pdf" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($_FILES["pdfToUpload"]["size"] > 5000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["pdfToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["pdfToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
$_SESSION['namepdf']=basename( $_FILES["pdfToUpload"]["name"]);
$_SESSION['uploadpdf']=$uploadOk;
header('location:page37.php?id='.$id);
?>
