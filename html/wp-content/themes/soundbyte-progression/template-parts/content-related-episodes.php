<?php
/**
 * @package pro
 */
?>
		<?php if ( 'episode' == get_post_type() ) : ?>
		<?php // You might need to use wp_reset_query();
		global $post;
		$categories = get_the_terms($post->ID, 'episode_type');
		$category_ids = array();
		if ($categories) {foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;}
		$args=array(
		'post_type'    => 'episode',
		//'category__in' => $category_ids,
		'post__not_in' => array($post->ID),
		'posts_per_page'=> 3, // Number of related posts that will be displayed.
		'tax_query' => array(
				// Note: tax_query expects an array of arrays!
				array(
					'taxonomy' => 'episode_type', //
					'field'    => 'id',
					'terms'    => $category_ids
				)
		 ),
		'orderby'=>'rand' // Randomize the posts
		);
		$rel_query = new WP_Query( $args ); if( $rel_query->have_posts() ) :
		?>
		<div id="previous-episodes-soundbyte">
            <h5 class="related-heading-posts-pro"><?php esc_html_e( 'Related Episodes', 'soundbyte-progression' ); ?></h5>
                <?php  while ( $rel_query->have_posts() ) : $rel_query->the_post(); ?>
                <div class="episode-previous-progression">
					<div class="grid2column-progression">
						<a href="<?php the_permalink();?>">
							<?php if(has_post_thumbnail()) : ?>
								<?php the_post_thumbnail( 'progression-episode-archive' );?>
							<?php elseif(get_post_meta($post->ID, 'progression_header_image_episode', true)) : ?>
								<?php $gallery_pro = get_post_meta( $post->ID, 'progression_header_image_episode', false ); foreach ( $gallery_pro as $single_gallery_img ) ?>
								<?php $image = wp_get_attachment_image( $single_gallery_img, 'progression-episode-archive');?>
								<?php echo $image;?>

							<?php else : ?>
								<img src="<?php echo get_template_directory_uri() . '/images/episode-placeholder.jpg'; ?>" alt="<?php bloginfo('name'); ?>"/>
							<?php endif; ?>
						</a>
					</div>
					<div class="grid2column-progression lastcolumn-progression">
						<div class="isotope-index-text">
							<a href="<?php the_permalink();?>">
								<div class="soundbyte-divider-progression"></div>
								<div class="clearfix-progression"></div>
								<div class="soundbyte-podcast-progression-meta">
									<div class="alignleft"><?php $terms = get_the_terms( $post->ID , 'episode_type' );
										if($terms) {
											foreach ( $terms as $term ) {
												$term_link = get_term_link( $term, 'episode_type' );
												if( is_wp_error( $term_link ) )
												continue;
												echo '<div>' . $term->name .'<span>,</span> </div>';
											}
										}?></div>
									<?php if(get_post_meta($post->ID, 'pro_time_text', true)): ?><div class="alignright"><i class="fa fa-clock-o"></i><?php echo esc_attr(get_post_meta($post->ID, 'pro_time_text', true));?></div><?php endif;?>
									<div class="clearfix-progression"></div>
								</div>
								<h2 class="soundbyte-podcast-progression-title"><?php the_title();?></h2>
						        <div class="soundbyte-podcast-date-progression"><?php echo esc_attr(get_the_date('F d, Y'));?></div>
							</a>
							<a href="<?php the_permalink();?>" class="soundbyte-podcast-play-progression"><?php esc_attr_e('Read More', 'soundbyte-progression');?> <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
					<div class="clearfix-progression"></div>
                </div>
                <?php endwhile; ?>
            <div class="clearfix-pro"></div>
			</div><!-- #related-posts-pro -->
			<?php endif; wp_reset_query();  ?>
			<?php endif; ?>
