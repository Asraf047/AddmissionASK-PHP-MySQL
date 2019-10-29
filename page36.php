<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>007 - Post</title>
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
$commentes=13;
$db = mysqli_connect("localhost","root", "", "addmission");

if(isset($_SESSION['uploadpdf'])){unset($_SESSION['uploadpdf']);}
if(isset($_SESSION['deleteOk'])){unset($_SESSION['deleteOk']);}
if(isset($_SESSION['namepdf'])){unset($_SESSION['namepdf']);}
if(isset($_SESSION['pdf'])){unset($_SESSION['pdf']);}

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
?>	

<?php
$conn = mysqli_connect('localhost', 'root', '', 'addmission');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

$admin="no";
$sql0 = "SELECT admin FROM register WHERE id=$u_id";
$result0 = mysqli_query($conn, $sql0);
if (mysqli_num_rows($result0) > 0) {
    while ($row0 = mysqli_fetch_assoc($result0)) {
    $admin=$row0["admin"];
    if($admin=="yes"){
    	$sql1 = "SELECT id, name, title, date, detail, img, heading FROM notice order by id desc";
	} else{
		$sql1 = "SELECT id, name, title, date, detail, img, heading FROM notice WHERE w_id=$u_id order by id desc";
	}
  }
} else{
	$sql1 = "SELECT id, name, title, date, detail, img, heading FROM notice WHERE w_id=$u_id order by id desc";
}

$sql0 = "SELECT * FROM register WHERE id=$u_id";
$result = mysqli_query($conn, $sql0);
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
	  	
		<h2 style="color: #524F4B;"><b>All Posts</b></h2><br>
		<?php
		$id2=46;
		$count2=0;
		//$sql = "SELECT id, name, title, date, detail, img, heading FROM notice WHERE w_id=$u_id";
		$result = mysqli_query($conn, $sql1);
		if (mysqli_num_rows($result) > 0) {
		    while ($row = mysqli_fetch_assoc($result)) {

		$id2=$row["id"];
		$sql2 = "SELECT id FROM comment WHERE p_id=$id2 ";
		$result2 = mysqli_query($conn, $sql2);
		$count2=mysqli_num_rows($result2);

		?>

		<div class="container overflow card-4 margin-top margin-bottom white2">
		  <div id="first">
		    <?php echo "<img src=\"".$row["img"]."\">"; ?>
		    <div class="container">
		      <p><?php echo $row["heading"];?></p>
		    </div>
		  </div>
		  <div class="white2 overflow left-small"> 
		    <div class="container">
		      <button type="submit" name="sub" class="submit2" style="float: right;" onclick="location.href='page37.php?id=<?php echo $row["id"];?>'">Edit</button>
		      <h3><b><?php echo $row["title"];?></b></h3>
		      <h5><?php echo $row["name"].", ";?><span class="opacity"><?php echo $row["date"];?></span></h5>
		    </div>
		    <div class="container">
		      <p style="min-height: 60px;">
		      	<?php
		           $string=$row["detail"];
		           $string = strip_tags($string); if (strlen($string) > 190) { 
		           $stringCut = substr($string, 0, 190);     
		           $endPoint = strrpos($stringCut, ' '); 
		           $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);     
		           $string .= '...'; } 
		           echo $string;
		         ?>
		         </p>
		      <div class="row margin-top">
		        <div class="col m6 s12">
		          <p><button class="button white2 border" onclick="location.href='page28.php?id=<?php echo $row["id"];?>'"><b>READ MORE »</b></button></p>
		        </div>
		        <div class="col m6 hide-small">
		          <p><span class="padding-large right"><b>Comments  </b> <span class="tag"><?php echo $count2 ;?></span></span></p>
		        </div>
		      </div>
		    </div>
		  </div>
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
	        <h2>Post something?</h2>
	        <p>Use the new button to post any information.</p>
	      </div>
	      <div class="img__text m--in" >
	        <h2>View your posts?</h2>
	        <p>Use show button to view your all posts that you posted in this site.</p>
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
				$pdf2= $_POST["pdfUpload"];
				$heading= $_POST["heading"];

				$sql="INSERT INTO notice( name, catagory, title, date, detail, img, heading, pdf, w_id ) VALUES('$name','$catagory','$title','$date','$detail','$img2','$heading','$pdf2','$u_id')";

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

			    <label for="PDF">PDF</label><br>
			    <input type="file" name="pdfUpload" id="pdfUpload" accept="pdf/*" style="float: left;width: 300px;" ><br><br>

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