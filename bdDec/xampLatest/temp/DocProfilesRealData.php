<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Fertility Travels: Doctors Information page </title>
		<link href="css/global.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="css/homepage.css" rel="stylesheet" type="text/css" media="screen"/>

		<link rel="stylesheet" href="css/doc_profiles.css" />
		<meta name="description" content="Fertility Travels is a web site for information on fertitlity procedures and to find doctors for IVF, Surrogacy etc">
		</meta>
	</head>
	</head>
	<body>
		<?php
		
		include ("header.php");
 ?>
		<?php
		require_once (realpath(dirname(__FILE__).'/Database/connection.php'));
		//This will provide a connection to the database.
		$sql='select * from docs_basic_info';
		?>

		<div id="main_container" class="main_container">
			<header class="header">
				<h1 class="left">Providers</h1>
				<div class='right'>
					<span >Filter</span><span class="arrow"></span>
					<span>Location</span><span class="arrow"></span>
				</div>
			</header>
			<div class="clearAll"></div>
			<div class="filter_div shadow"></div>
			<div class="main_content">
				<ul>
					<?php
					if($result=mysql_query($sql,$connection)) {
					$x=getDocInfo($result);
					echo $x;
					} else {
					echo "Select failed";
					}
					?>
				</ul>
			</div>
		</div><!-- end of main_container -->
	</body>
</html>

<?php
function getDocInfo($docInfoJson) {
$retStr='';
while($row=mysql_fetch_assoc($docInfoJson)) {
$retStr.='<li> <div class="left shadow"><img src="images/DocPic1.png" alt="Doc1" /> <div class="left docDescrip">';
$retStr.='<h3>'.$row["F_Name"].' '.$row["L_Name"].'</h3>';
$retStr.='<h6>'.$row["languages"].'</h6>';
$retStr.='<span>'.$row["city"].', '.$row["state"].'. '.$row["country"].'</span>';
$retStr.='</div><div class="clearAll"></div><div class="gradient"></div><div class="subfooter">';
$retStr.='<span>Contact me</span><span>509 Like</span><span class="unchecked"></span>';
$retStr.='</div></div></li>';
}
return $retStr;
}
?>