<?php
$xyz_qbr_cache_enable=get_option('xyz_qbr_cache_enable');
$xyz_qbr_enable=get_option('xyz_qbr_enable');
$page_option=get_option('xyz_qbr_page_option');
if($xyz_qbr_enable==1)
{
  if($xyz_qbr_cache_enable==1)
  {
       add_shortcode( 'xyz_qbr_default_code', 'xyz_qbr_shortcode' );
  }

  else
  {
  	   if($page_option==3)
	      add_shortcode( 'xyz_qbr_default_code', 'xyz_qbr_display' );
  }
}	
function xyz_qbr_shortcode()
{
	return "<span id='xyz_qbr_shortcode'></span>";
}

?>