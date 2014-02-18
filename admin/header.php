<?php 
if($_POST && isset($_POST['xyz_credit_link']))
{
	$xyz_qbr_tinymce=$_POST['xyz_qbr_tinymce'];
	$xyz_credit_link=$_POST['xyz_credit_link'];
    $xyz_qbr_enable=$_POST['xyz_qbr_enable'];
    $xyz_qbr_adds_enable=$_POST['xyz_qbr_adds_enable'];
    $xyz_qbr_cache_enable=$_POST['xyz_qbr_cache_enable'];
    
    
	update_option('xyz_qbr_tinymce', $xyz_qbr_tinymce);
	update_option('xyz_credit_link', $xyz_credit_link);
    update_option('xyz_qbr_enable', $xyz_qbr_enable);
    update_option('xyz_qbr_cache_enable', $xyz_qbr_cache_enable);
    update_option('xyz_qbr_adds_enable', $xyz_qbr_adds_enable);
	?>
<div class="system_notice_area_style1" id="system_notice_area">
	Settings updated successfully. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
</div>
	<?php 
}?>

<div style="width: 98%">
<?php 
$xyz_qbr_adds_enable=get_option('xyz_qbr_adds_enable');
if($xyz_qbr_adds_enable==1)
{
?>
<div id="xyz-wp-popup-premium">

<div style="float: left;padding: 0 5px">
<h2 style="vertical-align: middle;"><a target="_blank" href="http://xyzscripts.com/wordpress-plugins/xyz-wp-popup/features">Fully Featured XYZ WP Popup Premium Plugin</a> 
 - Just 39 USD 
</h2>
</div>
<div style="float: left;padding: 5px">
<a target="_blank" href="http://xyzscripts.com/members/product/purchase/XYZWPPOP"><img src="<?php  echo plugins_url("quick-bar/images/orange_buynow.png"); ?>"></a>
</div>

 </div>
 <?php 
}
?>
    <div style="clear:both"></div>

<?php 

if(get_option('xyz_credit_link')=="0"){
	?>
<div style="float:left;background-color: #FFECB3;border-radius:5px;padding: 0px 5px;border: 1px solid #E0AB1B" id="xyz_backlink_div">
	
	Please do a favour by enabling backlink to our site. <a id="xyz_qbr_backlink" style="cursor: pointer;" >Okay, Enable</a>.
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#xyz_qbr_backlink').click(function() {

			var dataString = { 
					action: 'ajax_backlink', 
					enable: 1
				};
				jQuery.post(ajaxurl, dataString, function(response) {
					jQuery("#xyz_backlink_div").html('Thank you for enabling backlink !');
					jQuery("#xyz_backlink_div").css('background-color', '#D8E8DA');
					jQuery("#xyz_backlink_div").css('border', '1px solid #0F801C');
					jQuery("select[id=xyz_qbr_credit_link] option[value=qbr]").attr("selected", true);
					if(window.rcheck)
					{
						document.location.reload();
					}
				});	
			});
		

	});
</script>
</div>
	<?php 
}



?>

<style type="text/css">
    #xyz-wp-popup-premium
    {
    border: 1px solid #FCC328;
    margin-bottom: 20px;
    margin-top: 20px;
    background-color: #FFF6D6;
    height: 50px;
    padding: 5px;
    }
    

</style>

 
<div style="margin-top: 10px">
<table style="float:right; ">
<tr>
<td  style="float:right;">
	<a title="Please help us to keep this plugin free forever by donating a dollar"   class="xyz_qbr_link" style="margin-left:8px; font-size: 15px;"  target="_blank" href="http://xyzscripts.com/donate/1"><b>Donate</b></a>
</td>
<td style="float:right;">
	<a class="xyz_qbr_link" style="margin-left:8px; font-size: 15px;" target="_blank" href="http://kb.xyzscripts.com/wordpress-plugins/quick-bar/"><b>FAQ</b></a> |
</td>
<td style="float:right;">
	<a class="xyz_qbr_link" style="margin-left:8px; font-size: 15px;" target="_blank" href="http://docs.xyzscripts.com/wordpress-plugins/quick-bar-plugin/"><b>Readme</b></a> |
</td>
<td style="float:right;">
	<a class="xyz_qbr_link" style="margin-left:8px; font-size: 15px;" target="_blank" href="http://xyzscripts.com/wordpress-plugins/quick-bar/details"><b>About</b></a> |
</td>
<td style="float:right;">
	<a class="xyz_qbr_link"  style="font-size:15px;" target="_blank" href="http://xyzscripts.com"><b>XYZScripts</b></a> |
</td>

</tr>
</table>
</div>

</div>

<div style="clear: both"></div>
