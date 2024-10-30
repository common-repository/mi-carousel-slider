<?php
add_action('init', 'your_init', 99 );
 
function your_init() {
 
	if (function_exists('kc_add_map')) 
	{ 
	    kc_add_map(
	        array(
	            'mi-carousel' => array(
	                'name' => 'MI Carousel',
	                'description' => __('Display Slider with category', 'KingComposer'),
	                'icon' =>'et-pictures',
					'category' => 'Content',
					//'is_container' => true, // shortcode container such as [name]...[/name]
	            //'system_only' => true|false,  // set true to not visible in list of adding elements
					'css_box'=>true,
	                'params' => array(
	                    array(
	                        'name' => 'order',
	                        'label' => 'Order',
	                        'type' => 'text',
	                        'admin_label' => true,
	                        'description' => __('Enter Order for slider such as: ASC, DESC etc..', 'KingComposer')
	                    ),
	                    array(
	                        'name' => 'orderby',
	                        'label' => 'Order By',
	                        'type' => 'text',
	                        'admin_label' => true,
	                        'description' => __('Enter Order for slider such as: title, id etc..', 'KingComposer')
						),
						array(
	                        'name' => 'posts',
	                        'label' => 'Show Slide',
	                        'type' => 'number_slider',
	                        'admin_label' => true,
	                        'description' => __('slide show 2 or  0 is equal to all.', 'KingComposer')
						),
						array(
	                        'name' => 'category',
	                        'label' => 'Category Name',
	                        'type' => 'text',
	                        'admin_label' => true,
	                        'description' => __('slide show 2 or  0 is equal to all.', 'KingComposer')
	                    )
	                )
	            ),  // End of elemnt kc_icon 
 
	        )
	    ); // End add map
	
	} // End if
 
} 


/* $kc->add_map(
    array(
        'mi-carousel' => array(
            'name'        => 'MI Slide',
            'description' => __('MI Slider', 'mi-framework'),
            'icon'        => 'sl-file-image',
            'category'    => '',
            'params'      => array(
                array(
                    'name'  => 'mi-slide',
                    'label' => '',
                    'number_slider'  => 'text',
                )
            )
        )
    )
);
add_shortcode( 'mi-carousel', 'mi_carousel_shortcode' ); */

