<?php
#######################################
# TPLManager - Version 1.2 (by awids) #
#######################################

function smarty_modifier_parse_multi_language_value($text) {
    
    if (!function_exists('parse_multi_language_value'))	{
    	require_once (DIR_FS_INC.'parse_multi_language_value.inc.php');
    }
    
    return parse_multi_language_value($text, $_SESSION['language_code'], false);
       
}
?>