<?php
function xyz_qbr_network_destroy($networkwide) {
	global $wpdb;

	if (function_exists('is_multisite') && is_multisite()) {
		// check if it is a network activation - if so, run the activation function for each blog id
		if ($networkwide) {
			$old_blog = $wpdb->blogid;
			// Get all blog ids
			$blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
			foreach ($blogids as $blog_id) {
				switch_to_blog($blog_id);
				qbr_destroy();
			}
			switch_to_blog($old_blog);
			return;
		}
	}
	qbr_destroy();
}

function qbr_destroy()
{
	global $wpdb;
	delete_option("xyz_qbr_tinymce");
	if(get_option('xyz_credit_link')=="qbr")
	{
		update_option("xyz_credit_link", '0');
	}
	delete_option("xyz_qbr_html");
	delete_option("xyz_qbr_top");
	delete_option("xyz_qbr_width");
	delete_option("xyz_qbr_height");
	delete_option("xyz_qbr_left");
	
	delete_option("xyz_qbr_enable");
	delete_option("xyz_qbr_showing_option");
	delete_option("xyz_qbr_adds_enable");
	delete_option("xyz_qbr_cache_enable");
	
	delete_option("xyz_qbr_right");
	delete_option("xyz_qbr_bottom");
	delete_option("xyz_qbr_display_position");
	delete_option("xyz_qbr_delay");
	delete_option("xyz_qbr_page_count");
	delete_option("xyz_qbr_mode"); //page_count_only,both are other options
	delete_option("xyz_qbr_repeat_interval");
	delete_option("xyz_qbr_repeat_interval_timing");//hrs or  minute
	delete_option("xyz_qbr_z_index");
		
	delete_option("xyz_qbr_corner_radius");
	delete_option("xyz_qbr_width_dim");
	delete_option("xyz_qbr_height_dim");
		
	delete_option("xyz_qbr_border_color");
	delete_option("xyz_qbr_bg_color");
	
	delete_option("xyz_qbr_border_width");
	delete_option("xyz_qbr_page_option");
	delete_option("xyz_qbr_close_button_option");
	delete_option("xyz_qbr_iframe");
	
	
	delete_option("xyz_qbr_position_predefined");
	

}

register_uninstall_hook(XYZ_QBR_PLUGIN_FILE,'xyz_qbr_network_destroy');


?>