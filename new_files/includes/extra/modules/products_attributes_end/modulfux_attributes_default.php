<?php
/*
 * --------------------------------------------------------------------------
 * @file      modulfux_attributes_default.php
 * @date      16.10.17
 *
 * @copyright modulfux https://www.modulfux.de
 *
 * LICENSE:   Released under the GNU General Public License
 * --------------------------------------------------------------------------
 */
//BOF - modulfux_attributes_default 
if (defined('MODULE_MODULFUX_ATTRIBUTES_DEFAULT_STATUS') && MODULE_MODULFUX_ATTRIBUTES_DEFAULT_STATUS == 'true') {
  foreach ($products_options_data as $row => &$values) {
    $opt_flag = 1;
    foreach ($values['DATA'] as $col => &$values2) {
      $values2['CHECKED'] = 0;
      if (isset($_SESSION['tmp_opt_id']) && in_array($products_options_data[$row]['DATA'][$col]['ID'], $_SESSION['tmp_opt_id'])) {
        $values2['CHECKED'] = 1;
        $opt_flag = 0; 
      }
    }
    if (defined('MODULE_TRAFFIC_LIGHTS_ATTRIBUTES') && MODULE_TRAFFIC_LIGHTS_ATTRIBUTES == 'true') {
      if ($product->data['options_template'] == 'product_options_selection.html' || $product->data['options_template'] == 'table_listing.html') {
        $trafficlight = '<span class="tl zero-tl"></span> ';
      } else {
        $trafficlight = '';
      }
    } else {
      $trafficlight = '';
    }
    $arr = [[
      'ID'      => 0,
      'TEXT'    => $trafficlight.MODULFUX_PULL_DOWN_DEFAULT,
      'CHECKED' => $opt_flag,
    ]];
    if (defined('MODULE_WEB0NULL_ATTRIBUTE_PRICE_UPDATER_STATUS') && MODULE_WEB0NULL_ATTRIBUTE_PRICE_UPDATER_STATUS == 'true') {
      $arr[0]['JSON_ATTRDATA'] = str_replace('"', '&quot;', json_encode(
        [
          'pid'          => (int)$product->data['products_id'],
          'gprice'       => $products_price,
          'oprice'       => $xtPrice->xtcFormat($xtPrice->xtcAddTax($xtPrice->getPprice((int)$product->data['products_id']), $xtPrice->TAX[$product->data['products_tax_class_id']]), false),
          'cleft'        => $xtPrice->currencies[$_SESSION['currency']]['symbol_left'],
          'cright'       => $xtPrice->currencies[$_SESSION['currency']]['symbol_right'],
          'prefix'       => $products_options['price_prefix'],
          'aprice'       => 0,
          'vpetext'      => ($json_vpetext = xtc_get_vpe_name($product->data['products_vpe'])) ? $json_vpetext : TEXT_PRODUCTS_VPE,
          'vpevalue'     => (($product->data['products_vpe_status'] && (double)$product->data['products_vpe_value']) ? (double)$product->data['products_vpe_value'] : false),
          'attrvpevalue' => (($product->data['products_vpe_status'] && (double)$products_options['attributes_vpe_value']) ? (double)$products_options['attributes_vpe_value'] : false),
          'onlytext'     => $json_onlytext ? $json_onlytext : TXT_ONLY,
          'protext'      => $json_protext ? $json_protext : TXT_PER,
          'insteadtext'  => $json_insteadtext ? $json_insteadtext : TXT_INSTEAD,
        ]
      ));
    }
    $values['DATA'] = array_merge($arr, $values['DATA']);
  }
  unset($_SESSION['tmp_opt_id']);
  $module_smarty->assign('options', $products_options_data);
}
//EOF - modulfux_attributes_default