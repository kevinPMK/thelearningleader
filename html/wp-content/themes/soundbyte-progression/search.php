<?php
/**
 * The template for displaying search results pages.
 *
 * @package pro
 */

get_header(); ?>


	<div id="soundbyte-page-title">
		<div class="width-container-progression">
			<?php if(function_exists('bcn_display')) { echo '<div id="bread-crumb-container"><div class="breadcrumbs-soundbyte"><ul id="breadcrumbs-pro"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html_e( 'Home', 'soundbyte-progression' );  echo '</a></li>'; bcn_display_list(); echo '</ul><div class="clearfix-progression"></div></div></div>'; }?>
			<h2><?php esc_html_e( 'Search Results For:', 'soundbyte-progression' ); ?></h2>
			<h1 id="page-title" class="entry-title-pro"><?php printf( '<span>' . get_search_query() . '</span>' ); ?></h1>
		</div>
	</div><!-- #page-title-pro -->


	<div id="content-pro" class="site-content">
		<div class="width-container-progression<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?><?php endif; ?>">

			<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?>
			<?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'right-sidebar' ) : ?><div id="soundbyte-sidebar-container"><?php endif; ?>
			<?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?><div id="soundbyte-sidebar-container"><?php endif; ?>
			<?php endif; ?>

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
					<?php endwhile; ?>
					<?php show_pagination_links_pro( ); ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>

			<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?>
			<?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'right-sidebar' ) : ?></div><!-- close #soundbyte-sidebar-container --><?php get_sidebar(); ?><?php endif; ?>
			<?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?></div><!-- close #soundbyte-sidebar-container --><?php get_sidebar(); ?><?php endif; ?>
			<?php endif; ?>

		<div class="clearfix-progression"></div>
	</div><!-- close .width-container-progression -->
	</div><!-- #content-pro -->
<?php get_footer(); ?>
