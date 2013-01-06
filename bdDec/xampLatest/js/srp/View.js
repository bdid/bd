$(function() {
	$('#filter').click(function() {
		$('#filter_div').slideUp(2000);
	});

	$(".checkbox").click(function() {
		var $this = $(this);
		if ($this.hasClass('active')) {
			$this.removeClass('active');
			$this.addClass('inactive');
		} else {
			$this.removeClass('inactive');
			$this.addClass('active');
		}
	});
}); 
	
function filterResults(tgt) {
	
    $.ajax({
        url: "Ajax.php",
        type: "get",
        data: {filterType: tgt.id},
        // callback handler that will be called on success
        success: function(response, textStatus, jqXHR) {
            // log a message to the console
            var respJson = jQuery.parseJSON(response);
            var html = Mustache.to_html(srpTemplate, respJson);
            console.log('Ajax Resp=' + respJson);
            jQuery('.main_content').find('ul').html(html);
            
        },
        // callback handler that will be called on error
        error: function(jqXHR, textStatus, errorThrown) {
            // log the error to the console
            console.log(
                "The following error occured: "+
                textStatus, errorThrown
            );
        },
        // callback handler that will be called on completion
        // which means, either on success or error
        complete: function() {
            // enable the inputs
            bindOverlayFunction();
        }
    });
	

}

function bindOverlayFunction() {
	jQuery('.docName').click(function(e) {
		//open overlay for the slected doc
		
		//todo: make ajax call to lead the template
		/*$.getJSON('json/data.json', function(data) {
		 var template = "<h1>{{firstName}} {{lastName}}</h1>Blog: {{blogURL}}";
		 var html = Mustache.to_html(template, data);
		 $('#sampleArea').html(html);
		 });*/
		
		var docId = '';
		var jsonData = {};
		
		jsonData = {
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
		
		jsonData = getDocProfileJsonData(e.target.id, renderDocProfile());
		

	});

	function renderDocProfile() {
		return function(jsonData) {
			var hasCertifications = false;
			if(jsonData.certifications && jsonData.certifications.length>0){
					hasCertifications = true;
			}
			var hasTraining = false;
			if(jsonData.trainings && jsonData.trainings.length>0){
					hasTraining = true;
			}
			
			var hasMedicalSchools = false;
			if(jsonData.medicalSchools && jsonData.medicalSchools.length>0){
					hasMedicalSchools = true;
			}
			
			var isMember = false;
			if(jsonData.memberships && jsonData.memberships.length>0){
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
			var $docOverlay = jQuery('#doc_overlay');
			$docOverlay.find('.overlayContent').html(html);
			$docOverlay.show();
			jQuery('#doc_OverlayMask').show();
			//Todo : disable scroll bar
			//document.documentElement.style.overflow = 'hidden';  // firefox, chrome
			//document.body.scroll = "no";
			// ie only	
		}

	}
	
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
	
}

function getDocProfileJsonData(inputDocId, callback) {
	    $.ajax({
        url: "Ajax.php",
        type: "get",
        data: {filterType: 'docProfile', docId: inputDocId},
        // callback handler that will be called on success
        success: function(response, textStatus, jqXHR) {
            // log a message to the console
            var respJson = jQuery.parseJSON(response);
            
            callback(respJson);
            // var html = Mustache.to_html(docPersonalOverlayTemplate, respJson);
            // console.log('Ajax Resp=' + respJson);
            // jQuery('.main_content').find('ul').html(html);
            
        },
        // callback handler that will be called on error
        error: function(jqXHR, textStatus, errorThrown) {
            // log the error to the console
            console.log(
                "The following error occured: "+
                textStatus, errorThrown
            );
        },
        // callback handler that will be called on completion
        // which means, either on success or error
        complete: function() {
            // enable the inputs
            // bindOverlayFunction();
        }
    });
	
}

jQuery(document).ready(bindOverlayFunction);
