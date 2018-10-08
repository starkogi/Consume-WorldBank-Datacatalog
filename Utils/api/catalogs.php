<?php
/**
 * Created by PhpStorm.
 * User: starkogi
 * Date: 2018-10-06
 * Time: 12:01 PM
 */
include('../conn.php');

    if(!isset($_GET["search"])) {

        $search = "";
    }else{
        $search = $_GET["search"];
    }

    $tsql = "SELECT Distinct(DataCatalogId) DataCatalogId FROM Metatype WHERE [key] like '%" .$search."%' OR value like '%" .$search."%' ORDER BY DataCatalogId";
    $details = sqlsrv_query($conn, $tsql);

    $response = array();

    //Iterate all possible data feedback
    while($row = sqlsrv_fetch_object($details)){

        $tsql2 = "SELECT * FROM Metatype WHERE DataCatalogId = '" . $row->DataCatalogId. "'";
        $details2 = sqlsrv_query($conn, $tsql2);

        $grouped = array();

        $Ids = array (
            "DataCatalogId"=>$row->DataCatalogId);

        array_push($grouped, $Ids);

        while($row2 = sqlsrv_fetch_object($details2)){

            $single_row =  array(
                "key"=>$row2->key,
                "value"=>$row2->value);


            array_push($grouped, $single_row);

        }

        //Return Key Value
        array_push( $response, $grouped);

    }

    $jsondata = json_encode($response);
    echo $jsondata;

    sqlsrv_close( $conn);
