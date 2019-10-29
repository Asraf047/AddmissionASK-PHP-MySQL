<!DOCTYPE html>
<html>
<head>
	<title>eight</title>
	<link rel="stylesheet" type="text/css" href="eight.css">
</head>
<body>

 <div class="navbar">
  		<a href="#home">Home</a>
  		<a href="#news">News</a>
  		<div class="dropdown">
    		<p class="dropbtn">About</p>
    		<div class="dropdown-content">
      			<a href="#">Link 1</a>
      			<a href="#">Link 2</a>
      			<a href="#">Link 3</a>
    		</div>
  		</div> 
</div>


 <?php
 echo "<br>";
 echo "Study " . $_GET['subject'] . " at " . $_GET['web'];
 echo "<br>";
 ?>

 <?php
 echo "<br>";
 echo "Full Name= " . $_POST['fname'] . " " . $_REQUEST['lname'];
 echo "<br>";
 ?>

<a href="ad.pdf" download="first.pdf">Download the pdf</a>

//show a webpage..
<?php
function get_url_contents($url){
        $crl = curl_init();
        $timeout = 5;
        curl_setopt ($crl, CURLOPT_URL,$url);
        curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;
}
$url = 'http://www.kuet.ac.bd/admission/';
$str = file_get_contents($url);
echo $str;
?>

<script type="text/javascript">

//get all link elements
var link_elements = document.querySelectorAll("a");

//extract out all uris.
var link_uris = [];
for (var i=0; i < link_elements.length; i++)
{
   

    link_uris.push (link_elements[i].href);
}

//filter out all links containing ".pdf" string
var link_pdfs = link_uris.filter (function (lu) { return lu.indexOf (".pdf") != -1});

//print all pdf links
for (var i=0; i < link_pdfs.length; i++){
    console.log (link_pdfs[i]);
  document.write(link_pdfs[i]);
  document.write('<br/>');
}
</script>

</body>
</html>