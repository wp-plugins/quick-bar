<?php
/*
Plugin Name:Quick Bar
Plugin URI: http://xyzscripts.com/wordpress-plugins/quick-bar/
Description: This plugin allows you to create a quick access bar with custom content in your site. You can customize the quick bar display by configuring various settings such as  position settings (height,width,top,left), display logic settings (time delay after page load, number of pages to browse,  repeat interval) and style settings(z-index, opacity, color, border etc). The plugin supports automatic and manual (shortcode) display.
Version: 1.1
Author: xyzscripts.com
Author URI: http://xyzscripts.com/
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if ( !function_exists( 'add_action' ) ) 
{
	echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
	exit;
}

ob_start();
error_reporting(0);
define('XYZ_QBR_PLUGIN_FILE',__FILE__);

require( dirname( __FILE__ ) . '/xyz-functions.php' );

require( dirname( __FILE__ ) . '/admin/install.php' );



require( dirname( __FILE__ ) . '/admin/menu.php' );

require( dirname( __FILE__ ) . '/create-quickbar.php' );

require( dirname( __FILE__ ) . '/ajax-handler.php' );

require( dirname( __FILE__ ) . '/shortcode-handler.php' );

require( dirname( __FILE__ ) . '/admin/destruction.php' );

if(get_option('xyz_credit_link')=="qbr"){

	add_action('wp_footer', 'xyz_qbr_credit');

}
function xyz_qbr_credit() {
	$content = '<div style="clear:both;width:100%;text-align:center; font-size:11px; "><a target="_blank" href="http://xyzscripts.com/wordpress-plugins/quick-bar/details">Quick Bar</a> Powered By : <a target="_blank" title="PHP Scripts & Wordpress Plugins" href="http://www.xyzscripts.com" >XYZScripts.com</a></div>';
	echo $content;
}



function xyz_qbr_query_vars($vars) {
	$vars[] = 'xyz_qbr';
	return $vars;
}
add_filter('query_vars', 'xyz_qbr_query_vars');


function xyz_qbr_parse_request($wp) {
	if (array_key_exists('xyz_qbr', $wp->query_vars)
			&& $wp->query_vars['xyz_qbr'] == 'iframe') {
		require( dirname( __FILE__ ) . '/iframe.php' );
		die;
	}

}
add_action('parse_request', 'xyz_qbr_parse_request');


?>