<?php
/*
 * --------------------------------------------------------------------------
 * @file      modulfux_attributes_default.php
 * @date      15.10.17
 *
 * @copyright modulfux https://www.modulfux.de
 *
 * LICENSE:   Released under the GNU General Public License
 * --------------------------------------------------------------------------
 */
//BOF - modulfux_attributes_default
if (defined('MODULE_MODULFUX_ATTRIBUTES_DEFAULT_STATUS') && MODULE_MODULFUX_ATTRIBUTES_DEFAULT_STATUS == 'true') {
  if (basename($PHP_SELF) == FILENAME_PRODUCT_INFO) {
    if (isset($_GET['error']) && $_GET['error'] == 'attributecheck') {
      ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $('<div class="errormessage"><?php echo MODULFUX_ATTRIBUTES_ERROR; ?></div>').insertBefore($('h1')); 
        });  
      </script>
      <?php
    }
  }  
}
//EOF - modulfux_attributes_default