
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    text-align: left;
    padding: 16px;
}

tr:nth-child(even) {
    background-color: #f2f2f2
}
</style>
</head>
<body>

<?php

$db = mysqli_connect('localhost','root', '', 'registration');

$results = mysqli_query($db,"SELECT id,name,email,password FROM register");
if (mysqli_num_rows($results) > 0) {

echo "<table border=\"1\" align=\"center\">";
echo "<tr><th>id</th>";
echo "<th>Name</th></tr>";
while ($row = mysqli_fetch_assoc($results)) {
	echo "<tr><td>";
	echo $row["id"];
	echo "</td><td>";
	echo $row["name"];
	echo "</td></tr>";
}
echo "</table>";

}

else {echo "0 results";}

?>

</body>
</html>