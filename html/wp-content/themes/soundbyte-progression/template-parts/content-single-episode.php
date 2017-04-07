<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package pro
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="episode-content-pro">
		<?php the_content(); ?>
        <?php get_template_part( 'template-parts/content', 'related-episodes' ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
