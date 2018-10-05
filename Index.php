<?php

include('Models.php');
	$curl_h = curl_init('http://api.worldbank.org/v2/datacatalog?format=json');

	curl_setopt($curl_h, CURLOPT_HTTPHEADER,
	    array(
	        'User-Agent: NoBrowser v0.1 beta',
	        'Accept : application/json'
	    )
	);

	# do not output, but store to variable
	curl_setopt($curl_h, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($curl_h);

	$data = json_decode($response, true);

	$class = new RowData();
	foreach ($data as $key => $value) $class->{$key} = $value;

	foreach ($class->datacatalog as $key => $value) {
	# code...
		$id_catalogue = $value['id'];
		$metatype = $value["metatype"];

		echo "<h3>" . $id_catalogue . "</h3>";

		foreach ($metatype as $met_key => $met_value) {
			# code...

			$_id = $met_value['id'];
			$_value = $met_value['value'];

			echo "<p> <blockquote> Id : " . $_id . " </blockquote> </p>";
			echo "<p> <blockquote> Value : " . $_value . " </blockquote> </p><hr>";
		}
	}
 ?>