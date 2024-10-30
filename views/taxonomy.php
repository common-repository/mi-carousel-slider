<?php
$labels = array(
    'name'                       => _x( 'MI Carousels', 'Taxonomy General Name', 'mi-carousel-slider' ),
    'singular_name'              => _x( 'MI Carousel', 'Taxonomy Singular Name', 'mi-carousel-slider' ),
    'menu_name'                  => __( 'MI Carousels', 'mi-carousel-slider' ),
    'all_items'                  => __( 'All MI Carousels', 'mi-carousel-slider' ),
    'parent_item'                => __( 'Parent MI Carousel', 'mi-carousel-slider' ),
    'parent_item_colon'          => __( 'Parent MI Carousels:', 'mi-carousel-slider' ),
    'new_item_name'              => __( 'New MI Carousels Name', 'mi-carousel-slider' ),
    'add_new_item'               => __( 'Add MI Carousels', 'mi-carousel-slider' ),
    'edit_item'                  => __( 'Edit MI Carousel', 'mi-carousel-slider' ),
    'update_item'                => __( 'Update MI Carousel', 'mi-carousel-slider' ),
    'separate_items_with_commas' => __( 'Separate MI Carousels with commas', 'mi-carousel-slider' ),
    'search_items'               => __( 'Search MI Carousels', 'mi-carousel-slider' ),
    'add_or_remove_items'        => __( 'Add or remove MI Carousels', 'mi-carousel-slider' ),
    'choose_from_most_used'      => __( 'Choose from the most used MI Carousels', 'mi-carousel-slider' ),
);
$args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => false,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'show_in_rest'               => true,
    'query_var'                  => true,
    'rewrite'                    => array( 
    'slug'                       => 'mi_carousels' 
),
);
register_taxonomy( 'mi_carousels', 'mi_carousel_slider', $args );

/* taxonomy metadata */
// Add term page
function mi_carousels_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field mi-form-fields-cols-two">
		<label for="term_meta[mi_carousels_mode]"><?php _e( 'Slider Mode', 'mi-carousel-slider' ); ?></label>
        <p class="description"><?php _e( 'Type of transition between slides, ex: horizontal,fade','mi-carousel-slider' ); ?></p>
        <div class="form-field">
       <select name="term_meta[mi_carousels_mode]" id="term_meta[mi_carousels_mode]">
       <option value="">Select a Mode</option>
       <option value="fade">Fade</option>
       <option value="horizontal">Horizontal</option>
       <option value="vertical">Vertical</option>
       </select>
       <label for="term_meta[mi_carousels_slide_speed]"><?php _e( 'Slider Speed', 'mi-carousel-slider' ); ?></label>
        </div>
        <div class="form-field">
        <input type="text" name="term_meta[mi_carousels_slide_speed]" id="term_meta[mi_carousels_slide_height]" value="500">
        <p class="description"><?php _e( 'Slide transition duration (in ms) default:500','mi-carousel-slider' ); ?></p>
        </div>
	</div>
    <div class="form-field form-field-checkbox">
    <label for="term_meta[mi_carousels_slide_random]"><?php _e( 'Slide Random', 'mi-carousel-slider' ); ?></label>
    <input type="radio" name="term_meta[mi_carousels_slide_random]" id="term_meta[mi_carousels_slide_random]" value="1"> Yes &nbsp;
    <input type="radio" name="term_meta[mi_carousels_slide_random]" id="term_meta[mi_carousels_slide_random]" value="1"> No  &nbsp;
    <p class="description">
    Start slider on a random slide. Default: false
    </p>
    </div>
    <div class="form-field form-field-checkbox">
    <label for="term_meta[mi_carousels_slide_loop]"><?php _e( 'Slide Loop', 'mi-carousel-slider' ); ?></label>
    <input type="radio" name="term_meta[mi_carousels_slide_loop]" id="term_meta[mi_carousels_slide_loop]" value="1"> Yes &nbsp;
    <input type="radio" name="term_meta[mi_carousels_slide_random]" id="term_meta[mi_carousels_slide_loop]" value="1"> No  &nbsp;
    <p class="description">
    If true, clicking "Next" while on the last slide will transition to the first slide and vice-versa
    </p>
    </div>


    <div class="form-field mi-form-fields-cols-two">
		<label for="term_meta[mi_carousels_hide_control_on_end]"><?php _e( 'Slider Hide Control On End', 'mi-carousel-slider' ); ?></label>
        <p class="description"><?php _e( 'If true, "Prev" and "Next" controls will receive a class disabled when slide is the first or the last
Note: Only used when infiniteLoop: false','mi-carousel-slider' ); ?></p>
        <div class="form-field">
        <input type="radio" name="term_meta[mi_carousels_hide_control_on_end]" id="term_meta[mi_carousels_hide_control_on_end]" value="1"> Yes &nbsp;
    <input type="radio" name="term_meta[mi_carousels_hide_control_on_end]" id="term_meta[mi_carousels_hide_control_on_end]" value="1"> No  &nbsp;
       <label for="term_meta[mi_carousels_slide_easing]"><?php _e( 'Slider Easing', 'mi-carousel-slider' ); ?></label>
        </div>
        <div class="form-field">
        <select name="term_meta[mi_carousels_slide_easing]" id="term_meta[mi_carousels_slide_easing]">
       <option value="">Select a Easing</option>
       <option value="linear">Linear</option>
       <option value="ease">Ease</option>
       <option value="ease-in">Ease-in</option>
       <option value="ease-out">Ease-out</option>
       </select>
        <p class="description"><?php _e( "If using CSS: 'linear', 'ease', 'ease-in', 'ease-out', 'ease-in-out', 'cubic-bezier(n,n,n,n)'. If not using CSS: 'swing', 'linear' (see the above file for more options)
",'mi-carousel-slider' ); ?></p>
        </div>
	</div>
<?php
}
add_action( 'mi_carousels_add_form_fields', 'mi_carousels_add_new_meta_field', 10, 2 );

// Edit term page
function mi_carousels_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
<tr class="form-field">
<th scope="row" valign="top"><label for="term_meta[custom_term_meta]"><?php _e( 'Slider Mode', 'mi-carousel-slider' ); ?></label></th>
<td>
<div class="form-field mi-form-fields-cols-two">
<?php 
		$term_meta = get_option( "taxonomy_$t_id" );
        ?>    
        <div class="form-field">
       <select name="term_meta[mi_carousels_mode]" id="term_meta[mi_carousels_mode]">
       
       <option value="">Select a Mode</option>
       <option value="fade" <?php echo ((@$term_meta["mi_carousels_mode"]==='fade')?'selected':'');?>>Fade</option>
       <option value="horizontal" <?php echo ((@$term_meta["mi_carousels_mode"]==='horizontal')?'selected':'');?>>Horizontal</option>
       <option value="vertical" <?php echo ((@$term_meta["mi_carousels_mode"]==='vertical')?'selected':'');?>>Vertical</option>
       </select>
        </div>
        <p class="description"><?php _e( 'Type of transition between slides, ex: horizontal,fade','mi-carousel-slider' ); ?></p>
	</div>
    </td>
</tr>

        </div>
        <div class="form-field">
        
<tr class="form-field">
<th scope="row" valign="top"><label for="term_meta[mi_carousels_slide_speed]"><?php _e( 'Slider Speed', 'mi-carousel-slider' ); ?></label></th>
<td>
<div class="form-field mi-form-fields-cols-two">
<?php 
        $term_meta = get_option( "taxonomy_$t_id" );
        ?>    
<input type="text" name="term_meta[mi_carousels_slide_speed]" id="term_meta[mi_carousels_slide_height]" value="<?php echo ((@$term_meta["mi_carousels_mode"]!='')?$term_meta["mi_carousels_slide_speed"]:'');?>">
        <p class="description"><?php _e( 'Slide transition duration (in ms) default:500','mi-carousel-slider' ); ?></p>
	</div>
    </td>
</tr>

<tr class="form-field">
<th scope="row" valign="top"><label for="term_meta[mi_carousels_slide_random]"><?php _e( 'Slide Random', 'mi-carousel-slider' ); ?></label></th>
<td>
<div class="form-field mi-form-fields-cols-two">
<?php 
        $term_meta = get_option( "taxonomy_$t_id" );
        ?>    
<input type="radio" name="term_meta[mi_carousels_slide_random]" id="term_meta[mi_carousels_slide_random]" value="1" <?php echo ((@$term_meta["mi_carousels_slide_random"]==='1')?'checked':'');?>> Yes &nbsp;
<input type="radio" name="term_meta[mi_carousels_slide_random]" id="term_meta[mi_carousels_slide_random]" value="0" <?php echo ((@$term_meta["mi_carousels_slide_random"]==='0')?'checked':'');?>> No
        <p class="description"><?php _e( 'Start slider on a random slide. Default: false','mi-carousel-slider' ); ?></p>
	</div>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="term_meta[mi_carousels_slide_loop]"><?php _e( 'Slide Loop', 'mi-carousel-slider' ); ?></label></th>
<td>
<div class="form-field mi-form-fields-cols-two">
<?php 
        $term_meta = get_option( "taxonomy_$t_id" );
        ?>    
<input type="radio" name="term_meta[mi_carousels_slide_loop]" id="term_meta[mi_carousels_slide_loop]" value="1" <?php echo ((@$term_meta["mi_carousels_slide_loop"]==='1')?'checked':'');?>> Yes &nbsp;
<input type="radio" name="term_meta[mi_carousels_slide_loop]" id="term_meta[mi_carousels_slide_loop]" value="0" <?php echo ((@$term_meta["mi_carousels_slide_loop"]==='0')?'checked':'');?>> No
        <p class="description"><?php _e( ' If true, clicking "Next" while on the last slide will transition to the first slide and vice-versa','mi-carousel-slider' ); ?></p>
	</div>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="term_meta[mi_carousels_hide_control_on_end]"><?php _e( 'Slider Hide Control On End', 'mi-carousel-slider' ); ?></label></th>
<td>
<div class="form-field mi-form-fields-cols-two">
<?php 
        $term_meta = get_option( "taxonomy_$t_id" );
        ?>    
<input type="radio" name="term_meta[mi_carousels_hide_control_on_end]" id="term_meta[mi_carousels_hide_control_on_end]" value="1" <?php echo ((@$term_meta["mi_carousels_hide_control_on_end"]==='1')?'checked':'');?>> Yes &nbsp;
<input type="radio" name="term_meta[mi_carousels_hide_control_on_end]" id="term_meta[mi_carousels_hide_control_on_end]" value="0" <?php echo ((@$term_meta["mi_carousels_hide_control_on_end"]==='0')?'checked':'');?>> No
        <p class="description"><?php _e( 'If true, "Prev" and "Next" controls will receive a class disabled when slide is the first or the last
Note: Only used when infiniteLoop: false','mi-carousel-slider' ); ?></p>
	</div>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="term_meta[mi_carousels_slide_easing]"><?php _e( 'Slider Easing', 'mi-carousel-slider' ); ?></label></th>
<td>
<div class="form-field mi-form-fields-cols-two">
<?php 
        $term_meta = get_option( "taxonomy_$t_id" );
        ?>    
<select name="term_meta[mi_carousels_slide_easing]" id="term_meta[mi_carousels_slide_easing]">
       
<option value="">Select a Easing</option>
       <option value="linear" <?php echo ((@$term_meta["mi_carousels_slide_easing"]==='linear')?'selected':'');?>>Linear</option>
       <option value="ease" <?php echo ((@$term_meta["mi_carousels_slide_easing"]==='ease')?'selected':'');?>>Ease</option>
       <option value="ease-in" <?php echo ((@$term_meta["mi_carousels_slide_easing"]==='ease-in')?'selected':'');?>>Ease-in</option>
       <option value="ease-out" <?php echo ((@$term_meta["mi_carousels_slide_easing"]==='ease-out')?'selected':'');?>>Ease-out</option>
       </select>
       <p class="description"><?php _e( "If using CSS: 'linear', 'ease', 'ease-in', 'ease-out', 'ease-in-out', 'cubic-bezier(n,n,n,n)'. If not using CSS: 'swing', 'linear' (see the above file for more options)
",'mi-carousel-slider' ); ?></p>
	</div>
    </td>
</tr>
	
<?php
}
add_action( 'mi_carousels_edit_form_fields', 'mi_carousels_edit_meta_field', 10, 2 );

// Save extra taxonomy fields callback function.
function save_mi_carousels_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_mi_carousels', 'save_mi_carousels_meta', 10, 2 );  
add_action( 'create_mi_carousels', 'save_mi_carousels_meta', 10, 2 );

add_filter('manage_edit-mi_carousels_columns', function ( $columns ) 
{
        unset( $columns['description'] ); 
        unset( $columns['slug'] );

    return $columns;
} );
function remove_description_form() {
    echo "<style> .term-parent-wrap, .term-description-wrap { display:none; } </style>";
}

add_action( "mi_carousels_edit_form", 'remove_description_form');
add_action( "mi_carousels_add_form", 'remove_description_form');

?>