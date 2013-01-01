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
        url: "Ajax.php?filterType=test",
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
            $inputs.removeAttr("disabled");
        }
    });
	

}
