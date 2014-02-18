jQuery(document).ready(function($) {
	
	var xyz_qbr_shortcode=0;
	
	if(jQuery("#xyz_qbr_shortcode").length>0)
	{	
		 xyz_qbr_shortcode=1;
		
	}   
		
	
	var data = {
		action: 'xyz_qbr_action',
		xyz_qbr_shortcd:xyz_qbr_shortcode,
		xyz_qbr_pg:xyz_qbr_ajax_object.ispage,
		xyz_qbr_ps:xyz_qbr_ajax_object.ispost,
		xyz_qbr_hm:xyz_qbr_ajax_object.ishome
	};
	
	// Pass the url value separately from ajaxurl for front end AJAX implementations
	jQuery.post(xyz_qbr_ajax_object.ajax_url, data, function(response) {
		
		if(xyz_qbr_shortcode==1)
		{
			if(response!=0)
			    jQuery("#xyz_qbr_shortcode").append(response);
		}	
		else
		{
			if(response!=0)
		        jQuery("#xyz_qbr_container").append(response);
		}
	});
});
