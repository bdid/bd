<script language='JavaScript' src='js/srp/Model.js' type='text/javascript'></script>
<script language='JavaScript' src='js/srp/View.js' type='text/javascript'></script>
	
<?php
	//echo "<p> SRP Model </p>";	
	//echo "In SRP Model, connection = " . $connection;
				
	if (isset($_GET['search'])) {
		$searchEntry = $_GET['search'];
		// echo "In Model, searchEntry = " . $searchEntry;
	}
	$sql = getSql($searchEntry);
	// echo "In Model, sql = " . $sql;
	getModel($connection, $sql);
	
	function getModel($connection, $sql) {

		//echo " db conn=" . $connection;
		$arr = array();
		$arr = getData($searchEntry, $connection, $sql);
		//echo " array output = " . $arr;
		
	}
	
	function getSql($searchEntry) {
				$sql = " select distinct doc.id, f_name, l_name, e.degree_title as degree, h.name as hosp, h.city, c.name as country ".
				" from doctor doc, hospital h, doc_sub_speciality dss, sub_speciality ss, education e, country c ".
				" where doc.id in (select id from doctor where f_name like '%" . $searchEntry . "%' or l_name like '%" . $searchEntry . "%' ) and doc.provider_id = h.id ".
				"  and doc.id = dss.doc_id and dss.sub_speciality_id = ss.id and h.country_id = c.id and e.doc_id = doc.id and e.is_cert is null or e.is_cert = 0 ".
				 
				"  union ".
				 
				"  select distinct doc.id, f_name, l_name, e.degree_title as degree, h.name as hosp, h.city, c.name as country ". 
				" 	from doctor doc, hospital h, doc_sub_speciality dss, sub_speciality ss, education e, country c ".
				" where doc.id in ( ".
				" select distinct d.id from doctor d, hospital h where name like '%" . $searchEntry . "%' and d.provider_id = h.id ".
				" ) and doc.provider_id = h.id ".
				 " and doc.id = dss.doc_id and dss.sub_speciality_id = ss.id and h.country_id = c.id and e.doc_id = doc.id and e.is_cert is null or e.is_cert = 0 ".
				
				" union ". 
				
				 " select distinct doc.id, f_name, l_name, e.degree_title as degree, h.name as hosp, h.city, c.name as country ". 
				" from doctor doc, hospital h, doc_sub_speciality dss, sub_speciality ss, education e, country c ".
				" where doc.id in ( ".
				" select distinct d.id from doctor d, doc_sub_speciality dss, sub_speciality ss where ss.title like '%" . $searchEntry . "%' and dss.sub_speciality_id = ss.id and d.id = dss.doc_id ". 
				" ) and doc.provider_id = h.id ".
				"  and doc.id = dss.doc_id and dss.sub_speciality_id = ss.id and h.country_id = c.id and e.doc_id = doc.id and e.is_cert is null or e.is_cert = 0";
				
				return $sql;
	}
	
	function getData($searchEntry, $connection, $sql) {


		
		echo "<p> sql = " . $sql;
		$result = mysql_query($sql, $connection);
		//echo '<p>$result=' . $result;
		$arr = array();
		if($result) {
			//echo "<p> Entering while loop";
			while($row = mysql_fetch_assoc($result)) {
				/* $arr["fName"] = $row["f_name"];
				$arr["lName"] = $row["l_name"];
				$arr["degree"] = $row["degree_title"];
				$arr["hospital"] = $row["hosp"];
				$arr["country"] = $row["country"]; 
				var_dump($arr); */
				
				echo "<p> In while loop";	
				
				echo ", fname=" . $row["f_name"];
				echo ", fname=" . $row["l_name"];
				echo ", fname=" . $row["degree_title"];
				echo ", fname=" . $row["hosp"];
				echo ", fname=" . $row["country"];
				
				echo "<p>";
				
			}
			return $arr;	
		}
	}
	
?>