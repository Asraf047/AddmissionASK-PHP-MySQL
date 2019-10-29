<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>008 - Edit_Post</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="page36.css">
  <link rel="stylesheet" href="page34.css"> 
  <link rel="stylesheet" href="2.1page.css">
  <style type="text/css">
  	label {
      display: block;
      width: 28.9%;
      margin: 0;
      text-align: left;
    }
  </style>
</head>

<body>


<?php
session_start(); 
$u_id=$_SESSION['id'];
$phot="a.jpg";
$postes=0;
$pdf="";
if(isset($_SESSION['pdf'])) {$pdf=$_SESSION['pdf'];}
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

if( isset( $_SESSION['uploadpdf'] ) ) {
	if ($_SESSION['uploadpdf']==1) {
			$pdf=$_SESSION['namepdf'];
			$_SESSION['pdf']=$pdf;
	        echo "<script>alert('The pdf/file has been uploaded.')</script>";
	} else {
			$pdf=$_SESSION['pdf'];
	        echo "<script>alert('Sorry, no pdf/file upload. Try again....')</script>";
	}
	unset($_SESSION['uploadpdf']);
}

if( isset( $_SESSION['deleteOk'] ) ) {
	if ($_SESSION['deleteOk']==1) {
	   	    unset($_SESSION['deleteOk']);
	        echo "<script>alert('The pdf/file has been delete.')</script>";
	} else {
	        echo "<script>alert('Sorry, no pdf/file delete. Try again....')</script>";
	}
}

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
				<img src="<?php echo $row["img"];?>" width="119" height="119" alt="Jessica Potter">
			</div>
			
			<div class="name"><?php echo $row["name"];?></div>
			<div class="job"><?php echo $row["stutus"];?></div>
			
			<div class="tab">
				<button class="tablinks __btn" onclick="openCity(event)">Account</button>
				<button class="tablinks" onclick="openCity(event)" id="defaultOpen">Posts</button>
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

 
<?php
    }
}
else {echo "<script>alert('0 result found')</script>";}
?>


	<div class="cont" >
	  <div class="form sign-in scrool">
		<div class="">
				<?php
				$id="3";  
				$name="Unnamed";

				if(isset($_SESSION['namepdf'])) {$pdf=$_SESSION['namepdf'];}

				if( isset($_SESSION['img']) ) { $img=$_SESSION['img'];}

				if( isset($_SESSION['ids']) ) { $id=$_SESSION['ids'];}
				
				if( isset($_GET['id']) ) { $id=$_GET['id']; $_SESSION['ids']=$_GET['id']; }

				if(isset($_POST['submit4'])){

					if (empty($_POST["name"])) {$name = "Unnamed";} 
					else {$name= $_POST["name"] ;}

					date_default_timezone_set("America/New_York");
					$d=strtotime("+10 Hours");
					$date= date("d M Y h:i a", $d);

					$catagory= $_POST["catagory"] ;
					$title= $_POST["title"];
					$detail= $_POST["detail"];
					$heading= $_POST["heading"];

					if($_POST["fileToUpload"] != "") {
					$img= $_POST["fileToUpload"];
					}

					$sql4 = "UPDATE notice SET name='$name', catagory='$catagory', title='$title', img='$img', pdf='$pdf', heading='$heading', detail='$detail' WHERE id=$id";

					if (mysqli_multi_query($db, $sql4)) {
					  echo "<script>alert('Update records successfully')</script>";
					  header('location:page36.php');
					} else {
					  echo "<script>alert('Sorry, No records Updated. Try again.')</script>";
					}
				}

				if(isset($_POST['submit5'])){

					$sql5 = "DELETE FROM notice WHERE id=$id";

					if (mysqli_multi_query($db, $sql5)) {
					  echo "<script>alert('Delete records successfully')</script>";
					} else {
					  echo "<script>alert('Sorry, No records Deleted. Try again.')</script>";
					}
				}

				?>

				<?php

				$sql = "SELECT id, name, title, date, detail, img, heading, pdf, catagory FROM notice  WHERE id=$id";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {
				    while ($row = mysqli_fetch_assoc($result)) {

				    	$name=$row["name"];
				    	$catagory=$row["catagory"];
				    	$title=$row["title"];
				    	$detail=$row["detail"];
				    	$img=$row["img"];
				    	$pdf=$row["pdf"];
				    	$heading=$row["heading"];

				    	if(isset($_SESSION['pdf'])) {$pdf=$_SESSION['pdf'];}

				    	$_SESSION['img']=$img;
				    	$_SESSION['pdf']=$pdf;

				?>

				<h3 style="text-align: center;">Update Post</h3>

				<div class="container">
				  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				    <label for="name">Name</label>
				    <input type="text" id="name" name="name" placeholder="Your name.." value="<?php echo $name;?>">

				    <label for="Catagory">Catagory</label>
				    <select id="Catagory" name="catagory" value="<?php echo $catagory;?>">
				      <option value="notice">Notice</option>
				      <option value="result">Result</option>
				      <option value="scholarship">Scholarship</option>
				    </select>

				    <label for="Title">Title</label>
				    <input type="text" id="Title" name="title" placeholder="Your Title.." required value="<?php echo $title;?>">

				    <label for="Details">Details</label>
				    <textarea id="Details" name="detail" placeholder="Write details.." style="height:500px"><?php echo $detail;?></textarea>

					<label for="PDF">PDF</label><br>

					<input type="file" accept="pdf/*" name="pdfToUpload" id="pdfToUpload" >
					<p style="float: right;"><?php echo $pdf;?></p>
					<input type="submit" value="Upload" name="submitpdf" formenctype="multipart/form-data" formaction="page38.php" style="float: left;margin-right: 20px;" class="up_pdf" >
					<input type="submit" value="Delete" name="deletepdf" formaction="page39.php" style="margin-left: 10px;" class="up_pdf" >


				    <label for="Image">Image</label><br>
				    <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" style="float: left;width: 300px;" ><p style="float: right;"><?php echo $img;?></p><br><br> 


				    <label for="heading">Image heading</label>
				    <input type="text" id="heading" name="heading" placeholder="Image heading.." required value="<?php echo $heading;?>">

				    <button type="submit" name="submit4" class="submit" style="float: left;">Submit Post</button>
				    <button type="submit" name="submit5" class="submit" style="float: right;">Delete Post</button>
				  </form>
				</div>

				<?php
				    }
				}
				else {echo "<script>alert('0 result found')</script>";}
				?>
				
	      </div>
	  </div>

	  <div class="sub-cont">
	    <div class="img">
	      <div class="img__text m--up">
	        <h2>Change info?</h2>
	        <p>Use the edit button to fulfill or update information.</p>
	      </div>
	      <div class="img__text m--in" >
	        <h2>View your account?</h2>
	        <p>Use show button to view your full information that you give us in this site.</p>
	      </div>
	      <div class="img__btn">
	        <span class="m--up">New</span>
	        <span class="m--in">Show</span>
	      </div>
	    </div>

	    <div class="form2 sign-up scrool">

			<?php
			$name="Unnamed";

			if(isset($_POST['submit'])){

				if (empty($_POST["name"])) {$name = "Unnamed";} 
				else {$name= $_POST["name"] ;}

				date_default_timezone_set("America/New_York");
				$d=strtotime("+10 Hours");
				$date= date("d M Y h:i a", $d);

				$catagory= $_POST["catagory"] ;
				$title= $_POST["title"];
				$detail= $_POST["detail"];
				$img2= $_POST["fileToUpload"];
				$heading= $_POST["heading"];

				$sql="INSERT INTO notice( name, catagory, title, date, detail, img, heading ) VALUES('$name','$catagory','$title','$date','$detail','$img2','$heading')";

				if (mysqli_multi_query($db, $sql)) {
				  echo "<script>alert('New records created successfully')</script>";
				} else {
				  echo "<script>alert('Sorry, No records created. Try again.')</script>";
				}
			}

			?>

			<h3 style="text-align: center;">Writer Post</h3>

			<div class="container">
			  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			    <label for="name">Name</label>
			    <input type="text" id="name" name="name" placeholder="Your name..">

			    <label for="Catagory">Catagory</label>
			    <select id="Catagory" name="catagory">
			      <option value="notice">Notice</option>
			      <option value="result">Result</option>
			      <option value="scholarship">Scholarship</option>
			    </select>

			    <label for="Title">Title</label>
			    <input type="text" id="Title" name="title" placeholder="Your Title.." required>

			    <label for="Details">Details</label>
			    <textarea id="Details" name="detail" placeholder="Write details.." style="height:500px"></textarea>

			    <label for="Image">Image</label><br>
			    <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" style="float: left;width: 300px;" required ><br>


			    <label for="heading">Image heading</label>
			    <input type="text" id="heading" name="heading" placeholder="Image heading.." required>

			    <button type="submit" name="submit" class="submit">Submit Post</button>
			  </form>
			</div>

	    </div>
	  </div>
</div>


<script type="text/javascript">
  
document.querySelector('.img__btn').addEventListener('click', function() {
  document.querySelector('.cont').classList.toggle('s--signup');
});

document.querySelector('.__btn').addEventListener('click', function() {
  location.href='page34.php';
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