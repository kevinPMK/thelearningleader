<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package pro
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h4 class="comments-title">
			<?php
				printf( // WPCS: XSS OK
					esc_html( _nx( 'One comment', '%1$s comments', get_comments_number(), 'comments title', 'soundbyte-progression' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h4>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'soundbyte-progression' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'soundbyte-progression' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'soundbyte-progression' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 60,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'soundbyte-progression' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'soundbyte-progression' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'soundbyte-progression' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'soundbyte-progression' ); ?></p>
	<?php endif; ?>

	<?php 
	
	$comments_args = array(
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'fields' => array(
			'author' => '<div class="comment-form-author">' . '' . ( $req ? '' : '' ) . '<input placeholder="'.esc_html__( 'Name', 'soundbyte-progression' ).'" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></div>',
			'email' => '<div class="comment-form-email">' . ( $req ? '' : '' ) . '<input placeholder="'.esc_html__( 'Email', 'soundbyte-progression' ).'" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" /></div>',
			'url' => '<div class="comment-form-url">' . '<input placeholder="'.esc_html__( 'Website', 'soundbyte-progression' ).'" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',
		),
		'label_submit'      => esc_html__( 'Send Comment','soundbyte-progression' ),
		'comment_field' => '<div class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true" placeholder="'.esc_html__( 'Message', 'soundbyte-progression' ).'"></textarea></div>',
	);
	
	comment_form($comments_args);
	?>

</div><!-- #comments -->
