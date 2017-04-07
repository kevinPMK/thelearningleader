<?php

/**
 * Episode Shortcode
 */


// [pro_episode heading_pro="" menu_description_pro="" etc...]
add_shortcode( 'pro_episode', 'pro_episode_func' );
function pro_episode_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
      'title_episodes' => 'Browse Episodes',
      'grid_columns' => '2',
	  'episode_post_count' => '6',
	  'shop_filter_categories' => '',
	  'shop_pagination_on_off' => 'true',
	  'display_margins' => '',
      'blog_heading_font_pro' => '#fff',
      'blog_heading_font_hover_pro' => '#fff',


   ), $atts ) );

    $output_pro = '';

	STATIC $idpro = 0;
	$idpro++;

	ob_start();
	?>


	<?php
	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {   $paged = get_query_var('page'); } else {  $paged = 1; }
	global $episodeloop;
	global $post;

	$postIds = $shop_filter_categories; // get custom field value
    $arrayIds = explode(',', $postIds); // explode value into an array of ids
    if(count($arrayIds) <= 1) // if array contains one element or less, there's spaces after comma's, or you only entered one id
    {
        if( strpos($arrayIds[0], ',') !== false )// if the first array value has commas, there were spaces after ids entered
        {
            $arrayIds = array(); // reset array
            $arrayIds = explode(', ', $postIds); // explode ids with space after comma's
        }
    }

    $arrayIdsfilter = array();
    foreach ( $arrayIds as $proIDs ) {
	       $arrayIdsfilter[] = get_term_by( 'slug', $proIDs, 'episode_type' );
    };

    $progressionarrayIdsfilter = array();
    foreach ( $arrayIdsfilter as $progressionTermId ) {
        if ($progressionTermId) {
            $progressionarrayIdsfilter[] = $progressionTermId->term_id;
        }
    };


	if ( $shop_filter_categories ) {
	   	$episodeloop = new WP_Query(
	   		array(
    	   	   'post_type' => 'episode',
    	   	   'posts_per_page' => $episode_post_count,
    			'paged' => $paged,
    			'tax_query' => array(
    			        // Note: tax_query expects an array of arrays!
    			        array(
    			            'taxonomy' => 'episode_type', //
    			            'field'    => 'slug',
    			            'terms'    => $arrayIds
    			        )
    			 ),
       		)
	    );
	}

	else
	  {

   	$episodeloop = new WP_Query(
   		array(
   	        'post_type' => 'episode',
   	        'posts_per_page' => $episode_post_count,
			'paged' => $paged
   		)
    );
	}

	?>

<?php if (($blog_heading_font_pro != '#ffffff') && ($blog_heading_font_pro != '#fff'))  : ?>
    <style type="text/css">
        body #filters .btn {color: <?php echo $blog_heading_font_pro;?>;}
        body #filters .btn:active, body #filters .btn.is-checked, body #filters .btn:hover {color: <?php echo $blog_heading_font_hover_pro;?>;}
    </style>
<?php endif;?>

<div class="episode-pro-vc">
    <div id="gallery-index-progression">
        <div id="portfolio-filter" class="portfolio-filter">
            <?php if($title_episodes) : ?><h2 class="filter-heading-progression"><?php echo esc_attr($title_episodes) ?></h2><?php endif;?>
            <div id="filters" class="button-group <?php if (!$title_episodes) { echo 'no-title-soundbyte'; };?>">
                <span class="filter-wrapper">
                    <?php
                        $i = 0;
                        if ( $shop_filter_categories ) {
                            $args = array(
                                'orderby'                => 'name',
                                'order'                  => 'ASC',
                                'hide_empty'             => true,
                                'include'                => $progressionarrayIdsfilter,
                            );
                        } else {
                            $args = array(
                                'orderby'                => 'name',
                                'order'                  => 'ASC',
                                'hide_empty'             => true,
                            );
                        }
                        $terms = get_terms( 'episode_type', $args );
                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                            echo '<button class="btn is-checked" data-filter="*">' . __('All', 'pro-elements') .'</button> ';

                            foreach ( $terms as $term ) {
                            if ($i == 0) {
                            echo '<button class="btn" data-filter=".'.$term->slug.'">' .$term->name .'</button> ';
                            } else if ($i > 0)  {
                            echo '<button class="btn" data-filter=".'.$term->slug.'">' .$term->name .'</button> ';
                            }
                            $i++;
                            }
                        }
                    ?>
                </span>
            </div>
            <div class="clearfix-progression"></div>
        </div>
        <div class="iso-container-pro isotope-<?php echo esc_attr($grid_columns) ?>-columns-progression<?php if ($display_margins) { echo ' full-width-progression'; }; ?>">
            <div class="isotope">
                <?php
    				$count = 1;
    				$col_count_progression = $grid_columns;
    				while($episodeloop->have_posts()): $episodeloop->the_post();
    			?>
    					<div class="isotope-item <?php $terms = get_the_terms( $post->ID , 'episode_type' );
                            if ($terms) {
                                foreach ( $terms as $term ) {
                                $term_link = get_term_link( $term, 'episode_type' );
                                if( is_wp_error( $term_link ) )
                                continue;
                                echo $term->slug .' ';
                                }
                            }?>
                            <?php if ($count <= $episode_post_count) { echo 'init'; } ;?>">
    						<?php include(locate_template('template-parts/content-episode.php')); ?>
    					</div><!-- close episode post -->
                         <?php //if ($count == $episode_post_count) { the_posts_pagination(); } ;?>
    				<?php  $count ++;  endwhile; // end of the loop. ?>
    	            <div class="clearfix-pro"></div>
            </div>
        <div class="clearfix-pro"></div>
        </div>
    </div>

	<?php if($shop_pagination_on_off == 'true'): ?>
        <?php infinite_content_nav_pro_home('nav-below');?>
		<div class="clearfix-pro"></div>
	<?php endif; ?>


</div><!-- close .episode-pro-vc -->


	<?php wp_reset_query(); ?>

	<div class="clearfix-pro"></div>

	<?php

	return $output_pro. ob_get_clean();

}


add_action( 'vc_before_init', 'pro_episode_integrateVC' );
function pro_episode_integrateVC() {
   vc_map( array(
      "name" => __( "Pro Episodes", "pro-elements" ),
	  "description" => __( "Episodes grid", "pro-elements" ),
      "base" => "pro_episode",
	  "weight" => 100,
      "class" => "",
      "category" => __( "Pro Elements", "pro-elements"),
	  'icon' => 'vc-icon',

      "params" => array(


          array(
             "type" => "textfield",
 			"class" => "",
             "heading" => __( "Element Title", "pro-elements" ),
             "param_name" => "title_episodes",
 			"std"         => 'Browse Episodes',
          ),


         array(
            "type" => "dropdown",
			"class" => "",
            "heading" => __( "Grid Columns", "pro-elements" ),
            "param_name" => "grid_columns",
			"value"       => array(
			        '1 Column'   	=> '1',
			        '2 Columns'  	=> '2',
			        '3 Columns'		=> '3',
			        '4 Columns'  	=> '4',
			),
			"std"         => '2',
         ),


         array(
            "type" => "textfield",
			"class" => "",
            "heading" => __( "Initial Post Count", "pro-elements" ),
            "param_name" => "episode_post_count",
			"std"         => '6',
         ),

         array(
            "type" => "checkbox",
			"class" => "",
            "heading" => __( "Display Full Width? (No Margins)", "pro-elements" ),
            "param_name" => "display_margins",
            "std"         => 'false',
         ),


         array(
            "type" => "textfield",
			"class" => "",
            "heading" => __( "Narrow by Category", "pro-elements" ),
			"description" => __( "Enter Category slugs to display a specific category. Add-in multiple slugs seperated by a comma to use multiple categories. (Leave blank to pull in all posts).", "pro-elements" ),
            "param_name" => "shop_filter_categories",
			"std"         => '',
         ),

         array(
            "type" => "checkbox",
			"class" => "",
            "heading" => __( "Display Load More?", "pro-elements" ),
            //"description" => __( "Displays a Load More button.", "pro-elements" ),
            "param_name" => "shop_pagination_on_off",
			"std"         => 'true',
         ),

         array(
            "type" => "colorpicker",
			"class" => "",
            "heading" => __( "Categories Font Color", "qube-elements" ),
			"description" => __( "Overrides the default Heading Font color.", "pro-elements" ),
            "param_name" => "blog_heading_font_pro",
			"std"         => '#ffffff',
			'group' => __( 'Design options', 'pro-elements' ),
         ),

         array(
            "type" => "colorpicker",
			"class" => "",
            "heading" => __( "Categories Font Color Hover", "qube-elements" ),
			"description" => __( "Overrides the default Heading Font Hover color", "pro-elements" ),
            "param_name" => "blog_heading_font_hover_pro",
			"std"         => '#ffffff',
			'group' => __( 'Design options', 'pro-elements' ),
         ),


      )
   ) );
}
