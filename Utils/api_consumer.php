<?php

error_reporting(0);
if(!isset($_GET["page"])) {

    echo  "no page";
    die();
}
	$_page = $_GET["page"];


	include_once('functions.php');
	include_once('Models.php');

	$curl_h = curl_init('http://api.worldbank.org/v2/datacatalog?format=json&page='.$_page);

	curl_setopt($curl_h, CURLOPT_HTTPHEADER,
	    array(
	        'User-Agent: NoBrowser v0.1 beta',
	        'Accept : application/json'
	    )
	);

	# do not output, but store to variable
	curl_setopt($curl_h, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($curl_h);

    //Remove Slashes
    if (get_magic_quotes_gpc()){
        $response = stripslashes($response);
    }
    //Replace single quotes with double quotes
    $response = clean($response);

	$data = json_decode($response, true);

	$class = new RowData();

	foreach ($data as $key => $value) $class->{$key} = $value;

	//echo "<h3> Page" . $class->page . "</h3>";
	// 	echo "<h3>" . $class->pages . "</h3>";
	// 	echo "<h3>" . $class->per_page . "</h3>";
	// 	echo "<h3>" . $class->total . "</h3>";

	// persist Baseline data


	foreach ($class->datacatalog as $key => $value) {
	# code...
		$id_catalogue = $value['id'];
		$metatype = $value["metatype"];

		// echo "<h3> Data Catalog" . $id_catalogue . "</h3>";

		if($catalogId = persistCatalogData($id_catalogue, $class->page) > 0){


			foreach ($metatype as $met_key => $met_value) {

				$_id = $met_value['id'];
				$_value = $met_value['value'];


				if(persistMetaTypes($id_catalogue, $_id, $_value) > 0){

					// echo "<p> <blockquote> Id : " . $_id . " </blockquote> </p>";
					// echo "<p> <blockquote> Value : " . $_value . " </blockquote> </p><hr>";

				}

			}
		}
	}

	$results = array("page"=> $class->page, "totalpages"=> $class->pages, "Progress"=> ($class->page / $class->pages) * 100);
    echo json_encode($results);
	
 ?>