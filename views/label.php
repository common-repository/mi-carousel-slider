<?php
 add_filter( 'manage_mi_carousel_slider_posts_columns', 'mi_set_carousel_columns' );
 add_action( 'manage_mi_carousel_slider_posts_custom_column', 'mi_carousel_custom_column', 10, 2 );

 // Set Custom Columns
function mi_set_carousel_columns( $columns){
   
#unset($columns['date']);
 $newColumns = array();
$newColumns['cb'] = '';
$newColumns['title'] = 'Slide Title';
$newColumns['image'] = 'Image';
$newColumns['shortcode'] = 'Shortcode';
$newColumns['category'] = 'Category';
$newColumns['date'] = 'Date';
return $newColumns;
}

//  Create Custom Columns

function mi_carousel_custom_column( $column, $post_id ){
    GLOBAL $post;
    switch( $column ){
        case 'image' :
         $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', false, '' );
         echo '<img src="'.$src[0].'" style="width:100px;">';
            break;
            case 'shortcode' :
$cat = json_decode(json_encode(wp_get_object_terms($post->ID, 'mi_carousels')),true);
if(!empty($cat)){
    echo "<pre>";
    echo '<input type="text" onfocus="this.select();" readonly="readonly" value="[mi-carousel category=&quot;'.$cat[0]["slug"].'&quot; ]" class="large-text code">';
    echo "</pre>";
   }else{
       echo '<span style="color:red">Please must be selected any one category</span>';
   }
        
            break;
            case 'category' :
             GLOBAL $post;
            // category column
            $cat_name = json_decode(json_encode(wp_get_object_terms($post->ID, 'mi_carousels')),true);
            if(!empty($cat_name)){
             echo $cat_name[0]["name"];
            }else{
                echo '<span style="color:red">Please must be selected any one category</span>';
            }
            break;
    }
    
}

add_filter('enter_title_here', 'my_title_place_holder' , 20 , 2 );
    function my_title_place_holder($title , $post){

        if( $post->post_type == 'mi_carousel_slider' ){
            $my_title = "Add new Slide Title";
            return $my_title;
        }

        return $title;

    }