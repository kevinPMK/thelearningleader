<?php
/**
 * WooCommerce Functions
 *
 */

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {  add_theme_support( 'woocommerce' ); }


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);



// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {

	function loop_columns() {
		$col_count_progression = esc_attr( get_theme_mod('woocommerce_columns_pro', '2') );
		return $col_count_progression; // 3 products per row
	}
}


// Display 24 products per page. Goes in functions.php
$post_count_pro = esc_attr( get_theme_mod('woocommerce_post_count_pro', '12') );
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . $post_count_pro . ';' ), 20 );



if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
	/**
	 * Show the product title in the product loop. By default this is an H3.
	 */
	function woocommerce_template_loop_product_title() {
		echo '<h3>' . get_the_title() . '</h3>';
	}
}

add_filter( 'woocommerce_output_related_products_args', 'pro_related_products_args' );
  function pro_related_products_args( $args ) {
	  $col_count_progression = esc_attr( get_theme_mod('woocommerce_columns_pro', '2') );
	$args['posts_per_page'] = $col_count_progression; // 4 related products
	$args['columns'] = $col_count_progression; // arranged in 2 columns
	return $args;
}



// Disable small screen css
add_filter( 'woocommerce_enqueue_styles', 'pro_woo_dequeue_styles' );
function pro_woo_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}



/**
 * Manage WooCommerce styles and scripts.
 */
function grd_woocommerce_script_cleaner() {
	wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
	wp_dequeue_script( 'prettyPhoto' );
	wp_dequeue_script( 'prettyPhoto-init' );
}
add_action( 'wp_enqueue_scripts', 'grd_woocommerce_script_cleaner', 99 );



// Ajaxy Count Cart in Header
add_filter('woocommerce_add_to_cart_fragments', 'pro_woocommerce_header_add_to_cart_fragment22');
function pro_woocommerce_header_add_to_cart_fragment22( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
		<a class="cart-icon-pro" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>">
			<i class="fa fa-shopping-cart"></i>
			<span class="shopping-cart-header-count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'soundbyte-progression'), $woocommerce->cart->cart_contents_count);?></span>
		</a>

	<?php

	$fragments['.cart-icon-pro'] = ob_get_clean();

	return $fragments;

}
