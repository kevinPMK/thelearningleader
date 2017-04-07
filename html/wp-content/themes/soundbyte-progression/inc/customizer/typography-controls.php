<?php
/**
 * progression Theme Customizer
 *
 * @package progression
 */

function pro_add_tab_to_panel( $tabs ) {

    // Do this for each tab you want to create.
    // Make sure the array index matches the
    // 'name' array property.
    $tabs['pro-global'] = array(
        'name'        => 'pro-global',
        'panel'       => 'body_main_panel_pro',
        'title'       => esc_html__('Body Typography', 'soundbyte-progression'),
        'description' => '',
        'sections'    => array(),
    );


 	//Default Headings
     $tabs['pro-default-headings'] = array(
         'name'        => 'pro-default-headings',
         'panel'       => 'body_main_panel_pro',
         'title'       => esc_html__('Headings', 'soundbyte-progression'),
         'description' => '',
         'sections'    => array(),
     );

  	//Default Headings
      $tabs['pro-page-title-headings'] = array(
          'name'        => 'pro-page-title-headings',
          'panel'       => 'body_main_panel_pro',
          'title'       => esc_html__('Page Title', 'soundbyte-progression'),
          'description' => '',
          'sections'    => array(),
      );


      $tabs['pro-sidebar'] = array(
          'name'        => 'pro-sidebar',
          'panel'       => 'body_main_panel_pro',
          'title'       => esc_html__('Sidebar', 'soundbyte-progression'),
          'description' => '',
          'sections'    => array(),
      );



      $tabs['pro-buttons-default'] = array(
          'name'        => 'pro-buttons-default',
          'panel'       => 'body_main_panel_pro',
          'title'       => esc_html__('Buttons', 'soundbyte-progression'),
          'description' => '',
          'sections'    => array(),
      );


      $tabs['pro-blog-headings'] = array(
          'name'        => 'pro-blog-headings',
          'panel'       => 'body_main_panel_pro',
          'title'       => esc_html__('Blog Typography', 'soundbyte-progression'),
          'description' => '',
          'sections'    => array(),
      );



 	//Navigation
     $tabs['pro-navigation-font'] = array(
         'name'        => 'pro-navigation-font',
         'panel'       => 'header_panel_pro',
         'title'       => esc_html__('Navigation', 'soundbyte-progression'),
         'description' => '',
         'sections'    => array(),
     );


  	//Sub-Navigation
      $tabs['pro-sub-navigation-font'] = array(
          'name'        => 'pro-sub-navigation-font',
          'panel'       => 'header_panel_pro',
          'title'       => esc_html__('Sub-Navigation', 'soundbyte-progression'),
          'description' => '',
          'sections'    => array(),
      );



		//Footer
	    $tabs['pro-footer-font'] = array(
	        'name'        => 'pro-footer-font',
	        'panel'       => 'footer_panel_pro',
	        'title'       => esc_html__('Footer Typography', 'soundbyte-progression'),
	        'description' => '',
	        'sections'    => array(),
	    );

       $tabs['pro-ecommerce-font'] = array(
           'name'        => 'pro-ecommerce-font',
           'panel'       => 'panel_woocommerce_pro',
           'title'       => esc_html__('eCommerce Index', 'soundbyte-progression'),
           'description' => '',
           'sections'    => array(),
       );


       $tabs['pro-ecommerce-post'] = array(
           'name'        => 'pro-ecommerce-post',
           'panel'       => 'panel_woocommerce_pro',
           'title'       => esc_html__('eCommerce Post', 'soundbyte-progression'),
           'description' => '',
           'sections'    => array(),
       );

    // Return the tabs.
    return $tabs;
}
add_filter( 'tt_font_get_settings_page_tabs', 'pro_add_tab_to_panel' );

/**
 * How to add a font control to your tab
 *
 * @see  parse_font_control_array() - in class EGF_Register_Options
 *       in includes/class-egf-register-options.php to see the full
 *       properties you can add for each font control.
 *
 *
 * @param   array $controls - Existing Controls.
 * @return  array $controls - Controls with controls added/removed.
 *
 * @since 1.0
 * @version 1.0
 *
 */
function pro_add_control_to_tab( $controls ) {

    /**
     * 1. Removing default styles because we add-in our own
     */
    unset( $controls['tt_default_body'] );
    unset( $controls['tt_default_heading_1'] );
    unset( $controls['tt_default_heading_2'] );
    unset( $controls['tt_default_heading_3'] );
    unset( $controls['tt_default_heading_4'] );
    unset( $controls['tt_default_heading_5'] );
    unset( $controls['tt_default_heading_6'] );


    /**
     * 2. Now custom examples that are theme specific
     */
 	/* Body Fonts */
     $controls['pro_body_font'] = array(
         'name'       => 'pro_body_font',
 			'type'        => 'font',
         'title'      =>  esc_html__('Body Font', 'soundbyte-progression'),
         'tab'        => 'pro-global',
         'properties' => array( 'selector'   => 'body' ),
 		'default' => array(
 				'subset'                     => 'latin',
 				'font_id'                    => 'roboto',
 				'font_name'                  => 'Roboto',
 				'font_weight_style'          => 'regular',
 				'font_color'                 => 'rgba(26, 23, 26, 0.78)',
 				'line_height'                => '1.6',
 				'font_size'                  => array( 'amount' => '18', 'unit' => 'px' )
 			),
     );







     $controls['pro_main_nav_font'] = array(
         'name'       => 'pro_main_nav_font',
 		'type'        => 'font',
         'title'      =>  esc_html__('Navigation Font Family', 'soundbyte-progression'),
         'tab'        => 'pro-navigation-font',
         'properties' => array( 'selector'   => 'nav#site-navigation .sf-menu a, a.cart-icon-pro' ),
 		'default' => array(
 				'subset'                     => 'latin',
 				'font_id'                    => 'poppins',
 				'font_name'                  => 'Poppins',
 				'font_weight_style'          => '600',
                'letter_spacing'             => array( 'amount' => '1', 'unit' => 'px' ),
 			),
     );


     $controls['pro_sub_navigation_font_family'] = array(
         'name'       => 'pro_sub_navigation_font_family',
 		'type'        => 'font',
         'title'      =>  esc_html__('Sub-Navigation Font Family', 'soundbyte-progression'),
         'tab'        => 'pro-sub-navigation-font',
         'properties' => array( 'selector'   => '#masthead-progression nav#site-navigation .sf-menu li li a' ),
 		'default' => array(
 				'subset'                     => 'latin',
 				'font_id'                    => 'poppins',
 				'font_name'                  => 'Poppins',
 				'font_weight_style'          => '600'
 			),
     );


     $controls['pro_footer_font'] = array(
         'name'       => 'pro_footer_font',
 		'type'        => 'font',
         'title'      =>  esc_html__('Footer Font', 'soundbyte-progression'),
         'tab'        => 'pro-footer-font',
         'properties' => array( 'selector'   => 'footer#site-footer' ),
 		'default' => array(
 				'subset'                     => 'latin',
				'font_color'                 => 'rgba(159, 159, 159, 0.5)',
				'font_size'                  => array( 'amount' => '14', 'unit' => 'px' ),
                'font_weight_style'          => 'regular'
 			),
     );


     $controls['pro_page_title_font'] = array(
         'name'       => 'pro_page_title_font',
 		'type'        => 'font',
         'title'      =>  esc_html__('Page Title Heading', 'soundbyte-progression'),
         'tab'        => 'pro-page-title-headings',
         'properties' => array( 'selector'   => '#soundbyte-page-title h1#page-title' ),
 		'default' => array(
 				'subset'                     => 'latin',
 				'font_id'                    => 'poppins',
 				'font_name'                  => 'Poppins',
				'font_weight_style'          => '600',
				'font_color'                 => '#ffffff',
				'text_transform'             => 'uppercase',
				'letter_spacing'             => array( 'amount' => '2', 'unit' => 'px' ),
				'font_size'                  => array( 'amount' => '60', 'unit' => 'px' )
 			),
     );

     $controls['pro_page_title_sub_title_font'] = array(
         'name'       => 'pro_page_title_sub_title_font',
 			'type'        => 'font',
         'title'      =>  esc_html__('Page Title Sub-Headline', 'soundbyte-progression'),
         'tab'        => 'pro-page-title-headings',
         'properties' => array( 'selector'   => '#soundbyte-page-title h2' ),
 		'default' => array(
			'subset'                     => 'latin',
			'font_id'                    => 'roboto',
			'font_name'                  => 'Roboto',
			'font_weight_style'          => 'regular',
			'font_color'                 => 'rgba(217, 217, 217, 0.9)',
			'font_size'                  => array( 'amount' => '30', 'unit' => 'px' )
 			),
     );




     $controls['pro_heading_1'] = array(
         'name'       => 'pro_heading_1',
 		'type'        => 'font',
         'title'      =>  esc_html__('Heading 1', 'soundbyte-progression'),
         'tab'        => 'pro-default-headings',
         'properties' => array( 'selector'   => 'h1' ),
 		'default' => array(
			'subset'                     => 'latin',
			'font_id'                    => 'poppins',
			'font_name'                  => 'Poppins',
			'font_weight_style'          => '700',
 				'font_color'                 => '#1a171a',
 				'line_height'                => '1.2',
 				'text_decoration'            => 'none',
 				'font_size'                  => array( 'amount' => '60', 'unit' => 'px' ),
 				'letter_spacing'             => array( 'amount' => '1', 'unit' => 'px' ),
 				'margin_bottom'              => array( 'amount' => '20', 'unit' => 'px' )
 			),
     );
     $controls['pro_heading_2'] = array(
         'name'       => 'pro_heading_2',
 		'type'        => 'font',
         'title'      =>  esc_html__('Heading 2', 'soundbyte-progression'),
         'tab'        => 'pro-default-headings',
         'properties' => array( 'selector'   => 'h2' ),
 		'default' => array(
			'subset'                     => 'latin',
			'font_id'                    => 'poppins',
			'font_name'                  => 'Poppins',
			'font_weight_style'          => '600',
 				'font_color'                 => '#1a171a',
 				'line_height'                => '1.4',
 				'font_size'                  => array( 'amount' => '36', 'unit' => 'px' ),
                'letter_spacing'             => array( 'amount' => '1', 'unit' => 'px' ),
 				'margin_bottom'              => array( 'amount' => '20', 'unit' => 'px' )
 			),
     );
     $controls['pro_heading_3'] = array(
         'name'       => 'pro_heading_3',
 		'type'        => 'font',
         'title'      =>  esc_html__('Heading 3', 'soundbyte-progression'),
         'tab'        => 'pro-default-headings',
         'properties' => array( 'selector'   => 'h3' ),
 		'default' => array(
			'subset'                     => 'latin',
			'font_id'                    => 'poppins',
			'font_name'                  => 'Poppins',
			'font_weight_style'          => '600',
 				'font_color'                 => '#1a171a',
 				'line_height'                => '1.4',
 				'font_size'                  => array( 'amount' => '28', 'unit' => 'px' ),
 				'letter_spacing'             => array( 'amount' => '1', 'unit' => 'px' ),
 				'margin_bottom'              => array( 'amount' => '20', 'unit' => 'px' )
 			),
     );
     $controls['pro_heading_4'] = array(
         'name'       => 'pro_heading_4',
 		'type'        => 'font',
         'title'      =>  esc_html__('Heading 4', 'soundbyte-progression'),
         'tab'        => 'pro-default-headings',
         'properties' => array( 'selector'   => 'h4' ),
 		'default' => array(
			'subset'                     => 'latin',
			'font_id'                    => 'poppins',
			'font_name'                  => 'Poppins',
			'font_weight_style'          => '600',
 				'font_color'                 => '#1a171a',
 				'line_height'                => '1.4',
 				'font_size'                  => array( 'amount' => '24', 'unit' => 'px' ),
 				'letter_spacing'             => array( 'amount' => '1', 'unit' => 'px' ),
 				'margin_bottom'              => array( 'amount' => '20', 'unit' => 'px' )
 			),
     );
     $controls['pro_heading_5'] = array(
         'name'       => 'pro_heading_5',
 		'type'        => 'font',
         'title'      =>  esc_html__('Heading 5', 'soundbyte-progression'),
         'tab'        => 'pro-default-headings',
         'properties' => array( 'selector'   => 'h5' ),
 		'default' => array(
			'subset'                     => 'latin',
			'font_id'                    => 'poppins',
			'font_name'                  => 'Poppins',
			'font_weight_style'          => '600',
 				'font_color'                 => '#1a171a',
 				'line_height'                => '1.4',
 				'font_size'                  => array( 'amount' => '21', 'unit' => 'px' ),
 				'letter_spacing'             => array( 'amount' => '1', 'unit' => 'px' ),
 				'margin_bottom'              => array( 'amount' => '20', 'unit' => 'px' )
 			),
     );
     $controls['pro_heading_6'] = array(
         'name'       => 'pro_heading_6',
 		'type'        => 'font',
         'title'      =>  esc_html__('Heading 6', 'soundbyte-progression'),
         'tab'        => 'pro-default-headings',
         'properties' => array( 'selector'   => 'h6' ),
 		'default' => array(
			'subset'                     => 'latin',
			'font_id'                    => 'poppins',
			'font_name'                  => 'Poppins',
			'font_weight_style'          => '600',
 				'font_color'                 => '#1a171a',
 				'line_height'                => '1.4',
 				'font_size'                  => array( 'amount' => '18', 'unit' => 'px' ),
 				'letter_spacing'             => array( 'amount' => '1', 'unit' => 'px' ),
 				'margin_bottom'              => array( 'amount' => '20', 'unit' => 'px' )
 			),
     );



     $controls['pro_footer_font_heading'] = array(
         'name'       => 'pro_footer_font_heading',
 		'type'        => 'font',
         'title'      =>  esc_html__('Footer Widget Heading', 'soundbyte-progression'),
         'tab'        => 'pro-footer-font',
         'properties' => array( 'selector'   => 'footer#site-footer .widget-title' ),
 		'default' => array(
			'subset'                     => 'latin',
			'font_id'                    => 'poppins',
			'font_name'                  => 'Poppins',
			'font_weight_style'          => '600',
 				'font_color'                 => '#ffffff',
				'font_size'                  => array( 'amount' => '18', 'unit' => 'px' ),
                'letter_spacing'             => array( 'amount' => '1', 'unit' => 'px' ),
 			),
     );



     $controls['pro_blog_font_heading'] = array(
         'name'       => 'pro_blog_font_heading',
 			'type'        => 'font',
         'title'      =>  esc_html__('Blog Heading', 'soundbyte-progression'),
         'tab'        => 'pro-blog-headings',
         'properties' => array( 'selector'   => 'h2.blog-title-progression, h2.blog-title-progression a' ),
 			'default' => array(
				'subset'                     => 'latin',
                'font_id'                    => 'poppins',
    			'font_name'                  => 'Poppins',
				'font_size'                  => array( 'amount' => '32', 'unit' => 'px' ),
                'font_weight_style'          => '600',
                'line_height'                => '1.4',
                'margin_bottom'              => array( 'amount' => '10', 'unit' => 'px' )

 			),
     );

     $controls['pro_blog_meta_heading'] = array(
         'name'       => 'pro_blog_meta_heading',
 			'type'        => 'font',
         'title'      =>  esc_html__('Blog Meta', 'soundbyte-progression'),
         'tab'        => 'pro-blog-headings',
         'properties' => array( 'selector'   => '.post-meta-pro, .soundbyte-date-progression, .soundbyte-date-progression a, .author-meta-progression, .meta-comments-progression' ),
 			'default' => array(
				'subset'                     => 'latin',
                'font_id'                    => 'roboto',
    			'font_name'                  => 'Roboto',
                'font_weight_style'          => '700',
                'text_transform'             => 'uppercase',
				'font_size'                  => array( 'amount' => '16', 'unit' => 'px' ),
 			),
     );



     $controls['pro_sidebar_default'] = array(
         'name'       => 'pro_sidebar_default',
 			'type'        => 'font',
         'title'      =>  esc_html__('Sidebar Font', 'soundbyte-progression'),
         'tab'        => 'pro-sidebar',
         'properties' => array( 'selector'   => '#content-pro #soundbyte-sidebar .widget' ),
 			'default' => array(
				'subset'                     => 'latin',
                'font_color'                 => 'rgba(26, 23, 26, 0.76)',
                'font_weight_style'          => 'regular',
				'font_size'                  => array( 'amount' => '16', 'unit' => 'px' )
 			),
     );

     $controls['pro_sidebar_heading'] = array(
         'name'       => 'pro_sidebar_heading',
 			'type'        => 'font',
         'title'      =>  esc_html__('Sidebar Heading', 'soundbyte-progression'),
         'tab'        => 'pro-sidebar',
         'properties' => array( 'selector'   => '#soundbyte-sidebar .widget h6.widget-title' ),
 			'default' => array(
				'subset'                     => 'latin',
                'font_weight_style'          => '600',
				'font_size'                  => array( 'amount' => '14', 'unit' => 'px' )
 			),
     );


     $controls['pro_shop_index_main_heading'] = array(
         'name'       => 'pro_shop_index_main_heading',
 			'type'        => 'font',
         'title'      =>  esc_html__('Shop Heading', 'soundbyte-progression'),
         'tab'        => 'pro-ecommerce-font',
         'properties' => array( 'selector'   => 'body #content-pro .shop-container-pro h3' ),
 			'default' => array(
			'subset'                     => 'latin',
 				'font_color'                 => '#1a171a',
                'font_weight_style'          => '600',
 				'font_size'                  => array( 'amount' => '23', 'unit' => 'px' ),
                'letter_spacing'             => array( 'amount' => '0', 'unit' => 'px' )
 			),
     );


     $controls['pro_shop_index_price'] = array(
         'name'       => 'pro_shop_index_price',
 			'type'        => 'font',
         'title'      =>  esc_html__('Shop Price', 'soundbyte-progression'),
         'tab'        => 'pro-ecommerce-font',
         'properties' => array( 'selector'   => 'body #content-pro .shop-container-pro span.price, body #content-pro .shop-container-pro span.price span.amount' ),
 			'default' => array(
			'subset'                     => 'latin',
 				'font_color'                 => '#0ce682',
                'font_weight_style'          => '700',
 				'font_size'                  => array( 'amount' => '18', 'unit' => 'px' ),
                'letter_spacing'             => array( 'amount' => '2', 'unit' => 'px' )
 			),
     );


     $controls['pro_shop_rating'] = array(
         'name'       => 'pro_shop_rating',
 			'type'        => 'font',
         'title'      =>  esc_html__('Shop Rating', 'soundbyte-progression'),
         'tab'        => 'pro-ecommerce-font',
         'properties' => array( 'selector'   => '.woocommerce ul.products li .shop-container-pro .star-rating, body .woocommerce-tabs .comment-form-rating .stars a, .star-rating-single-pro, body #content-pro .shop-container-pro .star-rating, body #content-pro .shop-container-pro .star-rating:hover, body .woocommerce-tabs .comment-form-rating .stars a:hover, #single-product-container-pro .summary .woocommerce-product-rating a.woocommerce-review-link:hover, #single-product-container-pro .summary .woocommerce-product-rating a.woocommerce-review-link, ul.product_list_widget li .star-rating, body.woocommerce .summary .woocommerce-product-rating, #boxed-layout-pro .widget ul.product_list_widget li .star-rating, .woocommerce-tabs.wc-tabs-wrapper #reviews ol.commentlist .star-rating' ),
 			'default' => array(
			'subset'                         => 'latin',
 				'font_color'                 => '#0ce682',
 				'font_size'                  => array( 'amount' => '11', 'unit' => 'px' ),
 			),
     );





     $controls['pro_shop_posts_heading'] = array(
         'name'       => 'pro_shop_posts_heading',
 			'type'        => 'font',
         'title'      =>  esc_html__('Shop Post Heading', 'soundbyte-progression'),
         'tab'        => 'pro-ecommerce-post',
         'properties' => array( 'selector'   => '#single-product-container-pro h1.entry-title' ),
 			'default' => array(
			'subset'                     => 'latin',
 				'font_color'                 => '#1a171a',
 				'font_size'                  => array( 'amount' => '32', 'unit' => 'px' ),
 			),
     );



     $controls['pro_shop_price_post_page'] = array(
         'name'       => 'pro_shop_price_post_page',
 			'type'        => 'font',
         'title'      =>  esc_html__('Shop Post Price', 'soundbyte-progression'),
         'tab'        => 'pro-ecommerce-post',
         'properties' => array( 'selector'   => '#single-product-container-pro .variations_form span.price,
#single-product-container-pro .summary p.price,
#single-product-container-pro .summary p.price span.amount,
body.woocommerce .summary .price span.amount' ),
 			'default' => array(
			'subset'                     => 'latin',
 				'font_color'                 => '#0ce682',
                'font_weight_style'          => '700',
 				'font_size'                  => array( 'amount' => '20', 'unit' => 'px' ),
 			),
     );




     $controls['pro_shop_post_description_post_page'] = array(
         'name'       => 'pro_shop_post_description_post_page',
 			'type'        => 'font',
         'title'      =>  esc_html__('Shop Post Short Description', 'soundbyte-progression'),
         'tab'        => 'pro-ecommerce-post',
         'properties' => array( 'selector'   => '#single-product-container-pro .summary' ),
 			'default' => array(
			'subset'                     => 'latin',
 			),
     );


     $controls['pro_shop_tab_heading_post'] = array(
         'name'       => 'pro_shop_tab_heading_post',
 			'type'        => 'font',
         'title'      =>  esc_html__('Shop Post Tab Heading', 'soundbyte-progression'),
         'tab'        => 'pro-ecommerce-post',
         'properties' => array( 'selector'   => '#content-pro .woocommerce-tabs h2, #content-pro  .related.products h2' ),
 			'default' => array(
			'subset'                     => 'latin',
 			),
     );


	// Return the controls.
    return $controls;
}
add_filter( 'tt_font_get_option_parameters', 'pro_add_control_to_tab' );
