<?php

function smarty_modifier_contentenhancer ($html) {

	if(preg_match_all('/(\[products [^\]]+\])/', $html, $matches)){
            foreach($matches[1] AS $snippet){
                $products_models = null;
                $categories_ids = null;
                $keywords = null;
                
                if(preg_match('/products_models\=\'([^\']+)\'/', $snippet, $model_matches)){
                    $t_models = explode(',', $model_matches[1]);
                    $products_models = array();
                    foreach($t_models AS $model){
                        $products_models[] = xtc_db_input(trim($model));
                    }
                }
                
                if(preg_match('/categories_ids\=\'([^\']+)\'/', $snippet, $categories_ids_matches)){
                    $t_categories_ids = explode(',', $categories_ids_matches[1]);
                    $categories_ids = array();
                    foreach($t_categories_ids AS $categories_id){
                        $categories_ids[] = (int)$categories_id;
                    }
                }
                
                if(preg_match('/keywords\=\'([^\']+)\'/', $snippet, $keyword_matches)){
                    $t_keywords = explode(',', $keyword_matches[1]);
                    $keywords = array();
                    foreach($t_keywords AS $keyword){
                        $keywords[] = xtc_db_input(trim($keyword));
                    }
                }
                
                $html = str_replace($snippet, parseProducts($products_models, $categories_ids, $keywords), $html);
                
            }
        }
	
	if(preg_match_all('/(\[categories [^\]]+\])/', $html, $matches)){
			 foreach($matches[1] AS $snippet){
				  if(preg_match('/categories_ids\=\'([^\']+)\'/', $snippet, $categories_ids_matches)){
                    $t_categories_ids = explode(',', $categories_ids_matches[1]);
                    $categories_ids = array();
                    foreach($t_categories_ids AS $categories_id){
                        $categories_ids[] = (int)$categories_id;
				
                    }

                }
		
				$html = str_replace($snippet, parseCategories($categories_ids), $html);
			 }
	}
        
        return $html;
    
    }
	
	function parseCategories($categories_ids = NULL) {

		if(is_array($categories_ids)) {
			$group_check = '';
			if (GROUP_CHECK == 'true') {
				$group_check = "c.group_permission_".$_SESSION['customers_status']['customers_status_id']."=1 AND";
			}
			
			$q = "SELECT 
					c.categories_id,
					c.categories_image, 
					c.categories_image_list,
					cd.categories_name 
				FROM categories AS c 
				LEFT JOIN categories_description as cd 
				ON c.categories_id = cd.categories_id 
				WHERE c.categories_id IN ('".implode("', '", $categories_ids)."') 
				AND ".$group_check." c.categories_status = '1' 
				AND cd.language_id = '" .(int) $_SESSION['languages_id'] ."'
				order by FIND_IN_SET(c.categories_id,'".implode(",", $categories_ids)."')";
				$categories_query = xtDBquery($q);
				
			  while($categories = xtc_db_fetch_array($categories_query, true)) {
				$category_link =xtc_category_link($categories['categories_id'],$categories['categories_name']);
				if ($categories['categories_image_list'] != '') {
				  $image = $categories['categories_image_list'];
				} elseif ($categories['categories_image'] != '' && $categories['categories_image_list'] == '') {
				  $image = $categories['categories_image'];
				} else {
				  if (CATEGORIES_IMAGE_SHOW_NO_IMAGE == 'true') {
				    $image = 'noimage.gif';
				  } else {
				    $image = '';
				  }
				}
				$module_content[] = array ('CATEGORY_NAME'        => $categories['categories_name'],
		                                   'CATEGORY_IMAGE_TRUE'  => (($image != '') ? true : false),        
		                                   'CATEGORY_IMAGE'       => DIR_WS_IMAGES .'categories/' . $image, 
		                                   'CATEGORY_LINK'        => xtc_href_link(FILENAME_DEFAULT,  xtc_get_all_get_params(array('cat','page','filter_id','manufacturers_id')) . $category_link)
		                                  );
				
				
			}	
		    $smarty = new Smarty;
            $smarty->assign('categories', $module_content);
            $smarty->assign('language', $_SESSION["language"]);
            $html = $smarty->fetch(CURRENT_TEMPLATE.'/module/modules/content_enhancer/listing_cats.html');		
			
			return $html;
		}
	}
    
    function parseProducts($products_models = null, $categories_ids = null, $keywords = null){
        if(is_array($products_models) || is_array($categories_ids) || is_array($keywords)){
            $group_check = '';
            $fsk_lock = '';
            
            if ($_SESSION['customers_status']['customers_fsk18_display'] == '0') {
                $fsk_lock = ' AND p.products_fsk18!=1';
            }
            
            if (GROUP_CHECK == 'true') {
                $group_check = " AND p.group_permission_".$_SESSION['customers_status']['customers_status_id']."=1 ";
            }
            
            $q = "SELECT * FROM 
                            ".TABLE_PRODUCTS." p
                            JOIN ".TABLE_PRODUCTS_DESCRIPTION." pd ON (p.products_id = pd.products_id AND pd.language_id = ".(int)$_SESSION["languages_id"].")
                  WHERE 
                        p.products_status = 1 ".$fsk_lock.$group_check;
            
            if(is_array($products_models)){
                $q .= " AND p.products_model IN ('".implode("', '", $products_models)."') ";
            }
            
            if(is_array($categories_ids)){
                $q .= " AND p.products_id IN (SELECT p2c.products_id FROM ".TABLE_PRODUCTS_TO_CATEGORIES." p2c WHERE p2c.categories_id IN (".implode(',', $categories_ids).")) ";
            }
            
			if(is_array($keywords)){
                $q .= " AND (1!=1";
                foreach($keywords AS $keyword){
                    $q .= " OR
                              ( pd.products_keywords LIKE ('%".$keyword."%') 
                                    OR
                                pd.products_name LIKE ('%".$keyword."%') 
								    OR
                                pd.products_description LIKE ('%".$keyword."%')
                               )
                            ";
                }
                $q .= ")";
            }

            global $product;
            $module_content = array();
            $listing_query = xtDBquery($q);
            while ($listing = xtc_db_fetch_array($listing_query, true)) {
                $module_content[] =  $product->buildDataArray($listing);
            }
            
            $smarty = new Smarty;
            $smarty->assign('products', $module_content);
            $smarty->assign('language', $_SESSION["language"]);
            $html = $smarty->fetch(CURRENT_TEMPLATE.'/module/modules/content_enhancer/listing.html');
            return $html;
            
        }
        
        return '';
    
}

?>
