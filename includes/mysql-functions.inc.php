<?php
	define('DB_ARRAY', 1);
	define('DB_ARRAYS', 2);
	define('DB_VALUE', 3);
	define('DB_INSERT', 4);
	define('DB_INSERT_IGNORE', 5);
	define('DB_REPLACE', 6);
	define('DB_UPDATE', 7);
	define('DB_DELETE', 8);
	define('DB_UPDATE_LOW_PRIORITY', 9);

    /**
     * @param $table
     * @param $type
     * @param array $params
     * @return int
     */
    function dbQuery($table, $type, $params = array()) {
		global $tbl, $mysqli;


       /* echo '<pre>';
        print_r($table);
        print_r($tbl);
        die;*/

		$fields   = getParam('fields', '*', $params);
		$join     = getParam('join', '', $params);
		$values   = getParam('values', '', $params);
		$where    = getParam('where', '', $params);
		$order    = getParam('order', '', $params);
		$group    = getParam('group', '', $params);
		$start    = getParam('start', 0, $params);
		$limit    = getParam('limit', '', $params);
		$indexKey = getParam('indexKey', '', $params);
		$valueKey = getParam('valueKey', '', $params);

		$LOW_PRIORITY = false;

		/* defining variables, that depend on the query type */
		switch ($type){
			case DB_ARRAY:
				$limit = 1;
				break;
			case DB_VALUE:
				$limit = 1;
				break;
		}

		if(is_array($join)){
			$aliases = array();
			$aliases[$table] = 1;
			foreach($join as $joinTable=>$joinCondition){
				$aliases[$joinTable] = 1 + (empty($aliases[$joinTable]) ? 0 : $aliases[$joinTable]);
				if($aliases[$joinTable] > 1){
					$joins[] = 'LEFT JOIN '.$tbl[$joinTable].' AS '.$joinTable.'_'.$aliases[$joinTable].' '.$joinCondition;
				} else {
					$joins[] = 'LEFT JOIN '.$tbl[$joinTable].' AS '.$joinTable.' '.$joinCondition;
				}
			}
			$join = implode(' ', $joins);
		}




        $table = empty($join) ? $tbl[$table] : $tbl[$table].' AS '.$table;



		/* constructing query */
		if(!empty($where)) $where = (is_array($where)) ? 'WHERE ('.implode(') AND (', $where).')' : "WHERE $where";
		if(!empty($order)) $order = (is_array($order)) ? 'ORDER BY '.implode(', ', $order) : "ORDER BY $order";
		if(!empty($group)) $group = (is_array($group)) ? 'GROUP BY '.implode(', ', $group) : "GROUP BY $group";
		if(!empty($limit)) $limit = "LIMIT $start, $limit";
		if(is_array($fields)) $fields = implode(', ', $fields);





		/* querying database */
		switch ($type){
			case DB_ARRAY:
				$result = dbRawQuery("SELECT $fields FROM $table $join $where $group $order $limit", $indexKey, $valueKey);
				if(is_array($result)){
					return $result[0];
				} else {
					return array();
				}
				break;

			case DB_ARRAYS:

			   /* echo '<pre>';
			    print_r($table);
			    print_r($join);
			    die;*/

				$result = dbRawQuery("SELECT $fields FROM $table $join $where $group $order $limit", $indexKey, $valueKey);
				if(is_array($result)){
					return $result;
				} else {
					return array();
				}
				break;

			case DB_VALUE:

				$result = dbRawQuery("SELECT $fields FROM $table $join $where $group $order $limit", $indexKey, $valueKey);
				if(is_array($result)){
					list($void, $value) = each($result[0]);
					return $value;
				} else {
					return false;
				}
				break;

			case DB_INSERT:
				if(is_array($values)){
					$fieldNames = dbRawQuery("SHOW COLUMNS FROM $table", 'Field');
					foreach(array_keys($fieldNames) as $fieldName) if (isset($values[$fieldName])) $fieldSets[] = $fieldName."='".$values[$fieldName]."'";
					$result = dbRawQuery("INSERT INTO $table SET ".implode(", ",$fieldSets));
				} else {
					$result = dbRawQuery("INSERT INTO $table VALUES($values)");
				}
				return mysqli_insert_id($mysqli);
				break;

			case DB_REPLACE:
				if(is_array($values)){
					$fieldNames = dbRawQuery("SHOW COLUMNS FROM $table", 'Field');
					foreach(array_keys($fieldNames) as $fieldName) if (isset($values[$fieldName])) $fieldSets[] = $fieldName."='".$values[$fieldName]."'";
					$result = dbRawQuery("REPLACE INTO $table SET ".implode(", ", $fieldSets));
				} else {
					$result = dbRawQuery("REPLACE INTO $table VALUES($values)");
				}
				return mysqli_insert_id($mysqli);
				break;

			case DB_UPDATE_LOW_PRIORITY:
				$LOW_PRIORITY = true;
			case DB_UPDATE:
				if (is_array($values)) {
					$fieldNames = dbRawQuery("SHOW COLUMNS FROM $table", 'Field');
					foreach(array_keys($fieldNames) as $fieldName) if (isset($values[$fieldName])) $fieldSets[] = $fieldName."='".$values[$fieldName]."'";
					if ($LOW_PRIORITY) {
						$result = dbRawQuery("UPDATE LOW_PRIORITY $table SET ".implode(", ",$fieldSets)." $where");
					} else {
						$result = dbRawQuery("UPDATE $table SET ".implode(", ", $fieldSets)." $where");
					}
				} else {
					$result = dbRawQuery("UPDATE $table SET $values $where");
				}
				return mysqli_affected_rows($mysqli);
				break;

			case DB_DELETE:
				$result = dbRawQuery("DELETE FROM $table $where $limit");
				return mysqli_affected_rows($mysqli);
				break;
		}

	}

    /**
     * @param $query
     * @param string $indexKey
     * @param string $valueKey
     * @return array|bool
     */
    function dbRawQuery($query, $indexKey = '', $valueKey = '') {


		global $dbTotalQueries, $dbQueryTime, $dbHost, $dbUser, $dbPass, $dbName, $mysqli;

		$startTime = getMicroTime();
		$attempt   = 0;

		if(empty($dbQueryTime)) $dbQueryTime = 0;
		$dbTotalQueries = empty($dbTotalQueries) ? 1 : $dbTotalQueries + 1;

		do{
			$attempt++;
			$result = mysqli_query($mysqli, $query);
			if(!$result && mysqli_connect_errno()){
				mysqli_free_result($mysqli);
				mysqli_close($mysqli);
                $mysqli = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
			}

		} while(!$result && ($attempt <= 3));

		if($result){
			if($result === true) {
				$dbQueryTime += (getMicroTime() - $startTime);
				return true;
			} else {
  			file_put_contents('query.txt', $query);
				if(empty($indexKey)){
					if(empty($valueKey)){
						while($row = mysqli_fetch_assoc($result)) $rows[] = $row;
					} else {
						while($row = mysqli_fetch_assoc($result)) $rows[] = $row[$valueKey];
					}

				} elseif(empty($valueKey)) {
					while($row = mysqli_fetch_assoc($result)) $rows[$row[$indexKey]] = $row;
				} else {
					while($row = mysqli_fetch_assoc($result)) $rows[$row[$indexKey]] = $row[$valueKey];
				}

                mysqli_free_result($result);

				if(!empty($rows)){
					$dbQueryTime += (getMicroTime() - $startTime);
					return $rows;
				}
			}

		} else {

  		  trigger_error("Query failed: ".mysqli_connect_errno().". Query: $query", E_USER_WARNING);

		}
	}

    /**
     * @param $param
     * @param $default
     * @param $params
     * @return mixed
     */
    function getParam($param, $default, &$params){
		return empty($params[$param]) ? $default : $params[$param];
	}

