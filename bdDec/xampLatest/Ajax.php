<?php
	require_once ('Database/connectionQa.php');
?>
<?php	
	if (isset($_GET['filterType'])) {
		$filterType = mysql_real_escape_string($_GET['filterType']);
	}
	
	switch($filterType) {
		case 'jciFilter': 
			$searchJson = getFilteredSearchResultsJsonData(1, $connection, $sql);
			echo $searchJson; //Render the html
			break;
		case 'docProfile': 
			if (isset($_GET['docId'])) {
				$docId = mysql_real_escape_string($_GET['docId']);
			}
	
			$docProfileJson = getDocProfileJsonData($docId, $connection, $sql);
			echo $docProfileJson; //Render the html
			break;			
	}
	

	function getFilteredSearchResultsJsonData($isJci, $connection, $sql) {
		 $sql = "select * from tempsrpdata where is_jci = " . $isJci . ";";
		 $result = mysql_query($sql, $connection);
		 // echo '<p>In Ajax.php, result=' . $result;
		 $arr = array();
		 if($result) {
			 while($row = mysql_fetch_assoc($result)) {
			 	 $arr[docId] = $row["id"];
				 $arr[fName] = $row["f_name"];
				 $arr["lName"] = $row["l_name"];
				 $arr["edu"] = $row["degree_title"];
				 $arr["hosp"] = $row["hosp"];
				 $arr["country"] = $row["country"]; 
			}
			return json_encode($arr);	
		}
	}

	function getDocProfileJsonData($docId, $connection, $sql) {
		 $sql = "select * from tempdocdata where id = " . $docId . ";";
		 $result = mysql_query($sql, $connection);
		 $arr = array();
		 if($result) {
			 while($row = mysql_fetch_assoc($result)) {
			 	 $arr[docId] = $row["id"];
				 $arr[firstName] = $row["firstName"];
				 $arr["designation"] = $row["designation"];
				 $arr["speciality"] = $row["speciality"];
				 $arr["languages"] = $row["languages"];
				 $arr["location"] = $row["location"]; 
				 $arr[certified] = $row["certified"];
				 $arr["procedureFocus"] = $row["procedureFocus"];
				 $arr["hospitalDetails"] = $row["hospitalDetails"];
				 $arr["clinicalFocus"] = $row["clinicalFocus"];
				 $arr["hospitalName"] = $row["hospitalName"]; 
				 $arr[licenseNumber] = $row["licenseNumber"];	
				 $arr[img_src] = $row["img_src"];
				 		 
			}
			return json_encode($arr);	
		}
	}
	
		
?>

