<?php
#######################################
# TPLManager - Version 1.2 (by awids) #
#######################################

// css buttons
if (file_exists(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/inc/css_button.inc.php')) {
  if (TPL_BUTTON_TYPE == 'css') require_once ('templates/'.CURRENT_TEMPLATE.'/source/inc/css_button.inc.php');
}

// define full content sites
$fullcontent = array();
if (TPL_FC_CHECKOUT_SHIPPING == 'true') $fullcontent[] = FILENAME_CHECKOUT_SHIPPING;
if (TPL_FC_CHECKOUT_SHIPPING_ADDRESS == 'true') $fullcontent[] = FILENAME_CHECKOUT_SHIPPING_ADDRESS;
if (TPL_FC_CHECKOUT_PAYMENT == 'true') $fullcontent[] = FILENAME_CHECKOUT_PAYMENT;
if (TPL_FC_CHECKOUT_PAYMENT_ADDRESS == 'true') $fullcontent[] = FILENAME_CHECKOUT_PAYMENT_ADDRESS;
if (TPL_FC_CHECKOUT_CONFIRMATION == 'true') $fullcontent[] = FILENAME_CHECKOUT_CONFIRMATION;
if (TPL_FC_CHECKOUT_SUCCESS == 'true') $fullcontent[] = FILENAME_CHECKOUT_SUCCESS;
if (TPL_FC_CHECKOUT_PAYMENT_IFRAME == 'true') $fullcontent[] = FILENAME_CHECKOUT_PAYMENT_IFRAME;
if (TPL_FC_COOKIE_USAGE == 'true') $fullcontent[] = FILENAME_COOKIE_USAGE;
if (TPL_FC_ACCOUNT == 'true') $fullcontent[] = FILENAME_ACCOUNT;
if (TPL_FC_ACCOUNT_EDIT == 'true') $fullcontent[] = FILENAME_ACCOUNT_EDIT;
if (TPL_FC_ACCOUNT_HISTORY == 'true') $fullcontent[] = FILENAME_ACCOUNT_HISTORY;
if (TPL_FC_ACCOUNT_HISTORY_INFO == 'true') $fullcontent[] = FILENAME_ACCOUNT_HISTORY_INFO;
if (TPL_FC_ACCOUNT_PASSWORD == 'true') $fullcontent[] = FILENAME_ACCOUNT_PASSWORD;
if (TPL_FC_ACCOUNT_DELETE == 'true') $fullcontent[] = FILENAME_ACCOUNT_DELETE;
if (TPL_FC_ACCOUNT_CHECKOUT_EXPRESS == 'true') $fullcontent[] = FILENAME_ACCOUNT_CHECKOUT_EXPRESS;
if (TPL_FC_CREATE_ACCOUNT == 'true') $fullcontent[] = FILENAME_CREATE_ACCOUNT;
if (TPL_FC_CREATE_GUEST_ACCOUNT == 'true') $fullcontent[] = FILENAME_CREATE_GUEST_ACCOUNT;
if (TPL_FC_ADDRESS_BOOK == 'true') $fullcontent[] = FILENAME_ADDRESS_BOOK;
if (TPL_FC_ADDRESS_BOOK_PROCESS == 'true') $fullcontent[] = FILENAME_ADDRESS_BOOK_PROCESS;
if (TPL_FC_PASSWORD_DOUBLE_OPT == 'true') $fullcontent[] = FILENAME_PASSWORD_DOUBLE_OPT;
if (TPL_FC_ADVANCED_SEARCH_RESULT == 'true') $fullcontent[] = FILENAME_ADVANCED_SEARCH_RESULT;
if (TPL_FC_ADVANCED_SEARCH == 'true') $fullcontent[] = FILENAME_ADVANCED_SEARCH;
if (TPL_FC_SHOPPING_CART == 'true') $fullcontent[] = FILENAME_SHOPPING_CART;
if (TPL_FC_GV_SEND == 'true') $fullcontent[] = FILENAME_GV_SEND;
if (TPL_FC_NEWSLETTER == 'true') $fullcontent[] = FILENAME_NEWSLETTER;
if (TPL_FC_LOGIN == 'true') $fullcontent[] = FILENAME_LOGIN;
if (TPL_FC_CONTENT == 'true') $fullcontent[] = FILENAME_CONTENT;
if (TPL_FC_REVIEWS == 'true') $fullcontent[] = FILENAME_REVIEWS;
if (TPL_FC_WISHLIST == 'true') $fullcontent[] = FILENAME_WISHLIST;

// new entries with "$fullcontent[] = FILENAME_EXAMPLE;"
foreach(auto_include(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/custom/full_content_sites/','php') as $file) require ($file);

// -----------------------------------------------------------------------------------------
//	full content
// -----------------------------------------------------------------------------------------
  if (!in_array(basename($PHP_SELF), $fullcontent)) {
    if (TPL_BOX_CATEGORIES == 'true') require_once(DIR_FS_BOXES . 'categories.php');
    if (TPL_BOX_MANUFACTURERS == 'true') require_once(DIR_FS_BOXES . 'manufacturers.php');
    if (TPL_BOX_LAST_VIEWED == 'true') require_once(DIR_FS_BOXES . 'last_viewed.php');
    foreach(auto_include(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/custom/full_content_false/','php') as $file) require ($file);
  } else {
    // smarty full content
    $smarty->assign('fullcontent', true);  
  }

// -----------------------------------------------------------------------------------------
//	always visible
// -----------------------------------------------------------------------------------------
  if (TPL_BOX_SEARCH == 'true') require_once(DIR_FS_BOXES . 'search.php');
  if (TPL_BOX_CONTENT == 'true') require_once(DIR_FS_BOXES . 'content.php');
  if (TPL_BOX_INFORMATION == 'true') require_once(DIR_FS_BOXES . 'information.php');
  if (TPL_BOX_MISCELLANEOUS == 'true') require_once(DIR_FS_BOXES . 'miscellaneous.php');
  if (TPL_BOX_LANGUAGES == 'true') require_once(DIR_FS_BOXES . 'languages.php'); 
  if (TPL_BOX_INFOBOX == 'true') require_once(DIR_FS_BOXES . 'infobox.php');
  if (TPL_BOX_LOGIN == 'true') require_once(DIR_FS_BOXES . 'loginbox.php');
  if (!defined('MODULE_NEWSLETTER_STATUS') || MODULE_NEWSLETTER_STATUS == 'true') {
    if (TPL_BOX_NEWSLETTER == 'true') require_once(DIR_FS_BOXES . 'newsletter.php');
  }
  if (defined('MODULE_TS_TRUSTEDSHOPS_ID') 
      && (MODULE_TS_WIDGET == '1'
          || (MODULE_TS_REVIEW_STICKER != '' && MODULE_TS_REVIEW_STICKER_STATUS == '1'))
      ) 
  {
    if (TPL_BOX_TRUSTEDSHOPS == 'true') require_once(DIR_FS_BOXES . 'trustedshops.php');
  }
  if (TPL_FRONTINFO_TEXT == 'true') require_once(DIR_FS_BOXES . 'customernotice.php');
  
  foreach(auto_include(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/custom/always_visible/','php') as $file) require ($file);
  
// -----------------------------------------------------------------------------------------
//	only if show price
// -----------------------------------------------------------------------------------------
  if ($_SESSION['customers_status']['customers_status_show_price'] == '1') {
    if (TPL_BOX_QUICKIE == 'true') require_once(DIR_FS_BOXES . 'add_a_quickie.php');
    if (TPL_BOX_SHOPPING_CART == 'true') require_once(DIR_FS_BOXES . 'shopping_cart.php');
    if (defined('MODULE_WISHLIST_SYSTEM_STATUS') && MODULE_WISHLIST_SYSTEM_STATUS == 'true') {
      if (TPL_BOX_WISHLIST == 'true') require_once(DIR_FS_BOXES . 'wishlist.php');
    }
    foreach(auto_include(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/custom/only_if_show_price/','php') as $file) require ($file);
  }
  
// -----------------------------------------------------------------------------------------
//	hide in search
// -----------------------------------------------------------------------------------------
  if (substr(basename($PHP_SELF), 0,8) != 'advanced' && WHATSNEW_CATEGORIES == 'false') {
    if (TPL_BOX_WHATSNEW == 'true') require_once(DIR_FS_BOXES . 'whats_new.php'); 
    foreach(auto_include(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/custom/hide_in_search/','php') as $file) require ($file);
  }
  
// -----------------------------------------------------------------------------------------
//	admins only
// -----------------------------------------------------------------------------------------
  if ($_SESSION['customers_status']['customers_status'] == '0') {
    if (TPL_BOX_ADMIN == 'true') require_once(DIR_FS_BOXES . 'admin.php');
    $smarty->assign('is_admin', true);
    foreach(auto_include(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/custom/admins_only/','php') as $file) require ($file);
  }
  
// -----------------------------------------------------------------------------------------
//	product details
// -----------------------------------------------------------------------------------------
  if ($product->isProduct() === true) {
    if (TPL_BOX_MANUFACTURERS_INFO == 'true') require_once(DIR_FS_BOXES . 'manufacturer_info.php');
    foreach(auto_include(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/custom/product_details/','php') as $file) require ($file);
  } else {
    if (TPL_BOX_BESTSELLERS == 'true') require_once(DIR_FS_BOXES . 'best_sellers.php');
    if ($_SESSION['customers_status']['customers_status_specials'] == '1' && SPECIALS_CATEGORIES == 'false') {
      if (TPL_BOX_SPECIALS == 'true') require_once(DIR_FS_BOXES . 'specials.php');
    }
  }
  
// -----------------------------------------------------------------------------------------
//	only logged id users
// -----------------------------------------------------------------------------------------
  if (isset($_SESSION['customer_id'])) {
    if (TPL_BOX_ORDER_HISTORY == 'true') require_once(DIR_FS_BOXES . 'order_history.php');
    foreach(auto_include(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/custom/only_logged_id_users/','php') as $file) require ($file);
  }
  
// -----------------------------------------------------------------------------------------
//	only if reviews allowed
// -----------------------------------------------------------------------------------------
  if ($_SESSION['customers_status']['customers_status_read_reviews'] == '1') {
    if (TPL_BOX_REVIEWS == 'true') require_once(DIR_FS_BOXES . 'reviews.php');
    foreach(auto_include(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/custom/only_if_reviews_allowed/','php') as $file) require ($file);
  }

  
// -----------------------------------------------------------------------------------------
//	hide during checkout
// -----------------------------------------------------------------------------------------
  if (substr(basename($PHP_SELF), 0, 8) != 'checkout') {
    if (TPL_BOX_CURRENCIES == 'true') require_once(DIR_FS_BOXES . 'currencies.php');
  }

// -----------------------------------------------------------------------------------------
// Smarty home
// -----------------------------------------------------------------------------------------
$smarty->assign('home', ((basename($PHP_SELF) == FILENAME_DEFAULT && !isset($_GET['cPath']) && !isset($_GET['manufacturers_id'])) ? 1 : 0));

// -----------------------------------------------------------------------------------------
// Smarty bestseller
// -----------------------------------------------------------------------------------------
$bestseller_array = array();
if (TPL_BESTSELLERS_HOME == 'true' && strpos($PHP_SELF, FILENAME_DEFAULT) && !isset($_GET['cPath']) && !isset($_GET['manufacturers_id'])) $bestseller_array[] = FILENAME_DEFAULT;
if (TPL_BESTSELLERS_CATEGORIES == 'true' && strpos($PHP_SELF, FILENAME_DEFAULT) && isset($_GET['cPath']) && !isset($_GET['manufacturers_id'])) $bestseller_array[] = FILENAME_DEFAULT;
if (TPL_BESTSELLERS_MANUFACTURERS == 'true' && strpos($PHP_SELF, FILENAME_DEFAULT) && !isset($_GET['cPath']) && isset($_GET['manufacturers_id'])) $bestseller_array[] = FILENAME_DEFAULT;
if (TPL_BESTSELLERS_LOGOUT == 'true') $bestseller_array[] = FILENAME_LOGOFF;
if (TPL_BESTSELLERS_CHECKOUT_SUCCESS == 'true') $bestseller_array[] = FILENAME_CHECKOUT_SUCCESS;
if (TPL_BESTSELLERS_SHOPPINGCART == 'true') $bestseller_array[] = FILENAME_SHOPPING_CART;

// new entries with "$bestseller_array[] = FILENAME_EXAMPLE;"
foreach(auto_include(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/custom/bestseller_sites/','php') as $file) require ($file);

$smarty->assign('bestseller', in_array(basename($PHP_SELF), $bestseller_array));

?>