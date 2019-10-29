<!DOCTYPE html>
<html>
<head>
	<title>header1</title>
	<link rel="stylesheet" type="text/css" href="header1.css">
</head>
<body>

<div class="slideshow-container">

  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="s1.jpeg" style="width:100%; max-height: 430px;">
    <div class="text">Caption Text</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="s2.jpg" style="width:100%; max-height: 430px;">
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="f.jpg" style="width:100%; max-height: 430px;">
    <div class="text">Caption Three</div>
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<div class="sticky">

 <div class="navbar" id="myTopnav">
  		<a href="page13.php">Home</a>
  		<a href="#news">News</a>
      <a href="#">Routine</a>
      <a href="#">Scholarship</a>
      <a href="#">Suggesion</a>
      <a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</a>
      <a href="signup1.php">Signin</a>
  		<div class="dropdown">
    		<p class="dropbtn">About</p>
    		<div class="dropdown-content">
      			<a href="#">Our Teacher</a>
      			<a href="#">Our User</a>
      			<a href="#">Us</a>
    		</div>
  		</div>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a> 
</div>

</div>


<?php include "page14.php"?>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }
}
</script>
<script type="text/javascript">

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}

</script>
</body>
</html>