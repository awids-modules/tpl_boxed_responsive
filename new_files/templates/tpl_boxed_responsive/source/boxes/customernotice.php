<?php
#######################################
# TPLManager - Version 1.2 (by awids) #
#######################################

// include smarty
include(DIR_FS_BOXES_INC . 'smarty_default.php');

// set cache id
$cache_id = md5($_SESSION['language'].$_SESSION['customers_status']['customers_status_id'].(isset($coPath) ? $coPath : TPL_FRONTINFO_CONTENT));

$box_content = '';

if (defined('MODULE_TPLCONFIG_STATUS') && MODULE_TPLCONFIG_STATUS == 'true' && !empty(TPL_FRONTINFO_CONTENT)) {
  
	$shop_content_data = $main->getContentData(TPL_FRONTINFO_CONTENT, '', '', false);
	$heading = $shop_content_data['content_heading'];
	$text = $shop_content_data['content_text'];
	$style = ((TPL_FRONTINFO_CLASS == 'infomessage') ? 'color: #155724;' : 'color: #e74c3c;');
	
	switch (TPL_FRONTINFO_POS) {
		case 'startpage':        
		  $display = ((basename($PHP_SELF) == FILENAME_DEFAULT && !isset($_GET['cPath']) && !isset($_GET['manufacturers_id'])) ? true : false);
		  break;
		case 'only_on_checkout':        
		  $display = ((strstr($PHP_SELF, 'checkout')) ? true : false);
		  break;
		case 'not_on_checkout':        
		  $display = ((!strstr($PHP_SELF, 'checkout')) ? true : false);
		  break;
		case 'all':        
		  $display = true;
		  break;
		default:        
		  $display = false;
	}
	
	if ($display == true) {
	  $box_content = '<div class="'.TPL_FRONTINFO_CLASS.' less_margin-top10 cf">
	  					<div class="box_header" style="'.$style.'">'.$heading.'</div>
	  					'.$text.'
	  				  </div>';
	}
	
}

$box_smarty->assign('BOX_CONTENT', $box_content);	

if (!$cache) {
  $box_customernotice= $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_customernotice.html');
} else {
  $box_customernotice= $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_customernotice.html', $cache_id);
}

$smarty->assign('CUSTOMERNOTICE', $box_customernotice);
?>