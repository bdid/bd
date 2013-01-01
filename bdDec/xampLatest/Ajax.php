<?php
	require_once ('Database/connectionQa.php');
?>
<?php	
	if (isset($_GET['filterType'])) {
		$filterType = $_GET['filterType'];
	}
	
	switch($filterType) {
		case 'jciFilter': 
			$searchJson = getJsonData(1, $connection, $sql);
			echo $searchJson;
			break;
	}

	function getJsonData($isJci, $connection, $sql) {
		 $sql = "select * from tempsrpdata where is_jci = " . $isJci . ";";
		 $result = mysql_query($sql, $connection);
		 // echo '<p>In Ajax.php, result=' . $result;
		 $arr = array();
		 if($result) {
			 while($row = mysql_fetch_assoc($result)) {
				 $arr[fName] = $row["f_name"];
				 $arr["lName"] = $row["l_name"];
				 $arr["edu"] = $row["degree_title"];
				 $arr["hosp"] = $row["hosp"];
				 $arr["country"] = $row["country"]; 
			}
			return json_encode($arr);	
		}
	}
?>

