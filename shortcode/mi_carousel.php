<?php
/*Shortcode function is here*/

add_shortcode( 'mi-carousel', 'mi_carousel_shortcode' );
function mi_carousel_shortcode( $atts ) {
    ob_start();
     global $post;
    extract( shortcode_atts( array (
        'type' => 'mi_carousel_slider',
        'order' => 'date',
        'orderby' => 'title',
        'posts' => -1,
        'category' => 'slider',
    ), $atts ) );
    
   
   $options = array(
        'post_type' => $type,
        'posts_per_page' => $posts,
        'mi_carousel_category' => $category,
    );
   
    $mi_carousel_loop = new WP_Query( $options );

    include_once( plugin_dir_path( __FILE__ ) . '../views/slide.php' );
    $myvariable = ob_get_clean();
    return $myvariable;
}

