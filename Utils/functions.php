<?php



	function persistCatalogData($id, $page){
		//Get db connection
		include('conn.php');

		$query = "INSERT INTO DataCatalog (id, page) VALUES ('{$id}', '{$page}')";
		if($res = sqlsrv_query($conn, $query)){
			return lastInsertId("DataCatalog");
		}else{
			return 0;
		}
	}

	function persistMetaTypes($id_catalogue, $key, $value){
		//Get db connection
		include('conn.php');

		$query = "INSERT INTO MetaType (DataCatalogId, [key], value) VALUES ('{$id_catalogue}', '{$key}', '{$value}')";
		if($res = sqlsrv_query($conn, $query)){
			return lastInsertId("MetaType");
		}else{
			return 0;
		}
	}

	function lastInsertId($table){
		include('conn.php');
		//$query = "SELECT TOP 1 * FROM {$table} ORDER BY id DESC";
	        $query = "SELECT TOP 1 * FROM {$table} ORDER BY id DESC" ;
		if($result = sqlsrv_query($conn, $query)){
			if(sqlsrv_has_rows($result)){
				$row = sqlsrv_fetch_object($result);
				return $row->Id;
			}
		}
		
	}

    function clean($txt){
        return str_replace("'", "''", $txt);
    }