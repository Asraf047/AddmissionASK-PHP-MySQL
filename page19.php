<?php

include("dbconn.php");

// sql to create table
$sql1 = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) UNIQUE,
reg_date TIMESTAMP
)";

// sql to delete table
$sql2 = "DROP TABLE MyGuests";

if (mysqli_query($conn, $sql1)) {
    echo "Table MyGuests created successfully";
}else if(mysqli_query($conn, $sql2)){
	mysqli_query($conn, $sql1);
	echo "Table MyGuests deleted successfully and ";
	echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>