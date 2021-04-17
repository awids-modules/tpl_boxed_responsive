<?php
#######################################
# TPLManager - Version 1.2 (by awids) #
#######################################

defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );

class tplconfig {

    var $code, $title, $description, $enabled;

    function __construct() {
        $this->code = 'tplconfig';
        $this->title = constant('MODULE_TPLCONFIG_TEXT_TITLE');
        $this->description = constant('MODULE_TPLCONFIG_TEXT_DESCRIPTION');
        $this->enabled = ((defined('MODULE_TPLCONFIG_STATUS') && MODULE_TPLCONFIG_STATUS == 'true') ? true : false);
        $this->sort_order = ((defined('MODULE_TPLCONFIG_SORT_ORDER')) ? MODULE_TPLCONFIG_SORT_ORDER : '');
    }

    function process($file) {
        //do nothing
    }

    function display() {
        return array('text' => '<br>' . xtc_button(BUTTON_SAVE) . '&nbsp;' .
                               xtc_button_link(BUTTON_CANCEL, xtc_href_link(FILENAME_MODULE_EXPORT, 'set=' . $_GET['set'] . '&module='.$this->code))
                     );
    }

    function check() {
        if(!isset($this->_check)) {
          $check_query = xtc_db_query("SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'MODULE_TPLCONFIG_STATUS'");
          $this->_check = xtc_db_num_rows($check_query);
        }
        return $this->_check;
    }

    function install() {
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TPLCONFIG_STATUS', 'true',  '6', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        
        // set admin access
        xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " ADD tplconfig INTEGER(1)");
        xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET tplconfig = 1");
		
		// show boxes
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (601, 'Box-Anzeige', 'Box-Anzeige', NULL, 601);");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_CATEGORIES', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_MANUFACTURERS', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_LAST_VIEWED', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_SEARCH', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_CONTENT', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_INFORMATION', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_MISCELLANEOUS', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_LANGUAGES', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_INFOBOX', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_LOGIN', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_NEWSLETTER', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_TRUSTEDSHOPS', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_QUICKIE', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_SHOPPING_CART', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_WISHLIST', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_WHATSNEW', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_SPECIALS', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_ADMIN', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_MANUFACTURERS_INFO', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_BESTSELLERS', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_ORDER_HISTORY', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_REVIEWS', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_CURRENCIES', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		
		// define full content sites
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (602, 'Full-Content', 'Full-Content', NULL, 602);");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_ACCOUNT', 'true', '602', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_ACCOUNT_EDIT', 'true', '602', '2', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_ACCOUNT_HISTORY', 'true', '602', '3', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_ACCOUNT_HISTORY_INFO', 'true', '602', '4', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_ACCOUNT_PASSWORD', 'true', '602', '5', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_ACCOUNT_DELETE', 'true', '602', '6', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_ACCOUNT_CHECKOUT_EXPRESS', 'true', '602', '7', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_ADDRESS_BOOK', 'true', '602', '8', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_ADDRESS_BOOK_PROCESS', 'true', '602', '9', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_ADVANCED_SEARCH_RESULT', 'true', '602', '10', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_ADVANCED_SEARCH', 'true', '602', '11', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_CHECKOUT_SHIPPING', 'true', '602', '12', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_CHECKOUT_SHIPPING_ADDRESS', 'true', '602', '13', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_CHECKOUT_PAYMENT', 'true', '602', '14', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_CHECKOUT_PAYMENT_ADDRESS', 'true', '602', '15', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_CHECKOUT_CONFIRMATION', 'true', '602', '16', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_CHECKOUT_SUCCESS', 'true', '602', '17', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_CHECKOUT_PAYMENT_IFRAME', 'true', '602', '18', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_CONTENT', 'true', '602', '19', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_COOKIE_USAGE', 'true', '602', '20', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_CREATE_ACCOUNT', 'true', '602', '21', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_CREATE_GUEST_ACCOUNT', 'true', '602', '22', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_GV_SEND', 'true', '602', '23', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_LOGIN', 'true', '602', '24', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_NEWSLETTER', 'true', '602', '25', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_PASSWORD_DOUBLE_OPT', 'true', '602', '26', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_REVIEWS', 'true', '602', '27', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_SHOPPING_CART', 'true', '602', '28', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FC_WISHLIST', 'true', '602', '29', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		
		// bestseller sites
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (603, 'Bestseller-Anzeige', 'Bestseller-Anzeige', NULL, 603);");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BESTSELLERS_HOME', 'true', '603', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BESTSELLERS_CATEGORIES', 'true', '603', '2', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BESTSELLERS_MANUFACTURERS', 'true', '603', '3', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BESTSELLERS_SHOPPINGCART', 'true', '603', '4', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BESTSELLERS_CHECKOUT_SUCCESS', 'true', '603', '5', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BESTSELLERS_LOGOUT', 'true', '603', '6', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		
		// texte (e. g. Breadcrumb-Informationen, Copyright, Hinweis-Box/Abwesenheitsmeldung, Zahlungsmoeglichkeiten-Box)
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (604, 'Texte', 'Texte', NULL, 604);");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_NAV_TEXT1', 'DE::Startseite||EN::Main page', '604', '1', 'xtc_cfg_input_email_language;TPL_NAV_TEXT1', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_NAV_TEXT2', 'DE::Katalog||EN::Catalogue', '604', '2', 'xtc_cfg_input_email_language;TPL_NAV_TEXT2', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_COPYRIGHT_TEXT', 'DE::".STORE_NAME." - Alle Rechte vorbehalten!||EN::".STORE_NAME." - All rights reserved!', '604', '3', 'xtc_cfg_input_email_language;TPL_COPYRIGHT_TEXT', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_INFO', '', 604, 4, 'xtc_cfg_select_content(\'TPL_PAYMENT_INFO\',', NOW())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FRONTINFO_TEXT', 'false', '604', '5', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FRONTINFO_CLASS', 'infomessage', '604', '6', 'xtc_cfg_select_option(array(\'infomessage\', \'errormessage\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FRONTINFO_CONTENT', '', 604, 7, 'xtc_cfg_select_content(\'TPL_FRONTINFO_CONTENT\',', NOW())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FRONTINFO_POS', 'startpage', '604', '8', 'xtc_cfg_select_option(array(\'startpage\', \'only_on_checkout\', \'not_on_checkout\', \'all\'), ', now())");
		
		// Sonstiges (Buttons, Logo, etc.)
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (605, 'Sonstiges', 'Sonstige Einstellungen', NULL, 605);");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BUTTON_TYPE', 'css',  '605', '1', 'xtc_cfg_select_option(array(\'css\', \'image\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('SPECIALS_CATEGORIES', 'true',  '605', '2', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('WHATSNEW_CATEGORIES', 'true',  '605', '3', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('PRODUCT_LIST_BOX_CUSTOM', 'true',  '605', '4', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('PRODUCT_LIST_BOX_STARTPAGE', 'true',  '605', '5', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('PRODUCT_INFO_BOX', 'true',  '605', '6', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TEMPLATE_ENGINE', 'smarty_3',  '605', '7', 'xtc_cfg_select_option(array(\'smarty_2\', \'smarty_3\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TEMPLATE_HTML_ENGINE', 'html5',  '605', '8', 'xtc_cfg_select_option(array(\'html5\', \'xhtml\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('THEME_COLOR', 'blue',  '605', '9', 'xtc_cfg_select_option(array(\'green\', \'blue\', \'magenta\'), ', now())"); 
		
		// PopUp-Fenster-Optionen
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (606, 'PopUp\'s', 'PopUp\'s', NULL, 606);");
		xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) values ('TPL_POPUP_SHIPPING_LINK_PARAMETERS', '',  '606', '1', now())");
		xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) values ('TPL_POPUP_SHIPPING_LINK_CLASS', 'iframe',  '606', '2', now())");
		xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) values ('TPL_POPUP_CONTENT_LINK_PARAMETERS', '',  '606', '3', now())");
		xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) values ('TPL_POPUP_CONTENT_LINK_CLASS', 'iframe',  '606', '4', now())");
		xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) values ('TPL_POPUP_PRODUCT_LINK_PARAMETERS', '',  '606', '5', now())");
		xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) values ('TPL_POPUP_PRODUCT_LINK_CLASS', 'iframe',  '606', '6', now())");
		xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) values ('TPL_POPUP_COUPON_HELP_LINK_PARAMETERS', '',  '606', '7', now())");
		xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) values ('TPL_POPUP_COUPON_HELP_LINK_CLASS', 'iframe',  '606', '8', now())");
		xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) values ('TPL_POPUP_PRODUCT_PRINT_SIZE', '',  '606', '9', now())");
		xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) values ('TPL_POPUP_PRINT_ORDER_SIZE', '',  '606', '10', now())");
		
		// vorinstallierte Module
		// Produkt- und Attribut-Lagerampel - awids / web28 / noRiddle
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (607, 'Modules', 'Modules', NULL, 607);");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_STATUS', 'false',  '607', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_LISTING', 'true',  '607', '2', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_LISTING_LIGHT', 'light',  '607', '3', 'xtc_cfg_select_option(array(\'light\', \'text\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_INFO', 'true',  '607', '4', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_INFO_LIGHT', 'light',  '607', '5', 'xtc_cfg_select_option(array(\'light\', \'text\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_ATTRIBUTES', 'true',  '607', '6', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL', '1',  '607', '7', '', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_STOCK_GREEN', '10',  '607', '8', '', now())");
		// Attributauswahl als Pflichtfeld und vorbelegt mit "Bitte wählen" - Modulfux
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MODULFUX_ATTRIBUTES_DEFAULT_STATUS', 'false',  '607', '9', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		// categoriesFlag - awids
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_CATEGORIES_FLAG_STATUS', 'false',  '607', '10', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");  
		xtc_db_query("ALTER TABLE " . TABLE_CATEGORIES . " ADD flags INT(1) NOT NULL DEFAULT '0'");
    }

    function remove() {
        // Modul-Status
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE 'MODULE_TPLCONFIG_%'");
        
        // remove admin access entries
        xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " DROP tplconfig");
        
        // Boxen
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE 'TPL_BOX_%'");
        
        // Fullcontent
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE 'TPL_FC_%'");
        
        // Bestseller
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE 'TPL_BESTSELLERS_%'");
        
        // Texte
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'TPL_NAV_TEXT1'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'TPL_NAV_TEXT2'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'TPL_COPYRIGHT_TEXT'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'TPL_PAYMENT_INFO'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'TPL_FRONTINFO_TEXT'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'TPL_FRONTINFO_CLASS'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'TPL_FRONTINFO_POS'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'TPL_FRONTINFO_CONTENT'");
        
        // Sonstiges
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'THEME_COLOR'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'TPL_BUTTON_TYPE'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'SPECIALS_CATEGORIES'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'WHATSNEW_CATEGORIES'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'TEMPLATE_ENGINE'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'TEMPLATE_HTML_ENGINE'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'PRODUCT_LIST_BOX_CUSTOM'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'PRODUCT_LIST_BOX_STARTPAGE'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'PRODUCT_INFO_BOX'");
        
        // PopUp-Fenster-Optionen
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE 'TPL_POPUP_%'");

        // vorinstallierte Module
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE 'MODULE_TRAFFIC_LIGHTS_%'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE 'MODULE_MODULFUX_ATTRIBUTES_DEFAULT_%'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE 'MODULE_CATEGORIES_FLAG_%'");
        xtc_db_query("ALTER TABLE " . TABLE_CATEGORIES . " DROP flags");

        // Konfigurations-Gruppen 601 - 607
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = '601'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = '602'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = '603'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = '604'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = '605'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = '606'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = '607'");
    }

    function keys() {
        return array('MODULE_TPLCONFIG_STATUS');
    }    
    
}
?>