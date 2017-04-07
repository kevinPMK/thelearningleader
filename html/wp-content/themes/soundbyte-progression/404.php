<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package pro
 */

get_header(); ?>


	<div id="soundbyte-page-title">
		<div class="width-container-progression">
			<?php if(function_exists('bcn_display')) { echo '<div id="bread-crumb-container"><div class="breadcrumbs-soundbyte"><ul id="breadcrumbs-pro"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html_e( 'Home', 'soundbyte-progression' );  echo '</a></li>'; bcn_display_list(); echo '</ul><div class="clearfix-progression"></div></div></div>'; }?>
			<h1 id="page-title" class="entry-title-pro"><?php esc_html_e( '404 Error', 'soundbyte-progression' ); ?></h1>
			<h2><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'soundbyte-progression' ); ?></h2>
		</div>
	</div><!-- #page-title-pro -->

	<div id="content-pro">
		<div class="width-container-progression">

			<br>
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links in the navigation or a search?', 'soundbyte-progression' ); ?></p>
			<?php get_search_form(); ?>
			<br>

		<div class="clearfix-progression"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->

<?php get_footer(); ?>
