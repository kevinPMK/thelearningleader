<?php
/**
 * Template Name: Custom RSS Template - Episodes
 */
$postCount = 9999; // The number of posts to show in the feed
$args = array(
	'post_type' => 'episode',
	'orderby'	=> 'date',
	'order'     => 'ASC',
	'posts_per_page' => $postCount,
);
$posts = query_posts( $args );
header('Content-Type: '.feed_content_type('rss-http').'; charset='.get_option('blog_charset'), true);
echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';
?>


<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	<?php if(function_exists( 'powerpress_content' )){} else {echo'xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:googleplay="http://www.google.com/schemas/play-podcasts/1.0/play-podcasts.xsd"';}; ?>
	<?php do_action( 'rss2_ns' ); ?>
>

	<channel>
		<title><?php echo esc_attr(get_theme_mod( 'podcast_feed_title', 'Soundbyte Podcast Feed')); ?></title>
		<atom:link href="<?php esc_url( self_link() ); ?>" rel="self" type="application/rss+xml" />
		<link><?php esc_url( self_link() ); ?></link>
		<description><?php echo esc_attr(get_theme_mod( 'podcast_feed_description_pro', '')); ?></description>
		<lastBuildDate><?php echo esc_html( mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ) ); ?></lastBuildDate>
		<language><?php echo get_locale(); ?></language>
		<copyright><?php echo esc_attr(get_theme_mod( 'podcast_feed_copy', 'ProgressioinStudios')); ?></copyright>
		<itunes:subtitle><?php echo esc_attr(get_theme_mod( 'podcast_feed_subtitle', 'Soundbyte Premium Podcasting WordPress Theme')); ?></itunes:subtitle>
		<itunes:author><?php echo esc_attr(get_theme_mod( 'podcast_feed_author', 'ProgressionStudios')); ?></itunes:author>
		<googleplay:author><?php echo esc_attr(get_theme_mod( 'podcast_feed_author', 'ProgressionStudios')); ?></googleplay:author>
		<googleplay:email><?php echo esc_attr(get_theme_mod( 'podcast_feed_author_mail', '')); ?></googleplay:email>
		<itunes:summary><?php echo esc_attr(get_theme_mod( 'podcast_feed_summary', 'Soundbyte Premium Podcasting WordPress Theme')); ?></itunes:summary>
		<googleplay:description><?php echo esc_attr(get_theme_mod( 'podcast_feed_summary', 'Soundbyte Premium Podcasting WordPress Theme')); ?></googleplay:description>
		<itunes:explicit><?php if (get_theme_mod( 'progression_explicit_episode', 'No') == 'No') { echo 'clean'; } elseif (get_theme_mod( 'progression_explicit_episode', 'No') == 'Yes') { echo 'Yes'; }; ?></itunes:explicit>
		<googleplay:explicit><?php echo esc_attr(get_theme_mod( 'progression_explicit_episode', 'No')); ?></googleplay:explicit>
		<?php if ( get_theme_mod( 'progression_rss_img', '' ) != '' ) : ?>		
		<itunes:image href="<?php echo esc_url( get_theme_mod( 'progression_rss_img', '' ) ); ?>"></itunes:image>
		<googleplay:image href="<?php echo esc_url( get_theme_mod( 'progression_rss_img', '' ) ); ?>"></googleplay:image>
		<image>
			<url><?php echo esc_url( get_theme_mod( 'progression_rss_img', '' ) ); ?></url>
			<title><?php echo esc_attr(get_theme_mod( 'podcast_feed_author', 'Soundbyte Podcast Feed')); ?></title>
			<link><?php esc_url( self_link() ); ?></link>
		</image>	
		<?php endif;?>
		<itunes:owner>
			<itunes:name><?php echo esc_attr(get_theme_mod( 'podcast_feed_author', 'ProgressionStudios')); ?></itunes:name>
			<itunes:email><?php echo esc_attr(get_theme_mod( 'podcast_feed_author_mail', '')); ?></itunes:email>
		</itunes:owner>
		
		<?php if (get_theme_mod( 'pro_episode_rss_category', '' ) != '') : ?>
		<itunes:category text="<?php echo esc_attr( get_theme_mod( 'pro_episode_rss_category', '' ) ); ?>">
			<?php if (get_theme_mod( 'pro_episode_rss_sub_category', '' ) != '') : ?><itunes:category text="<?php echo esc_attr( get_theme_mod( 'pro_episode_rss_sub_category', '' ) ); ?>"> </itunes:category> <?php endif;?>
		</itunes:category>
		<?php endif;?>
		
		<?php if (get_theme_mod( 'pro_episode_rss_category2', '' ) != '') : ?>
		<itunes:category text="<?php echo esc_attr( get_theme_mod( 'pro_episode_rss_category2', '' ) ); ?>">
			<?php if (get_theme_mod( 'pro_episode_rss_sub_category2', '' ) != '') : ?><itunes:category text="<?php echo esc_attr( get_theme_mod( 'pro_episode_rss_sub_category2', '' ) ); ?>"> </itunes:category> <?php endif;?>
		</itunes:category>
		<?php endif;?>
	
		
		
		
	<?php 

		// Prevent WP core from outputting an <image> element
		remove_action( 'rss2_head', 'rss2_site_icon' );

		// Add RSS2 headers
		do_action( 'rss2_head' );	
				
		$qry = new WP_Query( $args );

		if ( $qry->have_posts() ) {
			while ( $qry->have_posts()) {
				$qry->the_post();

				// Audio file
				$filesize = '';
				$audio_file_pro = get_post_meta( get_the_id(), 'page_title_audioplayer_file', false );
				if ($audio_file_pro != '') {				
					foreach ( $audio_file_pro as $audio ) {
						$audio_file =  wp_get_attachment_url($audio);
						$filesize = filesize( get_attached_file( $audio ) );
					}
				}				
				
				$embed_audio_file =  esc_url(get_post_meta($post->ID, 'page_title_audioplayer_embed', true));
				$pro_external_rss_link = esc_url(get_post_meta($post->ID, 'pro_external_rss_file_link', true));
				$embed_filesize = get_post_meta(get_the_ID(), 'pro_filesize', true);				

											    			
				$episode_image = '';
				$full_episode_image = '';
				
				$large_episode_image = get_post_meta(get_the_ID(), 'progression_rss_image_episode', true);			
				$large_image_att = wp_get_attachment_image_src( $large_episode_image, 'full' );
				if ( $large_image_att ) {
					$full_episode_image = $large_image_att[0];
				}
				
				$image_id = get_post_thumbnail_id( get_the_ID() );
				if ( $image_id ) {
					$image_att = wp_get_attachment_image_src( $image_id, 'full' );
					if ( $image_att ) {
						$episode_image = $image_att[0];
					}
				}


				// Episode duration_int
				$duration = get_post_meta( get_the_ID(), 'pro_duration_int', true );
				if ( ! $duration ) {
					$duration = '0:00';
				}

				// File size
				if ($filesize == '' || ! $filesize) {
					$filesize = get_post_meta( get_the_ID(), 'pro_filesize', true );
				}
				$mime_type = 'audio/mpeg';


				// User/Author
				$author = esc_html( get_the_author() );

				// Episode content (with iframes removed)
				$content = get_the_content_feed( 'rss2' );
				$content = preg_replace( '/<\/?iframe(.|\s)*?>/', '', $content );
				$content = apply_filters( 'pro_item_content', $content, get_the_ID() );

				// iTunes summary is the full episode content, but must be shorter than 4000 characters
				$itunes_summary = mb_substr( $content, 0, 3999 );
				$itunes_summary = apply_filters( 'pro_itunes_summary', $itunes_summary, get_the_ID() );
				$gp_description = apply_filters( 'pro_gp_description', $itunes_summary, get_the_ID() );

				// Episode description
				ob_start();
				the_excerpt_rss();
				$description = ob_get_clean();
				$description = apply_filters( 'pro_description_soundbyte', $description, get_the_ID() );

				// iTunes subtitle does not allow any HTML and must be shorter than 255 characters
				$itunes_subtitle = strip_tags( strip_shortcodes( $description ) );
				$itunes_subtitle = str_replace( array( '>', '<', '\'', '"', '`', '[andhellip;]', '[&hellip;]', '[&#8230;]' ), array( '', '', '', '', '', '', '', '' ), $itunes_subtitle );
				$itunes_subtitle = mb_substr( $itunes_subtitle, 0, 254 );
				$itunes_subtitle = apply_filters( 'pro_itunes_subtitle', $itunes_subtitle, get_the_ID() );

		?>
		<item>
			<title><?php esc_html( the_title_rss() ); ?></title>
			<link><?php esc_url( the_permalink_rss() ); ?></link>
			<pubDate><?php echo esc_html( mysql2date( 'D, d M Y H:i:s +0000', get_post_time( 'Y-m-d H:i:s', true ), false ) ); ?></pubDate>
			<dc:creator><?php echo $author; ?></dc:creator>
			<guid isPermaLink="false"><?php esc_html( the_guid() ); ?></guid>
			<description><![CDATA[<?php echo $description; ?>]]></description>
			<itunes:subtitle><![CDATA[<?php echo $itunes_subtitle; ?>]]></itunes:subtitle>
			<content:encoded><![CDATA[<?php echo $content; ?>]]></content:encoded>
			<itunes:summary><![CDATA[<?php echo $itunes_summary; ?>]]></itunes:summary>
			<googleplay:description><![CDATA[<?php echo $gp_description; ?>]]></googleplay:description>
<?php if ( $episode_image || $full_episode_image ) { ?>
			<?php if ( $full_episode_image != '' ) :?>
			<itunes:image href="<?php echo esc_url( $full_episode_image ); ?>"></itunes:image>
			<googleplay:image href="<?php echo esc_url( $full_episode_image ); ?>"></googleplay:image>
			<?php else : ?>
			<itunes:image href="<?php echo esc_url( $episode_image ); ?>"></itunes:image>
			<googleplay:image href="<?php echo esc_url( $episode_image ); ?>"></googleplay:image>
			<?php endif;?>
<?php } ?>
			<?php if (get_post_meta($post->ID, 'pro_external_rss_file', true) == 1 ) : ?>
				<enclosure url="<?php echo esc_url($pro_external_rss_link);?>" length="<?php echo $embed_filesize;?>" type="<?php echo esc_attr( $mime_type ); ?>"></enclosure>
			<?php elseif ($embed_audio_file != '') : ?>
				<enclosure url="<?php echo esc_url($embed_audio_file);?>" length="<?php echo $embed_filesize;?>" type="<?php echo esc_attr( $mime_type ); ?>"></enclosure>
			<?php elseif ((get_post_meta( get_the_id(), 'page_title_audioplayer_file', true )) != '' ) : ?>	
				<enclosure url="<?php echo esc_url( $audio_file ); ?>" length="<?php echo esc_attr( $filesize ); ?>" type="<?php echo esc_attr( $mime_type ); ?>"></enclosure>
			<?php endif;?>

			<itunes:duration><?php echo esc_html( $duration ); ?></itunes:duration>
			<itunes:author><?php echo $author; ?></itunes:author>
		</item>
<?php }
} ?>
	</channel>
</rss>