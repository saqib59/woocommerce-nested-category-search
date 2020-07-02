<?php

add_action('wp_ajax_search_cat', 'search_cat');
add_action('wp_ajax_nopriv_search_cat', 'search_cat');

function search_cat(){
    if(!empty($_POST['cat_id'] ) ){
        $response = array();
         $args = array(
                     'taxonomy'     => 'product_cat',
                     'child_of'     => 0,
                    'parent'        => $_POST['cat_id'],
                     'orderby'      => 'name',
                     'show_count'   => 0,
                     'pad_counts'   => 0,
                     'hierarchical' => 1,
                     'title_li'     => '',
                     'hide_empty'   => 0
              );
             $all_categories = get_categories( $args );
             $i = 0;
             foreach ($all_categories as $cat) {
                    $category_id = $cat->term_id;
                    $response[$i]['value'] = $category_id;
                    $response[$i]['name'] = $cat->name;
                    ?>
                   
                   <?php
                   
                  
                  $i++;
                }
                if(empty($response)){
                    $response['error'] = true;
                    return response_json($response);
                }
                else{
                    return response_json($response);   
                }
    }
    else{
        $response['error'] = true;
         return response_json($response);
    }
  
    
}

function response_json($data){
    header('Content-Type: application/json');
    echo json_encode($data);
    wp_die();
}

?>