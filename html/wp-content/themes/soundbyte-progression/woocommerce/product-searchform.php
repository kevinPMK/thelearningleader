<form role="search" method="get" class="search-form woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'soundbyte-progression' ); ?></label>
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'soundbyte-progression' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'soundbyte-progression' ); ?>" />
	<input class="search-submit" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'soundbyte-progression' ); ?>" />
	<input type="hidden" name="post_type" value="product" />
</form>
