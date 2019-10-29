
<!DOCTYPE html>
<html>
<head>
	<title>eleven1</title>
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

<script type="text/javascript">

var link_elements = document.querySelectorAll("a,admission,.pdf");
var link_uris = [];
for (var i=0; i < link_elements.length; i++)
{
    if (link_elements[i].href in link_uris)
        continue;
    link_uris.push (link_elements[i].href);
}
var link_pdfs = link_uris.filter (function (lu) { return lu.indexOf (".pdf") != -1});
for (var i=0; i < link_pdfs.length; i++){
    console.log (link_pdfs[i]);
  document.write(link_pdfs[i]);
  document.write('<br/>');
}

</script>

</body>
</html>