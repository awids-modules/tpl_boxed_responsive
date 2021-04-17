<?php
#####################################
# TPLManager - Version 1 (by awids) #
#####################################

// include smarty
include(DIR_FS_BOXES_INC . 'smarty_default.php');

// set cache id
$cache_id = md5($_SESSION['language'].$_SESSION['customers_status']['customers_status_id'].(isset($coPath) ? $coPath : TPL_PAYMENT_INFO));

if (defined('MODULE_TPLCONFIG_STATUS') && MODULE_TPLCONFIG_STATUS == 'true' && !empty(TPL_PAYMENT_INFO)) {

  $shop_content_data = $main->getContentData(TPL_PAYMENT_INFO, '', '', false);
  $box_smarty->assign('box_heading', $shop_content_data['content_heading']);
  $box_smarty->assign('box_text', $shop_content_data['content_text']);
  
}

if (!$cache) {
  $box_miscellaneous = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_miscellaneous.html');
} else {
  $box_miscellaneous = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_miscellaneous.html', $cache_id);
}

$smarty->assign('box_MISCELLANEOUS', $box_miscellaneous);
?>