<?php
#######################################
# TPLManager - Version 1.2 (by awids) #
#######################################

	// language definitions

	switch ($_SESSION['language_code']) {
	  case 'de':
		define('TABLE_HEADING_FLAGS','Kategorie-Flagge');
		define('TXT_FLAGS_DESC','Setzt bei Auswahl eine kleine Flagge/Markierung hinter den Kategorienamen, um ihn f&uuml;r Kunden interessanter zu machen.');
		define('TXT_FLAGS_NONE','-- Bitte w&auml;hlen Sie --');
		define('TXT_FLAGS_NEW','Neu (NEU)');
		define('TXT_FLAGS_BESTSELLERS','TOP-Kategorie (TOP)');
		define('TXT_FLAGS_SPECIALS','Angebote (%)');
	    break;
	  case 'en':
		define('TABLE_HEADING_FLAGS','Categories-Flag');
		define('TXT_FLAGS_DESC','If select, you set a small flag / mark behind the category name to make it more interesting for customers.');
		define('TXT_FLAGS_NONE','-- Please select --');
		define('TXT_FLAGS_NEW','New (NEW)');
		define('TXT_FLAGS_BESTSELLERS','Bestsellers (TOP)');
		define('TXT_FLAGS_SPECIALS','Specials (%)');
	    break;
	  default:
		define('TABLE_HEADING_FLAGS','Categories-Flag');
		define('TXT_FLAGS_DESC','If select, you set a small flag / mark behind the category name to make it more interesting for customers.');
		define('TXT_FLAGS_NONE','-- Please select --');
		define('TXT_FLAGS_NEW','New (NEW)');
		define('TXT_FLAGS_BESTSELLERS','Bestsellers (TOP)');
		define('TXT_FLAGS_SPECIALS','Specials (%)');
	    break;
	}

	// flags array
	$flags_array = array();
	$flags_array = array(
		array('id' => 0,'text' => TXT_FLAGS_NONE),
	    array('id' => 1,'text' => TXT_FLAGS_NEW),
	    array('id' => 2,'text' => TXT_FLAGS_BESTSELLERS),
	    array('id' => 3,'text' => TXT_FLAGS_SPECIALS)
	  );

	if (defined('MODULE_CATEGORIES_FLAG_STATUS') && MODULE_CATEGORIES_FLAG_STATUS == 'true') {
?>		  

	<!-- html_output start -->
	<table class="tableInput border0">
		<tbody>
			<tr>
				<td class="main" style="width:260px">&nbsp;</td>
				<td class="main"></td>
				<td class="main"></td>
			</tr>
			<tr>
	        	<td class="main" style="width:260px"><?php echo TABLE_HEADING_FLAGS; ?></td>
	            <td class="main"><?php echo xtc_draw_pull_down_menu('flags',$flags_array,$cInfo->flags, 'style="width:250px"');?></td>
	            <td class="main"><?php echo TXT_FLAGS_DESC; ?></td>
	        </tr>
	    </tbody>
	</table>
	<!-- html_output end -->

<?php
}
?>

