	<?php

	$slider_count = get_theme_mod('slider_count_pro', '2');

	$slider_pro = new WP_Query(array(
	    'post_type'      => 'episode',
	    'posts_per_page' => $slider_count,
   	 	'meta_query'=>array(
   	 		'relation'=>'or',
   	 		array(
   	 		    'key'=>'pro_slider_checkbox',
   	 		    'value'=>1,
   	 		    'compare' => '='
   	 		))
	));
	?>
		<div id="progression-home-slider">
			<div id="progression-home-border">
				<div id="homepage-slider" class="flexslider">
					<ul class="slides">
						<?php while ( $slider_pro->have_posts() ) : $slider_pro->the_post(); ?>
							<?php if((has_post_thumbnail()) || (get_post_meta($post->ID, 'progression_header_image_episode', true))): ?>
								<li>
									<?php if(get_post_meta($post->ID, 'progression_header_image_episode', true)) : ?>
										<?php $gallery_pro = get_post_meta( $post->ID, 'progression_header_image_episode', false ); foreach ( $gallery_pro as $single_gallery_img ) ?>
										<?php $image = wp_get_attachment_image( $single_gallery_img, 'progression-episode-page-title');?>
										<?php echo $image;?>
									<?php elseif(has_post_thumbnail()) : ?>
											<?php the_post_thumbnail( 'progression-episode-page-title' );?>
									<?php endif;?>
									<div class="caption-progression">
									   <div class="width-container-progression">
											<div class="grid2column-progression">
												<div class="soundbyte-headline">
												    <?php if(get_post_meta($post->ID, 'slider_main_title', true)) : ?>
														<?php $content_progression_title = get_post_meta($post->ID, 'slider_main_title', true);?>
														<?php echo pro_sanitize_code($content_progression_title);?>
													<?php endif;?>
												</div>

												<div class="progression-button-icons">
												<?php if(get_post_meta($post->ID, 'pro_slider_button_link', true)) : ?><a class="progression-button" href="<?php echo esc_url(get_post_meta($post->ID, 'pro_slider_button_link', true));?>"><?php echo esc_attr(get_post_meta($post->ID, 'pro_slider_button_text', true));?></a><?php endif;?>
												<?php if(get_post_meta($post->ID, 'slider_main_left_subtitle', true)) : ?><?php $content_progression_icons = get_post_meta($post->ID, 'slider_main_left_subtitle', true);?><?php echo pro_sanitize_code($content_progression_icons);?><?php endif;?>
												</div>
											</div>

											<div class="grid2column-progression lastcolumn-progression">
												<div>
													<div class="soundbyte-divider-progression"></div>
													<div class="clearfix-progression"></div>
													<div class="slider-progression-soundbyte-podcast-title">
														<div class="alignleft"><?php $terms = get_the_terms( $post->ID , 'episode_type' );
															if ($terms) {
																foreach ( $terms as $term ) {
																$term_link = get_term_link( $term, 'episode_type' );
																if( is_wp_error( $term_link ) )
																continue;
																echo '<div>' . $term->name .'<span>,</span> </div>';
																}
															}?>
														</div>
											            <?php if(get_post_meta($post->ID, 'pro_time_text', true)): ?><div class="alignright"><i class="fa fa-clock-o"></i><?php echo esc_attr(get_post_meta($post->ID, 'pro_time_text', true));?></div><?php endif;?>
											            <div class="clearfix-progression"></div>
													</div>
													<div class="clearfix-progression"></div>
													<div class="slider-progression-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
													<?php echo esc_attr(get_the_date('F d, Y'));?><br />
													<a href="<?php the_permalink();?>" class="slider-play-progression"><?php echo esc_attr_e('Read More', 'soundbyte-progression');?> <i class="fa fa-arrow-right"></i></a>
													<div class="clearfix-progression"></div>
													<?php if(get_post_meta($post->ID, 'pro_slider_extra_text', true)):?><p class="progression-slider-desc"><?php echo esc_attr(get_post_meta($post->ID, 'pro_slider_extra_text', true));?></p><?php endif;?>
												</div>
											</div>
											<div class="clearfix-progression"></div>
										</div>
									</div>
									<?php if(get_post_meta($post->ID, 'page_title_audioplayer_file', true)):?>
										<div class="slider-player-progression">
											<div class="slider-player-container">
												<?php $audio_file_pro = get_post_meta( get_the_id(), 'page_title_audioplayer_file', false ); foreach ( $audio_file_pro as $audio ) : ?><?php $audio_link_pro =  wp_get_attachment_url($audio);?><?php endforeach;?>
												<?php echo do_shortcode('[audio mp3="' . esc_url($audio_link_pro) . '" preload="auto"][/audio]');?>
											</div>
										</div>
									<?php endif;?>
									<?php if(!get_post_meta($post->ID, 'page_title_audioplayer_file', true) && (get_post_meta($post->ID, 'page_title_audioplayer_embed', true) != '' )):?>
										<div class="slider-embed-progression">		
											<?php echo do_shortcode(get_post_meta($post->ID, 'page_title_audioplayer_embed', true));?>
										</div>	
									<?php endif;?>										
								</li>
							<?php endif; ?>
						<?php endwhile; // end of the loop. ?>
					</ul>
				</div><!-- close .flexslider -->
		</div><!-- close #carousel-container -->
	</div>
<?php wp_reset_query(); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {
	 'use strict';
    $('#progression-home-slider .flexslider').flexslider({
		animation: "<?php echo esc_attr(get_theme_mod('slider_transition_pro', 'fade')); ?>",
		slideDirection: "horizontal",
		slideshow: <?php echo esc_attr(get_theme_mod('slider_autoplay_pro', 'false')); ?>,
		slideshowSpeed: <?php echo esc_attr(get_theme_mod('slider_autoplay_time_pro', '7000')); ?>,
		animationDuration: 200,
		directionNav:  <?php echo esc_attr(get_theme_mod('slider_next_prev_pro', 'true')); ?>,
		controlNav:  <?php echo esc_attr(get_theme_mod('slider_bullet_pro', 'true')); ?>,
		keyboard: true,
    });
});
</script>
