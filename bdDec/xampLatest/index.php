<?php
include ("modules/common/header.php");
?>
<div class="clearAll"></div>
<div class="divGradient1"></div>

<?php
		$name = mysql_real_escape_string($_GET['mod']);
		$modpathModel = "modules/$name/Model.php";
		$modpathView = "modules/$name/View.php";
		
		// echo "mod" . $name . ", model=" . $modpathModel . ", view=" . $modpathView;
		
		if (file_exists($modpathModel)) {
		    include($modpathModel);
		} else {
		    die ("Sorry, model file doesn't exist...");
		}
		
		if (file_exists($modpathView)) {
		    include($modpathView);
		} else {
		    die ("Sorry, view file doesn't exist...");
		}

?>