<?php

function xyz_qbr_em_network_install($networkwide) {
	global $wpdb;

	if (function_exists('is_multisite') && is_multisite()) {
		// check if it is a network activation - if so, run the activation function for each blog id
		if ($networkwide) {
			$old_blog = $wpdb->blogid;
			// Get all blog ids
			$blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
			foreach ($blogids as $blog_id) {
				switch_to_blog($blog_id);
				qbr_install();
			}
			switch_to_blog($old_blog);
			return;
		}
	}
	qbr_install();
}

function qbr_install()
{
	global $wpdb;
	if(get_option('xyz_credit_link')=="")
	{
		add_option("xyz_credit_link", '0');
	}
	add_option("xyz_qbr_tinymce", '1');
	add_option("xyz_qbr_cache_enable", '0');
   add_option("xyz_qbr_enable",'1');
   add_option("xyz_qbr_showing_option",'0,0,0');
   add_option("xyz_qbr_adds_enable",'1');
   
	add_option("xyz_qbr_html", 'Hello world.');
	add_option("xyz_qbr_top", '0');
	add_option("xyz_qbr_width", '100');
	add_option("xyz_qbr_height", '25');
	add_option("xyz_qbr_left", '0');
	add_option("xyz_qbr_right", '0');
	add_option("xyz_qbr_bottom", '0');
	add_option("xyz_qbr_display_position", '');
	add_option("xyz_qbr_delay", '0');
	add_option("xyz_qbr_page_count", '1');
	add_option("xyz_qbr_mode", 'delay_only'); //page_count_only,both are other options
	add_option("xyz_qbr_repeat_interval", '1');
	add_option("xyz_qbr_repeat_interval_timing", '1');//hrs or  minute
	add_option("xyz_qbr_z_index",'10000');
		
	add_option("xyz_qbr_corner_radius",'0');
	add_option("xyz_qbr_width_dim",'%');
	add_option("xyz_qbr_height_dim",'px');
		
	add_option("xyz_qbr_border_color",'#1ab5a7');
	add_option("xyz_qbr_bg_color",'#e9fefb');
	
	add_option("xyz_qbr_border_width",'2');
	add_option("xyz_qbr_page_option",'1');
	add_option("xyz_qbr_close_button_option",'0');
	add_option("xyz_qbr_iframe",'0');
	
	
	add_option("xyz_qbr_position_predefined","4");
	
	$version=get_option('xyz_qbr_free_version');
	$currentversion=xyz_qbr_plugin_get_version();
	if($version=="")
	{
		add_option("xyz_qbr_free_version", $currentversion);
	}
	else
	{
	
		update_option('xyz_qbr_free_version', $currentversion);
	}
	
}
//register_activation_hook(XYZ_QBR_PLUGIN_FILE,'qbr_install');
register_activation_hook( XYZ_QBR_PLUGIN_FILE ,'xyz_qbr_em_network_install');

?>
