<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>attributeMultiple demo</title>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
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
$url = 'http://www.buet.ac.bd/Home/Admission';
$str = file_get_contents($url);
echo $str;
?>


<script>
$( "a[href$='.pdf']" ).each(function() {
        var pdfName = $(this).text();
        var pdfUrl = $(this).attr('href');
		document.write(pdfUrl);
		console.log (pdfUrl);
		document.write('<br/>');
    });
</script>
 
</body>
</html>