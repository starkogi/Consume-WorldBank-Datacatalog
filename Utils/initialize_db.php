<?php
/**
 * Created by PhpStorm.
 * User: starkogi
 * Date: 2018-10-06
 * Time: 11:16 AM
 */

    //Declare Connection string
    include_once ('conn.php');

    //Statement to remove all records from MetaType
    $tsql = "TRUNCATE TABLE MetaType";
    if($res = sqlsrv_query($conn, $tsql)){

        //Statement to remove all records from DataCatalog if first condition is met
        $tsql = "DELETE FROM DataCatalog";
        if($res = sqlsrv_query($conn, $tsql)){
            $results = array("Status"=> 1);
            echo json_encode($results);
        }else{
            $results = array("Status"=> 0);
            echo json_encode($results);
        }

    }else{
        $results = array("Status"=> 0);
        echo json_encode($results);
    }


