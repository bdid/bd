
<link rel="stylesheet" type="text/css" href="css/doc_profiles.css">
<link rel="stylesheet" type="text/css" href="css/PersonalInfoOverlay.css">
<script type="text/javascript" src="templates/DocPersonalInfo-Overlay.js"></script>
<script type="text/javascript" src="templates/srpTemplate.js"></script>

<div id="main_container" class="main_container">
	<header class="header">
		<h1 class="left">Providers</h1>
		<div class='right'>
			<span >Filter</span><span class="arrow"></span>
			<span>Location</span><span class="arrow"></span>
		</div>
	</header>
	<div class="clearAll"></div>
	<div class="filter_div shadow">
		<div class="checkboxDiv">
			<table>
				<tr>
					<!-- TODO: Perf and maintainability: js comp or code in php/jsp? -->
					<td><div id="jciFilter" class="checkbox inactive" onclick="filterResults(this);"></div><span>Is JCI Certified</span></td>
					<td><div id="filter2" class="checkbox inactive" onclick="filterResults(this);"></div><span>abcdef</span></td>
					<td rowspan="2">
						
					</td>
					<td rowspan="2">
						
					</td>
				</tr>
				<tr>
					<td><div id="filter3" class="checkbox inactive" onclick="filterResults(this);"></div><span>abcdef</span></td>
					<td><div id="filter4" class="checkbox inactive" onclick="filterResults(this);"></div><span>abcdef</span> </td>
				</tr>
			</table>
		</div>
	</div>
	<div class="main_content">
		<ul>
			<?php
				if ($result = mysql_query($sql, $connection)) {
					$x = getDocInfo($result);
					echo $x; //Render html
				} else {
					echo "Select failed";
				}
			?>

		</ul>
	</div>
</div><!-- end of main_container -->
<div id="doc_overlay" class="overlay_global">
	<div class="overlayHeader close">
		X
	</div>
	<div class="overlayContent"></div>
</div>
</body>
</html>

<?php
function getDocInfo($resultSet) {

	$retStr = '';
	while ($row = mysql_fetch_assoc($resultSet)) {
		$retStr .= '<li class="docsPersonalProfile" name=' . $row["col1"] . '> <div class="left shadow"><img src="images/DocPic1.png" alt="Doc1" /> <div class="right docDescrip">';
		$retStr .= '<div class="docName" id=\"3\">' . $row["f_name"] . ' ' . $row["l_name"] . ', ' . $row["degree"] . '</div>';
		// $retStr .= '<h4>' . $row["f_name"] . ' ' . $row["l_name"] . ', ' . $row["degree"] . '</h4>'; 
		$retStr .= '<h6>' . $row["f_name"] . '</h6>';
		$retStr .= '<h6>' . $row["hosp"] . ', ' . $row["country"] . '</h6>';
		$retStr .= '</div><div class="clearAll"></div><div class="gradient"></div><div class="subfooter">';
		$retStr .= '<span>Contact me</span><span>509 Like</span><span class="unchecked"></span>';
		$retStr .= '</div></div></li>';
		
	}
	return $retStr;
}
?>
