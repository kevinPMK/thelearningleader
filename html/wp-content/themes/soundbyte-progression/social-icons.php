<?php if (get_theme_mod( 'show_social_pro', '1' )) : ?>
<div class="social-ico">
	<?php echo wp_kses(get_theme_mod('footer_left_section_html_pro'), array(
	      'div' => array(
	          'id' => array(),
	  		  'class' => array(),
	        'style' => array(),
	      ),
	      'form' => array(
				'action' => array(),
	          'method' => array(),
	          'id' => array(),
	  		  'name' => array(),
	  		  'class' => array(),
	  		  'target' => array(),
	      ),
	    'input' => array(
	        'value' => array(),
	        'placeholder' => array(),
			  'type' => array(),
			  'name' => array(),
			  'class' => array(),
			  'id' => array(),
			  'tabindex' => array(),
	    ),
		    'a' => array(
		        'href' => array(),
		        'title' => array()
		    ),
		 
		    'br' => array(),
		    'em' => array(),
			 'strong' => array(),
		) ); ?>
	<?php if (get_theme_mod( 'footer_twitter_link_progression', 'http://twitter.com'  )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_twitter_link_progression')); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_facebook_link_progression', 'http://facebook.com'  )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_facebook_link_progression')); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
		<?php if (get_theme_mod( 'footer_dribbble_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_dribbble_link_progression')); ?>" target="_blank"><i class="fa fa-dribbble"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_linkedin_link_progression', 'http://linkedin.com'  )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_linkedin_link_progression')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_qube_pinterest_link_progression', 'http://pinterest.com'  )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_pinterest_link_progression')); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a><?php endif; ?>	
	<?php if (get_theme_mod( 'footer_google_link_progression', 'http://google.com' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_google_link_progression')); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_instagram_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_instagram_link_progression')); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_tumblr_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_tumblr_link_progression')); ?>" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_youtube_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_youtube_link_progression')); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_dropbox_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_dropbox_link_progression')); ?>" target="_blank"><i class="fa fa-dropbox"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_flickr_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_flickr_link_progression')); ?>" target="_blank"><i class="fa fa-flickr"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_vimeo_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_vimeo_link_progression')); ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_soundcloud_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_soundcloud_link_progression')); ?>" target="_blank"><i class="fa fa-soundcloud"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_vine_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_vine_link_progression')); ?>" target="_blank"><i class="fa fa-vine"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_wordpress_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_wordpress_link_progression')); ?>" target="_blank"><i class="fa fa-wordpress"></i></a><?php endif; ?>	
	<?php if (get_theme_mod( 'footer_mail_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_mail_link_progression')); ?>" target="_blank"><i class="fa fa-envelope"></i></a><?php endif; ?>
</div>
<?php endif; ?>