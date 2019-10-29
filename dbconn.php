<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn,'myDB');
$sql="set names 'utf8'";// for unicode support, must use after mysqli_select_db() function.
mysqli_query($conn,'$sql');
mysqli_query($conn,'SET CHARACTER SET utf8')or die('charset problem:'.mysqli_error());
mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'") or die('collation problem:'.mysqli_error());
?>