<!DOCTYPE html>
<html>
<body>

<?php
$phot="a.jpg";
if( isset( $_SESSION['upd'] ) ) {
//echo $_SESSION['upd'];
//echo $_SESSION['nam'];
$phot=$_SESSION['nam'];
if ($_SESSION['upd']==1) {
        echo "The file ".$_SESSION['nam']." has been uploaded.";
    } else {
      $phot="a.jpg";
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<form action="16page.php" method="post" enctype="multipart/form-data">
    <label for="fileToUpload"><img src="<?php echo $phot ?>"></label>
    <input type="file" accept="image/*" name="fileToUpload" id="fileToUpload" style="display: none;" >
    <input type="submit" value="Upload Image" name="submi">
</form>

<?php 
  if( isset( $_POST['submi'] ) ) {
    //include 'header2.php';
  } else{
    echo "noooooooo...";
  }
?>

<div id="demo">JavaScript can change HTML content.</div>

<button type="button"
onclick="document.getElementById('demo').innerHTML = '<?php include 'header.php' ?>'  ">
Click Me!</button>

<button type="button"
onclick="document.write("<?php include 'header2.php' ?>");  ">
Click Me!</button>


</body>
</html>