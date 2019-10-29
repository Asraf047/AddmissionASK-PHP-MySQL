<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>006 - Profile</title>
  <link rel="stylesheet" href="page34.css"> 
  <link rel="stylesheet" href="2.1page.css"> 
</head>

<body>

<?php
session_start(); 
$u_id=$_SESSION['id'];
$phot="a.jpg";
$postes=0;
$commentes=13;
$db = mysqli_connect("localhost","root", "", "addmission");

$sqlp="SELECT COUNT(w_id) FROM notice WHERE w_id=$u_id";
$result = mysqli_query($db, $sqlp);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $postes=$row["COUNT(w_id)"];
    }
}else {
	$postes=0;
}

$sqlc="SELECT COUNT(id) FROM comment WHERE p_id IN (SELECT id FROM notice WHERE w_id=$u_id)";
$result = mysqli_query($db, $sqlc);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $commentes=$row["COUNT(id)"];
    }
}else {
	$commentes=0;
}

if( isset( $_SESSION['upd'] ) ) {
	if ($_SESSION['upd']==1) {
		$phot=$_SESSION['nam'];
	    $sql3 = "UPDATE register SET img='$phot' WHERE id=$u_id";
	    if (mysqli_multi_query($db, $sql3)) {
	        echo "<script>alert('The file has been uploaded.')</script>";
	    } else {
	        echo "<script>alert('Sorry, no img upload. Try again..')</script>";
	    }
	    unset($_SESSION['upd']);
	} else {
	        echo "<script>alert('Sorry, no img upload. Try again....')</script>";
	}
}
?>	

<?php
if(isset($_POST['save'])){

    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $cpassword = test_input($_POST["cpassword"]);
    $phone = ($_POST["phone"]);
    $birth = ($_POST["birth"]);
    $waddress = ($_POST["waddress"]);
    $paddress = ($_POST["paddress"]);
    $stutus = test_input($_POST["stutus"]);
    $fb = test_input($_POST["fb"]);
    $tw = test_input($_POST["tw"]);

  $sql = "UPDATE register SET name='$name', email='$email', password='$password', phone='$phone', birth='$birth', waddress='$waddress', paddress='$paddress', stutus='$stutus', fb='$fb', tw='$tw' WHERE id=$u_id";

  if($password===$cpassword){

  if (mysqli_multi_query($db, $sql)) {
    echo "<script>alert('Records updated')</script>";
  } else {
    echo "<script>alert('Sorry, No records updated. Try again...')</script>";
  }
 }else {
    echo "<script>alert('Sorry, No records updated. Try again.')</script>";
  }

 unset($_POST['save']);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 unset($_POST['save']);
?>


<?php
$conn = mysqli_connect('localhost', 'root', '', 'addmission');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
$sql = "SELECT * FROM register WHERE id=$u_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>	

  <div class="frame">
  <div class="center">
    
		<div class="profile">
			<div style="margin: 10px;font-size: 15px;">
				<a style="float: left; padding-right: 5px; text-decoration: none;color: #524F4B" href="13page.php">Home</a>
    			<p style="float: left;color: #524F4B">/ Profile</p>
			</div>
			<div class="image">
				<div class="circle-1"></div>
				<div class="circle-2"></div>
				<img src="<?php echo $row["img"];?>" width="119" height="119" alt="<?php echo $row["img"];?>" >
			</div>
			
			<div class="name"><?php echo $row["name"];?></div>
			<div class="job"><?php echo $row["stutus"];?></div>
			
			<div class="tab">
				<button class="tablinks" onclick="openCity(event)" id="defaultOpen">Account</button>
				<button class="tablinks __btn" onclick="openCity(event)">Posts</button>
			</div>
		</div>
		
		<div class="stats">
			<div class="box">
				<span class="value"><?php echo $u_id; ?>th</span>
				<span class="parameter">Member</span>
			</div>
			<div class="box">
				<span class="value"><?php echo $postes; ?></span>
				<span class="parameter">Posts</span>
			</div>
			<div class="box">
				<span class="value"><?php echo $commentes; ?></span>
				<span class="parameter">Comments</span>
			</div>
		</div>
  </div>


  <div class="cont" id="div_accout" >

	  <div class="form sign-in" align="center">
	  	<br><br><br>
	    <h2 style="color: #524F4B;">Account Info</h2><br><br><br><br><br>
		<table id="myTable">
		  <tr>
		    <td>Name</td>
		    <td><?php echo $row["name"];?></td>
		  </tr>
		  <tr>
		    <td>Birthday</td>
		    <td><?php echo $row["birth"];?></td>
		  </tr>
		  <tr>
		    <td>Email</td>
		    <td><?php echo $row["email"];?></td>
		  </tr>
		  <tr>
		    <td>Phone</td>
		    <td><?php echo $row["phone"];?></td>
		  </tr>
		  <tr>
		    <td>Working Address</td>
		    <td><?php echo $row["waddress"];?></td>
		  </tr>
		  <tr>
		    <td>Parmanent Address</td>
		    <td><?php echo $row["paddress"];?></td>
		  </tr>
		  <tr>
		    <td>Status</td>
		    <td><?php echo $row["stutus"];?></td>
		  </tr>
		  <tr>
		    <td>facebook id</td>
		    <td><?php echo $row["fb"];?></td>
		  </tr>
		  <tr>
		    <td>twitter id</td>
		    <td><?php echo $row["tw"];?></td>
		  </tr>
		</table>

	  </div>

	  <div class="sub-cont">
	    <div class="img">
	      <div class="img__text m--up">
	        <h2>Change info?</h2>
	        <p>Use the edit button to fulfill or update information.</p>
	      </div>
	      <div class="img__text m--in" >
	        <h2>View your account?</h2>
	        <p>Use show button to view your full information that you give us in this site.</p><br><br><br><br>
	        <div style="height: 90px;width: 100%;">
	      	    <form action="page35.php" method="post" enctype="multipart/form-data">
					  <label class="form3" for="fileToUpload" class="_btn"> <img style="height:150px; min-width:150px; border-radius:50%;" src="<?php echo $row["img"];?>" > </label>
					  <input type="file" accept="image/*" name="fileToUpload" id="fileToUpload" style="display: none;" >
					  <input type="submit" value="Upload" name="submi" style="text-align: center;margin-top: 10px;" class="_btn" >
			    </form>
	        </div>
	      </div>
	      <div class="img__btn">
	        <span class="m--up">Edit</span>
	        <span class="m--in">Show</span>
	      </div>
	    </div>

	    <div class="form2 sign-up">
	      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	      	<h2>Edit Info</h2><br><br>
		    <table id="myTable">
			  <tr>
			    <td>Name</td>
			    <td><input type="text" name="name" required value="<?php echo $row["name"];?>"></td>
			  </tr>
			  <tr>
			    <td>Birthday</td>
			    <td><input type="text" name="birth" value="<?php echo $row["birth"];?>"></td>
			  </tr>
			  <tr>
			    <td>Email</td>
			    <td><input type="email" name="email" required value="<?php echo $row["email"];?>"></td>
			  </tr>
			  <tr>
			    <td>Phone</td>
			    <td><input type="text" name="phone" value="<?php echo $row["phone"];?>"></td>
			  </tr>
			  <tr>
			    <td>Working Address</td>
			    <td><input type="text" name="waddress" value="<?php echo $row["waddress"];?>"></td>
			  </tr>
			  <tr>
			    <td>Parmanent Address</td>
			    <td><input type="text" name="paddress" value="<?php echo $row["paddress"];?>"></td>
			  </tr>
			  <tr>
			    <td>Status</td>
			    <td><input type="text" name="stutus" required value="<?php echo $row["stutus"];?>"></td>
			  </tr>
			  <tr>
			    <td>facebook id</td>
			    <td><input type="text" name="fb" value="<?php echo $row["fb"];?>"></td>
			  </tr>
			  <tr>
			    <td>twitter id</td>
			    <td><input type="text" name="tw" value="<?php echo $row["tw"];?>"></td>
			  </tr>
			  <tr>
			    <td>Password</td>
			    <td><input type="password" name="password" required value="<?php echo $row["password"];?>"></td>
			  </tr>
			  <tr>
			    <td>Confirm Password</td>
			    <td><input type="password" name="cpassword" required value="<?php echo $row["password"];?>"></td>
			  </tr>
			</table>

	      	<button type="submit" name="save" class="submit">Save</button>
	    </form>
	    </div>
	  </div>

  </div>

</div>
 
<?php
    }
}
else {echo "<script>alert('0 result found')</script>";}
?>

<script type="text/javascript">

document.querySelector('.img__btn').addEventListener('click', function() {
  document.querySelector('.cont').classList.toggle('s--signup');
});

document.querySelector('.__btn').addEventListener('click', function() {
  location.href='page36.php';
});

function openCity(evt) {
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();

</script>
</body>

</html>
