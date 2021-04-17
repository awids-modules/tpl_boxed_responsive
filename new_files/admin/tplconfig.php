<?php
#######################################
# TPLManager - Version 1.2 (by awids) #
#######################################

  require('includes/application_top.php');

  defined('FILENAME_TPLCONFIG') or define('FILENAME_TPLCONFIG', 'tplconfig.php');

  //include special language file
  if (isset($_GET['gID']) && is_file(DIR_FS_LANGUAGES . $_SESSION['language'] . '/admin/tplconfig_'.(int)$_GET['gID'].'.php')) {
    include(DIR_FS_LANGUAGES . $_SESSION['language'] . '/admin/tplconfig_'.(int)$_GET['gID'].'.php');
  }
  //set value_limits
  $value_limits = array(); 
  if (file_exists(DIR_WS_INCLUDES.'configuration_limits.php')) {
    include(DIR_WS_INCLUDES.'configuration_limits.php');
  }

  $action = (isset($_GET['action']) ? $_GET['action'] : '');

  if (xtc_not_null($action)) {
    switch ($action) {
      case 'save':
        if (isset($_POST) && count($_POST) > 0) {
          $configuration_query = xtc_db_query("select configuration_key,configuration_id, configuration_value, use_function,set_function from " . TABLE_CONFIGURATION . " where configuration_group_id = '" . (int)$_GET['gID'] . "' order by sort_order");
          while ($configuration = xtc_db_fetch_array($configuration_query)) {
            $configuration['configuration_value'] = stripslashes($configuration['configuration_value']);
            if (is_array($_POST[$configuration['configuration_key']])) {
              if (gettype(array_shift(array_keys($_POST[$configuration['configuration_key']]))) == 'string') {
                $config_value = array();
                foreach ($_POST[$configuration['configuration_key']] as $key => $value) {
                  if (xtc_not_null($value)) {
                    $config_value[] =  $key . '::' . $value;
                  }
                }
                $_POST[$configuration['configuration_key']] = implode('||', $config_value);
              } else {
                $_POST[$configuration['configuration_key']] = implode(',', $_POST[$configuration['configuration_key']]);
              }
            }
            if ($_POST[$configuration['configuration_key']] != $configuration['configuration_value']) {
              if (isset($value_limits[$configuration['configuration_key']]['min']) && preg_match ("/^([0-9\.]+)$/", $_POST[$configuration['configuration_key']]) &&  (int)$_POST[$configuration['configuration_key']] < $value_limits[$configuration['configuration_key']]['min']) {
                $configuration_key_title = constant(strtoupper($configuration['configuration_key'].'_TITLE'));
                $messageStack->add_session(sprintf(CONFIG_MIN_VALUE_WARNING,$configuration_key_title,$_POST[$configuration['configuration_key']],$value_limits[$configuration['configuration_key']]['min'] ), 'warning');
                $_POST[$configuration['configuration_key']] = (int)$configuration['configuration_value'];
              }
              if (isset($value_limits[$configuration['configuration_key']]['max']) && preg_match ("/^([0-9\.]+)$/", $_POST[$configuration['configuration_key']]) &&  (int)$_POST[$configuration['configuration_key']] > $value_limits[$configuration['configuration_key']]['max']) {
                $configuration_key_title = constant(strtoupper($configuration['configuration_key'].'_TITLE'));
                $messageStack->add_session(sprintf(CONFIG_MAX_VALUE_WARNING,$configuration_key_title,$_POST[$configuration['configuration_key']],$value_limits[$configuration['configuration_key']]['max'] ), 'warning');
                $_POST[$configuration['configuration_key']] = (int)$configuration['configuration_value'];
              }
              if (!preg_match ("/^([0-9\.]+)$/", $_POST[$configuration['configuration_key']]) && (isset($value_limits[$configuration['configuration_key']]['min']) || isset($value_limits[$configuration['configuration_key']]['max']))) {
                $_POST[$configuration['configuration_key']] = (int)$configuration['configuration_value'];
                $configuration_key_title = constant(strtoupper($configuration['configuration_key'].'_TITLE'));
                $messageStack->add_session(sprintf(CONFIG_INT_VALUE_ERROR,$configuration_key_title,$_POST[$configuration['configuration_key']],''), 'error');
              }
              xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value='" . xtc_db_input($_POST[$configuration['configuration_key']]) . "', last_modified = NOW() where configuration_key='" . $configuration['configuration_key'] . "'");
              if ($configuration['configuration_key'] == 'CURRENT_TEMPLATE') {
                $template_dir = DIR_FS_CATALOG.'templates/';
                if (file_exists($template_dir.$_POST[$configuration['configuration_key']].'/source/tmpl_config_install.php')) {
                  include($template_dir.$_POST[$configuration['configuration_key']].'/source/tmpl_config_install.php');
                }
                if (file_exists($template_dir.$configuration['configuration_value'].'/source/tmpl_config_uninstall.php')) {
                  include($template_dir.$configuration['configuration_value'].'/source/tmpl_config_uninstall.php');
                }
              }
            }
          }
        }
        xtc_redirect(xtc_href_link(FILENAME_TPLCONFIG, 'gID=' . (int)$_GET['gID']));
        break;
    }
  }

  $cfg_group_query = xtc_db_query("SELECT configuration_group_title, configuration_group_id FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = '" . (int)$_GET['gID'] . "'");
  $cfg_group = xtc_db_fetch_array($cfg_group_query);
  
  require (DIR_WS_INCLUDES.'head.php');
?>
  <script type="text/javascript" src="includes/general.js"></script>
  </head>
  <body>
    <?php require(DIR_WS_INCLUDES . 'header.php'); ?>
    <table class="tableBody">
      <tr>
        <?php
        if (USE_ADMIN_TOP_MENU == 'false') {
          echo '<td class="columnLeft2">'.PHP_EOL;
          echo '<!-- left_navigation //-->'.PHP_EOL;       
          require_once(DIR_WS_INCLUDES . 'column_left.php');
          echo '<!-- left_navigation eof //-->'.PHP_EOL; 
          echo '</td>'.PHP_EOL;      
        }
        ?>
        <td class="boxCenter">
        
          <div class="pageHeadingImage"><?php echo xtc_image(DIR_WS_ICONS.'heading/icon_configuration.png'); ?></div>
          <div class="pageHeading pdg2 flt-l">
            <?php
              $box_conf_gid = 'BOX_CONFIGURATION_'.$cfg_group['configuration_group_id'];
              echo (defined($box_conf_gid) && constant($box_conf_gid) != '' ? constant($box_conf_gid) : $cfg_group['configuration_group_title']);
            ?>
            <div class="main pdg2">TPLManager</div> 
          </div> 
                   
          <div class="main pdg2 flt-l" style="padding-left:30px;">&nbsp;</div>
          <div class="clear"></div> 
       
            <?php
              $tabs = false;
              switch ($_GET['gID']) {
                case '601': // Boxen 
                case '602': // Full-Content
                case '603': // Bestseller-Anzeige        
                case '604': // Texte        
                case '605': // Einstellungen        
                case '607': // Module        
                case '606': // PopUp-Fenster        
                  echo '<div class="configPartner cf">
                          <a class="configtab'.(($_GET['gID'] == '601') ? ' activ' : '').'" href="'.xtc_href_link(FILENAME_TPLCONFIG, 'gID=601', 'NONSSL').'">'.BOX_TPLMANAGER_601.'</a>
                          <a class="configtab'.(($_GET['gID'] == '602') ? ' activ' : '').'" href="'.xtc_href_link(FILENAME_TPLCONFIG, 'gID=602', 'NONSSL').'">'.BOX_TPLMANAGER_602.'</a>
                          <a class="configtab'.(($_GET['gID'] == '603') ? ' activ' : '').'" href="'.xtc_href_link(FILENAME_TPLCONFIG, 'gID=603', 'NONSSL').'">'.BOX_TPLMANAGER_603.'</a>
                          <a class="configtab'.(($_GET['gID'] == '604') ? ' activ' : '').'" href="'.xtc_href_link(FILENAME_TPLCONFIG, 'gID=604', 'NONSSL').'">'.BOX_TPLMANAGER_604.'</a>
                          <a class="configtab'.(($_GET['gID'] == '605') ? ' activ' : '').'" href="'.xtc_href_link(FILENAME_TPLCONFIG, 'gID=605', 'NONSSL').'">'.BOX_TPLMANAGER_605.'</a>
                          <a class="configtab'.(($_GET['gID'] == '607') ? ' activ' : '').'" href="'.xtc_href_link(FILENAME_TPLCONFIG, 'gID=607', 'NONSSL').'">'.BOX_TPLMANAGER_607.'</a>
                          <a class="configtab'.(($_GET['gID'] == '606') ? ' activ' : '').'" href="'.xtc_href_link(FILENAME_TPLCONFIG, 'gID=606', 'NONSSL').'">'.BOX_TPLMANAGER_606.'</a>
                        </div>';

                  $tabs = true;
                  echo '<div class="configPartner content" style="text-align:justify;">
                  			<div class="clear div_box pdg2" style="max-width:100%">'.TPL_CONF_PAGEINFO.'</div>';
                  break;
              }
            ?>
            
                <?php echo xtc_draw_form('configuration', FILENAME_TPLCONFIG, 'gID=' . (int)$_GET['gID'] . '&action=save'); ?>
                  <table class="clear tableConfig">
                    <?php
                      $configuration_query = xtc_db_query("SELECT configuration_key,
                                                                  configuration_id, 
                                                                  configuration_value, 
                                                                  use_function,
                                                                  set_function 
                                                             FROM " . TABLE_CONFIGURATION . " 
                                                            WHERE configuration_group_id = '" . (int)$_GET['gID'] . "'
                                                              AND sort_order >= 0
                                                         ORDER BY sort_order");
                      while ($configuration = xtc_db_fetch_array($configuration_query)) {
                        $configuration['configuration_value'] = stripslashes($configuration['configuration_value']); 
                        if (xtc_not_null($configuration['use_function'])) {
                          $use_function = $configuration['use_function'];
                          if (preg_match('/->/', $use_function)) { 
                            $class_method = explode('->', $use_function);
                            if (!is_object(${$class_method[0]})) {
                              include(DIR_WS_CLASSES . $class_method[0] . '.php');
                              ${$class_method[0]} = new $class_method[0]();
                            }
                            $cfgValue = xtc_call_function($class_method[1], $configuration['configuration_value'], ${$class_method[0]});
                          } else {
                            $cfgValue = xtc_call_function($use_function, $configuration['configuration_value']);
                          }
                        } else {
                          $cfgValue = encode_htmlspecialchars($configuration['configuration_value']);
                        }
                        if ((!isset($_GET['cID']) || (isset($_GET['cID']) && ($_GET['cID'] == $configuration['configuration_id']))) && !isset($cInfo) && (substr($action, 0, 3) != 'new')) {
                          $cfg_extra_query = xtc_db_query("SELECT configuration_key,
                                                                  configuration_value, 
                                                                  date_added, 
                                                                  last_modified, 
                                                                  use_function, 
                                                                  set_function 
                                                             FROM " . TABLE_CONFIGURATION . " 
                                                            WHERE configuration_id = '" . $configuration['configuration_id'] . "'
                                                          ");
                          $cfg_extra = xtc_db_fetch_array($cfg_extra_query);
                          // fix for modified 2.0.6.0 - start
                          //$cInfo_array = xtc_array_merge($configuration, $cfg_extra); 
                          $cInfo_array = array_merge($configuration, $cfg_extra); 
                          // fix for modified 2.0.6.0 - end
                          $cInfo = new objectInfo($cInfo_array);
                        }
                        if ($configuration['set_function']) {
                          if (strpos($configuration['set_function'], '(') !== false) {
                            eval('$value_field = ' . $configuration['set_function'] . ' "' . encode_htmlspecialchars($configuration['configuration_value']) . '");');
                          } else {
                            $parameters = explode(';', $configuration['set_function']);
                            $function = trim($parameters[0]);
                            $parameters[0] = encode_htmlspecialchars($configuration['configuration_value']);
                            $value_field = xtc_call_function($function, $parameters);
                          }
                        } else {
                          $value_field = xtc_draw_input_field($configuration['configuration_key'], $configuration['configuration_value'], 'style="width:100%;"');
                        }
                        if (strstr($value_field,'cfg_so_k')) {
                          $value_field=str_replace('cfg_so_k',strtolower($configuration['configuration_key']),$value_field);
                        }
                        if (strstr($value_field,'configuration_value')) {
                          $value_field=str_replace('configuration_value',$configuration['configuration_key'],$value_field);
                        }

                        $configuration_key_title = strtoupper($configuration['configuration_key'].'_TITLE');
                        $configuration_key_desc  = strtoupper($configuration['configuration_key'].'_DESC');
                        if( defined($configuration_key_title) ) {                                          
                          $configuration_key_title = constant($configuration_key_title);
                          $configuration_key_desc  = constant($configuration_key_desc);
                        } else {                                                                          
                          $configuration_key_title = $configuration['configuration_key'];                 
                          $configuration_key_desc  = '&nbsp;';                                            
                        }
                        if ($configuration_key_desc!=str_replace("<meta ","",$configuration_key_desc)) {
                          $configuration_key_desc = encode_htmlentities($configuration_key_desc);
                        }
                        echo '<tr>
                                <td class="dataTableConfig col-left">'.$configuration_key_title.'</td>
                                <td class="dataTableConfig col-middle">'.str_replace('360px', '350px', $value_field).'</td>
                                <td class="dataTableConfig col-right" style="text-align:justify;">'.$configuration_key_desc.'</td>
                              </tr>';

                      }
                    ?>
                  </table>
                  <div class="main pdg2 txta-r mrg5"><input type="submit" class="button" onclick="this.blur();" value="<?php echo BUTTON_SAVE; ?>"/></div>
                </form>
            <?php echo (($tabs === true) ? '</div>' : ''); ?>
        </td>
        <!-- body_text_eof //-->
      </tr>
    </table>
    <!-- body_eof //-->
    <!-- footer //-->
    <?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
    <!-- footer_eof //-->
    <br />
  </body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>