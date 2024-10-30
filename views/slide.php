<?php 
$term =  get_term_by('slug', $category, 'mi_carousels');
$t_id = $term->term_id;
$term_meta = get_option( "taxonomy_$t_id" );
$mi_mode = @$term_meta['mi_carousels_mode'];
$mi_speed = @$term_meta['mi_carousels_slide_speed'];
$mi_random = ((@$term_meta["mi_carousels_slide_random"]==='1')?'true':'false');
$mi_loop = ((@$term_meta["mi_carousels_slide_loop"]==='1')?'true':'false');
$mi_hideControlOn = ((@$term_meta["mi_carousels_hide_control_on_end"]==='1')?'true':'false');
$mi_easing = ((@$term_meta["mi_carousels_slide_easing"]==='1')?'true':'false');

?>

<div class="slider" id="mi-carousel-<?php echo uniqid() ?>" data-category="<?php echo $category;?>" data-mi-mode="<?php echo $mi_mode;?>" data-mi-speed="<?php echo $mi_speed;?>" data-mi-easing="<?php echo $mi_easing;?>" data-mi-random="<?php echo $mi_random;?>" data-mi-loop="<?php echo $mi_loop;?>" data-mi-margin="0" data-mi-captions="false" data-mi-responsive="true" data-mi-touchenabled="true"  data-mi-onetoonetouch="true" data-mi-ticker="false" data-mi-video="false"  data-mi-pager="true" data-mi-pagertype="full" data-mi-controls="true" data-mi-hideControlOn="<?php echo $mi_hideControlOn;?>">
<?php 
if( $mi_carousel_loop->have_posts() ) :  
while ( $mi_carousel_loop -> have_posts() ) : $mi_carousel_loop -> the_post();
  if(  has_term($category, 'mi_carousels') ) :
    $image_id = get_post_thumbnail_id();
    $featured_image = wp_get_attachment_image_src( $image_id,'slider-img' );
  ?>

<div <?php post_class('mi-item');?>  id="mi-carousel-<?php the_ID(); ?>">
                <img src="<?php echo $featured_image[0]; ?>" title="<?php the_title_attribute(); ?>" />
           <div class="mi-caption mi-text-<?php if((get_post_meta($post->ID,'styling',true)=='left')){ echo 'left ';}elseif((get_post_meta($post->ID,'styling',true)=='center')){echo 'center';}elseif((get_post_meta($post->ID,'styling',true)=='right')){echo 'right';}elseif((get_post_meta($post->ID,'styling',true)=='none')){echo 'none';}?>">
               <?php the_title('<h2>','</h2>');?>
               <?php echo ((get_post_meta($post->ID,'sub_title',true)!='')?'<h5>'.get_post_meta($post->ID,'sub_title',true).'</h5>':'')?>
               <?php echo get_post_meta($post->ID,'caption',true); ?>
               <div class="mi-carousel-slide-buttons">
               <?php if(get_post_meta($post->ID,'button_one_text',true)!=''):?>
                <a href="<?php echo (get_post_meta($post->ID,'button_one_url',true)!=''?get_post_meta($post->ID,'button_one_url',true):''); ?>" class="mi-btn-one" target="<?php if((get_post_meta($post->ID,'button_one_target',true)=='_blank')){ echo '_blank';}elseif((get_post_meta($post->ID,'button_one_target',true)=='_self')){echo '_self';}elseif((get_post_meta($post->ID,'button_one_target',true)=='_parent')){echo '_parent';}elseif((get_post_meta($post->ID,'button_one_target',true)=='_top')){echo '_top';}else{echo'_self';}?>"> <?php echo get_post_meta($post->ID,'button_one_text',true);?></a>
  <?php endif;?>
  <?php if(get_post_meta($post->ID,'button_two_text',true)!=''):?>
                <a href="<?php echo (get_post_meta($post->ID,'button_two_url',true)!=''?get_post_meta($post->ID,'button_two_url',true):''); ?>" class="mi-btn-two" target="<?php if((get_post_meta($post->ID,'button_two_target',true)=='_blank')){ echo '_blank';}elseif((get_post_meta($post->ID,'button_two_target',true)=='_self')){echo '_self';}elseif((get_post_meta($post->ID,'button_two_target',true)=='_parent')){echo '_parent';}elseif((get_post_meta($post->ID,'button_two_target',true)=='_top')){echo '_top';}else{echo'_self';}?>"> <span><?php echo get_post_meta($post->ID,'button_two_text',true);?></span></a>
                <?php endif;?>  
            </div>
           </div>
        
        </div>

<?php
endif;
endwhile;
endif;
wp_reset_query(); 
?>
</div>
