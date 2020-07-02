<?php

/*template name: testing category search */

get_header();

?>
<style>
    select{
        border:1px solid black;
    }
    .hide{
        display: none;
    }
</style>
<br><br><br><br><br><br><br><br><br><br><br><br>
    <form method="post" id="cat-search-form">
        <input type="hidden" name="action" value="search_cat">
        <select name="main_cat" class="cat-search">
            <?php
              $args = array(
                     'taxonomy'     => 'product_cat',
                     'orderby'      => 'name',
                     'show_count'   => 0,
                     'pad_counts'   => 0,
                     'hierarchical' => 1,
                     'title_li'     => '',
                     'hide_empty'   => 0
              );
             $all_categories = get_categories( $args );
             foreach ($all_categories as $cat) {
                if($cat->category_parent == 0) {
                    $category_id = $cat->term_id;
                    ?>
                    <option value="<?= $cat->cat_ID; ?>"><?= $cat->name ?></option>
                   <?php
                   
                  }
                } 
            ?>
        </select>
        
        <select name="sub_cat" class="cat-search hide"></select>
        
        <select name="sub_sub_cat" class="cat-search hide"></select>
    </form>

<?php

get_footer();

?>