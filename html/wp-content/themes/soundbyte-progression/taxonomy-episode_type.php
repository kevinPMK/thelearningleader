<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package pro
 */

get_header(); ?>

	<div id="soundbyte-page-title">
		<div class="width-container-progression">
			<?php if(function_exists('bcn_display')) { echo '<div id="bread-crumb-container"><div class="breadcrumbs-soundbyte"><ul id="breadcrumbs-pro"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html_e( 'Home', 'soundbyte-progression' );  echo '</a></li>'; bcn_display_list(); echo '</ul><div class="clearfix-progression"></div></div></div>'; }?>
			<?php the_archive_title( '<h1 id="page-title" class="entry-title-pro">', '</h1>'  ); ?>
			<?php the_archive_description( '<h2 class="entry-sub-title-pro">', '</h2>' ); ?>
		</div>
	</div><!-- #page-title-pro -->



	<div id="content-pro" class="site-content">
		<div class="width-container-progression">
			<div class="episode-pro-vc">
			    <div id="gallery-index-progression">
			        <div class="iso-container-pro isotope-2-columns-progression">
			            <div class="isotope">
							<?php $count = 1;
							if ( have_posts() ) : ?>
								<?php while ( have_posts() ) : the_post(); ?>
			    					<div class="isotope-item <?php $terms = get_the_terms( $post->ID , 'episode_type' );
										if($terms) {	
											foreach ( $terms as $term ) {
												$term_link = get_term_link( $term, 'episode_type' );
												if( is_wp_error( $term_link ) )
												continue;
												echo $term->slug .' ';
											}
										}?> <?php echo 'init'; ?>">
			    						<?php include(locate_template('template-parts/content-episode.php')); ?>
			    					</div><!-- close episode post -->
			    				<?php  $count ++;  endwhile; // end of the loop. ?>
							<?php endif;?>
			    	        <div class="clearfix-pro"></div>
			            </div>
			        <div class="clearfix-pro"></div>
			        </div>
			    </div>

		        <?php // infinite_content_nav_pro_home('nav-below');?>
				<div class="clearfix-pro"></div>


			</div><!-- close .episode-pro-vc -->
		<div class="clearfix-progression"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
<?php get_footer(); ?>
