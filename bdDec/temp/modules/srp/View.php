
<link rel="stylesheet" type="text/css" href="css/doc_profiles.css">
<link rel="stylesheet" type="text/css" href="css/PersonalInfoOverlay.css">
<script type="text/javascript" src="templates/DocPersonalInfo-Overlay.js"></script>

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
				if ($result = mysql_query($sql, $connection)) {
					$x = getDocInfo($result);
					echo $x;
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
function getDocInfo($docInfoJson) {

	$retStr = '';
	while ($row = mysql_fetch_assoc($docInfoJson)) {
		
		$retStr .= '<li class="docsPersonalProfile" name=' . $row["col1"] . '> <div class="left shadow"><img src="images/DocPic1.png" alt="Doc1" /> <div class="right docDescrip">';
		$retStr .= '<h4>' . $row["f_name"] . ' ' . $row["l_name"] . ', ' . $row["degree"] . '</h4>';
		$retStr .= '<h6>' . $row["f_name"] . '</h6>';
		$retStr .= '<h6>' . $row["hosp"] . ', ' . $row["country"] . '</h6>';
		$retStr .= '</div><div class="clearAll"></div><div class="gradient"></div><div class="subfooter">';
		//$retStr .= '<span>Contact me</span><span>509 Like</span><span class="unchecked"></span>';
		$retStr .= '</div></div></li>';

	}
	return $retStr;
}
?>

<script>
	jQuery(document).ready(function() {
		jQuery('.docsPersonalProfile').click(function() {
			//open overlay for the slected doc
			var $docOverlay = jQuery('#doc_overlay');
			//todo: make ajax call to lead the template
			/*$.getJSON('json/data.json', function(data) {
			 var template = "<h1>{{firstName}} {{lastName}}</h1>Blog: {{blogURL}}";
			 var html = Mustache.to_html(template, data);
			 $('#sampleArea').html(html);
			 });*/
			
			var jsonData = {
				firstName : "Antony",
				lastName : "Dobson",
				designation : "M.D., Ph.D.",
				breifInfo : "Medical Director &mp; Senior Consultant urologist, mms(SPore), M Med (Surgery), FRCS(Edinburgh), fics(usa), Fams (urology)",
				speciality : "Pulmonology (Respiratory Medicine)",
				clinic : "Praram 9 Hospital",
				location : "Bangkok, Thailand",
				languages : "Engligh,Thai", 
				experience : "26 yr",
				certified : "Yes",
				boardCertified : "UK",
 				accreditation : "JIC",
 				procedureFocus : "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
 				clinicalFocus : "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
				hospitalName : "Sime Darby Medical Center Subang Jaya",
				hospitalDetails : "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
				hospitalImg : "images/DocPic1.png",
				licenseNumber : "26704, Malaysia",
				img_src : "images/DocPic1.png",
				certifications : ['Urology, Malasya,2007','Urology, United Kingdom, 1996','Urology, United Kingdom, 1995','Urology, United Kingdom, 1992','Internal Medicine, United Kingdom, 1990'],
				trainings : ['University of Leeds, European Specialist Register in Urology(UK), 1996','University of Leeds, European Specialist Register in Urology(UK), 1996','University of Leeds, European Specialist Register in Urology(UK), 1996','University of Leeds, European Specialist Register in Urology(UK), 1996','University of Leeds, European Specialist Register in Urology(UK), 1996'],
				medicalSchools : ['University of Malaya, MBBS, Malaysia, 1986'],
				memberships : ['Memeber, British Association of Urological Surgeons','Member, Malaysian Urological Association']
			};
			
			var hasCertifications = false;
			if(jsonData.certifications.length>0){
					hasCertifications = true;
			}
			var hasTraining = false;
			if(jsonData.trainings.length>0){
					hasTraining = true;
			}
			
			var hasMedicalSchools = false;
			if(jsonData.medicalSchools.length>0){
					hasMedicalSchools = true;
			}
			
			var isMember = false;
			if(jsonData.memberships.length>0){
					isMember = true;
			}
			
			
			var person = {
				firstName : jsonData.firstName,
				lastName : jsonData.lastName,
				designation : jsonData.designation,
				breifInfo : jsonData.breifInfo,
				speciality : jsonData.speciality,
				clinic : jsonData.clinic,
				location : jsonData.location,
				languages : jsonData.languages, 
				experience : jsonData.experience,
				certified : jsonData.certified,
				boardCertified : jsonData.boardCertified,
 				accreditation : jsonData.accreditation,
 				procedureFocus : jsonData.procedureFocus,
 				clinicalFocus : jsonData.clinicalFocus,
 				hospitalName : jsonData.hospitalName,
				hospitalDetails : jsonData.hospitalDetails,
				hospitalImg : jsonData.hospitalImg,
				licenseNumber : jsonData.licenseNumber,
				img_src : jsonData.img_src,
				hasCertifications : hasCertifications,
				certifications :  jsonData.certifications,
				hasTraining : hasTraining,
				training : jsonData.trainings,
				hasMedicalSchools : hasMedicalSchools,
				medicalSchools : jsonData.medicalSchools,
				isMember : isMember,
				memberships : jsonData.memberships
			};
			var html = Mustache.to_html(docPersonalOverlayTemplate, person);
			//$docOverlay.find('.overlayContent').html('doc"s details for ....' + jQuery(this).attr('name') + html);
			$docOverlay.find('.overlayContent').html(html);
			$docOverlay.show();
			jQuery('#doc_OverlayMask').show();
			//Todo : disable scroll bar
			//document.documentElement.style.overflow = 'hidden';  // firefox, chrome
			//document.body.scroll = "no";
			// ie only
		});

		jQuery('#doc_overlay .close').click(function() {
			//close overlay for the slected doc
			var $docOverlay = jQuery('#doc_overlay');
			$docOverlay.find('.overlayContent').html('');
			$docOverlay.hide();
			jQuery('#doc_OverlayMask').hide();
			//enable scroll bar todo
			//document.documentElement.style.overflow = 'auto';  // firefox, chrome
			//document.body.scroll = "yes";
			// ie only

		});
	});

</script>