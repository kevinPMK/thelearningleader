<?php global $woocommerce; ?>
<a class="cart-icon-pro" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>">
	<i class="fa fa-shopping-cart"></i>
	<span class="shopping-cart-header-count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'soundbyte-progression'), $woocommerce->cart->cart_contents_count);?></span>
</a>
