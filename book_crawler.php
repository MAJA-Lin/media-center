<?php




	$test = curl_init();
	curl_setopt($test, CURLOPT_URL, "www.gamer.com.tw");
	curl_setopt($test, CURLOPT_HEADER, false);

	curl_setopt($test, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($test, CURLOPT_FOLLOWLOCATION, true);

	$output = curl_exec($test);

	curl_close($test);
	echo $output;

?>