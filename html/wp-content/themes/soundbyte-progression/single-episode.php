<?php
/**
 *
 *
 * @package pro
 */

get_header(); ?>

	<div id="soundbyte-page-title">
		<div class="width-container-progression">
			<?php if(function_exists('bcn_display')) { echo '<div id="bread-crumb-container"><div class="breadcrumbs-soundbyte"><ul id="breadcrumbs-pro"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html_e( 'Home', 'soundbyte-progression' );  echo '</a></li>'; bcn_display_list(); echo '</ul><div class="clearfix-progression"></div></div></div>'; }?>
			<div class="soundbyte-podcast-title-progression">
                <div class="soundbyte-divider-progression"></div>
                <div class="clearfix-progression"></div>
                <div class="soundbyte-podcast-progression-meta">
					<div class="alignleft"><?php $terms = get_the_terms( $post->ID , 'episode_type' );
						if($terms) {
							foreach ( $terms as $term ) {
								$term_link = get_term_link( $term, 'episode_type' );
								if( is_wp_error( $term_link ) )
								continue;
								echo '<div>' . $term->name .'<span>,</span> </div>';
							}
						}?></div>
					<?php if(get_post_meta($post->ID, 'pro_time_text', true)): ?><div class="alignright"><i class="fa fa-clock-o"></i><?php echo esc_attr(get_post_meta($post->ID, 'pro_time_text', true));?></div><?php endif;?>
					<div class="clearfix-progression"></div>
				</div>
				<h1 class="soundbyte-podcast-progression-title"><?php the_title();?></h1>
				<div class="soundbyte-podcast-date-progression"><?php echo esc_attr(get_the_date('F d, Y'));?></div>
			</div>
		</div>
	</div><!-- #page-title-pro -->

	<?php if(get_post_meta($post->ID, 'page_title_audio_download', true) == 1 ) : ?>
		<?php if(get_post_meta($post->ID, 'page_title_audioplayer_file', true)):?>
			<?php $audio_file_pro = get_post_meta( get_the_id(), 'page_title_audioplayer_file', false ); foreach ( $audio_file_pro as $audio ) : ?><?php $audio_link_pro =  wp_get_attachment_url($audio);?><?php endforeach;?>
			<a href="<?php echo esc_url($audio_link_pro);?>" download>
				<div id="soundbyte-download-podcast">
					<div class="soundbyte-download-text"><?php esc_attr_e('MP3', 'soundbyte-progression');?><i class="fa fa-cloud-download"></i></div>
				</div>
			</a>
		<?php endif;?>
	<?php endif;?>

	<?php if(get_post_meta($post->ID, 'page_title_audioplayer_file', true)):?>
		<div class="slider-player-progression">
			<div class="slider-player-container">
				<?php $audio_file_pro = get_post_meta( get_the_id(), 'page_title_audioplayer_file', false ); foreach ( $audio_file_pro as $audio ) : ?><?php $audio_link_pro =  wp_get_attachment_url($audio);?><?php endforeach;?>
				<?php echo do_shortcode('[audio mp3="' . esc_url($audio_link_pro) . '" preload="auto"][/audio]');?>
			</div>
		</div>			
	<?php endif;?>
	
	<?php if(!get_post_meta($post->ID, 'page_title_audioplayer_file', true) && (get_post_meta($post->ID, 'page_title_audioplayer_embed', true) != '' )):?>
		<div class="slider-embed-progression">		
			<?php echo do_shortcode(get_post_meta($post->ID, 'page_title_audioplayer_embed', true));?>
		</div>	
	<?php endif;?>	

	<div id="content-pro" class="site-content">
		<div class="width-container-progression">
			<div id="soundbyte-sidebar-container">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'single-episode' ); ?>
			<?php endwhile; // end of the loop. ?>

			</div><!-- close #main-container-pro -->
			<div id="soundbyte-sidebar">
				<?php if ( ! dynamic_sidebar( 'sidebar-episode' ) ) : ?><?php endif; ?>
			</div>

		<div class="clearfix-progression"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
<?php get_footer(); ?>
