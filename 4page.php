<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="12page.css">

<style type="text/css">

* {
  box-sizing: border-box;
}
 
body {
  overflow: hidden;
  width: 100%;
  height: 100%;
  padding: 0;
  margin: 0;
  font-family: 'Montserrat', sans-serif;
}

/* Navigation */
.navigation {
  position: absolute;
  width: 100%;
  height: 100px;
  padding: 0 100px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  z-index: 200;
}
 
.navigation-left {
  margin-left: -33px;
}
 
.navigation-left a {
  text-decoration: none;
  .text-transform: uppercase;
  color: #ffe;
  font-size: 12px;
  font-weight: bold;
  width: 107px;
  height: 30px;
  border: 2px solid transparent;
  border-radius: 15px;
  display: inline-block;
  text-align: center;
  line-height: 25px;
  transition: all .2s;
}
 
.navigation-left a:hover,
.navigation-left a:focus {
  border-color: rgb(234, 46, 73);
  background-color: rgba(44, 45, 47, 0);
}
 
.navigation-center {
  margin-right: 85px;
}
 
.navigation-right {
  display: flex;
  align-items: center;
}
 
.login-btn {
  background-color: #b8b8b9;
  width: 97px;
  height: 30px;
  display: inline-block;
  text-align: center;
  text-decoration: none;
  font-size: 12px;
  font-weight: bold;
  border-radius: 15px;
  border: none;
  color: #333745;
  text-transform: uppercase;
  margin-left: 20px;
  transition: all .2s;
  cursor: pointer;
}
.login-btn:hover {
	
  transform: scale(1.06);
}

	</style>


</head>
<body>

<!-- Navigation -->


    <div class="container">

    	<div class="navigation">

  <div class="navigation-left">
    <a href="#">Home</a>
    <a href="#">Notice</a>
    <a href="#">Result</a>
    <a href="#">Scholarship</a>
  </div>

  <div class="navigation-center">
    <img src="adc_logo.png" alt="">
  </div>

  <div class="navigation-right">
    <a href="#"><img src="images/shopping-bag.png" alt=""></a>
    <button class="login-btn" href="#">Login</button>
  </div>

</div>

        <!-- BUTTONS (input/labels) -->
        <input type="radio" name="slider" id="slide-1-trigger" class="trigger" checked>
        <label class="btn" for="slide-1-trigger"></label>

        <input type="radio" name="slider" id="slide-2-trigger" class="trigger">
        <label class="btn" for="slide-2-trigger"></label>

        <input type="radio" name="slider" id="slide-3-trigger" class="trigger">
        <label class="btn" for="slide-3-trigger"></label>

        <input type="radio" name="slider" id="slide-4-trigger" class="trigger">
        <label class="btn" for="slide-4-trigger"></label>

        <!-- SLIDES -->
        <div class="slide-wrapper">
            <div id="slide-role">
                <div class="slide slide-1"></div>
                <div class="slide slide-2"></div>
                <div class="slide slide-3"></div>
                <div class="slide slide-4"></div>
            </div>
        </div>

    </div>
  
<script>
    
var slideIndex = 1;
var timer = null;
showSlides(slideIndex);

function plusSlides(n) {
  clearTimeout(timer);
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  clearTimeout(timer);
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("trigger");
  if (n==undefined){n = ++slideIndex}
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  slides[slideIndex-1].checked = true;
  timer = setTimeout(showSlides, 5000);
} 

</script>

</body>
</html>