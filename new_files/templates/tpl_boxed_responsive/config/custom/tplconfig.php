<?php
  #######################################
  # TPLManager - Version 1.2 (by awids) #
  #######################################

  // template configuration: show boxes
  defined('TPL_BOX_CATEGORIES') or define('TPL_BOX_CATEGORIES', 'true');
  defined('TPL_BOX_MANUFACTURERS') or define('TPL_BOX_MANUFACTURERS', 'true');
  defined('TPL_BOX_LAST_VIEWED') or define('TPL_BOX_LAST_VIEWED', 'true');
  defined('TPL_BOX_SEARCH') or define('TPL_BOX_SEARCH', 'true');
  defined('TPL_BOX_CONTENT') or define('TPL_BOX_CONTENT', 'true');
  defined('TPL_BOX_INFORMATION') or define('TPL_BOX_INFORMATION', 'true');
  defined('TPL_BOX_MISCELLANEOUS') or define('TPL_BOX_MISCELLANEOUS', 'true');
  defined('TPL_BOX_LANGUAGES') or define('TPL_BOX_LANGUAGES', 'true');
  defined('TPL_BOX_INFOBOX') or define('TPL_BOX_INFOBOX', 'true');
  defined('TPL_BOX_LOGIN') or define('TPL_BOX_LOGIN', 'true');
  defined('TPL_BOX_NEWSLETTER') or define('TPL_BOX_NEWSLETTER', 'true');
  defined('TPL_BOX_TRUSTEDSHOPS') or define('TPL_BOX_TRUSTEDSHOPS', 'true');
  defined('TPL_BOX_QUICKIE') or define('TPL_BOX_QUICKIE', 'true');
  defined('TPL_BOX_SHOPPING_CART') or define('TPL_BOX_SHOPPING_CART', 'true');
  defined('TPL_BOX_WISHLIST') or define('TPL_BOX_WISHLIST', 'true');
  defined('TPL_BOX_WHATSNEW') or define('TPL_BOX_WHATSNEW', 'true');
  defined('TPL_BOX_ADMIN') or define('TPL_BOX_ADMIN', 'true');
  defined('TPL_BOX_MANUFACTURERS_INFO') or define('TPL_BOX_MANUFACTURERS_INFO', 'true');
  defined('TPL_BOX_BESTSELLERS') or define('TPL_BOX_BESTSELLERS', 'true');
  defined('TPL_BOX_ORDER_HISTORY') or define('TPL_BOX_ORDER_HISTORY', 'true');
  defined('TPL_BOX_REVIEWS') or define('TPL_BOX_REVIEWS', 'true');
  defined('TPL_BOX_CURRENCIES') or define('TPL_BOX_CURRENCIES', 'true');

  // template configuration: define full content sites
  defined('TPL_FC_CHECKOUT_SHIPPING') or define('TPL_FC_CHECKOUT_SHIPPING', 'true'); 
  defined('TPL_FC_CHECKOUT_SHIPPING_ADDRESS') or define('TPL_FC_CHECKOUT_SHIPPING_ADDRESS', 'true');
  defined('TPL_FC_CHECKOUT_PAYMENT') or define('TPL_FC_CHECKOUT_PAYMENT', 'true');
  defined('TPL_FC_CHECKOUT_PAYMENT_ADDRESS') or define('TPL_FC_CHECKOUT_PAYMENT_ADDRESS', 'true');
  defined('TPL_FC_CHECKOUT_CONFIRMATION') or define('TPL_FC_CHECKOUT_CONFIRMATION', 'true');
  defined('TPL_FC_CHECKOUT_SUCCESS') or define('TPL_FC_CHECKOUT_SUCCESS', 'true');
  defined('TPL_FC_CHECKOUT_PAYMENT_IFRAME') or define('TPL_FC_CHECKOUT_PAYMENT_IFRAME', 'true');
  defined('TPL_FC_COOKIE_USAGE') or define('TPL_FC_COOKIE_USAGE', 'true');
  defined('TPL_FC_ACCOUNT') or define('TPL_FC_ACCOUNT', 'true');
  defined('TPL_FC_ACCOUNT_EDIT') or define('TPL_FC_ACCOUNT_EDIT', 'true');
  defined('TPL_FC_ACCOUNT_HISTORY') or define('TPL_FC_ACCOUNT_HISTORY', 'true');
  defined('TPL_FC_ACCOUNT_HISTORY_INFO') or define('TPL_FC_ACCOUNT_HISTORY_INFO', 'true');
  defined('TPL_FC_ACCOUNT_PASSWORD') or define('TPL_FC_ACCOUNT_PASSWORD', 'true');
  defined('TPL_FC_ACCOUNT_DELETE') or define('TPL_FC_ACCOUNT_DELETE', 'true');
  defined('TPL_FC_ACCOUNT_CHECKOUT_EXPRESS') or define('TPL_FC_ACCOUNT_CHECKOUT_EXPRESS', 'true');
  defined('TPL_FC_CREATE_ACCOUNT') or define('TPL_FC_CREATE_ACCOUNT', 'true');
  defined('TPL_FC_CREATE_GUEST_ACCOUNT') or define('TPL_FC_CREATE_GUEST_ACCOUNT', 'true');
  defined('TPL_FC_ADDRESS_BOOK') or define('TPL_FC_ADDRESS_BOOK', 'true');
  defined('TPL_FC_ADDRESS_BOOK_PROCESS') or define('TPL_FC_ADDRESS_BOOK_PROCESS', 'true');
  defined('TPL_FC_PASSWORD_DOUBLE_OPT') or define('TPL_FC_DOUBLE_OPT', 'true');
  defined('TPL_FC_ADVANCED_SEARCH_RESULT') or define('TPL_FC_ADVANCED_SEARCH_RESULT', 'false');
  defined('TPL_FC_ADVANCED_SEARCH') or define('TPL_FC_ADVANCED_SEARCH', 'true');
  defined('TPL_FC_SHOPPING_CART') or define('TPL_FC_SHOPPING_CART', 'true');
  defined('TPL_FC_GV_SEND') or define('TPL_FC_GV_SEND', 'true');
  defined('TPL_FC_NEWSLETTER') or define('TPL_FC_NEWSLETTER', 'true');
  defined('TPL_FC_LOGIN') or define('TPL_FC_LOGIN', 'true');
  defined('TPL_FC_CONTENT') or define('TPL_FC_CONTENT', 'true');
  defined('TPL_FC_REVIEWS') or define('TPL_FC_REVIEWS', 'true');
  defined('TPL_FC_WISHLIST') or define('TPL_FC_WISHLIST', 'true');

  // template configuration: define bestseller sites
  defined('TPL_BESTSELLERS_HOME') or define('TPL_BESTSELLERS_HOME', 'true');
  defined('TPL_BESTSELLERS_CATEGORIES') or define('TPL_BESTSELLERS_CATEGORIES', 'true');
  defined('TPL_BESTSELLERS_MANUFACTURERS') or define('TPL_BESTSELLERS_MANUFACTURERS', 'true');
  defined('TPL_BESTSELLERS_LOGOUT') or define('TPL_BESTSELLERS_LOGOUT', 'true');
  defined('TPL_BESTSELLERS_CHECKOUT_SUCCESS') or define('TPL_BESTSELLERS_CHECKOUT_SUCCESS', 'true');
  defined('TPL_BESTSELLERS_SHOPPINGCART') or define('TPL_BESTSELLERS_SHOPPINGCART', 'true');
  defined('TPL_BESTSELLERS_LOGOUT') or define('TPL_BESTSELLERS_LOGOUT', 'true');
  
  // template configuration: text
  defined('TPL_NAV_TEXT1') or define('TPL_NAV_TEXT1', 'DE::Startseite||EN::Main page');
  defined('TPL_NAV_TEXT2') or define('TPL_NAV_TEXT2', 'DE::Katalog||EN::Catalogue');
  defined('TPL_COPYRIGHT_TEXT') or define('TPL_COPYRIGHT_TEXT', 'DE::'.STORE_NAME.' - Alle Rechte vorbehalten!||EN::'.STORE_NAME.' - All rights reserved!');
  defined('TPL_PAYMENT_INFO') or define('TPL_PAYMENT_INFO', ''); // set content ID (coID) for payment information
  defined('TPL_FRONTINFO_TEXT') or define('TPL_FRONTINFO_TEXT', 'false'); // 'true', 'false'
  defined('TPL_FRONTINFO_CLASS') or define('TPL_FRONTINFO_CLASS', 'infomessage'); // 'infomessage', 'errormessage'
  defined('TPL_FRONTINFO_CONTENT') or define('TPL_FRONTINFO_CONTENT', ''); // set content ID (coID) for front info text
  defined('TPL_FRONTINFO_POS') or define('TPL_FRONTINFO_POS', 'all'); // 'all', 'startpage', 'only_on_checkout', 'not_on_checkout'
  
  // template configuration: additional settings
  defined('THEME_COLOR') or define('THEME_COLOR', 'green'); // possible: green, blue, magenta - you have to clear the template cache after changing
  defined('TPL_BUTTON_TYPE') or define('TPL_BUTTON_TYPE', 'css'); // 'css' or 'image'
  defined('SPECIALS_CATEGORIES') or define('SPECIALS_CATEGORIES', 'true'); // 'true' zeigt den Link "Angebote" im Kategoriebaum / 'false' zeigt die "Angebote" als separate Box
  defined('WHATSNEW_CATEGORIES') or define('WHATSNEW_CATEGORIES', 'true'); // 'true' zeigt den Link "Neue Artikel" im Kategoriebaum / 'false' zeigt die "Neue Artikel" als separate Box
  defined('PRODUCT_LIST_BOX_CUSTOM') or define('PRODUCT_LIST_BOX_CUSTOM', 'true'); // 'true' zeigt Artikel in Kategorie-Navigation (product_listing) als Box-Ansicht / 'false' zeigt Listen-Ansicht
  defined('PRODUCT_LIST_BOX_STARTPAGE') or define('PRODUCT_LIST_BOX_STARTPAGE', 'true'); // 'true' zeigt "Unsere TOP-Artikel" als Box-Ansicht / 'false' zeigt als Listen-Ansicht
  defined('PRODUCT_INFO_BOX') or define('PRODUCT_INFO_BOX', 'false'); // 'true' zeigt Cross-Selling-, Reverse-Cross-Selling- & Also-Purchased-Artikel auf Artikel-Detailseite als Box-Ansicht / 'false' zeigt als Listen-Ansicht
  defined('TEMPLATE_ENGINE') or define('TEMPLATE_ENGINE', 'smarty_3'); // 'smarty_3' oder 'smarty_2' -> Nicht ändern! (Nur "smarty_3" unterstützt die custom Sprachdateien (lang_english.custom & lang_german.custom) aus dem Ordner "../lang/" des Templates!)
  defined('TEMPLATE_HTML_ENGINE') or define('TEMPLATE_HTML_ENGINE', 'html5'); // 'html5' oder 'xhtml' -> Nicht ändern!
  
  // popup
  defined('TPL_POPUP_SHIPPING_LINK_PARAMETERS') or define('TPL_POPUP_SHIPPING_LINK_PARAMETERS', '');
  defined('TPL_POPUP_SHIPPING_LINK_CLASS') or define('TPL_POPUP_SHIPPING_LINK_CLASS', 'iframe');
  defined('TPL_POPUP_CONTENT_LINK_PARAMETERS') or define('TPL_POPUP_CONTENT_LINK_PARAMETERS', '');
  defined('TPL_POPUP_CONTENT_LINK_CLASS') or define('TPL_POPUP_CONTENT_LINK_CLASS', 'iframe');
  defined('TPL_POPUP_PRODUCT_LINK_PARAMETERS') or define('TPL_POPUP_PRODUCT_LINK_PARAMETERS', '');
  defined('TPL_POPUP_PRODUCT_LINK_CLASS') or define('TPL_POPUP_PRODUCT_LINK_CLASS', 'iframe');
  defined('TPL_POPUP_COUPON_HELP_LINK_PARAMETERS') or define('TPL_POPUP_COUPON_HELP_LINK_PARAMETERS', '');
  defined('TPL_POPUP_COUPON_HELP_LINK_CLASS') or define('TPL_POPUP_COUPON_HELP_LINK_CLASS', 'iframe');
  defined('TPL_POPUP_PRODUCT_PRINT_SIZE') or define('TPL_POPUP_PRODUCT_PRINT_SIZE', '');
  defined('TPL_POPUP_PRINT_ORDER_SIZE') or define('TPL_POPUP_PRINT_ORDER_SIZE', '');
  
  // additional configuration
  define('PRODUCT_LIST_BOX', ((isset($_SESSION['listbox'])) ? $_SESSION['listbox'] : PRODUCT_LIST_BOX_CUSTOM)); // 'true' zeigt Artikel in Kategorie-Navigation (product_listing) als Box-Ansicht / 'false' zeigt Listen-Ansicht
  define('TEMPLATE_RESPONSIVE', 'true'); // 'true' oder 'false' -> Nicht ändern!
  defined('COMPRESS_JAVASCRIPT') or define('COMPRESS_JAVASCRIPT', true); // 'true' kombiniert & komprimiert die zusätzliche JS-Dateien / 'false' bindet alle JS-Dateien einzeln ein
  
  // new special categories definition
  if (SPECIALS_CATEGORIES == 'true') {
    require_once (DIR_FS_INC.'check_specials.inc.php');
    define('SPECIALS_EXISTS', check_specials());
  }  
?>