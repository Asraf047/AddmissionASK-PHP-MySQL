<html>
<head>
	<title>pdf1</title>
</head>
<body>

<p id="demo"></p>

<script type="text/javascript">
	document.write(4+5);
	var pdfFilesDirectory = 'https://www.w3schools.com/js/js_ajax_examples.asp';

// get auto-generated page 
$.ajax({url: pdfFilesDirectory}).then(function(html) {
    // create temporary DOM element
    var document = $(html);
    // find all links ending with .pdf 
    document.find('a[href$=.pdf]').each(function() {
        var pdfName = $(this).text();
        var pdfUrl = $(this).attr('href');
		document.write(4+5);
		document.getElementById("demo").innerHTML = 4;
        // do what you want here 
    })
});
</script>
</body>
</html>
