<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Fertility Travels: One stop website for fertility information </title>
		<link href="css/global.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="css/homepage.css" rel="stylesheet" type="text/css" media="screen"/>

		<link rel="stylesheet" href="css/slider.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		<script src="js/slides.min.jquery.js"></script>
		<script type="text/javascript" src="js/mustache.js"></script>
		<script type="text/javascript" src="js/header.js"></script>
		
		<meta name="description" content="Fertility Travels is a web site for information on fertitlity procedures and to find doctors for IVF, Surrogacy etc">
		</meta>
		<script>
			function clearText(x)
			{
				x.value ="";
			}
			function refillText(x){
				if(x.value == ''){
					x.value = "Search";
				}
			}
</script>
	</head>
	<body>
		<div id="doc_OverlayMask" class="mask_global"></div>
		<div id="maincontainer" class='mainContainer'>
			<div id="header1">
				<div id='header1a' class='header1a'>
					<div id="header1Right">
						<ul id="headerNav1">
							<li>
								<a href="#"><span>ABOUT</span></a>
							</li>
							<li>
								<a href="#"><span>CONTACT</span></a>
							</li>
						</ul>
						<div class='schForm'>
						<form id='schForm' class='schForm' action='index.php'>
							<input id='search' name='search' type='text' value='Search' onfocus="clearText(this)" onblur="refillText(this)" size='30'></input>
							<input name='mod' type='hidden' value='srp'></input>	
							<input type='submit' style='display:none'></input>
						</form>
						</div>
					</div>

				</div>

			</div>
			<!-- Header-1 -->
			<div class="clearAll"></div>

			<div id="header2">
				<div id="header2Right">
					<ul id="headerNav2">
						<li>
							<a href="Procedures.php">PROCEDURES</a>
						</li>
						<li>
							<a href="DocProfilesRealData2.php">DOCTORS</a>
						</li>
						<li>
							<a href="#">CHATTER BOX </a>
						</li>
						<li>
							<a href="#">MY ACCOUNT</a>
						</li>
					</ul>
				</div>
				<a id="headerLogo" href="homepage.php"></a>

			</div>
			<!-- Header 2 -->
<?php
	require_once ('Database/connectionQa.php');
?>