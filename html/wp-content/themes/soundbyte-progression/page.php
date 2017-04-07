<?php

/**
 *
 * @package pro
 * @since pro 1.0
 */

get_header(); ?>


	<?php if(get_post_meta($post->ID, 'progression_page_title', true) == 'slider' ) : ?>
		<?php include( get_template_directory() . '/header/slider.php'); ?>
	<?php elseif(get_post_meta($post->ID, 'progression_page_title', true) == 'hide' ) : ?>
	<?php else: ?>
	<div id="soundbyte-page-title">
		<div class="width-container-progression">
			<?php if(function_exists('bcn_display')) { echo '<div id="bread-crumb-container"><div class="breadcrumbs-soundbyte"><ul id="breadcrumbs-pro"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html_e( 'Home', 'soundbyte-progression' );  echo '</a></li>'; bcn_display_list(); echo '</ul><div class="clearfix-progression"></div></div></div>'; }?>
			<?php the_title( '<h1 id="page-title" class="entry-title-pro">', '</h1>' ); ?>
			<?php if(get_post_meta($post->ID, 'progression_sub_title', true)) : ?><h2><?php echo esc_html( get_post_meta($post->ID, 'progression_sub_title', true) );?></h2><?php endif; ?>
		</div>
	</div><!-- #page-title-pro -->
	<?php endif; ?>


	<div id="content-pro"<?php if(get_post_meta($post->ID, 'progression_page_title', true) == 'hide' ) : ?> class="no-padding-pro"<?php endif; ?>>
		<div class="width-container-progression<?php if(get_post_meta($post->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?>">

			<?php if(get_post_meta($post->ID, 'progression_page_sidebar', true) == 'right-sidebar' ) : ?><div id="soundbyte-sidebar-container"><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?><div id="soundbyte-sidebar-container"><?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; ?>

			<?php if(get_post_meta($post->ID, 'progression_page_sidebar', true) == 'right-sidebar' ) : ?></div><!-- close #soundbyte-sidebar-container --><?php get_sidebar(); ?><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?></div><!-- close #soundbyte-sidebar-container --><?php get_sidebar(); ?><?php endif; ?>

		<div class="clearfix-progression"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->

<?php get_footer(); ?>
