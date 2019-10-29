<?php

$files=glob("D:/aa/*.xml");
natsort($files);
$output="resul.txt";
echo "Start";
echo "<br>";

foreach ($files as $file) {
	print_r($file);
	echo "<br>";
	$content=file_get_contents($file);
	file_put_contents($output, $content, FILE_APPEND);
	echo "complete";
	echo "<br>";
}
echo "Finish";
?>