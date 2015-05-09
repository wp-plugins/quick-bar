<?php
	// Load the options

	if (isset($_POST['xyz_qbr_html']))
	{
		$_POST=stripslashes_deep($_POST);
		$xyz_qbr_iframe=$_POST['xyz_qbr_iframe'];
		$xyz_qbr_repeat_interval_timing=$_POST['xyz_qbr_repeat_interval_timing'];
		$xyz_qbr_html=stripslashes($_POST['xyz_qbr_html']);
		
		$xyz_qbr_width=abs(intval($_POST['xyz_qbr_width']));
		$xyz_qbr_height=abs(intval($_POST['xyz_qbr_height']));
		 
		$xyz_qbr_delay=abs(intval($_POST['xyz_qbr_delay']));
		$xyz_qbr_page_count=abs(intval($_POST['xyz_qbr_page_count']));
		$xyz_qbr_repeat_interval=abs(intval($_POST['xyz_qbr_repeat_interval']));
		$xyz_qbr_mode=$_POST['xyz_qbr_mode'];
		$xyz_qbr_z_index=intval($_POST['xyz_qbr_z_index']);
		
		$xyz_qbr_showing_option="0,0,0";
		
		 $xyz_qbr_bg_color=$_POST['xyz_qbr_bg_color'];		
		$xyz_qbr_corner_radius=abs(intval($_POST['xyz_qbr_corner_radius']));
		
		$xyz_qbr_width_dim=$_POST['xyz_qbr_width_dim'];
		$xyz_qbr_height_dim=$_POST['xyz_qbr_height_dim'];
		$xyz_qbr_border_color=$_POST['xyz_qbr_border_color'];
		$xyz_qbr_border_width=$_POST['xyz_qbr_border_width'];
		$xyz_qbr_page_option=$_POST['xyz_qbr_page_option'];
		$xyz_qbr_close_button_option=$_POST['xyz_qbr_close_button_option'];
		//$xyz_qbr_positioning=$_POST['xyz_qbr_positioning'];
		$xyz_qbr_position_predefined=$_POST['xyz_qbr_position_predefined'];
		

		
		if($xyz_qbr_page_option==2)
		{
			$qbr_pgf=0;
			$qbr_pof=0;
			$qbr_hp=0;
			if(isset($_POST['xyz_qbr_pages']))
				$qbr_pgf=1;
			if(isset($_POST['xyz_qbr_posts']))
				$qbr_pof=1;
			if(isset($_POST['xyz_qbr_hp']))
				$qbr_hp=1;
		
			$xyz_qbr_showing_option=$qbr_pgf.",".$qbr_pof.",".$qbr_hp;
		
			update_option('xyz_qbr_showing_option',$xyz_qbr_showing_option);
		
		
		
		
		
		
		}	
		
		
		
$old_page_count=get_option('xyz_qbr_page_count');
$old_repeat_interval=get_option('xyz_qbr_repeat_interval');
if(isset($_POST['xyz_qbr_cookie_resett']))
{
?>	
	<script language="javascript">

 var cookie_date = new Date ( );  // current date & time
 cookie_date.setTime ( cookie_date.getTime() - 1 );

  document.cookie = "_xyz_qbr_pc=; expires=" + cookie_date.toGMTString()+ ";path=/";
  document.cookie = "_xyz_qbr_until=; expires=" + cookie_date.toGMTString()+ ";path=/";


</script>
	
	
<?php 	
}
	
		update_option('xyz_qbr_html',$xyz_qbr_html);
		
		update_option('xyz_qbr_width',$xyz_qbr_width);
		
		update_option('xyz_qbr_height',$xyz_qbr_height);
		
		update_option('xyz_qbr_delay',$xyz_qbr_delay);
		update_option('xyz_qbr_page_count',$xyz_qbr_page_count);
		update_option('xyz_qbr_repeat_interval',$xyz_qbr_repeat_interval);
		update_option('xyz_qbr_repeat_interval_timing',$xyz_qbr_repeat_interval_timing);
		update_option('xyz_qbr_mode',$xyz_qbr_mode);
		update_option('xyz_qbr_z_index',$xyz_qbr_z_index);
		
		
		update_option('xyz_qbr_corner_radius',$xyz_qbr_corner_radius);
		
		update_option('xyz_qbr_height_dim',$xyz_qbr_height_dim);	
		

		update_option('xyz_qbr_width_dim',$xyz_qbr_width_dim);
		update_option('xyz_qbr_border_color',$xyz_qbr_border_color);
		update_option('xyz_qbr_border_width',$xyz_qbr_border_width);
		update_option('xyz_qbr_bg_color',$xyz_qbr_bg_color);
		update_option('xyz_qbr_page_option',$xyz_qbr_page_option);
		update_option('xyz_qbr_close_button_option',$xyz_qbr_close_button_option);
		update_option('xyz_qbr_iframe',$xyz_qbr_iframe);
	
			update_option('xyz_qbr_position_predefined',$xyz_qbr_position_predefined);
		
		?><br>
		
<div  class="system_notice_area_style1" id="system_notice_area">Settings updated successfully.<span id="system_notice_area_dismiss">Dismiss</span></div>
<?php
}


?>
<style type="text/css">
label{
cursor:default;


}
</style>
<script type="text/javascript">
 
  jQuery(document).ready(function() {
    
    jQuery('#qbrbordercolorpicker').hide();
    jQuery('#qbrbordercolorpicker').farbtastic("#xyz_qbr_border_color");
    jQuery("#xyz_qbr_border_color").click(function(){jQuery('#qbrbordercolorpicker').slideToggle();});
    
    jQuery('#qbrbgcolorpicker').hide();
    jQuery('#qbrbgcolorpicker').farbtastic("#xyz_qbr_bg_color");
    jQuery("#xyz_qbr_bg_color").click(function(){jQuery('#qbrbgcolorpicker').slideToggle();});
    jQuery('#lbxqbrcolorpicker').hide();
    jQuery('#lbxqbrcolorpicker').farbtastic("#xyz_qbr_title_color");
    jQuery("#xyz_qbr_title_color").click(function(){jQuery('#lbxqbrcolorpicker').slideToggle();});
    
  });
  function bgchange()
  {
	  var v;
v=document.getElementById('xyz_qbr_page_option').value;
if(v==1)
{
	document.getElementById('automatic').style.display='block';
	document.getElementById('shopt').style.display='none';	
	document.getElementById('shortcode').style.display='none';		
}
if(v==2)
{
	document.getElementById('shopt').style.display='block';
	document.getElementById('shortcode').style.display='none';
	document.getElementById('automatic').style.display='none';	
}

if(v==3)

{
	document.getElementById('shortcode').style.display='block';
	document.getElementById('shopt').style.display='none';
	document.getElementById('automatic').style.display='none';
}
  }
  function cdcheck()
  {

	 var display_mech;
	 display_mech=document.getElementById('xyz_qbr_mode').value;
	 if(display_mech=="delay_only")
	 {
		 
		 document.getElementById('xyz_qbr_delaysec').style.display='';
		 document.getElementById('xyz_qbr_pages').style.display='none';
	 }
	 if(display_mech=="page_count_only")
	 {
		 
		 document.getElementById('xyz_qbr_delaysec').style.display='none';
		 document.getElementById('xyz_qbr_pages').style.display='';
	 }
	 if(display_mech=="both")
	 {
		 
		 document.getElementById('xyz_qbr_delaysec').style.display='';
		 document.getElementById('xyz_qbr_pages').style.display='';
	 }


  }


 
</script>
<div >
<?php  
$xyz_qbr_height_dim=get_option('xyz_qbr_height_dim');
$xyz_qbr_width_dim=get_option('xyz_qbr_width_dim');
$xyz_qbr_close_button_option=get_option('xyz_qbr_close_button_option');
$xyz_qbr_cookie_resett=get_option('xyz_qbr_cookie_resett');
$xyz_qbr_iframe=get_option('xyz_qbr_iframe');


$xyz_qbr_position_predefined=get_option('xyz_qbr_position_predefined');

?>
<h2>Quick Bar  Settings</h2>
<form method="post" >
<?php 
$xyz_qbr_showing_option=get_option('xyz_qbr_showing_option');
$xyz_qbr_sh_arr=explode(",", $xyz_qbr_showing_option);
?>
<table  class="widefat" style="width:98%">

<tr valign="top" >
<td  scope="row" style="width: 50%" ><h3>  Content</h3></td>
<td></td>
</tr>

<tr valign="top">

<td scope="row" colspan="1"><label for="lbx_referar_message_show_option">Show referrer URL based messages? </label></td><td style="color: red; ">Available in premium version only </td>
</tr>

<tr valign="top" >
<td colspan="2" >

<?php the_editor(get_option('xyz_qbr_html'),'xyz_qbr_html');?></td>
</tr>

<tr valign="top" id="xyz_qbr_pos"><td scope="row" colspan="2"><h3> Position Settings</h3></td></tr>

<tr valign="top" id="xyz_qbr_predefined">

<td scope="row" colspan="1"><label for="xyz_qbr_position_predefined">Choose a position </label>	</td><td>


<select name="xyz_qbr_position_predefined" id="xyz_qbr_position_predefined"  >

<option value ="1" <?php if($xyz_qbr_position_predefined=='1') echo 'selected'; ?> >On top left corner </option>

<option value ="2" <?php if($xyz_qbr_position_predefined=='2') echo 'selected'; ?> >On left center </option>
<option value ="3" <?php if($xyz_qbr_position_predefined=='3') echo 'selected'; ?> >On bottom left cornor</option>


<option value ="4" <?php if($xyz_qbr_position_predefined=='4') echo 'selected'; ?> >On bottom center </option>

<option value ="5" <?php if($xyz_qbr_position_predefined=='5') echo 'selected'; ?> >On bottom right corner </option>
<option value ="6" <?php if($xyz_qbr_position_predefined=='6') echo 'selected'; ?> >On right center</option>
<option value ="7" <?php if($xyz_qbr_position_predefined=='7') echo 'selected'; ?> >On top right corner </option>

<option value ="8" <?php if($xyz_qbr_position_predefined=='8') echo 'selected'; ?> >On top center </option>

</select>
</td>

</tr>

<tr valign="top" id="xyz_qbr_pos_width">
<td scope="row"><label for="xyz_qbr_width"> Width</label></td>
<td><input name="xyz_qbr_width" type="text" id="xyz_qbr_width"  value="<?php print(get_option('xyz_qbr_width')); ?>" size="40" /><select  name="xyz_qbr_width_dim"   id="xyz_qbr_width_dim" >
<option value ="px" <?php if($xyz_qbr_width_dim=='px') echo 'selected'; ?>>px</option>
<option value ="%" <?php if($xyz_qbr_width_dim=='%') echo 'selected'; ?>>%</option>

</select>
</td>
</tr>
<tr valign="top" id="xyz_qbr_pos_height">
<td scope="row"><label for="xyz_qbr_height"> Height</label></td>
<td><input name="xyz_qbr_height" type="text" id="xyz_qbr_height"  value="<?php print(get_option('xyz_qbr_height')); ?>" size="40" /><select  name="xyz_qbr_height_dim"   id="xyz_qbr_height_dim" >
<option value ="px" <?php if($xyz_qbr_height_dim=='px') echo 'selected'; ?>>px</option>
<option value ="%" <?php if($xyz_qbr_height_dim=='%') echo 'selected'; ?>>%</option>

</select></td>
</tr>
<?php
$xyz_qbr_mode=get_option('xyz_qbr_mode');
$xyz_qbr_page_option=get_option('xyz_qbr_page_option');
$xyz_qbr_repeat_interval_timing=get_option('xyz_qbr_repeat_interval_timing');
?>
<tr valign="top"><td scope="row" colspan="2"><h3> Display Logic Settings</h3></td></tr>
<tr valign="top">
<td scope="row"><label for="xyz_qbr_mode"> Display logic </label></td>
<td><select  name="xyz_qbr_mode"   id="xyz_qbr_mode"  onchange="cdcheck()">
<option value ="delay_only" <?php if($xyz_qbr_mode=='delay_only') echo 'selected'; ?>>Based on delay </option>
<option value ="page_count_only" <?php if($xyz_qbr_mode=='page_count_only') echo 'selected'; ?>>Based on  number of pages browsed </option>
<option value ="both" <?php if($xyz_qbr_mode=='both') echo 'selected'; ?>>Based on both </option>
</select></td>
</tr>
<tr valign="top" id="xyz_qbr_delaysec">
<td scope="row"><label for="xyz_qbr_delay"> Delay in seconds before popup appears </label></td>
<td><input name="xyz_qbr_delay" type="text" id="xyz_qbr_delay"  value="<?php print(get_option('xyz_qbr_delay')); ?>" size="40" /> sec</td>
</tr>

<tr valign="top" id="xyz_qbr_pages">
<td scope="row"><label for="xyz_qbr_page_count">Number of pages to browse before popup appears</label></td>
<td><input name="xyz_qbr_page_count" type="text" id="xyz_qbr_page_count"  value="<?php print(get_option('xyz_qbr_page_count')); ?>" size="40" /> pages</td>
</tr>
<tr valign="top">
<td scope="row"><label for="xyz_qbr_repeat_interval"> Repeat interval for a user </label></td>
<td ><input name="xyz_qbr_repeat_interval" type="text" id="xyz_qbr_repeat_interval"  value="<?php print(get_option('xyz_qbr_repeat_interval')); ?>" size="40" /> 

<select name="xyz_qbr_repeat_interval_timing" id="xyz_qbr_repeat_interval_timing" >
<option value ="1" <?php if($xyz_qbr_repeat_interval_timing=='1') echo 'selected'; ?> >Hrs </option>

<option value ="2" <?php if($xyz_qbr_repeat_interval_timing=='2') echo 'selected'; ?> >Minutes </option>
</select>
</td>

</tr>
<tr valign="top" >
<td scope="row" colspan="1"><label for="lbx_display_trigger"> Display trigger</label></td><td style="color: red; ">Available in premium version only </td></tr>
				<tr valign="top" id="xyz_qbr_close">

<td scope="row" colspan="1"><label for="xyz_qbr_close_button_option"> Close button option </label></td><td>


<select name="xyz_qbr_close_button_option" id="xyz_qbr_close_button_option"  >

<option value ="1" <?php if($xyz_qbr_close_button_option=='1') echo 'selected'; ?> >Yes </option>

<option value ="0" <?php if($xyz_qbr_close_button_option=='0') echo 'selected'; ?> >No </option>
</select>
</td>

</tr>
<tr valign="top">

<td scope="row" colspan="1"><label for="xyz_qbr_iframe">Display as iframe </label></td><td>


<select name="xyz_qbr_iframe" id="xyz_qbr_iframe"  >

<option value ="1" <?php if($xyz_qbr_iframe=='1') echo 'selected'; ?> >Yes </option>

<option value ="0" <?php if($xyz_qbr_iframe=='0') echo 'selected'; ?> >No </option>
</select>
</td>

</tr>
<tr valign="top">

<td scope="row" colspan="1"><label for="lbx_display_device">Target display devices </label></td><td style="color: red; ">Available in premium version only </td></tr>
<tr valign="top"><td scope="row" colspan="1"><h3> Popup Closing Settings</h3></td><td style="color: red; "></td></tr>

<tr valign="top" id="lbx_close" >

<td scope="row" colspan="1"><label for="lbx_bgimage_option"> Close mode </label></td><td style="color: red; ">Available in premium version only </td></tr>
<tr valign="top" >

<td scope="row" colspan="1"><label for="lbx_bgimage_option"> Auto close after timeout </label></td><td style="color: red; ">Available in premium version only </td></tr>
<tr valign="top"><td scope="row" colspan="1"><h3> Javascript Callback Settings</h3></td><td style="color: red; "> </td></tr>
<tr valign="top">
<td scope="row"><label for="lbx_show_callback">Callback on popup display</label></td>
<td style="color: red; ">Available in premium version only </td>
</tr>
<tr valign="top">
<td scope="row"><label for="lbx_hide_callback">Callback on popup hide</label></td>
<td style="color: red; ">Available in premium version only </td>
</tr>
<tr valign="top"><td scope="row" colspan="2"><h3> Style Settings</h3></td></tr>
<tr valign="top">
<td scope="row"><label for="xyz_qbr_z_index"> Z index</label></td>
<td><input name="xyz_qbr_z_index" type="text" id="xyz_qbr_z_index"  value="<?php print(get_option('xyz_qbr_z_index')); ?>" size="40" /> </td>
</tr>


<tr valign="top" >
<td scope="row"><label for="xyz_qbr_bg_color"> Background color</label></td>
<td><input name="xyz_qbr_bg_color" type="text" id="xyz_qbr_bg_color"  value="<?php print(get_option('xyz_qbr_bg_color')); ?>" size="40" /> <div id="qbrbgcolorpicker"></div> </td>
</tr>
<tr valign="top">
<td scope="row"><label for="xyz_qbr_border_color"> Border color</label></td>
<td><input name="xyz_qbr_border_color" type="text" id="xyz_qbr_border_color"  value="<?php print(get_option('xyz_qbr_border_color')); ?>" size="40" /> <div id="qbrbordercolorpicker"></div> </td>
</tr>
<tr valign="top">
<td scope="row"><label for="xyz_qbr_border_width">  Border width </label></td>
<td><input name="xyz_qbr_border_width" type="text" id="xyz_qbr_border_width"  value="<?php print(get_option('xyz_qbr_border_width')); ?>" size="40" /> px </td>
</tr>
<tr valign="top" id="xyz_qbr_rad">
<td scope="row"><label for="xyz_qbr_corner_radius">  Border radius </label></td>
<td><input name="xyz_qbr_corner_radius" type="text" id="xyz_qbr_corner_radius"  value="<?php print(get_option('xyz_qbr_corner_radius')); ?>" size="40" /> px </td>
</tr>

<tr valign="top"><td scope="row" colspan="2"><h3> Placement Settings</h3></td></tr>


<tr valign="top" id="pgopt" ><td scope="row"><label for="xyz_qbr_page_option"> Placement mechanism </label></td>
<td>
<select name="xyz_qbr_page_option" id="xyz_qbr_page_option" onchange="bgchange()">
<option value ="1" <?php if($xyz_qbr_page_option=='1') echo 'selected'; ?> >Automatic </option>
<option value ="2" <?php if($xyz_qbr_page_option=='2') echo 'selected'; ?> >Specific Pages</option>
<option value ="3" <?php if($xyz_qbr_page_option=='3') echo 'selected'; ?> >Manual </option>
</select></td></tr>


<tr valign="top" ><td scope="row" ></td><td>
<span  id="automatic" >Popup will load in all pages</span>
<span  id="shopt" >
<input name="xyz_qbr_pages" value="<?php echo $xyz_qbr_sh_arr[0];?>"<?php if( $xyz_qbr_sh_arr[0]==1){?> checked="checked"<?php } ?> type="checkbox"> On Pages 
<input name="xyz_qbr_posts" value="<?php echo  $xyz_qbr_sh_arr[1];?>"<?php if( $xyz_qbr_sh_arr[1]==1){?> checked="checked"<?php }?>  type="checkbox"> On Posts
<input name="xyz_qbr_hp" value="<?php echo  $xyz_qbr_sh_arr[2];?>"<?php if( $xyz_qbr_sh_arr[2]==1){?> checked="checked"<?php }?>  type="checkbox"> On Home page 
</span>
<span  id="shortcode" >Use this short code in your pages - [xyz_qbr_default_code]</span>
</td>
</tr>


<!--  <tr valign="top" id="automatic"  style="display: none"><td scope="row" ></td><td >(Popup will load in all pages)</td>

</tr>

<tr valign="top" id="shortcode"  style="display: none"><td scope="row"></td><td>Use this short code in your pages - [xyz_qbr_default_code]</td>
</tr>-->


<tr valign="top">
<td scope="row"><label for="xyz_lcookie_resett"><h3>Reset cookies ? </h3>
 </label></td>
<td><input name="xyz_qbr_cookie_resett" type="checkbox" id="xyz_qbr_cookie_resett"   <?php  echo 'checked'; ?> /> 
(This is just for your testing purpose. If you want to see a popup  immediately after you make changes in any settings, you have to reset the cookies.)
 </td>
</tr>
<tr>
<td scope="row"> </td>
<td><br>
<input type="submit" value=" Update Settings " /></td>
</tr>

</table>


</form>

</div>

<script type="text/javascript">
bgchange();
cdcheck();

</script>
