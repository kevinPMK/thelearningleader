<?php
/**
 * @package pro
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-container-progression">
		<?php if(has_post_thumbnail()): ?>
			<div class="featured-blog-progression"><?php if(get_post_meta($post->ID, 'pro_external_link', true)): ?><a href="<?php echo esc_url( get_post_meta($post->ID, 'pro_external_link', true) );?>"><?php else: ?><a href="<?php the_permalink(); ?>"><?php endif; ?><?php the_post_thumbnail('progression-blog'); ?></a></div>
			<?php else: ?>
				<?php if(get_post_meta($post->ID, 'pro_gallery', true) ): ?>
					<div class="featured-blog-progression">
						<div class="flexslider gallery-progression">
				      		<ul class="slides">
								<?php $gallery_pro = get_post_meta( get_the_id(), 'pro_gallery', false ); foreach ( $gallery_pro as $single_gallery_img ) ?>
								<?php if($gallery_pro):  foreach($gallery_pro as $single_gallery_img): ?>
									<?php $image = wp_get_attachment_image_src($single_gallery_img, 'progression-blog'); ?>
									<li>
										<?php if(get_post_meta($post->ID, 'pro_external_link', true)): ?><a href="<?php echo esc_url( get_post_meta($post->ID, 'pro_external_link', true) );?>"><?php else: ?><a href="<?php the_permalink(); ?>"><?php endif; ?><img src="<?php echo esc_attr($image[0]);?>" alt="<?php echo esc_html_e('Photo', 'soundbyte-progression');?>"></a>
									</li>
								<?php endforeach; endif; ?>
							</ul>
						</div><!-- close .flexslider -->
					</div>
				<?php else: ?>
					<?php if(get_post_meta($post->ID, 'pro_video_post', true)): ?>
						<div class="featured-blog-progression"><?php echo apply_filters('the_content', get_post_meta($post->ID, 'pro_video_post', true)); ?></div>
					<?php endif; ?>
				<?php endif; ?>
		<?php endif; ?>

		<div class="clearfix-progression"></div>
		<div class="grid2column-progression">
	        <div class="soundbyte-divider-progression"></div>
	        <div class="category-meta-progression"><?php the_category(', '); ?></div>
	        <h2 class="blog-title-progression">
	            <?php if(get_post_meta($post->ID, 'pro_external_link', true)): ?><a href="<?php echo esc_url( get_post_meta($post->ID, 'pro_external_link', true) );?>"><?php else: ?><a href="<?php the_permalink(); ?>"><?php endif; ?><?php the_title(); ?></a>
	        </h2>
			<?php if ( 'post' == get_post_type() ) : ?>
		        <div class="post-meta-progression">
		            <span class="soundbyte-date-progression"><a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php the_time(get_option('date_format')); ?></a></span>
		            <span class="author-meta-progression"><?php esc_attr_e('By', 'soundbyte-progression');?> <?php the_author_posts_link(); ?></span>
		            <span class="meta-comments-progression"><?php comments_popup_link( '' . esc_html__( 'No Comments', 'soundbyte-progression' ) . '', esc_html__( '1 Comment', 'soundbyte-progression' ), esc_html__( '% Comments', 'soundbyte-progression' ) ); ?></span>
		            <div class="clearfix-progression"></div>
		        </div>
			<?php endif; ?>
	    </div>
	    <div class="grid2column-progression lastcolumn-progression">
			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="summary-post-progression">
		            <?php the_content( sprintf( wp_kses( __( 'Continue reading', 'soundbyte-progression' ), array( 'span' => array( 'class' => array() ) ) ), the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) ); ?>
		        </div>
			<?php endif;?>
	        <div class="clearfix-progression"></div>
	    </div>
	    <div class="clearfix-progression"></div>


		<?php wp_link_pages( array(
				'before' => '<div class="page-nav-progression">' . esc_html__( 'Pages:', 'soundbyte-progression' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>


	<?php if ( is_sticky() && is_home() && ! is_paged() ) { printf( '<div class="sticky-post-progression">%s</div>', esc_html__( 'Featured', 'soundbyte-progression' ) ); } ?>
	<div class="clearfix-progression"></div>
	</div>
</article><!-- #post-## -->
