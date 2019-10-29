<!DOCTYPE html>
<html>
<head>
	<title>search1</title>
</head>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    First Name: <input type="text" name="fname">
    Last Name: <input type="text" name="lname">
    <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    if (empty($fname)) {
        echo "Name is empty";
    } else {
        echo $fname.' '.$lname.'<br>';
    }
}
?>

<a href="eight.php?subject=PHP&web=W3schools.com">Test $GET</a>

<form method="post" action="eight.php">
    First Name: <input type="text" name="fname">
    Last Name: <input type="text" name="lname">
    <input type="submit">
</form>

<?php echo '<br>'.'hi aman'.'<br>'.'live php'.'<br>' ?>

<?php
echo "<br>";
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
echo "<br>";
echo $_SERVER['GATEWAY_INTERFACE'];
echo "<br>";
echo $_SERVER['SERVER_ADDR'];
echo "<br>";
echo $_SERVER['REMOTE_ADDR'];
echo "<br>";
echo $_SERVER['REMOTE_HOST'];
echo "<br>";
echo $_SERVER['REMOTE_PORT'];
echo "<br>";
echo $_SERVER['SCRIPT_FILENAME'];
echo "<br>";
echo $_SERVER['SERVER_ADMIN'];
echo "<br>";
echo $_SERVER['SERVER_PORT'];
echo "<br>";
echo $_SERVER['SERVER_SIGNATURE'];
echo "<br>";
echo $_SERVER['PATH_TRANSLATED'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
echo "<br>";
echo $_SERVER['SCRIPT_URI'];
echo "<br>";
?>

</body>
</html>