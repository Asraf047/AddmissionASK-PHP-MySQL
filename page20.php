<?php

include("dbconn.php");

$sql1 = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if (mysqli_query($conn, $sql1)) {
    echo "New record created successfully";
}else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}

if (1) {
    $last_id = mysqli_insert_id($conn);
    echo "<br>"."Last inserted ID is: " . $last_id;
}  else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

mysqli_close($conn);
?>