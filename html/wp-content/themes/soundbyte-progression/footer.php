<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package pro
 * @since pro 1.0
 */
?>
		<footer id="site-footer">

			<?php if ( is_active_sidebar( 'Footer Widgets' ) ) { ?>
			<div id="widget-area-progression">
				<div class="width-container-progression <?php echo esc_attr(get_theme_mod('pro_widget_count', 'footer-4-pro')); ?>">
					<?php dynamic_sidebar( 'Footer Widgets' ); ?>
					<div class="clearfix-progression"></div>
				</div><!-- close .width-container-pro -->
			</div><!-- close #widget-area-pro -->
			<?php } ?>
			<div class="clearfix-progression"></div>

			<div id="copyright-progression" class="width-container-progression">
				<?php if( get_theme_mod( 'progression_theme_logo_footer', get_template_directory_uri() . '/images/logo-footer.png', true ) ):?>
					<div class="footer-logo-pro">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_attr( get_theme_mod( 'progression_theme_logo_footer', get_template_directory_uri() . '/images/logo-footer.png' ) );?>" alt="<?php bloginfo(); ?>" /></a>
					</div>
				<?php endif;?>
				<?php if ( is_active_sidebar( 'Copyright Widgets' ) ) { ?>
					<div id="copyright-area-progression">
						<?php dynamic_sidebar( 'Copyright Widgets' ); ?>
						<div class="clearfix-progression"></div>
					</div>
				<?php } ?>
				<div class="clearfix-progression"></div>
				<?php if ( is_active_sidebar( 'Copyright Widgets' ) ) : ?><?php endif;?>
				<div class="copyright-text"><?php echo wp_kses(get_theme_mod( 'footer_copyright_pro', '2016 All Rights Reserved. Developed by ProgressionStudios' ), true); ?></div>
			</div><!-- close #copyright-pro -->

		</footer>
	</div><!-- close #boxed-layout-pro -->
	<a href="#0" id="pro-scroll-top"><?php esc_html_e( 'Scroll to top', 'soundbyte-progression' ); ?></a>
<?php wp_footer(); ?>
</body>
</html>
