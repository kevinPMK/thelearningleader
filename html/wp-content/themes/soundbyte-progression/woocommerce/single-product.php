<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php $your_shop_page = get_post( wc_get_page_id( 'shop' ) ); ?>
	<?php if(get_post_meta($your_shop_page->ID, 'progression_page_title', true) == 'hide' ) : ?><?php else: ?><?php if(get_post_meta($your_shop_page->ID, 'progression_page_title', true) == 'slider' ) : ?><?php else: ?>
		<div id="soundbyte-page-title">
			<div class="width-container-progression">
				<?php if(function_exists('bcn_display')) { echo '<div id="bread-crumb-container"><div class="breadcrumbs-soundbyte"><ul id="breadcrumbs-pro"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html_e( 'Home', 'soundbyte-progression' );  echo '</a></li>'; bcn_display_list(); echo '</ul><div class="clearfix-progression"></div></div></div>'; }?>
				<h1 id="page-title" class="entry-title-pro"><?php woocommerce_page_title(); ?></h1>
				<?php if(get_post_meta($your_shop_page->ID, 'progression_sub_title', true)) : ?><h2><?php echo esc_html( get_post_meta($your_shop_page->ID, 'progression_sub_title', true) );?></h2><?php endif; ?>
			</div>
		</div><!-- #page-title-pro -->
	<?php endif; ?><?php endif; ?>

	<div id="content-pro">
		<div class="width-container-progression<?php if(get_post_meta($your_shop_page->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?>">

		<?php if(get_post_meta($your_shop_page->ID, 'progression_page_sidebar', true) == 'right-sidebar' ) : ?><div id="soundbyte-sidebar-container"><?php endif; ?>
		<?php if(get_post_meta($your_shop_page->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?><div id="soundbyte-sidebar-container"><?php endif; ?>

	<?php do_action( 'woocommerce_before_main_content' );	?>


		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php do_action( 'woocommerce_after_main_content' ); ?>

	<?php if(get_post_meta($your_shop_page->ID, 'progression_page_sidebar', true) == 'right-sidebar' ) : ?></div><!-- close #soundbyte-sidebar-container --><?php do_action( 'woocommerce_sidebar' );?><div class="clearfix-progression"></div><?php endif; ?>
	<?php if(get_post_meta($your_shop_page->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?></div><!-- close #soundbyte-sidebar-container --><?php do_action( 'woocommerce_sidebar' );?><div class="clearfix-progression"></div><?php endif; ?>

		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->

<?php get_footer( 'shop' ); ?>
