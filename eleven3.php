<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>attributeMultiple demo</title>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<a href="ad.pdf" download="first.pdf">Download the pdf</a>


<script>

var myNodelist = document.querySelectorAll("a");
var myNodelist2 = myNodelist.search(/kuet|bd|pdf/);
var i;
for (i = 0; i < myNodelist2.length; i++) {
    myNodelist2[i].style.backgroundColor = "red";
    document.write(myNodelist2[i]);
    console.log (myNodelist2[i]);
    document.write('<br/>');
}

</script>
 
</body>
</html>