<?php

add_action ( 'get_footer', 'qbr_lightbox_create');//, [priority], [accepted_args] );

wp_enqueue_script('jquery');
function qbr_lightbox_create()
{
	$page_option=get_option('xyz_qbr_page_option');
	
	if($page_option==3)
	{

		return false;
	}
	echo qbr_lightbox_display();
}

function qbr_lightbox_display()
{
	$imgpath=plugins_url()."/quick-bar/images/";
	$closeimage=$imgpath."close.png";
	$dbcloseimage=$imgpath."dbclose.png";

	$html=get_option('xyz_qbr_html');
	
	$width=get_option('xyz_qbr_width');
	$height=get_option('xyz_qbr_height');
	
	$delay=get_option('xyz_qbr_delay');
	$page_count=get_option('xyz_qbr_page_count');
	if($page_count==0) $page_count=1;
	$mode=get_option('xyz_qbr_mode');
	$repeat_interval=get_option('xyz_qbr_repeat_interval');
	$repeat_interval_timing=get_option('xyz_qbr_repeat_interval_timing');
	if($repeat_interval_timing==1)
	{
		$repeat_interval=$repeat_interval*60;
	}
$z_index=get_option('xyz_qbr_z_index');
$corner_radius=get_option('xyz_qbr_corner_radius');

$height_dim=get_option('xyz_qbr_height_dim');
$width_dim=get_option('xyz_qbr_width_dim');
$border_color=get_option('xyz_qbr_border_color');
$bg_color=get_option('xyz_qbr_bg_color');

$border_width=get_option('xyz_qbr_border_width');
$close_button_option=get_option('xyz_qbr_close_button_option');
$iframe_option=get_option('xyz_qbr_iframe');

 $position_option=get_option("xyz_qbr_display_position");
 

$position_predefined=get_option('xyz_qbr_position_predefined');

global $wpdb;

ob_flush();
ob_start();
	?>
	<style type="text/css">

.qbr_content {
display: none;
position: fixed;
_position: fixed;
width: <?php echo $width; echo $width_dim;?>;
height: <?php echo $height; echo $height_dim;?>;
padding: 0;
margin:0;
border: <?php echo $border_width; ?>px solid <?php echo $border_color;?>;
background-color: <?php echo $bg_color;?>;
z-index:<?php echo $z_index+1;?>;
overflow: hidden;
border-radius:<?php echo $corner_radius;?>px

}
.qbr_iframe{

width:100%;
height:100%;
border:0;


}
.qbr{
background-color: <?php echo $border_color;?>;
color: <?php echo $qbr_title_color?>;
}
#closediv{
position:absolute;
cursor:pointer;
top: 0px;
right: 0px;
}
</style>


<div id="qbr_light" class="qbr_content"><?php if(!isset($_COOKIE['_xyz_qbr_until'])) {?>
<div class="qbr"><?php echo $qbr_title;  if($close_button_option==1) {?><img id="closediv"   src="<?php  echo $dbcloseimage;?>" onclick = "javascript:qbr_hide_lightbox()"><?php }?></div>
<!-- <div width="100%" height="20px" style="text-align:right;padding:0px;margin:0px;"><a href = "javascript:void(0)" onclick = "javascript:qbr_hide_lightbox()">CLOSE</a></div> -->
<?php if($iframe_option==1) { ?><iframe  src="<?php echo  plugins_url();?>/quick-bar/iframe.php" class="qbr_iframe" scrolling="no"></iframe><?php }else{  
echo do_shortcode($html);}
}?>
</div>

<script type="text/javascript">
var hadjust;
var wiadjust;

var def_disp=<?php echo $position_predefined;?>;
var qbrwid=<?php echo $width; ?>;
var qbrwiddim="<?php echo $width_dim;?>";
var qbrhe=<?php echo $height; ?>;
var qbrhedim="<?php echo $height_dim;?>";

var screenheight=jQuery(window).height(); 
var screenwidth=jQuery(window).width(); 
if(qbrhedim=="px")

{

hadjust=(screenheight-qbrhe)/2;

}
else
{
	hadjust=(100-qbrhe)/2;
}
if(qbrwiddim=="px")

{

wiadjust=(screenwidth-qbrwid)/2;

}
else
{
	wiadjust=(100-qbrwid)/2;
}


if(def_disp==2)
{
	document.getElementById("qbr_light").style.top=hadjust+qbrhedim;
	document.getElementById("qbr_light").style.left="0px";
}
if(def_disp==1)
{
	document.getElementById("qbr_light").style.top="0px";
	document.getElementById("qbr_light").style.left="0px";
}
if(def_disp==3)
{
	document.getElementById("qbr_light").style.bottom="0px";
	document.getElementById("qbr_light").style.left="0px";
}
if(def_disp==4)
{
	document.getElementById("qbr_light").style.bottom="0px";
	document.getElementById("qbr_light").style.left=wiadjust+qbrwiddim;
}
if(def_disp==5)
{
	document.getElementById("qbr_light").style.bottom="0px";
	document.getElementById("qbr_light").style.right="0px";
}
if(def_disp==6)
{
	document.getElementById("qbr_light").style.top=hadjust+qbrhedim;
	document.getElementById("qbr_light").style.right="0px";
}
if(def_disp==7)
{
	document.getElementById("qbr_light").style.top="0px";
	document.getElementById("qbr_light").style.right="0px";
}
if(def_disp==8)
{
	document.getElementById("qbr_light").style.top="0px";
	document.getElementById("qbr_light").style.left=wiadjust+qbrwiddim;
}




var bordwidth=<?php echo $border_width;?>;

	var newheight;
	var newwidth;
	if(qbrhedim=="%")

	{
	
		var hadnjust=(screenheight*qbrhe)/100;
		 newheight=hadnjust-(2*bordwidth);
		 document.getElementById("qbr_light").style.height=newheight+'px';
	}
	
	if(qbrwiddim=="%")

	{

		
		var wiadnjust=(screenwidth*qbrwid)/100;
		 newwidth=wiadnjust-(2*bordwidth);
			document.getElementById("qbr_light").style.width=newwidth+'px';
	}

	
	



var xyz_qbr_tracking_cookie_name="_xyz_qbr_until";
var xyz_qbr_pc_cookie_name="_xyz_qbr_pc";
var xyz_qbr_tracking_cookie_val=xyz_qbr_get_cookie(xyz_qbr_tracking_cookie_name);
var xyz_qbr_pc_cookie_val=xyz_qbr_get_cookie(xyz_qbr_pc_cookie_name);
var xyz_qbr_today = new Date();

if(xyz_qbr_pc_cookie_val==null)
xyz_qbr_pc_cookie_val = 1;
else
xyz_qbr_pc_cookie_val = (xyz_qbr_pc_cookie_val % <?php echo $page_count;?> ) +1;

expires_date = new Date( xyz_qbr_today.getTime() + (24 * 60 * 60 * 1000) );
document.cookie = xyz_qbr_pc_cookie_name + "=" + xyz_qbr_pc_cookie_val + ";expires=" + expires_date.toGMTString() + ";path=/";


function xyz_qbr_get_cookie( name )
{
var start = document.cookie.indexOf( name + "=" );
//alert(document.cookie);
var len = start + name.length + 1;
if ( ( !start ) && ( name != document.cookie.substring( 0, name.length ) ) )
{
return null;
}
if ( start == -1 ) return null;
var end = document.cookie.indexOf( ";", len );
if ( end == -1 ) end = document.cookie.length;
return unescape( document.cookie.substring( len, end ) );
}


function qbr_hide_lightbox()
{
document.getElementById("qbr_light").style.display="none";
document.getElementById("qbr_light").innerHTML="";

}

function qbr_show_lightbox()
{

//alert(qbr_tracking_cookie_val);

if(xyz_qbr_tracking_cookie_val==1)
return;

if( "<?php echo $mode;?>" == "page_count_only"  || "<?php echo $mode;?>" == "both" )
{
if(xyz_qbr_pc_cookie_val != <?php echo $page_count;?>)
return;
}


document.getElementById("qbr_light").style.display="block";



//expires_date = new Date( xyz_qbr_today.getTime() + (24 * 60 * 60 * 1000) );
//alert(xyz_qbr_today.toGMTString());
	expires_date = new Date(xyz_qbr_today.getTime() + (<?php echo $repeat_interval;?> * 60 * 1000));
document.cookie = xyz_qbr_tracking_cookie_name + "=1;expires=" + expires_date.toGMTString() + ";path=/";


}

if("<?php echo $mode;?>" == "page_count_only")
qbr_show_lightbox();
else
setTimeout("qbr_show_lightbox()",<?php echo $delay*1000;?>);

</script>





<?php 
$lbc=ob_get_contents();
ob_clean();
return  $lbc;

}


?>