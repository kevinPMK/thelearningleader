<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package pro
 */

/* remove more link jump */
function pro_remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'pro_remove_more_link_scroll' );



if ( ! function_exists( 'show_pagination_links_blog' ) ) :
function show_pagination_links_pro()
{
    global $wp_query;

    $page_tot   = $wp_query->max_num_pages;
    $page_cur   = get_query_var( 'paged' );
    $big        = 999999999;

    if ( $page_tot == 1 ) return;

    echo paginate_links( array(
            'base'      => str_replace( $big, '%#%',get_pagenum_link( 999999999, false ) ), // need an unlikely integer cause the url can contains a number
            'format'    => '?paged=%#%',
            'current'   => max( 1, $page_cur ),
            'total'     => $page_tot,
            'prev_next' => true,
			'prev_text'    => esc_html__('&lsaquo; Previous', 'soundbyte-progression'),
			'next_text'    => esc_html__('Next &rsaquo;', 'soundbyte-progression'),
            'end_size'  => 1,
            'mid_size'  => 2,
            'type'      => 'list'
        )
    );
}
endif;



if ( ! function_exists( 'show_pagination_links_blog' ) ) :
function show_pagination_links_blog()
{

    global $blogloop;

    $page_tot   = $blogloop->max_num_pages;
    $page_cur   = get_query_var( 'paged' );
    $big        = 999999999;

    if ( $page_tot == 1 ) return;

    echo paginate_links( array(
            'base'      => str_replace( $big, '%#%',get_pagenum_link( 999999999, false ) ), // need an unlikely integer cause the url can contains a number
            'format'    => '?paged=%#%',
            'current'   => max( 1, $page_cur ),
            'total'     => $page_tot,
            'prev_next' => true,
			'prev_text'    => esc_html__('&lsaquo; Previous', 'soundbyte-progression'),
			'next_text'    => esc_html__('Next &rsaquo;', 'soundbyte-progression'),
            'end_size'  => 1,
            'mid_size'  => 2,
            'type'      => 'list'
        )
    );
}
endif;





if ( ! function_exists( 'infinite_content_nav_pro_home' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function infinite_content_nav_pro_home( $html_id ) {
	global $episodeloop;

	$html_id = esc_attr( $html_id );

	if ( $episodeloop->max_num_pages > 1 ) : ?>
		<div id="load-more-manual">
            <div id="infinite-nav-pro">
                <div class="nav-previous">
                    <?php next_posts_link( esc_attr__( 'Load More', 'soundbyte-progression' ), $episodeloop->max_num_pages ); ?>
                </div>
            </div>
        </div>
	<?php endif;
}
endif;



if ( ! function_exists( 'qube_content_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function qube_content_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<div class="post-nav-pro-border">
	<nav class="navigation post-navigation-pro" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'soundbyte-progression' ); ?></h2>
		<div class="nav-links">
			 <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="back-blog-index"><i class="fa fa-th"></i></a>
			<?php
				previous_post_link( '<div class="nav-previous">%link<span>|</span></div>', wp_kses( __('<i class="fa fa-arrow-left"></i>Previous', 'soundbyte-progression' ) , TRUE));
				next_post_link( '<div class="nav-next"><span>|</span>%link</div>',  wp_kses( __('Next<i class="fa fa-arrow-right"></i>', 'soundbyte-progression' ) , TRUE));
			?>
		<div class="clearfix-progression"></div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	</div>
	<?php
}
endif;




if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( 'Category: %s', 'soundbyte-progression' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( 'Tag: %s', 'soundbyte-progression' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Author: %s', 'soundbyte-progression' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Year: %s', 'soundbyte-progression' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'soundbyte-progression' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Month: %s', 'soundbyte-progression' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'soundbyte-progression' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( 'Day: %s', 'soundbyte-progression' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'soundbyte-progression' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'soundbyte-progression' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galleries', 'post format archive title', 'soundbyte-progression' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Images', 'post format archive title', 'soundbyte-progression' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Videos', 'post format archive title', 'soundbyte-progression' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'soundbyte-progression' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'soundbyte-progression' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'soundbyte-progression' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'soundbyte-progression' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'soundbyte-progression' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( 'Archives: %s', 'soundbyte-progression' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'soundbyte-progression' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'soundbyte-progression' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;  // WPCS: XSS OK
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;  // WPCS: XSS OK
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function qube_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'qube_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'qube_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so qube_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so qube_categorized_blog should return false.
		return false;
	}
}



/**
 * Flush out the transients used in qube_categorized_blog.
 */
function qube_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'qube_categories' );
}
add_action( 'edit_category', 'qube_category_transient_flusher' );
add_action( 'save_post',     'qube_category_transient_flusher' );
