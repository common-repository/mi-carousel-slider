<?php

/**
 * Trigger this file on Plugin uninstall
 *
 * @package  MI Dexigner
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Clear Database stored data
$mi_carousels = get_posts( array( 'post_type' => 'mi-carousel-slider', 'numberposts' => -1 ) );
$mi_carousels_terms = get_terms( array('taxonomy' => 'mi_carousel_category','hide_empty' => false,) );

foreach( $mi_carousels as $mi_carousel ) {
	wp_delete_post( $mi_carousel->ID, true );
}

foreach( $mi_carousels_terms as $mi_carousels_term ) {
    wp_delete_term( $mi_carousels_term->term_id, $mi_carousels_term->taxonomy );
}
