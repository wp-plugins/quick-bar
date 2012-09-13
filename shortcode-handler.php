<?php

$page_option=get_option('xyz_qbr_page_option');
if($page_option==3)
{

add_shortcode( 'xyz_qbr_default_code', 'qbr_lightbox_display' );
}

?>