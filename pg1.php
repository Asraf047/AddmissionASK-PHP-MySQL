<!DOCTYPE html>
<html>
<head>
	<title>Khulna</title>
	<link rel="stylesheet" type="text/css" href="pg1.css">
</head>
<body>

<div align="center"><h1>Specials of Khulna</h1></div>

<div class="login">
  <button class="accordion" onMouseOver="this.style.backgroundColor='transparent'" onMouseOut="this.style.color='#ccc'" style="text-align: center;">Login</button>
  <div class="panel"><br>
	<div class="container">
  	<form action="">
    <label for="fname">Name</label>
    <input type="text" id="fname" name="name" placeholder="Your name..">

    <label for="lname">Password</label>
    <input type="text" id="lname" name="password" placeholder="Your password..">

    <input type="submit" value="Submit" name="login">
    </form>
    </div>
 </div>
</div>

<br><br><br>
<br><br><br>
<button class="accordion">Foods</button>
<div class="panel">
	<a href="">Chuijhal</a><br>
	<a href="">Sweet</a><br>
	<a href="">Biriyani</a><br>
	<a href="">Fish</a><br>
</div>

<button class="accordion">Education</button>
<div class="panel">
	<a href="">University</a><br>
	<a href="">BKSP</a><br>
	<a href="">College</a><br>
	<a href="">School</a><br>
</div>

<button class="accordion">Places to visit</button>
<div class="panel">
	<a href="">Sundarban</a><br>
	<a href="">Shat Gombuz</a><br>
	<a href="">Rupsha</a><br>
	<a href="">Shilaidah</a><br>
</div>

<button class="accordion">Economy</button>
<div class="panel">
	<a href="">Industries</a><br>
	<a href="">Fish Export</a><br>
	<a href="">Jute</a><br>
	<a href="">Crops</a><br>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>

</body>
</html>