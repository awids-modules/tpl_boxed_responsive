<?php
#######################################
# TPLManager - Version 1.2 (by awids) #
#######################################

defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );

if (defined('MODULE_TPLCONFIG_STATUS') && MODULE_TPLCONFIG_STATUS == 'true') {

	if (!function_exists('addTPLManagerMenue')) {
	  function addTPLManagerMenue() {
	   
	    global $admin_access;
	   
	    echo '<script>'.PHP_EOL;
	    echo '  $(function () {'.PHP_EOL;
	    echo '    $( "#treemenu1" ).append( $( "#tplmanager-main-menu" ).show() );'.PHP_EOL;
	    echo '  });'.PHP_EOL;
	    echo '</script>'.PHP_EOL;    
	
	    echo implode('<li id="tplmanager-main-menu" style="display: none;">', explode('<li>', mainMenue(BOX_TPLMANAGER_600), 2));
	   
		if (($_SESSION['customers_status']['customers_status_id'] == '0') && ($admin_access['tplconfig'] == '1')) echo '<li><a class="menuBoxContentLink" id="BOX_TPLMANAGER_601" href="' . xtc_href_link(FILENAME_TPLCONFIG, 'gID=601', 'NONSSL') . '" class="menuBoxContentLink">-' . BOX_TPLMANAGER_601 . '</a></li>';
		if (($_SESSION['customers_status']['customers_status_id'] == '0') && ($admin_access['tplconfig'] == '1')) echo '<li><a class="menuBoxContentLink" id="BOX_TPLMANAGER_602" href="' . xtc_href_link(FILENAME_TPLCONFIG, 'gID=602', 'NONSSL') . '" class="menuBoxContentLink">-' . BOX_TPLMANAGER_602 . '</a></li>';
		if (($_SESSION['customers_status']['customers_status_id'] == '0') && ($admin_access['tplconfig'] == '1')) echo '<li><a class="menuBoxContentLink" id="BOX_TPLMANAGER_603" href="' . xtc_href_link(FILENAME_TPLCONFIG, 'gID=603', 'NONSSL') . '" class="menuBoxContentLink">-' . BOX_TPLMANAGER_603 . '</a></li>';
		if (($_SESSION['customers_status']['customers_status_id'] == '0') && ($admin_access['tplconfig'] == '1')) echo '<li><a class="menuBoxContentLink" id="BOX_TPLMANAGER_604" href="' . xtc_href_link(FILENAME_TPLCONFIG, 'gID=604', 'NONSSL') . '" class="menuBoxContentLink">-' . BOX_TPLMANAGER_604 . '</a></li>';
		if (($_SESSION['customers_status']['customers_status_id'] == '0') && ($admin_access['tplconfig'] == '1')) echo '<li><a class="menuBoxContentLink" id="BOX_TPLMANAGER_605" href="' . xtc_href_link(FILENAME_TPLCONFIG, 'gID=605', 'NONSSL') . '" class="menuBoxContentLink">-' . BOX_TPLMANAGER_605 . '</a></li>';
		if (($_SESSION['customers_status']['customers_status_id'] == '0') && ($admin_access['tplconfig'] == '1')) echo '<li><a class="menuBoxContentLink" id="BOX_TPLMANAGER_607" href="' . xtc_href_link(FILENAME_TPLCONFIG, 'gID=607', 'NONSSL') . '" class="menuBoxContentLink">-' . BOX_TPLMANAGER_607 . '</a></li>';
		if (($_SESSION['customers_status']['customers_status_id'] == '0') && ($admin_access['tplconfig'] == '1')) echo '<li><a class="menuBoxContentLink" id="BOX_TPLMANAGER_606" href="' . xtc_href_link(FILENAME_TPLCONFIG, 'gID=606', 'NONSSL') . '" class="menuBoxContentLink">-' . BOX_TPLMANAGER_606 . '</a></li>';
	
	    echo endMenue(BOX_TPLMANAGER_600);
	  }
	 
	  addTPLManagerMenue();      
	}
	
}