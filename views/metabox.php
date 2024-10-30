<?php
/*  --------------------------------------------------------------------------------
	Add Metabox to Slider Image and Video Option
 ---------------------------------------------------------------------------------*/
/*  --------------------------------------------------------------------------------
	Add Metabox to Slider Content
 ---------------------------------------------------------------------------------*/
	add_action( 'add_meta_boxes', 'slide_meta_box_add' );

	function slide_meta_box_add()
	{
		add_meta_box( 'slide-meta-box', __('Slider Content', 'mi-carousel-slider'), 'slide_meta_box', 'mi_carousel_slider', 'normal', 'high' );
	}

	function slide_meta_box( $post )
	{
		$values = get_post_custom( $post->ID );
		$styling = isset( $values['styling'] ) ? esc_attr( $values['styling'][0] ) : '';
        $sub_title = isset( $values['sub_title'] ) ? esc_attr( $values['sub_title'][0] ) : '';
        $caption = isset( $values['caption'] ) ? esc_attr( $values['caption'][0] ) : '';
		$button_one_url = isset( $values['button_one_url'] ) ? esc_attr( $values['button_one_url'][0] ) : '';
		$button_one_text = isset( $values['button_one_text'] ) ? esc_attr( $values['button_one_text'][0] ) : '';
		$button_one_target = isset( $values['button_one_target'] ) ? esc_attr( $values['button_one_target'][0] ) : '';
		$button_two_url = isset( $values['button_two_url'] ) ? esc_attr( $values['button_two_url'][0] ) : '';
		$button_two_text = isset( $values['button_two_text'] ) ? esc_attr( $values['button_two_text'][0] ) : '';
		$button_two_target = isset( $values['button_two_target'] ) ? esc_attr( $values['button_two_target'][0] ) : '';
		wp_nonce_field( 'slide_meta_box_nonce', 'meta_box_nonce_slide' );
		?>
<table style="width:100%;" class="form-table">
	<tr>
		<td colspan="2">
            <p>Please fill additional fields for slide.</p>
			<hr>
    </td>
	</tr>
	 <tr>
      <th style="width:25%"><label for="styling"><strong><?php _e('Styling','mi-carousel-slider');?></strong>
				<span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">
					<?php _e('Example:Text for slide right, center or left.','mi-carousel-slider'); ?></span></label></th>
    <td>
     <select name="styling" id="styling" style="width:70%; margin-right:4%;">
    
     <option value="none" <?php if($styling=='none'){echo 'selected';} ?>>Hide Content</option>
         <option value="left" <?php if($styling=='left'){echo 'selected';} ?>>Left</option>
         <option value="center" <?php if($styling=='center'){echo 'selected';} ?>>Center</option>
         <option value="right" <?php if($styling=='right'){echo 'selected';} ?>>Right</option>
     </select>

      </td>
  </tr>
	<tr>
      <th style="width:25%"><label for="sub_title"><strong><?php _e('Sub Title','mi-carousel-slider');?></strong>
				<span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">
					<?php _e('Example: Sub Title','mi-carousel-slider'); ?></span></label></th>
    <td> <input type="text" name="sub_title" id="sub_title" style="width:70%; margin-right:4%;" value="<?php echo trim($sub_title); ?>">
      </td>
  </tr>
  <tr>
      <th style="width:25%"><label for="caption"><strong><?php _e('Caption','mi-carousel-slider');?></strong>
				<span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">
					<?php _e('Example:Caption for slide (HTML tags are allowed).','mi-carousel-slider'); ?></span></label></th>
     <td>
    <div style="clear:both;"></div>
   <?php  wp_editor( trim($caption), 'caption', array( 'wpautop'=>true,'media_buttons' => false,'textarea_rows'=>5,'teeny'=>true,'dfw'=>true,'tinymce'=>true ) );?>
      </td>
  </tr>
  <tr>
       <th style="width:25%"><label for="button_one_url"><strong><?php _e('Button One URL','mi-carousel-slider');?></strong>
				 <span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">
					 <?php _e('Example:Input the slide Button One URL (can be external).','mi-carousel-slider'); ?></span></label></th>
    <td><input type="url" name="button_one_url" id="button_one_url" value="<?php echo $button_one_url; ?>" style="width:70%; margin-right:4%;" />
     </td>
  </tr>
	<tr>
	 <th style="width:25%"><label for="button_one_text"><strong><?php _e('Button One Text','mi-carousel-slider');?></strong>
				 <span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">
					 <?php _e('Example:Set the slide Button One text.','mi-carousel-slider'); ?></span></label></th>
		<td><input type="text" name="button_one_text" id="button_text" value="<?php echo $button_one_text; ?>" style="width:70%; margin-right:4%;" />
		 </td>
	</tr>
	<tr>
	 <th style="width:25%"><label for="button_one_target"><strong><?php _e('Button One Target','mi-carousel-slider');?></strong>
				 <span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">
					 <?php _e('Example: `parent`,`self`,`blank`','mi-carousel-slider'); ?></span></label></th>
		<td>
        <select name="button_one_target" id="button_one_target" style="width:70%; margin-right:4%;">
    
     <option value="_blank" <?php if($button_one_target=='_blank'){echo 'selected';} ?>>Blank</option>
         <option value="_self" <?php if($button_one_target=='_self'){echo 'selected';} ?>>Self</option>
         <option value="_parent" <?php if($button_one_target=='_parent'){echo 'selected';} ?>>Parent</option>
         <option value="_top" <?php if($button_one_target=='_top'){echo 'selected';} ?>>Top</option>
     </select>
		 </td>
	</tr>
  <tr>
       <th style="width:25%"><label for="button_two_url"><strong><?php _e('Button Two URL','mi-carousel-slider');?></strong>
				 <span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">
					 <?php _e('Example:Input the slide Button Two URL (can be external).','mi-carousel-slider'); ?></span></label></th>
    <td><input type="url" name="button_two_url" id="button_two_url" value="<?php echo $button_two_url; ?>" style="width:70%; margin-right:4%;" />
     </td>
  </tr>
	<tr>
	 <th style="width:25%"><label for="button_two_text"><strong><?php _e('Button Two Text','mi-carousel-slider');?></strong>
				 <span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">
					 <?php _e('Example:Set the slide Button Two text.','mi-carousel-slider'); ?></span></label></th>
		<td><input type="text" name="button_two_text" id="button_two_text" value="<?php echo $button_two_text; ?>" style="width:70%; margin-right:4%;" />
		 </td>
	</tr>
	<tr>
	 <th style="width:25%"><label for="button_two_target"><strong><?php _e('Button Two Target','mi-carousel-slider');?></strong>
				 <span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">
					 <?php _e(' `parent`,`self`,`blank`','mi-carousel-slider'); ?></span></label></th>
		<td>
        <select name="button_two_target" id="button_two_target" style="width:70%; margin-right:4%;">
    
     <option value="_blank" <?php if($button_two_target=='_blank'){echo 'selected';} ?>>Blank</option>
         <option value="_self" <?php if($button_two_target=='_self'){echo 'selected';} ?>>Self</option>
         <option value="_parent" <?php if($button_two_target=='_parent'){echo 'selected';} ?>>Parent</option>
         <option value="_top" <?php if($button_two_target=='_top'){echo 'selected';} ?>>Top</option>
     </select>
		 </td>
	</tr>
</table>
<?php
	}
add_action( 'save_post', 'slide_meta_box_save' );

	function slide_meta_box_save( $post_id )
	{

	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

		if( !isset( $_POST['meta_box_nonce_slide'] ) || !wp_verify_nonce( $_POST['meta_box_nonce_slide'], 'slide_meta_box_nonce' ) ) return;

		if( !current_user_can( 'edit_post' ) ) return;

		if( isset( $_POST['styling'] ) )
			update_post_meta( $post_id, 'styling', $_POST['styling']  );	
		if( isset( $_POST['sub_title'] ) )
            update_post_meta( $post_id, 'sub_title', $_POST['sub_title']  );
        if( isset( $_POST['caption'] ) )
			update_post_meta( $post_id, 'caption', $_POST['caption'] );
		if( isset( $_POST['button_one_url'] ) )
			update_post_meta( $post_id, 'button_one_url', $_POST['button_one_url']  );
		if( isset( $_POST['button_one_text'] ) )
			update_post_meta( $post_id, 'button_one_text', $_POST['button_one_text']  );
		if( isset( $_POST['button_one_target'] ) )
			update_post_meta( $post_id, 'button_one_target', $_POST['button_one_target']  );
		if( isset( $_POST['button_two_url'] ) )
			update_post_meta( $post_id, 'button_two_url', $_POST['button_two_url']  );
		if( isset( $_POST['button_two_text'] ) )
			update_post_meta( $post_id, 'button_two_text', $_POST['button_two_text']  );
		if( isset( $_POST['button_two_target'] ) )
			update_post_meta( $post_id, 'button_two_target', $_POST['button_two_target']  );
        

}


/*-----------------------------------------------------------------------------------*/
/*	Add Metabox to Slider Title Setting
/*-----------------------------------------------------------------------------------*/

add_action( 'add_meta_boxes', 'slide_meta_box_add_title' );

function slide_meta_box_add_title()
{
	add_meta_box( 'slide-meta-box-settings', __('MI Slide Title', 'mi-carousel-slider'), 'slide_meta_box_title', 'mi_slides', 'normal', 'high' );
}
function slide_meta_box_title( $post )
{
	$values = get_post_custom( $post->ID );
	#$caption = isset( $values['caption'] ) ? esc_attr( $values['caption'][0] ) : '';
	#$sub_title = isset( $values['sub_title'] ) ? esc_attr( $values['sub_title'][0] ) : '';
	#$url = isset( $values['url'] ) ? esc_attr( $values['url'][0] ) : '';
	#$styling = isset( $values['styling'] ) ? esc_attr( $values['styling'][0] ) : '';
	wp_nonce_field( 'slide_meta_box_nonce_title', 'meta_box_nonce_slide_title' );
?>
<table style="width:100%;" class="form-table">
<tr>

<th style="width:25%"><label for="font_color"><strong><?php _e('Font Color','mi-carousel-slider');?></strong>
</label></th>
<td>
	<input type='text' name="font_color" value="" style="width:70%; margin-right:4%;" value="<?php //echo trim($sub_title); ?>" />
</td>
<th style="width:25%"><label for="font_size"><strong><?php _e('Font size (px)','mi-carousel-slider');?></strong>
	</label></th>
<td> 	<input type='text' name="font_size" value="" style="width:70%; margin-right:4%;" value="<?php //echo trim($sub_title); ?>" />
</td>

</tr>
<tr>
	<th style="width:25%"><label for="line_height"><strong><?php _e('Line Height (px)','mi-carousel-slider');?></strong>
		</label></th>
<td> 	<input type='text' name="line_height" value="" style="width:70%; margin-right:4%;" value="<?php //echo trim($sub_title); ?>" />
	</td>
	<th style="width:25%"><label for="letter_spacing"><strong><?php _e('Letter Spacing (px)','mi-carousel-slider');?></strong>
		</label></th>
<td> 	<input type='text' name="letter_spacing" value="" style="width:70%; margin-right:4%;" value="<?php //echo trim($sub_title); ?>" />
	</td>
</tr>
<tr>
	<td colspan="4">
					<h5>Title Style</h5>
		<hr>
	</td>
</tr>
</table>
<?php
	}
add_action( 'save_post', 'slide_meta_box_save_title' );

	function slide_meta_box_save_title( $post_id )
	{

	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

		if( !isset( $_POST['meta_box_nonce_slide_title'] ) || !wp_verify_nonce( $_POST['meta_box_nonce_slide_title'], 'slide_meta_box_nonce_title' ) ) return;

		if( !current_user_can( 'edit_post' ) ) return;

			if( isset( $_POST['caption'] ) )
			update_post_meta( $post_id, 'caption', $_POST['caption'] );
		if( isset( $_POST['sub_title'] ) )
			update_post_meta( $post_id, 'sub_title', $_POST['sub_title']  );
			if( isset( $_POST['url'] ) )
				update_post_meta( $post_id, 'url', $_POST['url']  );
        if( isset( $_POST['styling'] ) )
			update_post_meta( $post_id, 'styling', $_POST['styling']  );

}

