<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
	<?php $your_shop_page = get_post( wc_get_page_id( 'shop' ) ); ?>



	<div id="single-product-container-pro">
			<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php do_action( 'woocommerce_before_single_product' );
					 if ( post_password_required() ) {
					 	echo get_the_password_form();
					 	return;
					 }
				?>

				<?php do_action( 'woocommerce_before_single_product_summary' ); ?>

				<div class="summary entry-summary">
					<?php do_action( 'woocommerce_single_product_summary' ); ?>
					<meta itemprop="url" content="<?php the_permalink(); ?>" />
				</div><!-- .summary -->

			<div class="clearfix-progression"></div>
			</div>
	</div><!-- close #single-product-container-pro -->





	<div id="content-product-pro">

		<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" <?php post_class(); ?>>

			<?php do_action( 'woocommerce_before_main_content' );	?>

			<?php do_action( 'woocommerce_after_single_product_summary' ); ?>

			<?php do_action( 'woocommerce_after_single_product' ); ?>

			<?php do_action( 'woocommerce_after_main_content' ); ?>

		</div>

	</div><!-- #content-pro -->
