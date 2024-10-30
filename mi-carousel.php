<?php
/*
* Plugin Name: MI Carousel Slider
* Description: This is a MI Carousel Slider Lightweight easily use.
* Plugin URI: https://wordpress.org/plugins/mi-carousel-slider/
* Author: MI Dexigner Team
* Author URI: https://www.midexigner.com
* Text Domain:       mi-carousel-slider
* Version: 2.0.3
* License:           GPLv2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/
/*

Copyright (C) 2013- 2018  Muhammad Idrees

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

defined('ABSPATH') or die('Hey, you can\t access this file, you silly human');

if ( !class_exists( 'MI_CAROUSEL' ) ) {
	class MI_CAROUSEL{
		public $plugin;
		function __construct() {
			$this->plugin = plugin_basename( __FILE__ );
            include_once( plugin_dir_path( __FILE__ ) . '/views/label.php' );
            include_once( plugin_dir_path( __FILE__ ) . '/shortcode/mi_carousel.php' );
			require_once(ABSPATH."wp-load.php");
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {	
		include_once( plugin_dir_path( __FILE__ ) . '/inc/kc_mi_carousel.php' );	
	}
		}
		function register() {
			add_action( 'wp_enqueue_scripts', array( $this, 'load_mi_carousel_scripts' ) );
			add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
            add_action( 'init', array( $this, 'mi_carousel_init' ) );
            add_action( 'init', array( $this, 'mi_carousel_taxonomy' ) );
            add_action( 'init', array( $this, 'mi_carousel_metabox' ) );
           
		}
		public function settings_link( $links ) {
			$settings_link = '<a href="http://www.midexigner.com" target="_blank">Visit Website</a>  |  ';
			$settings_link .= '<a href="https://www.getsafepay.com/io/quick-link?ql=link_e1256505-56c5-4c97-a775-7ecc3e5cc223" target="_blank">Donate Now</a>';
			array_push( $links, $settings_link );
			return $links;
		}
		function mi_carousel_init() {
            include_once( plugin_dir_path( __FILE__ ) . '/views/post_type.php' );
        }

		function mi_carousel_taxonomy() {
            include_once( plugin_dir_path( __FILE__ ) . '/views/taxonomy.php' );
   
		}
		
		function mi_carousel_metabox() {
            include_once( plugin_dir_path( __FILE__ ) . '/views/metabox.php' );
   
        }

		/* Marquee - register custom JavaScript files and Css is here */
function load_mi_carousel_scripts(){
    wp_register_style('mi_carousel',plugin_dir_url(__FILE__).'css/mi-carousel.css',false,'1.0.0');
    wp_enqueue_style('mi_carousel');
    wp_enqueue_script('mi_carousel_js', plugin_dir_url(__FILE__).'js/mi-carousel.js', array('jquery'));
    wp_enqueue_script('mi_carousel_js');
}


		function activate() {
            // clear the permalinks after the post type has been registered
            wp_insert_term('Slider','mi_carousel_category');         
            flush_rewrite_rules();
           
		}
		function deactivate() {
             // unregister the post type, so the rules are no longer in memory
            unregister_post_type( 'mi-carousel-slider' );
			flush_rewrite_rules();
		}
	}
}

$MI_CAROUSEL = new MI_CAROUSEL();

$MI_CAROUSEL->register();
	// activation
register_activation_hook( __FILE__, array( $MI_CAROUSEL, 'activate' ) );
	// deactivation
register_deactivation_hook( __FILE__, array( $MI_CAROUSEL, 'deactivate' ));

