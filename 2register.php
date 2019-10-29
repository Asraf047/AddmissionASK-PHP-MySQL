<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn,'myDB');

$sql1 = "CREATE TABLE `mydb`.`register` ( `id` INT(255) NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `password` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`) )";

$sql2 = "DROP TABLE register";

if (mysqli_query($conn, $sql1)) {
    echo "Table register created successfully";
}else if(mysqli_query($conn, $sql2)){
	mysqli_query($conn, $sql1);
	echo "Table register deleted successfully and ";
	echo "Table register created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>