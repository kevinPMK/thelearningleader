<?php
/**
 * qube Theme Customizer
 *
 * @package pro
 */
get_template_part('inc/customizer/new', 'controls');
get_template_part('inc/customizer/typography', 'controls');

/* Remove Default Theme Customizer Panels that aren't useful */
function pro_change_default_customizer_panels ( $wp_customize ) {
	$wp_customize->remove_section("themes"); //Remove Active Theme + Theme Changer

	$wp_customize->remove_section("title_tagline"); // Remove Title & Tagline Section
   $wp_customize->remove_section("static_front_page"); // Remove Front Page Section

	//$wp_customize->get_section('themes')->priority = 500;
	// $wp_customize->remove_panel("widgets");  //Widgets Panel
}
add_action( "customize_register", "pro_change_default_customizer_panels" );


/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function qube_customizer( $wp_customize ) {


	/* Panel - General */
	$wp_customize->add_panel( 'general_panel_pro', array(
		'priority'    => 10,
        'title'       => esc_html__( 'General', 'soundbyte-progression' ),
    ) );

	/* Section - General - Logo */
	$wp_customize->add_section( 'section_logo_pro', array(
		'title'          => esc_html__( 'Logo', 'soundbyte-progression' ),
		'panel'          => 'general_panel_pro', // Not typically needed.
		'priority'       => 10,
	) );

	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_theme_logo' ,array(
		'default' => get_template_directory_uri().'/images/logo.png',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_theme_logo', array(
		'section' => 'section_logo_pro',
		'priority'   => 10,
		))
	);

	/* Setting - General - Site Logo */
	$wp_customize->add_setting('pro_theme_logo_width',array(
		'default' => '150',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'pro_theme_logo_width', array(
		'label'    => esc_html__( 'Logo Width (px)', 'soundbyte-progression' ),
		'section'  => 'section_logo_pro',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		),
	) ) );

	/* Setting - General - Site Logo */
	$wp_customize->add_setting('theme_logo_margin_top',array(
		'default' => '30',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'theme_logo_margin_top', array(
		'label'    => esc_html__( 'Logo Margin Top (px)', 'soundbyte-progression' ),
		'section'  => 'section_logo_pro',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		),
	) ) );

	/* Setting - General - Site Logo */
	$wp_customize->add_setting('theme_logo_margin_bottom',array(
		'default' => '30',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'theme_logo_margin_bottom', array(
		'label'    => esc_html__( 'Logo Margin Bottom (px)', 'soundbyte-progression' ),
		'section'  => 'section_logo_pro',
		'priority'   => 25,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		),
	) ) );

	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'pro_theme_fav_icon' ,array(
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'pro_theme_fav_icon', array(
		'label'    => esc_html__( 'Favicon', 'soundbyte-progression' ),
		'description'    => esc_html__( 'File must be .png or .ico format. Recommended Dimensions: 32px by 32px', 'soundbyte-progression' ),
		'section' => 'section_logo_pro',
		'priority'   => 40,
		))
	);









	/* Section - General - Fixed Navigation */
	$wp_customize->add_section( 'section_sticky_navigation', array(
		'title'          => esc_html__( 'Sticky Navigation', 'soundbyte-progression' ),
		'panel'          => 'general_panel_pro', // Not typically needed.
		'priority'       => 15,
	) );
	/* Section - General - Sticky Navigation */
	$wp_customize->add_setting( 'fixed_menu_pro', array(
		'default' => 'not-fixed-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'fixed_menu_pro', array(
		'section'  => 'section_sticky_navigation',
		'priority'   => 5,
		'choices'     => array(
			'fixed-pro' => esc_html__( 'Show Sticky Nav', 'soundbyte-progression' ),
			'not-fixed-pro' => esc_html__( 'Hide Sticky Nav', 'soundbyte-progression' ),
		),
	) ) );


	/* Setting - General - Sticky Navigation */
	$wp_customize->add_setting( 'sticky_pro_theme_logo' ,array(
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'sticky_pro_theme_logo', array(
		'label'    => esc_html__( 'Optional Sticky Nav Logo', 'soundbyte-progression' ),
		'section' => 'section_sticky_navigation',
		'priority'   => 10,
		))
	);

	/* Setting - General - Sticky Navigation */
	$wp_customize->add_setting('sticky_pro_theme_logo_width',array(
		'default' => '130',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'sticky_pro_theme_logo_width', array(
		'label'    => esc_html__( 'Logo Width (px)', 'soundbyte-progression' ),
		'section'  => 'section_sticky_navigation',
		'priority'   => 12,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		),
	) ) );


	/* Setting - General - Sticky Navigation */
	$wp_customize->add_setting('sticky_theme_logo_margin_top',array(
		'default' => '20',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'sticky_theme_logo_margin_top', array(
		'label'    => esc_html__( 'Logo Margin Top (px)', 'soundbyte-progression' ),
		'section'  => 'section_sticky_navigation',
		'priority'   => 30,
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		),
	) ) );
	/* Setting - General - Sticky Navigation */
	$wp_customize->add_setting('sticky_theme_logo_margin_bottom',array(
		'default' => '20',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'sticky_theme_logo_margin_bottom', array(
		'label'    => esc_html__( 'Logo Margin Bottom (px)', 'soundbyte-progression' ),
		'section'  => 'section_sticky_navigation',
		'priority'   => 35,
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		),
	) ) );
	/* Setting - General - Sticky Navigation */
	$wp_customize->add_setting('sticky_theme_nav_padding',array(
		'default' => '15',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'sticky_theme_nav_padding', array(
		'label'    => esc_html__( 'Navigation Margin Top/Bottom', 'soundbyte-progression' ),
		'section'  => 'section_sticky_navigation',
		'priority'   => 40,
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		),
	) ) );

	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'sticky_font_color_pro', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sticky_font_color_pro', array(
		'label'    => esc_html__( 'Sticky Font Color', 'soundbyte-progression' ),
		'section'  => 'section_sticky_navigation',
		'priority'   => 55,
		)
	) );


	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'sticky_hover_font_color_pro', array(
		'default'	=> '',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sticky_hover_font_color_pro', array(
		'label'    => esc_html__( 'Sticky Hover Font Color', 'soundbyte-progression' ),
		'section'  => 'section_sticky_navigation',
		'priority'   => 55,
		)
	) );



	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'sticky_header_bg_color_pro', array(
		'default'	=> 'rgba(26, 23, 26, 0.9)',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Customize_Alpha_Color_Control($wp_customize, 'sticky_header_bg_color_pro', array(
		'default'	=> 'rgba(26, 23, 26, 0.9)',
		'label'    => esc_html__( 'Header Background Color', 'soundbyte-progression' ),
		'section'  => 'section_sticky_navigation',
		'priority'   => 100,
		)
	) );



	/* Section - General - Layout */
	$wp_customize->add_section( 'section_global_pro', array(
		'title'          => esc_html__( 'General Layout', 'soundbyte-progression' ),
		'panel'          => 'general_panel_pro', // Not typically needed.
		'priority'       => 26,
	) );

	/* Setting - General - Layout */
	$wp_customize->add_setting( 'pro_site_layout_wide', array(
		'default' => 'full-width-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'pro_site_layout_wide', array(
		'label'    => esc_html__( 'Site Layout', 'soundbyte-progression' ),
		'section'  => 'section_global_pro',
		'priority'   => 10,
		'choices'     => array(
			'full-width-pro' => esc_html__( 'Full Width', 'soundbyte-progression' ),
			'boxed-pro' => esc_html__( 'Boxed', 'soundbyte-progression' ),
		),
	) ) );



	/* Section - General - Page Transitions */
	$wp_customize->add_section( 'section_page_transition_pro', array(
		'title'          => esc_html__( 'Page Loader', 'soundbyte-progression' ),
		'panel'          => 'general_panel_pro', // Not typically needed.
		'priority'       => 26,
	) );

	/* Setting - General - Page Transitions */
	$wp_customize->add_setting( 'pro_page_transition' ,array(
		'default' => 'transition-off-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'pro_page_transition', array(
		'label'    => esc_html__( 'Display Page Loader?', 'soundbyte-progression' ),
		'section' => 'section_page_transition_pro',
		'priority'   => 10,
		'choices'     => array(
			'transition-on-pro' => esc_html__( 'On', 'soundbyte-progression' ),
			'transition-off-pro' => esc_html__( 'Off', 'soundbyte-progression' ),
		),
		))
	);


	/* Setting - General - Page Transitions */
	$wp_customize->add_setting( 'pro_transition_loader' ,array(
		'default' => 'cube-grid-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'pro_transition_loader', array(
		'label'    => esc_html__( 'Page Loader Animation', 'soundbyte-progression' ),
		'section' => 'section_page_transition_pro',
		'type' => 'select',
		'priority'   => 15,
		'choices' => array(
	        'cube-grid-pro' => esc_html__( 'Cube Grid Animation', 'soundbyte-progression' ),
	        'rotating-plane-pro' => esc_html__( 'Rotating Plane Animation', 'soundbyte-progression' ),
	        'double-bounce-pro' => esc_html__( 'Doube Bounce Animation', 'soundbyte-progression' ),
	        'sk-rectangle-pro' => esc_html__( 'Rectangle Animation', 'soundbyte-progression' ),
			'sk-cube-pro' => esc_html__( 'Wandering Cube Animation', 'soundbyte-progression' ),
			'sk-chasing-dots-pro' => esc_html__( 'Chasing Dots Animation', 'soundbyte-progression' ),
			'sk-circle-child-pro' => esc_html__( 'Circle Animation', 'soundbyte-progression' ),

		 ),
		)
	);


	/* Setting - General - Page Transitions */
	$wp_customize->add_setting( 'pro_loading_text_new' ,array(
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'pro_loading_text_new', array(
		'label'    => esc_html__( 'Optional Loading Text', 'soundbyte-progression' ),
		'section' => 'section_page_transition_pro',
		'type' => 'text',
		'priority'   => 25,
		)
	);


	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_page_loader_text', array(
		'default' => '#24cdc1',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pro_page_loader_text', array(
		'label'    => esc_html__( 'Page Loader Color', 'soundbyte-progression' ),
		'section'  => 'section_page_transition_pro',
		'priority'   => 30,
	) ) );


	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_page_loader_bg', array(
		'default' => '#1b1d27',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pro_page_loader_bg', array(
		'label'    => esc_html__( 'Page Loader Background', 'soundbyte-progression' ),
		'section'  => 'section_page_transition_pro',
		'priority'   => 35,
	) ) );





	/* Section - General - Custom CSS */
	$wp_customize->add_section( 'section_css_pro', array(
		'title'          => esc_html__( 'Custom CSS', 'soundbyte-progression' ),
		'panel'          => 'general_panel_pro', // Not typically needed.
		'priority'       => 150,
	) );

	/* Setting - General - Custom CSS */
	$wp_customize->add_setting( 'custom_css_pro' ,array(
		'default' => '',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'custom_css_pro', array(
		'description'          => esc_html__( 'Add-in any custom styles here', 'soundbyte-progression' ),
		'section' => 'section_css_pro',
		'type' => 'textarea',
		'priority'   => 10,
		)
	);

	/* Panel - Header */
	$wp_customize->add_panel( 'header_panel_pro', array(
		'priority'    => 14,
        'title'       => esc_html__( 'Header', 'soundbyte-progression' ),
    ) );


		/* Section - Typography - Header/Navigation Fonts */
		$wp_customize->add_setting('nav_padding_top_bottom',array(
			'default' => '0',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'nav_padding_top_bottom', array(
			'label'    => esc_html__( 'Margin Top', 'soundbyte-progression' ),
			'section'  => 'tt_font_pro-navigation-font',
			'priority'   => 505,
			'choices'     => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1
			),
		) ) );
		/* Section - Typography - Header/Navigation Fonts */
		$wp_customize->add_setting('nav_padding_bottom_bottom',array(
			'default' => '26',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'nav_padding_bottom_bottom', array(
			'label'    => esc_html__( 'Margin Bottom', 'soundbyte-progression' ),
			'section'  => 'tt_font_pro-navigation-font',
			'priority'   => 505,
			'choices'     => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1
			),
		) ) );

		$wp_customize->add_setting('nav_font_size_pro',array(
			'default' => '13',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'nav_font_size_pro', array(
			'label'    => esc_html__( 'Font Size', 'soundbyte-progression' ),
			'section'  => 'tt_font_pro-navigation-font',
			'priority'   => 505,
			'choices'     => array(
				'min'  => 0,
				'max'  => 40,
				'step' => 1
			),
		) ) );
		$wp_customize->add_setting( 'nav_font_color_pro', array(
			'default' => '#DEDEDE',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_font_color_pro', array(
			'label'    => esc_html__( 'Font Color', 'soundbyte-progression' ),
			'section'  => 'tt_font_pro-navigation-font',
			'priority'   => 510,
		) ) );
		$wp_customize->add_setting( 'nav_hover_font_color_pro', array(
			'default' => '#ffffff',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_hover_font_color_pro', array(
			'label'    => esc_html__( 'Font Hover Color', 'soundbyte-progression' ),
			'section'  => 'tt_font_pro-navigation-font',
			'priority'   => 515,
		) ) );

		$wp_customize->add_setting( 'nav_border_font_color_pro', array(
			'default' => '#0ce682',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_border_font_color_pro', array(
			'label'    => esc_html__( 'Hover Border Bottom Color', 'soundbyte-progression' ),
			'section'  => 'tt_font_pro-navigation-font',
			'priority'   => 515,
		) ) );


		$wp_customize->add_setting( 'header_cart_bg_pro', array(
			'default' => '#0ce682',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_cart_bg_pro', array(
			'label'    => esc_html__( 'Cart Icon Background', 'soundbyte-progression' ),
			'section'  => 'tt_font_pro-navigation-font',
			'priority'   => 525,
		) ) );


		/* Section - Typography - SUB Sub-Navigation Fonts */
		$wp_customize->add_setting('sub_nav_padding_top_bottom',array(
			'default' => '15',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'sub_nav_padding_top_bottom', array(
			'label'    => esc_html__( 'Padding Top/Bottom', 'soundbyte-progression' ),
			'section'  => 'tt_font_pro-sub-navigation-font',
			'priority'   => 505,
			'choices'     => array(
				'min'  => 0,
				'max'  => 80,
				'step' => 1
			),
		) ) );
		$wp_customize->add_setting('sub_nav_font_size_pro',array(
			'default' => '12',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'sub_nav_font_size_pro', array(
			'label'    => esc_html__( 'Font Size', 'soundbyte-progression' ),
			'section'  => 'tt_font_pro-sub-navigation-font',
			'priority'   => 505,
			'choices'     => array(
				'min'  => 0,
				'max'  => 40,
				'step' => 1
			),
		) ) );
		$wp_customize->add_setting( 'sub_nav_font_color_pro', array(
			'default' => '#DEDEDE',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sub_nav_font_color_pro', array(
			'label'    => esc_html__( 'Font Color', 'soundbyte-progression' ),
			'section'  => 'tt_font_pro-sub-navigation-font',
			'priority'   => 510,
		) ) );
		$wp_customize->add_setting( 'sub_nav_hover_font_color_pro', array(
			'default' => '#ffffff',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sub_nav_hover_font_color_pro', array(
			'label'    => esc_html__( 'Font Hover Color', 'soundbyte-progression' ),
			'section'  => 'tt_font_pro-sub-navigation-font',
			'priority'   => 515,
		) ) );


		$wp_customize->add_setting( 'sub_nav_border_color_pro', array(
			'default' => 'rgba(255,255,255,  0.06)',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new Progression_Customize_Alpha_Color_Control($wp_customize, 'sub_nav_border_color_pro', array(
			'default' => 'rgba(255,255,255,  0.06)',
			'label'    => esc_html__( 'Divider Color', 'soundbyte-progression' ),
			'section'  => 'tt_font_pro-sub-navigation-font',
			'priority'   => 550,
		) ) );


		/* Setting - Backgrounds - Header Background */
		$wp_customize->add_setting( 'sub_navigation_bg_color', array(
			'default'	=> '#1a171a',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new Progression_Customize_Alpha_Color_Control($wp_customize, 'sub_navigation_bg_color', array(
			'default'	=> '#1a171a',
			'label'    => esc_html__( 'Background Color', 'soundbyte-progression' ),
			'section'  => 'tt_font_pro-sub-navigation-font',
			'priority'   => 600,
			)
		) );


			/* Section - Backgrounds - Header Background */
			$wp_customize->add_section( 'section_slider_pro', array(
				'title'          => esc_html__( 'Slider Settings', 'soundbyte-progression' ),
				'panel'          => 'header_panel_pro', // Not typically needed.
				'priority'       => 500,
			) );

			/* Setting - General - Footer */
			$wp_customize->add_setting( 'slider_count_pro' ,array(
				'default' => '2',
				'sanitize_callback' => 'progression_sanitize_text',
			) );
			$wp_customize->add_control( 'slider_count_pro', array(
				'label'          => esc_html__( 'Slider post count', 'soundbyte-progression' ),
				'section' => 'section_slider_pro',
				'type' => 'text',
				'priority'   => 10,
				)
			);

			/* Setting - Backgrounds - Header Background */
			$wp_customize->add_setting( 'slider_transition_pro', array(
				'default' => 'fade',
				'sanitize_callback' => 'progression_sanitize_text',
			) );
			$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'slider_transition_pro', array(
				'label'    => esc_html__( 'Slider Transition', 'soundbyte-progression' ),
				'section'  => 'section_slider_pro',
				'priority'   => 15,
				'choices'     => array(
					'fade' => esc_html__( 'Fade', 'soundbyte-progression' ),
					'slide' => esc_html__( 'Slide', 'soundbyte-progression' ),
				),)
			) );

			/* Setting - Backgrounds - Header Background */
			$wp_customize->add_setting( 'slider_autoplay_pro', array(
				'default' => 'false',
				'sanitize_callback' => 'progression_sanitize_text',
			) );
			$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'slider_autoplay_pro', array(
				'label'    => esc_html__( 'Slider Autoplay', 'soundbyte-progression' ),
				'section'  => 'section_slider_pro',
				'priority'   => 15,
				'choices'     => array(
					'true' => esc_html__( 'On', 'soundbyte-progression' ),
					'false' => esc_html__( 'Off', 'soundbyte-progression' ),
				),)
			) );

			/* Setting - General - Footer */
			$wp_customize->add_setting( 'slider_autoplay_time_pro' ,array(
				'default' => '7000',
				'sanitize_callback' => 'progression_sanitize_text',
			) );
			$wp_customize->add_control( 'slider_autoplay_time_pro', array(
				'label'          => esc_html__( 'Slider Autoplay Time (milliseconds)', 'soundbyte-progression' ),
				'section' => 'section_slider_pro',
				'type' => 'text',
				'priority'   => 20,
				)
			);

			/* Setting - Backgrounds - Header Background */
			$wp_customize->add_setting( 'slider_next_prev_pro', array(
				'default' => 'true',
				'sanitize_callback' => 'progression_sanitize_text',
			) );
			$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'slider_next_prev_pro', array(
				'label'    => esc_html__( 'Slider Next/Prev Arrows', 'soundbyte-progression' ),
				'section'  => 'section_slider_pro',
				'priority'   => 30,
				'choices'     => array(
					'true' => esc_html__( 'On', 'soundbyte-progression' ),
					'false' => esc_html__( 'Off', 'soundbyte-progression' ),
				),)
			) );

			/* Setting - Backgrounds - Header Background */
			$wp_customize->add_setting( 'slider_bullet_pro', array(
				'default' => 'true',
				'sanitize_callback' => 'progression_sanitize_text',
			) );
			$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'slider_bullet_pro', array(
				'label'    => esc_html__( 'Slider Bullet Navigation', 'soundbyte-progression' ),
				'section'  => 'section_slider_pro',
				'priority'   => 35,
				'choices'     => array(
					'true' => esc_html__( 'On', 'soundbyte-progression' ),
					'false' => esc_html__( 'Off', 'soundbyte-progression' ),
				),)
			) );



	/* Section - Backgrounds - Header Background */
	$wp_customize->add_section( 'section_header_bg_pro', array(
		'title'          => esc_html__( 'Header Background', 'soundbyte-progression' ),
		'panel'          => 'header_panel_pro', // Not typically needed.
		'priority'       => 40,
	) );

	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'header_divider_pro', array(
		'default'	=> 'rgba(208, 199, 208, 0.1)',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Customize_Alpha_Color_Control($wp_customize, 'header_divider_pro', array(
		'default'	=> 'rgba(208, 199, 208, 0.1)',
		'label'    => esc_html__( 'Header Divider Color', 'soundbyte-progression' ),
		'section'  => 'section_header_bg_pro',
		'priority'   => 5,
		)
	) );


	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'header_bg_color_pro', array(
		'default'	=> 'rgba(0, 0, 0,  0)',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Customize_Alpha_Color_Control($wp_customize, 'header_bg_color_pro', array(
		'default'	=> 'rgba(0, 0, 0,  0)',
		'label'    => esc_html__( 'Header Background Color', 'soundbyte-progression' ),
		'section'  => 'section_header_bg_pro',
		'priority'   => 10,
		)
	) );






	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'header_img_bg_image_pro' ,array(
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'header_img_bg_image_pro', array(
		'label'    => esc_html__( 'Header Background Image', 'soundbyte-progression' ),
		'section' => 'section_header_bg_pro',
		'priority'   => 30,
		)
	) );
	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'header_img_bg_cover_pro', array(
		'default' => 'cover-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'header_img_bg_cover_pro', array(
		'label'    => esc_html__( 'Background Cover or Pattern', 'soundbyte-progression' ),
		'section'  => 'section_header_bg_pro',
		'priority'   => 40,
		'choices'     => array(
			'cover-pro' => esc_html__( 'Cover', 'soundbyte-progression' ),
			'pattern-pro' => esc_html__( 'Pattern', 'soundbyte-progression' ),
		),)
	) );







	  	/* Setting - Backgrounds - Body Background */

		  	$wp_customize->add_setting( 'sidebar_divider_pro', array(
		  		'default'	=> 'rgba(26,23,26,0.08)',
		  		'sanitize_callback' => 'progression_sanitize_text',
		  	) );
		  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_divider_pro', array(
				'default'	=> 'rgba(26,23,26,0.08)',
		  		'label'    => esc_html__( 'Sidebar Divider Color', 'soundbyte-progression' ),
		  		'section'  => 'tt_font_pro-sidebar',
		  		'priority'   => 25,
		  		)
		  	) );



			  	/* Setting - Backgrounds - Body Background */
			  	$wp_customize->add_setting( 'sidebar_link_color_pro', array(
			  		'default'	=> 'rgba(26, 23, 26, 0.76)',
			  		'sanitize_callback' => 'progression_sanitize_text',
			  	) );
			  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_link_color_pro', array(
			  		'label'    => esc_html__( 'Sidebar Link Color', 'soundbyte-progression' ),
			  		'section'  => 'tt_font_pro-sidebar',
			  		'priority'   => 600,
			  		)
			  	) );

	  	/* Setting - Backgrounds - Body Background */
	  	$wp_customize->add_setting( 'sidebar_link_hover_pro', array(
	  		'default'	=> 'rgba(26, 23, 26, 1)',
	  		'sanitize_callback' => 'progression_sanitize_text',
	  	) );
	  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_link_hover_pro', array(
	  		'label'    => esc_html__( 'Sidebar Link Hover Color', 'soundbyte-progression' ),
	  		'section'  => 'tt_font_pro-sidebar',
	  		'priority'   => 605,
	  		)
	  	) );





	/* Setting - General - Site Logo */
	$wp_customize->add_setting('pro_button_font_size',array(
		'default' => '13',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'pro_button_font_size', array(
		'label'    => esc_html__( 'Button Font Size (px)', 'soundbyte-progression' ),
		'section'  => 'tt_font_pro-buttons-default',
		'priority'   => 400,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
	) ) );

  	/* Setting - Backgrounds - Body Background */
  	$wp_customize->add_setting( 'button_font_color_pro', array(
  		'default'	=> '#fff',
  		'sanitize_callback' => 'progression_sanitize_text',
  	) );
  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_font_color_pro', array(
  		'label'    => esc_html__( 'Button Color', 'soundbyte-progression' ),
  		'section'  => 'tt_font_pro-buttons-default',
  		'priority'   => 430,
  		)
  	) );


  	/* Setting - Backgrounds - Body Background */
  	$wp_customize->add_setting( 'button_font_background_pro', array(
  		'default'	=> '#0ce682',
  		'sanitize_callback' => 'progression_sanitize_text',
  	) );
  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_font_background_pro', array(
  		'label'    => esc_html__( 'Button Background', 'soundbyte-progression' ),
  		'section'  => 'tt_font_pro-buttons-default',
  		'priority'   => 440,
  		)
  	) );



	  	/* Setting - Backgrounds - Body Background */
	  	$wp_customize->add_setting( 'button_font_hover_pro', array(
	  		'default'	=> '#0ce682',
	  		'sanitize_callback' => 'progression_sanitize_text',
	  	) );
	  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_font_hover_pro', array(
	  		'label'    => esc_html__( 'Button Font Hover', 'soundbyte-progression' ),
	  		'section'  => 'tt_font_pro-buttons-default',
	  		'priority'   => 448,
	  		)
	  	) );
  	/* Setting - Backgrounds - Body Background */
  	$wp_customize->add_setting( 'button_font_background_hover_pro', array(
  		'default'	=> '#fff',
  		'sanitize_callback' => 'progression_sanitize_text',
  	) );
  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_font_background_hover_pro', array(
  		'label'    => esc_html__( 'Button Background Hover', 'soundbyte-progression' ),
  		'section'  => 'tt_font_pro-buttons-default',
  		'priority'   => 450,
  		)
  	) );


	/* Setting - Backgrounds - Body Background */
  	$wp_customize->add_setting( 'button_font_background_secondary', array(
  		'default'	=> '#26afd1',
  		'sanitize_callback' => 'progression_sanitize_text',
  	) );
  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_font_background_secondary', array(
  		'label'    => esc_html__( 'Secondary Buttons Background Hover', 'soundbyte-progression' ),
  		'section'  => 'tt_font_pro-buttons-default',
  		'priority'   => 450,
  		)
  	) );





  	/* Setting - Backgrounds - Body Background */
  	$wp_customize->add_setting( 'blog_link_heading_color', array(
  		'default'	=> '#1a171a',
  		'sanitize_callback' => 'progression_sanitize_text',
  	) );
  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blog_link_heading_color', array(
  		'label'    => esc_html__( 'Blog Heading Link Color', 'soundbyte-progression' ),
  		'section'  => 'tt_font_pro-blog-headings',
  		'priority'   => 500,
  		)
  	) );


  	/* Setting - Backgrounds - Body Background */
  	$wp_customize->add_setting( 'blog_link_heading_hover_color', array(
  		'default'	=> '#0ce682',
  		'sanitize_callback' => 'progression_sanitize_text',
  	) );
  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blog_link_heading_hover_color', array(
  		'label'    => esc_html__( 'Blog Heading Link Hover Color', 'soundbyte-progression' ),
  		'section'  => 'tt_font_pro-blog-headings',
  		'priority'   => 505,
  		)
  	) );



	/* Panel - Typography */
	$wp_customize->add_panel( 'body_main_panel_pro', array(
		'priority'    => 20,
        'title'       => esc_html__( 'Body', 'soundbyte-progression' ),
    ) );


  	/* Setting - Backgrounds - Body Background */
  	$wp_customize->add_setting( 'default_font_link_pro', array(
  		'default'	=> '#26afd1',
  		'sanitize_callback' => 'progression_sanitize_text',
  	) );
  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'default_font_link_pro', array(
  		'label'    => esc_html__( 'Default Link Color', 'soundbyte-progression' ),
  		'section'  => 'tt_font_pro-global',
  		'priority'   => 425,
  		)
  	) );


	  	/* Setting - Backgrounds - Body Background */
	  	$wp_customize->add_setting( 'default_hover_link_font_color_pro', array(
	  		'default'	=> '#0ce682',
	  		'sanitize_callback' => 'progression_sanitize_text',
	  	) );
	  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'default_hover_link_font_color_pro', array(
	  		'label'    => esc_html__( 'Default Link Hover Color', 'soundbyte-progression' ),
	  		'section'  => 'tt_font_pro-global',
	  		'priority'   => 425,
	  		)
	  	) );



			/* Setting - General - Site Logo */
			$wp_customize->add_setting('pro_padding_top_page_title',array(
				'default' => '187',
				'sanitize_callback' => 'progression_sanitize_text',
			) );
			$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'pro_padding_top_page_title', array(
				'label'    => esc_html__( 'Page Title Padding Top (px)', 'soundbyte-progression' ),
				'section'  => 'tt_font_pro-page-title-headings',
				'priority'   => 420,
				'choices'     => array(
					'min'  => 0,
					'max'  => 300,
					'step' => 1
				),
			) ) );


			/* Setting - General - Site Logo */
			$wp_customize->add_setting('pro_padding_bottom_page_title',array(
				'default' => '105',
				'sanitize_callback' => 'progression_sanitize_text',
			) );
			$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'pro_padding_bottom_page_title', array(
				'label'    => esc_html__( 'Page Title Padding Bottom (px)', 'soundbyte-progression' ),
				'section'  => 'tt_font_pro-page-title-headings',
				'priority'   => 420,
				'choices'     => array(
					'min'  => 0,
					'max'  => 300,
					'step' => 1
				),
			) ) );


 	/* Setting - Backgrounds - Body Background */
 	$wp_customize->add_setting( 'page_title_bg_pro', array(
 		'default'	=> '#060326',
 		'sanitize_callback' => 'progression_sanitize_text',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'page_title_bg_pro', array(
 		'label'    => esc_html__( 'Page Title Background Color', 'soundbyte-progression' ),
 		'section'  => 'tt_font_pro-page-title-headings',
 		'priority'   => 425,
 		)
 	) );



		/* Setting - Backgrounds - Footer Background */
		$wp_customize->add_setting( 'page_title_bg_image_pro' ,array(
			'default' => get_template_directory_uri().'/images/page-title.jpg',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'page_title_bg_image_pro', array(
			'label'    => esc_html__( 'Page Title Background Image', 'soundbyte-progression' ),
			'section' => 'tt_font_pro-page-title-headings',
			'priority'   => 450,
			)
		) );
		/* Setting - Backgrounds - Footer Background */
		$wp_customize->add_setting( 'page_title_bg_cover_pro', array(
			'default' => 'cover-pro',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'page_title_bg_cover_pro', array(
			'label'    => esc_html__( 'Background Cover or Pattern', 'soundbyte-progression' ),
			'section'  => 'tt_font_pro-page-title-headings',
			'priority'   => 460,
			'choices'     => array(
				'cover-pro' => esc_html__( 'Cover', 'soundbyte-progression' ),
				'pattern-pro' => esc_html__( 'Pattern', 'soundbyte-progression' ),
			),)
		) );






	/* Section - Backgrounds - Body Background */
	$wp_customize->add_section( 'section_body_pro', array(
		'title'          => esc_html__( 'Body Background', 'soundbyte-progression' ),
		'panel'          => 'body_main_panel_pro', // Not typically needed.
		'priority'       => 200,
	) );

	/* Setting - Backgrounds - Body Background */
	$wp_customize->add_setting( 'body_bg_color_pro', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Customize_Alpha_Color_Control($wp_customize, 'body_bg_color_pro', array(
		'default'	=> '#ffffff',
		'label'    => esc_html__( 'Background Color', 'soundbyte-progression' ),
		'section'  => 'section_body_pro',
		'priority'   => 10,
		)
	) );
	/* Setting - Backgrounds - Body Background */
	$wp_customize->add_setting( 'body_bg_image_pro' ,array(
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'body_bg_image_pro', array(
		'label'    => esc_html__( 'Background Image', 'soundbyte-progression' ),
		'section' => 'section_body_pro',
		'priority'   => 20,
		)
	) );
	/* Setting - Backgrounds - Body Background */
	$wp_customize->add_setting( 'body_bg_cover_pro', array(
		'default' => 'cover-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'body_bg_cover_pro', array(
		'label'    => esc_html__( 'Background Cover or Pattern', 'soundbyte-progression' ),
		'section'  => 'section_body_pro',
		'priority'   => 30,
		'choices'     => array(
			'cover-pro' => esc_html__( 'Cover', 'soundbyte-progression' ),
			'pattern-pro' => esc_html__( 'Pattern', 'soundbyte-progression' ),
		),)
	) );



	/* Section - Backgrounds - Boxed Background */
	$wp_customize->add_section( 'section_boxed_pro', array(
		'title'          => esc_html__( 'Boxed Layout Background', 'soundbyte-progression' ),
		'panel'          => 'body_main_panel_pro', // Not typically needed.
		'priority'       => 240,
	) );

	/* Setting - Backgrounds - Boxed Background */
	$wp_customize->add_setting( 'boxed_bg_color_pro', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Customize_Alpha_Color_Control($wp_customize, 'boxed_bg_color_pro', array(
		'default'	=> '#ffffff',
		'label'    => esc_html__( 'Background Color', 'soundbyte-progression' ),
		'section'  => 'section_boxed_pro',
		'priority'   => 10,
		)
	) );
	/* Setting - Backgrounds - Boxed Background */
	$wp_customize->add_setting( 'boxed_bg_image_pro' ,array(
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'boxed_bg_image_pro', array(
		'label'    => esc_html__( 'Background Image', 'soundbyte-progression' ),
		'section' => 'section_boxed_pro',
		'priority'   => 20,
		)
	) );
	/* Setting - Backgrounds - Boxed Background */
	$wp_customize->add_setting( 'boxed_bg_cover_pro', array(
		'default' => 'cover-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'boxed_bg_cover_pro', array(
		'label'    => esc_html__( 'Background Cover or Pattern', 'soundbyte-progression' ),
		'section'  => 'section_boxed_pro',
		'priority'   => 30,
		'choices'     => array(
			'cover-pro' => esc_html__( 'Cover', 'soundbyte-progression' ),
			'pattern-pro' => esc_html__( 'Pattern', 'soundbyte-progression' ),
		),)
	) );






	/* Panel - Footer */
	$wp_customize->add_panel( 'footer_panel_pro', array(
		'priority'    => 25,
        'title'       => esc_html__( 'Footer', 'soundbyte-progression' ),
    ) );


	/* Section - General - Logo */
	$wp_customize->add_section( 'section_logo_footer_pro', array(
		'title'          => esc_html__( 'Footer Logo', 'soundbyte-progression' ),
		'panel'          => 'footer_panel_pro', // Not typically needed.
		'priority'       => 10,
	) );

	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_theme_logo_footer' ,array(
		'default' => get_template_directory_uri().'/images/logo-footer.png',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_theme_logo_footer', array(
		'section' => 'section_logo_footer_pro',
		'priority'   => 10,
		))
	);

	/* Setting - General - Site Logo */
	$wp_customize->add_setting('pro_theme_logo_width_footer',array(
		'default' => '150',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'pro_theme_logo_width_footer', array(
		'label'    => esc_html__( 'Logo Width (px)', 'soundbyte-progression' ),
		'section'  => 'section_logo_footer_pro',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		),
	) ) );

	/* Setting - General - Site Logo */
	$wp_customize->add_setting('theme_logo_margin_top_footer',array(
		'default' => '0',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'theme_logo_margin_top_footer', array(
		'label'    => esc_html__( 'Logo Margin Top (px)', 'soundbyte-progression' ),
		'section'  => 'section_logo_footer_pro',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		),
	) ) );

	/* Setting - General - Site Logo */
	$wp_customize->add_setting('theme_logo_margin_bottom_footer',array(
		'default' => '15',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new Progression_Controls_Slider_Control($wp_customize, 'theme_logo_margin_bottom_footer', array(
		'label'    => esc_html__( 'Logo Margin Bottom (px)', 'soundbyte-progression' ),
		'section'  => 'section_logo_footer_pro',
		'priority'   => 25,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		),
	) ) );



	/* Section - General - Footer */
	$wp_customize->add_section( 'section_copyright_text_pro', array(
		'title'          => esc_html__( 'Footer General', 'soundbyte-progression' ),
		'panel'          => 'footer_panel_pro', // Not typically needed.
		'priority'       => 5,
	) );
	/* Setting - General - Footer */
	$wp_customize->add_setting( 'footer_copyright_pro' ,array(
		'default' => '2016 All Rights Reserved. Developed by ProgressionStudios',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'footer_copyright_pro', array(
		'section' => 'section_copyright_text_pro',
		'type' => 'text',
		'priority'   => 10,
		)
	);

	/* Section - Layout - Footer */
	$wp_customize->add_setting( 'pro_widget_count', array(
		'default' => 'footer-4-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'pro_widget_count', array(
		'label'    => esc_html__( 'Footer Widget Count', 'soundbyte-progression' ),
		'section'  => 'section_copyright_text_pro',
		'priority'   => 20,
		'choices'     => array(
			'footer-1-pro' => esc_html__( '1', 'soundbyte-progression' ),
			'footer-2-pro' => esc_html__( '2', 'soundbyte-progression' ),
			'footer-3-pro' => esc_html__( '3', 'soundbyte-progression' ),
			'footer-4-pro' => esc_html__( '4', 'soundbyte-progression' ),
			'footer-5-pro' => esc_html__( '5', 'soundbyte-progression' ),
		),
	) ) );

	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'copyright_color_pro', array(
		'default' => 'rgba(255, 255, 255, 0.57)',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'copyright_color_pro', array(
		'label'    => esc_html__( 'Copyright Font Color', 'soundbyte-progression' ),
		'section'  => 'section_copyright_text_pro',
		'priority'   => 15,
	) ) );





	/* Section - General - Scroll To Top */
	$wp_customize->add_section( 'section_scroll_pro', array(
		'title'          => esc_html__( 'Scroll To Top Button', 'soundbyte-progression' ),
		'panel'          => 'footer_panel_pro', // Not typically needed.
		'priority'       => 500,
	) );

	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_scroll_top', array(
		'default' => 'scroll-on-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'pro_scroll_top', array(
		'label'    => esc_html__( 'Scroll To Top Button', 'soundbyte-progression' ),
		'section'  => 'section_scroll_pro',
		'priority'   => 10,
		'choices'     => array(
			'scroll-on-pro' => esc_html__( 'On', 'soundbyte-progression' ),
			'scroll-off-pro' => esc_html__( 'Off', 'soundbyte-progression' ),
		),
	) ) );

	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_scroll_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pro_scroll_color', array(
		'label'    => esc_html__( 'Color', 'soundbyte-progression' ),
		'section'  => 'section_scroll_pro',
		'priority'   => 15,
	) ) );


	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_scroll_bg_color', array(
		'default' => 'rgba(0,0,0,  0.3)',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Customize_Alpha_Color_Control($wp_customize, 'pro_scroll_bg_color', array(
		'label'    => esc_html__( 'Background', 'soundbyte-progression' ),
		'default' => 'rgba(0,0,0,  0.3)',
		'section'  => 'section_scroll_pro',
		'priority'   => 20,
	) ) );

	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_scroll_border_color', array(
		'default' => 'rgba(255,255,255,  0.2)',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Customize_Alpha_Color_Control($wp_customize, 'pro_scroll_border_color', array(
		'label'    => esc_html__( 'Border', 'soundbyte-progression' ),
		'default' => 'rgba(255,255,255,  0.2))',
		'section'  => 'section_scroll_pro',
		'priority'   => 25,
	) ) );

	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_scroll_hvr_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pro_scroll_hvr_color', array(
		'label'    => esc_html__( 'Hover Color', 'soundbyte-progression' ),
		'section'  => 'section_scroll_pro',
		'priority'   => 30,
	) ) );


	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_scroll_hvr_bg_color', array(
		'default' => '#0ce682',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Customize_Alpha_Color_Control($wp_customize, 'pro_scroll_hvr_bg_color', array(
		'label'    => esc_html__( 'Hover Background', 'soundbyte-progression' ),
		'default' => '#0ce682',
		'section'  => 'section_scroll_pro',
		'priority'   => 40,
	) ) );

	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_scroll_hvr_border_color', array(
		'default' => '#0ce682',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Customize_Alpha_Color_Control($wp_customize, 'pro_scroll_hvr_border_color', array(
		'label'    => esc_html__( 'Hover Border', 'soundbyte-progression' ),
		'default' => '#0ce682',
		'section'  => 'section_scroll_pro',
		'priority'   => 50,
	) ) );



	/* Section - Backgrounds - Footer Background */
	$wp_customize->add_section( 'section_footer_bg_pro', array(
		'title'          => esc_html__( 'Footer Background', 'soundbyte-progression' ),
		'panel'          => 'footer_panel_pro', // Not typically needed.
		'priority'       => 40,
	) );


	/* Setting - Backgrounds - Footer Background */
	$wp_customize->add_setting( 'footer_bg_color_pro', array(
		'default'	=> '#1a171a',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Customize_Alpha_Color_Control($wp_customize, 'footer_bg_color_pro', array(
		'default'	=> '#1a171a',
		'label'    => esc_html__( 'Footer Background Color', 'soundbyte-progression' ),
		'section'  => 'section_footer_bg_pro',
		'priority'   => 10,
		)
	) );
	/* Setting - Backgrounds - Footer Background */
	$wp_customize->add_setting( 'footer_bg_image_pro' ,array(
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'footer_bg_image_pro', array(
		'label'    => esc_html__( 'Footer Background Image', 'soundbyte-progression' ),
		'section' => 'section_footer_bg_pro',
		'priority'   => 20,
		)
	) );
	/* Setting - Backgrounds - Footer Background */
	$wp_customize->add_setting( 'footer_bg_cover_pro', array(
		'default' => 'cover-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'footer_bg_cover_pro', array(
		'label'    => esc_html__( 'Background Cover or Pattern', 'soundbyte-progression' ),
		'section'  => 'section_footer_bg_pro',
		'priority'   => 30,
		'choices'     => array(
			'cover-pro' => esc_html__( 'Cover', 'soundbyte-progression' ),
			'pattern-pro' => esc_html__( 'Pattern', 'soundbyte-progression' ),
		),)
	) );


	$wp_customize->add_setting( 'footer_font_link_pro', array(
		'default'	=> 'rgba(255, 255, 255, 0.76)',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_font_link_pro', array(
		'label'    => esc_html__( 'Footer Link Color', 'soundbyte-progression' ),
		'section'  => 'tt_font_pro-footer-font',
		'priority'   => 500,
		)
	) );


	$wp_customize->add_setting( 'footer_font_link_hover_pro', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_font_link_hover_pro', array(
		'label'    => esc_html__( 'Footer Link Hover Color', 'soundbyte-progression' ),
		'section'  => 'tt_font_pro-footer-font',
		'priority'   => 500,
		)
	) );

	
	/* Panel - Podcasting */
	$wp_customize->add_panel( 'panel_episode_pro', array(
		'priority'    => 22,
		'title'       => esc_html__( 'Podcasting', 'soundbyte-progression' ),
	) );
	
	/* Section - RSS */
	$wp_customize->add_section( 'section_rss_pro', array(
		'title'          => esc_html__( 'RSS Settings', 'soundbyte-progression' ),
		'panel'          => 'panel_episode_pro', // Not typically needed.
		'description' 	 => esc_html__( 'The Episode RSS feed is located in http://your-website.com/feed/episodes', 'soundbyte-progression' ),
		'priority'       => 10,
	) );	
	
	/* START RSS FEED DEFAULT CATEGORIES */
	$categories_progression = array(
		'' => esc_html__( 'N/A', 'soundbyte-progression' ),
		'Arts' => esc_html__( 'Arts', 'soundbyte-progression' ),
		'Business' => esc_html__( 'Business', 'soundbyte-progression' ),
		'Comedy' => esc_html__( 'Comedy', 'soundbyte-progression' ),
		'Education' => esc_html__( 'Education', 'soundbyte-progression' ),
		'Games & Hobbies' => esc_html__( 'Games & Hobbies', 'soundbyte-progression' ),
		'Government & Organizations' => esc_html__( 'Government & Organizations', 'soundbyte-progression' ),
		'Health' => esc_html__( 'Health', 'soundbyte-progression' ),
		'Kids & Family' => esc_html__( 'Kids & Family', 'soundbyte-progression' ),
		'Music' => esc_html__( 'Music', 'soundbyte-progression' ),
		'News & Politics' => esc_html__( 'News & Politics', 'soundbyte-progression' ),
		'Religion & Spirituality' => esc_html__( 'Religion & Spirituality', 'soundbyte-progression' ),
		'Science & Medicine' => esc_html__( 'Science & Medicine', 'soundbyte-progression' ),
		'Society & Culture' => esc_html__( 'Society & Culture', 'soundbyte-progression' ),
		'Sports & Recreation' => esc_html__( 'Sports & Recreation', 'soundbyte-progression' ),
		'Technology' => esc_html__( 'Technology', 'soundbyte-progression' ),
		'TV & Film' => esc_html__( 'TV & Film', 'soundbyte-progression' ),
	);
	$subcategories_progression = array(
		'' => esc_html__( 'N/A', 'soundbyte-progression' ),
		'Arts' => esc_html__( '** Arts **', 'soundbyte-progression' ),
		'Design' => esc_html__( '-- Design', 'soundbyte-progression' ),
		'Fashion & Beauty' => esc_html__( '-- Fashion & Beauty', 'soundbyte-progression' ),
		'Food' => esc_html__( '-- Food', 'soundbyte-progression' ),
		'Literature' => esc_html__( '-- Literature', 'soundbyte-progression' ),
		'Performing Arts' => esc_html__( '-- Performing Arts', 'soundbyte-progression' ),
		'Visual Arts' => esc_html__( '-- Visual Arts', 'soundbyte-progression' ),

		'Business' => esc_html__( '** Business **', 'soundbyte-progression' ),
		'Business News' => esc_html__( '-- Business News', 'soundbyte-progression' ),
		'Careers' => esc_html__( '-- Careers', 'soundbyte-progression' ),
		'Investing' => esc_html__( '-- Investing', 'soundbyte-progression' ),
		'Management & Marketing' => esc_html__( '-- Management & Marketing', 'soundbyte-progression' ),
		'Shopping' => esc_html__( '-- Shopping', 'soundbyte-progression' ),

		'Educations' => esc_html__( '** Education **', 'soundbyte-progression' ),
		'Education' => esc_html__( '-- Education', 'soundbyte-progression' ),
		'Education Technology' => esc_html__( '-- Education Technology', 'soundbyte-progression' ),
		'Higher Education' => esc_html__( '-- Higher Education', 'soundbyte-progression' ),
		'K-12' => esc_html__( '-- K-12', 'soundbyte-progression' ),
		'Language Courses' => esc_html__( '-- Language Courses', 'soundbyte-progression' ),
		'Training' => esc_html__( '-- Training', 'soundbyte-progression' ),

		'Games & Hobbies' => esc_html__( '** Games & Hobbies **', 'soundbyte-progression' ),
		'Automotive' => esc_html__( '-- Automotive', 'soundbyte-progression' ), 
		'Aviation' => esc_html__( '-- Aviation', 'soundbyte-progression' ), 
		'Hobbies' => esc_html__( '-- Hobbies', 'soundbyte-progression' ), 
		'Other Games' => esc_html__( '-- Other Games', 'soundbyte-progression' ), 
		'Video Games' => esc_html__( '-- Video Games', 'soundbyte-progression' ), 

		'Government & Organizations' => esc_html__( '** Government & Organizations **', 'soundbyte-progression' ),
		'Local' => esc_html__( '-- Local', 'soundbyte-progression' ), 
		'National' => esc_html__( '-- National', 'soundbyte-progression' ), 
		'Non-Profit' => esc_html__( '-- Non-Profit', 'soundbyte-progression' ), 
		'Regional' => esc_html__( '-- Regional', 'soundbyte-progression' ), 

		'Health' => esc_html__( '** Health **', 'soundbyte-progression' ),
		'Alternative Health' => esc_html__( '-- Alternative Health', 'soundbyte-progression' ), 
		'Fitness & Nutrition' => esc_html__( '-- Fitness & Nutrition', 'soundbyte-progression' ), 
		'Self-Help' => esc_html__( '-- Self-Help', 'soundbyte-progression' ), 
		'Sexuality' => esc_html__( '-- Sexuality', 'soundbyte-progression' ), 

		'Religion & Spirituality' => esc_html__( '** Religion & Spirituality **', 'soundbyte-progression' ),
		'Buddhism' => esc_html__( '-- Buddhism', 'soundbyte-progression' ), 
		'Christianity' => esc_html__( '-- Christianity', 'soundbyte-progression' ), 
		'Hinduism' => esc_html__( '-- Hinduism', 'soundbyte-progression' ), 
		'Islam' => esc_html__( '-- Islam', 'soundbyte-progression' ), 
		'Judaism' => esc_html__( '-- Judaism', 'soundbyte-progression' ), 
		'Other' => esc_html__( '-- Other', 'soundbyte-progression' ), 
		'Spirituality' => esc_html__( '-- Spirituality', 'soundbyte-progression' ), 
		
		'Science & Medicine' => esc_html__( '** Science & Medicine **', 'soundbyte-progression' ),
		'Medicine' => esc_html__( '-- Medicine', 'soundbyte-progression' ), 
		'Natural Sciences' => esc_html__( '-- Natural Sciences', 'soundbyte-progression' ), 
		'Social Sciences' => esc_html__( '-- Social Sciences', 'soundbyte-progression' ), 

		'Society & Culture' => esc_html__( '** Society & Culture **', 'soundbyte-progression' ),
		'History' => esc_html__( '-- History', 'soundbyte-progression' ), 
		'Personal Journals' => esc_html__( '-- Personal Journals', 'soundbyte-progression' ), 
		'Philosophy' => esc_html__( '-- Philosophy', 'soundbyte-progression' ), 
		'Places & Travel' => esc_html__( '-- Places & Travel', 'soundbyte-progression' ), 

		'Sports & Recreation' => esc_html__( '** Sports & Recreation **', 'soundbyte-progression' ),
		'Amateur' => esc_html__( '-- Amateur', 'soundbyte-progression' ), 
		'College & High School' => esc_html__( '-- College & High School', 'soundbyte-progression' ), 
		'Outdoor' => esc_html__( '-- Outdoor', 'soundbyte-progression' ), 
		'Professional' => esc_html__( '-- Professional', 'soundbyte-progression' ), 

		'Technology' => esc_html__( '** Technology **', 'soundbyte-progression' ),
		'Gadgets' => esc_html__( '-- Gadgets', 'soundbyte-progression' ), 
		'Tech News' => esc_html__( '-- Tech News', 'soundbyte-progression' ), 
		'Podcasting' => esc_html__( '-- Podcasting', 'soundbyte-progression' ), 
		'Software How-To' => esc_html__( '-- Software How-To', 'soundbyte-progression' ), 
	);
	/* END RSS FEED DEFAULT CATEGORIES */
	
	/* Setting - General - Page Transitions */
	$wp_customize->add_setting( 'pro_episode_rss_category' ,array(
		'default' => '',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'pro_episode_rss_category', array(
		'label'    => esc_html__( 'Main Feed Category', 'soundbyte-progression' ),
		'section' => 'section_rss_pro',
		'type' => 'select',
		'priority'   => 5,
		'choices' => $categories_progression,
		)
	);	
	
	/* Setting - General - Page Transitions */
	$wp_customize->add_setting( 'pro_episode_rss_sub_category' ,array(
		'default' => '',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'pro_episode_rss_sub_category', array(
		'label'    => esc_html__( 'Feed Sub-Category', 'soundbyte-progression' ),
		'section' => 'section_rss_pro',
		'type' => 'select',
		'priority'   => 6,
		'choices' => $subcategories_progression,
		)
	);	
	
	/* Setting - General - Page Transitions */
	$wp_customize->add_setting( 'pro_episode_rss_category2' ,array(
		'default' => '',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'pro_episode_rss_category2', array(
		'label'    => esc_html__( 'Secondary Feed Category', 'soundbyte-progression' ),
		'section' => 'section_rss_pro',
		'type' => 'select',
		'priority'   => 7,
		'choices' => $categories_progression,
		)
	);	
	
	/* Setting - General - Page Transitions */
	$wp_customize->add_setting( 'pro_episode_rss_sub_category2' ,array(
		'default' => '',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'pro_episode_rss_sub_category2', array(
		'label'    => esc_html__( 'Secondary Feed Sub-Category', 'soundbyte-progression' ),
		'section' => 'section_rss_pro',
		'type' => 'select',
		'priority'   => 8,
		'choices' => $subcategories_progression,
		)
	);		
	

	/* Setting - RSS - Episodes */
	$wp_customize->add_setting( 'podcast_feed_title' ,array(
		'default' => 'Soundbyte Podcast Feed',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'podcast_feed_title', array(
		'label'          => esc_html__( 'Podcast Feed Title', 'soundbyte-progression' ),
		'section' => 'section_rss_pro',
		'type' => 'text',
		'priority'   => 10,
		)
	);
	
	/* Setting - RSS - Episodes */
	$wp_customize->add_setting( 'podcast_feed_description_pro' ,array(
		'default' => '',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'podcast_feed_description_pro', array(
		'label'          => esc_html__( 'Podcast Feed Description', 'soundbyte-progression' ),
		'section' => 'section_rss_pro',
		'type' => 'textarea',
		'priority'   => 10,
		)
	);	

	/* Setting - RSS - Episodes */
	$wp_customize->add_setting( 'podcast_feed_author' ,array(
		'default' => 'ProgressionStudios',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'podcast_feed_author', array(
		'label'          => esc_html__( 'Podcast Feed Author Name', 'soundbyte-progression' ),
		'section' => 'section_rss_pro',
		'type' => 'text',
		'priority'   => 10,
		)
	);

	/* Setting - RSS - Episodes */
	$wp_customize->add_setting( 'podcast_feed_author_mail' ,array(
		'default' => '',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'podcast_feed_author_mail', array(
		'label'          => esc_html__( 'Podcast Feed Author Email', 'soundbyte-progression' ),
		'section' => 'section_rss_pro',
		'type' => 'text',
		'priority'   => 10,
		)
	);
	
	
	/* Setting - RSS - Episodes */
	$wp_customize->add_setting( 'podcast_feed_copy' ,array(
		'default' => 'ProgressionStudios',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'podcast_feed_copy', array(
		'label'          => esc_html__( 'Podcast Feed Copyright', 'soundbyte-progression' ),
		'section' => 'section_rss_pro',
		'type' => 'text',
		'priority'   => 10,
		)
	);	

	/* Setting - RSS - Episodes */
	$wp_customize->add_setting( 'podcast_feed_summary' ,array(
		'default' => 'Soundbyte Premium Podcasting WordPress Theme',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'podcast_feed_summary', array(
		'label'          => esc_html__( 'Podcast Feed Summary', 'soundbyte-progression' ),
		'section' => 'section_rss_pro',
		'type' => 'text',
		'priority'   => 10,
		)
	);

	
	/* Setting - RSS - Episodes */
	$wp_customize->add_setting( 'podcast_feed_subtitle' ,array(
		'default' => 'Soundbyte Premium Podcasting WordPress Theme',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'podcast_feed_subtitle', array(
		'label'          => esc_html__( 'Podcast Feed Subtitle', 'soundbyte-progression' ),
		'section' => 'section_rss_pro',
		'type' => 'text',
		'priority'   => 10,
		)
	);
	
	/* Setting - RSS - Image */
	$wp_customize->add_setting( 'progression_rss_img' ,array(
		'sanitize_callback' => 'progression_sanitize_text',
		'default' => '',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_rss_img', array(
		'label'          => esc_html__( 'Podcast Feed Main Image', 'soundbyte-progression' ),
		'section' => 'section_rss_pro',
		'priority'   => 10,
		))
	);	
	
	/* Setting - RSS - Episodes */
	$wp_customize->add_setting( 'progression_explicit_episode' ,array(
		'default' => 'No',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'progression_explicit_episode', array(
		'label'          => esc_html__( 'Explicit Content', 'soundbyte-progression' ),
		'section' => 'section_rss_pro',
		'priority'   => 25,
		'choices' => array(
		            'Yes' => esc_html__( 'Yes', 'soundbyte-progression' ),
		            'No' => esc_html__( 'No', 'soundbyte-progression' ),
					),
	) ) );	
	


	/* Panel - WooCOmmerce */
	$wp_customize->add_panel( 'panel_woocommerce_pro', array(
		'priority'    => 24,
		'title'       => esc_html__( 'eCommerce', 'soundbyte-progression' ),
	) );

	/* Setting - Layout - WooCommerce */
	$wp_customize->add_setting( 'woocommerce_post_count_pro' ,array(
		'default' => '12',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'woocommerce_post_count_pro', array(
		'label'          => esc_html__( 'Shop Posts Per Page', 'soundbyte-progression' ),
		'section' => 'tt_font_pro-ecommerce-font',
		'type' => 'text',
		'priority'   => 10,
		)
	);

	/* Setting - Layout - WooCommerce */
	$wp_customize->add_setting( 'woocommerce_columns_pro' ,array(
		'default' => '2',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Controls_Radio_Buttonset_Control($wp_customize, 'woocommerce_columns_pro', array(
		'label'          => esc_html__( 'Shop Posts Per Row', 'soundbyte-progression' ),
		'section' => 'tt_font_pro-ecommerce-font',
		'priority'   => 25,
		'choices' => array(
		            '1' => esc_html__( '1', 'soundbyte-progression' ),
		            '2' => esc_html__( '2', 'soundbyte-progression' ),
		            '3' => esc_html__( '3', 'soundbyte-progression' ),
		            '4' => esc_html__( '4', 'soundbyte-progression' ),
						'5' => esc_html__( '5', 'soundbyte-progression' ),
						'6' => esc_html__( '6', 'soundbyte-progression' ),
					),
	) ) );



}
add_action( 'customize_register', 'qube_customizer' );

/* Sanitize Text */
function progression_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/* Sanitize Code */
function pro_sanitize_code( $input ) {
   return wp_kses(  $input,
	array(
      'div' => array(
          'id' => array(),
  		  'class' => array(),
        'style' => array(),
      ),
	  'span' => array(
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
	        'title' => array(),
			'class' => array(),
	    ),

		'i' => array(
	        'class' => array(),
	        'id'	=> array(),
	    ),

	    'br' => array(),
	    'em' => array(),
		 'strong' => array(),
	) );
}



function qube_customize_js()
{
    ?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		'use strict';

		<?php if (get_theme_mod( 'pro_page_transition', 'transition-off-pro') == "transition-on-pro") : ?>
		(function($) {
			var didDone = false;
			    function done() {
			        if(!didDone) {
			            didDone = true;
						$("#page-loader-pro").addClass('finished-loading');
						$("#page-loader-pro").fadeOut(1000);
			        }
			    }
			    var loaded = false;
			    var minDone = false;
			    //The minimum timeout.
			    setTimeout(function(){
			        minDone = true;
			        //If loaded, fire the done callback.
			        if(loaded)  {  done(); } }, 200);
			    //The maximum timeout.
			    setTimeout(function(){  done();   }, 2500);
			    //Bind the load listener.
			    $(window).load(function(){  loaded = true;
			        if(minDone) { done(); }
			    });
		})(jQuery);
		<?php endif ?>

	});
	</script>
    <?php
}
add_action('wp_footer', 'qube_customize_js');



function qube_customize_css()
{
    ?>
<?php if (get_theme_mod( 'pro_theme_fav_icon' )) : ?><link rel="icon"  href="<?php echo esc_attr(get_theme_mod( 'pro_theme_fav_icon')); ?>"><?php endif; ?>
<style type="text/css">
	<?php if (get_theme_mod( 'custom_css_pro')) : ?><?php echo esc_attr(get_theme_mod('custom_css_pro')); ?><?php endif ?>

	/* HEADER STYLES */
	.footer-logo-pro img, body #logo, body #logo img {max-width:<?php echo esc_attr( get_theme_mod('pro_theme_logo_width', '184') ); ?>px;}
	body #logo, body #logo img {margin-top:<?php echo esc_attr(get_theme_mod('theme_logo_margin_top', '30')); ?>px; margin-bottom:<?php echo esc_attr(get_theme_mod('theme_logo_margin_bottom', '30')); ?>px; }
	#sticky-header-progression.menu-resized-pro header#masthead-progression {background:<?php echo esc_attr(get_theme_mod('sticky_header_bg_color_pro', 'rgba(26, 23, 26, 0.9)')); ?>;}
	body #sticky-header-progression.menu-resized-pro #logo img {max-width:<?php echo esc_attr(get_theme_mod('sticky_pro_theme_logo_width', '130')); ?>px;}
	#sticky-header-progression.menu-resized-pro h1#logo img { margin-top:<?php echo esc_attr(get_theme_mod('sticky_theme_logo_margin_top', '20')); ?>px; margin-bottom:<?php echo esc_attr(get_theme_mod('sticky_theme_logo_margin_bottom', '20')); ?>px; }
	#sticky-header-progression.menu-resized-pro .sf-menu a {<?php if (get_theme_mod( 'sticky_font_color_pro')) : ?>color:<?php echo esc_attr(get_theme_mod('sticky_font_color_pro')); ?>;<?php endif; ?> margin-top:<?php echo esc_attr(get_theme_mod('sticky_theme_nav_padding', '15')); ?>px; margin-bottom:<?php echo esc_attr(get_theme_mod('sticky_theme_nav_padding', '15')); ?>px; }
	<?php if (get_theme_mod( 'sticky_hover_font_color_pro')) : ?>
	.menu-resized-pro .sf-menu li.current-menu-item a, .menu-resized-pro .sf-menu a:hover, .menu-resized-pro .sf-menu li.sfHover a {color:<?php echo esc_attr(get_theme_mod('sticky_hover_font_color_pro')); ?>; }
	.menu-resized-pro .sf-menu a:hover, .menu-resized-pro .sf-menu a:hover, .menu-resized-pro .sf-menu li a:hover, .menu-resized-pro .sf-menu a:hover, .menu-resized-pro .sf-menu a:visited:hover, .menu-resized-pro .sf-menu li.sfHover a, .menu-resized-pro .sf-menu li.sfHover a:visited, .menu-resized-pro .sf-menu li.current-menu-item a {border-bottom-color:<?php echo esc_attr(get_theme_mod('sticky_hover_font_color_pro')); ?>; }
	<?php endif; ?>
	.sf-menu a  {color:<?php echo esc_attr(get_theme_mod('nav_font_color_pro', '#DEDEDE')); ?>; font-size:<?php echo esc_attr(get_theme_mod('nav_font_size_pro', '13')); ?>px;  margin-top:<?php echo esc_attr(get_theme_mod('nav_padding_top_bottom', '0')); ?>px; margin-bottom:<?php echo esc_attr(get_theme_mod('nav_padding_bottom_bottom', '26')); ?>px;  }
	a.cart-icon-pro {
		font-size:<?php echo esc_attr(get_theme_mod('nav_font_size_pro', '13') + 2); ?>px;
		margin-top:<?php echo esc_attr(get_theme_mod('nav_padding_top_bottom', '0') - 3); ?>px;
		margin-bottom:<?php echo esc_attr(get_theme_mod('nav_padding_bottom_bottom', '26') - 3); ?>px;
		color:<?php echo esc_attr(get_theme_mod('nav_font_color_pro', '#DEDEDE')); ?>; }
	.menu-resized-pro a.cart-icon-pro {<?php if (get_theme_mod( 'sticky_font_color_pro')) : ?>color:<?php echo esc_attr(get_theme_mod('sticky_font_color_pro')); ?>;<?php endif; ?>
	margin-top:<?php echo esc_attr(get_theme_mod('sticky_theme_nav_padding', '15') - 3); ?>px;
	margin-bottom:<?php echo esc_attr(get_theme_mod('sticky_theme_nav_padding', '15') - 9); ?>px;
	}
	a.cart-icon-pro span.shopping-cart-header-count { background:<?php echo esc_attr(get_theme_mod('header_cart_bg_pro', '#0ce682')); ?>; }
	a.cart-icon-pro span.shopping-cart-header-count:before { border-right:4px solid <?php echo esc_attr(get_theme_mod('header_cart_bg_pro', '#0ce682')); ?>; }
	a.cart-icon-pro:hover, body .sf-menu li.current-menu-item a, body .sf-menu li.sfHover a, .menu-show-hide-pro, body .sf-menu li.current-menu-item a, body .sf-menu li.sfHover a, .menu-show-hide-pro, body #masthead-progression .sf-menu a:hover, body .sf-menu li a:hover { color:<?php echo esc_attr(get_theme_mod('nav_hover_font_color_pro', '#ffffff')); ?>; }
	.sf-menu a:hover, .sf-menu a:hover, .sf-menu li a:hover, .sf-menu a:hover,.sf-menu a:visited:hover, .sf-menu li.sfHover a, .sf-menu li.sfHover a:visited, .sf-menu li.current-menu-item a { border-bottom-color:<?php echo esc_attr(get_theme_mod('nav_border_font_color_pro', '#0ce682')); ?>; }
	.sf-menu ul { background:<?php echo esc_attr( get_theme_mod('sub_navigation_bg_color', '#1a171a') ); ?>; }
	.sf-menu li li a { font-size:<?php echo esc_attr( get_theme_mod('sub_nav_font_size_pro', '12') ); ?>px; padding-top:<?php echo esc_attr( get_theme_mod('sub_nav_padding_top_bottom', '15') ); ?>px; padding-bottom:<?php echo esc_attr( get_theme_mod('sub_nav_padding_top_bottom', '15') ); ?>px; }
	.sf-menu li li a, .sf-mega 	li.sf-mega-section .deep-level li a, .sf-mega li.sf-mega-section .deep-level li:last-child a, .sf-menu li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a { border-color: <?php echo esc_attr( get_theme_mod('sub_nav_border_color_pro', 'rgba(255,255,255,  0.06)') ); ?>; }
	.sf-mega ul {  border-color: <?php echo esc_attr( get_theme_mod('sub_nav_border_color_pro', 'rgba(255,255,255,  0.06)') ); ?>;  }
	.sf-mega h2.mega-menu-heading { border-color:<?php echo esc_attr( get_theme_mod('sub_nav_border_color_pro', 'rgba(255,255,255,  0.06)') ); ?>; }
	.menu-resized-pro nav#site-navigation .sf-menu li.sfHover li a, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li.sfHover li a, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li a, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a,
	nav#site-navigation .sf-menu li.sfHover li a, nav#site-navigation .sf-menu li.sfHover li.sfHover li a, nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li a, nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a { color:<?php echo esc_attr( get_theme_mod('sub_nav_font_color_pro', '#DEDEDE') ); ?>; }
	.menu-resized-pro  nav#site-navigation .sf-menu li.sfHover li a:hover, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li.sfHover a, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li li a:hover, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover a, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li li li a:hover,
	.menu-resized-pro nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li li li li a:hover, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li li li li li a:hover, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .menu-resized-pro nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, nav#site-navigation .sf-menu li.sfHover li a:hover, nav#site-navigation .sf-menu li.sfHover li.sfHover a, nav#site-navigation .sf-menu li.sfHover li li a:hover, nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover a, nav#site-navigation .sf-menu li.sfHover li li li a:hover, nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover a:hover, nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, nav#site-navigation .sf-menu li.sfHover li li li li a:hover, nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, nav#site-navigation .sf-menu li.sfHover li li li li li a:hover, nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, nav#site-navigation .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a { color:<?php echo esc_attr( get_theme_mod('sub_nav_hover_font_color_pro', '#ffffff') ); ?>; }
	.sf-mega h2.mega-menu-heading, .sf-mega h2.mega-menu-heading a, .sf-mega h2.mega-menu-heading a:hover {color:<?php echo esc_attr( get_theme_mod('sub_nav_hover_font_color_pro', '#ffffff') ); ?>; }
	.sf-menu ul, .sf-mega li.sf-mega-section .deep-level li a, .sf-menu li li:last-child a, .sf-menu li li:last-child li:last-child a, .sf-menu li li:last-child li:last-child li:last-child a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li:last-child a, .sf-menu li li:last-child li:last-child li:last-child li:last-child a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li:last-child a  { border-color: <?php echo esc_attr( get_theme_mod('sub_nav_border_color_pro', 'rgba(255,255,255,  0.06)') ); ?>; }
	header#masthead-progression { border-bottom-color: <?php echo esc_attr( get_theme_mod('header_divider_pro', 'rgba(208, 199, 208, 0.1)') ); ?>;  }

	#soundbyte-page-title {padding-top:<?php echo esc_attr(get_theme_mod('pro_padding_top_page_title', '187')); ?>px; padding-bottom:<?php echo esc_attr(get_theme_mod('pro_padding_bottom_page_title', '105')); ?>px; background:<?php echo esc_attr(get_theme_mod('page_title_bg_pro', '#1a171a')); ?>; <?php if (get_theme_mod( 'page_title_bg_image_pro', get_template_directory_uri().'/images/page-title.jpg')) : ?>background-image:url("<?php echo esc_attr(get_theme_mod( 'page_title_bg_image_pro', get_template_directory_uri().'/images/page-title.jpg' )); ?>"); <?php if (get_theme_mod( 'page_title_bg_cover_pro', 'cover-pro') == "cover-pro") : ?>background-position: center center;-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;<?php else: ?>background-repeat:repeat-all;<?php endif ?><?php endif ?> }
	@media screen and (max-width: 959px) {body header#masthead-progression {background:<?php echo esc_attr(get_theme_mod('sticky_header_bg_color_pro', 'rgba(26, 23, 26, 0.9)')); ?>;}}


	/* SIDEBAR STYLES */
	#soundbyte-sidebar .soundbyte-divider-progression {background-color:<?php echo esc_attr(get_theme_mod('sidebar_divider_pro', 'rgba(26,23,26,0.08)')); ?>;}
	#content-pro #soundbyte-sidebar a { color:<?php echo esc_attr(get_theme_mod('sidebar_link_color_pro', 'rgba(26, 23, 26, 0.76)')); ?>; }
	#content-pro #soundbyte-sidebar a:hover { color:<?php echo esc_attr(get_theme_mod('sidebar_link_hover_pro', 'rgba(26, 23, 26, 1)')); ?>; }

	/* FOOTER STYLES */
	body footer#site-footer a, footer#site-footer li a { color:<?php echo esc_attr(get_theme_mod('footer_font_link_pro', 'rgba(255, 255, 255, 0.76)')); ?>; }
	body footer#site-footer a:hover, footer#site-footer li a:hover { color:<?php echo esc_attr(get_theme_mod('footer_font_link_hover_pro', '#ffffff')); ?>; }
	footer#site-footer .copyright-text {color:<?php echo esc_attr(get_theme_mod('copyright_color_pro', 'rgba(255, 255, 255, 0.57)')); ?>;}
	footer#site-footer { background:<?php echo esc_attr(get_theme_mod('footer_bg_color_pro', '#1a171a')); ?>; <?php if (get_theme_mod( 'footer_bg_image_pro')) : ?>background-image:url("<?php echo esc_attr(get_theme_mod( 'footer_bg_image_pro' )); ?>"); <?php if (get_theme_mod( 'footer_bg_cover_pro', 'cover-pro') == "cover-pro") : ?>background-position: center center;-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;<?php else: ?>background-repeat:repeat-all;<?php endif ?><?php endif ?>}
	footer#site-footer .footer-logo-pro img {margin-top: <?php echo esc_attr(get_theme_mod('theme_logo_margin_top_footer', '0')); ?>px; margin-bottom: <?php echo esc_attr(get_theme_mod('theme_logo_margin_bottom_footer', '15')); ?>px;}
	footer#site-footer .footer-logo-pro img {width: <?php echo esc_attr(get_theme_mod('pro_theme_logo_width_footer', '150')); ?>px; max-width: <?php echo esc_attr(get_theme_mod('pro_theme_logo_width_footer', '150')); ?>px;}

	/* MISC STYLES */
	.post-container-progression h2.blog-title-progression, .post-container-progression h2.blog-title-progression a {color:<?php echo esc_attr(get_theme_mod('blog_link_heading_color', '#1a171a')); ?>;}
	.post-container-progression h2.blog-title-progression a:hover {color:<?php echo esc_attr(get_theme_mod('blog_link_heading_hover_color', '#0ce682')); ?>;}

	.woocommerce .cart_totals a.checkout-button, #content-pro .woocommerce input.button, body #content-pro .woocommerce p.return-to-shop a.button, #single-product-container-pro button.button,	#soundbyte-sidebar a.progression-button, .post-container-progression a.more-link, .woocommerce-tabs #review_form .form-submit input#submit, .wpcf7 input.wpcf7-submit, 	#commentform input.submit, input#submit-progression, body #content-pro input.button, body.woocommerce-cart #content-pro td.actions input.button.checkout-button, body a.more-link, body #content-pro button.button, body #content-pro a.button, body #single-product-progression button.single_add_to_cart_button, body #content-pro #respond input#submit, body a.progression-button, body input.wpcf7-submit, body footer .wpcf7 input#submit, body input#submit, body .highlight-section-progression a.progression-button.default-button, .shop-container-pro a.button, .woocommerce input.button,.woocommerce .checkout_coupon input.button,.woocommerce .place-order input.button,.woocommerce .cart_totals  a.button,.woocommerce  .return-to-shop a.button.wc-backward,body.woocommerce .summary button.button, body.woocommerce #content-pro .product .shop-container-pro a.button, body.woocommerce #content-pro #soundbyte-sidebar a.button, body.woocommerce.single-product #content-pro #respond input#submit,body #content-pro button.single_add_to_cart_button, #content-pro .woocommerce-message a.button, body #content-pro .woocommerce input.button, body #content-pro .woocommerce a.button.checkout-button, body.woocommerce #content-pro .product .shop-container-pro a.button, body.woocommerce #content-pro #soundbyte-sidebar a.button, body.woocommerce.single-product #content-pro #respond input#submit,body #content-pro button.single_add_to_cart_button, #content-pro .woocommerce-message a.button, body #content-pro .woocommerce input.button, body #content-pro .woocommerce a.button.checkout-button {font-size:<?php echo esc_attr(get_theme_mod('pro_button_font_size', '13')); ?>px;}


	#progression-home-slider .progression-button-icons a.progression-button, .progression-button-icons a.progression-button,
	.soundbyte-share-mail.soundbyte-share-btn,
	body #content-pro #comments #respond input#submit, body a.progression-button.default-button,
	body input.wpcf7-submit, body a.more-link,
	body #content-pro .width-container-progression span.onsale,
	body.woocommerce #content-pro .product .shop-container-pro a.button:hover, body.woocommerce #content-pro #soundbyte-sidebar a.button:hover, body.woocommerce.single-product #content-pro #respond input#submit:hover, body #content-pro button.single_add_to_cart_button:hover, #content-pro .woocommerce-message a.button:hover, body #content-pro .woocommerce input.button:hover, body #content-pro .woocommerce a.button.checkout-button:hover,
	body.woocommerce #content-pro #soundbyte-sidebar a.button.checkout {
		background-color: <?php echo esc_attr(get_theme_mod('button_font_background_pro', '#0ce682' )); ?>;
		color: <?php echo esc_attr(get_theme_mod('button_font_color_pro', '#fff' )); ?>;
	}

	body ul.page-numbers span.current, body ul.page-numbers a:hover,
	#boxed-layout-pro #content-pro #soundbyte-sidebar .widget .price_slider_amount button.button,
	#boxed-layout-pro #content-pro #soundbyte-sidebar .widget .price_slider .ui-slider-handle,
	#boxed-layout-pro #content-pro #soundbyte-sidebar .widget .price_slider .ui-slider-range,
	.shop-container-pro a.added_to_cart,
	a.added_to_cart:hover,
	.shop-container-pro a.button:hover,
	.woocommerce input.button,.woocommerce .checkout_coupon input.button,.woocommerce .place-order input.button,.woocommerce .cart_totals  a.button,.woocommerce  .return-to-shop a.button.wc-backward,body.woocommerce .summary button.button,
	a.checkout-button-header-cart,
	.checkout-basket-pro a.checkout-button-header-cart:hover {
		background: <?php echo esc_attr(get_theme_mod('button_font_background_pro', '#0ce682' )); ?>;
	}

	body #content-pro #comments #respond input#submit, body a.progression-button.default-button,
	body #content-pro #comments #respond input#submit:hover, body a.progression-button.default-button:hover,
	body input.wpcf7-submit, body a.more-link,
	body input.wpcf7-submit:hover, body a.more-link:hover ,
	.shop-container-pro a.button,
	.woocommerce input.button,.woocommerce .checkout_coupon input.button,.woocommerce .place-order input.button,.woocommerce .cart_totals  a.button,.woocommerce  .return-to-shop a.button.wc-backward,body.woocommerce .summary button.button,
	body.woocommerce #content-pro .product .shop-container-pro a.button, body.woocommerce #content-pro #soundbyte-sidebar a.button, body.woocommerce.single-product #content-pro #respond input#submit,body #content-pro button.single_add_to_cart_button, #content-pro .woocommerce-message a.button, body #content-pro .woocommerce input.button, body #content-pro .woocommerce a.button.checkout-button,
	body.woocommerce #content-pro .product .shop-container-pro a.button:hover, body.woocommerce #content-pro #soundbyte-sidebar a.button:hover, body.woocommerce.single-product #content-pro #respond input#submit:hover, body #content-pro button.single_add_to_cart_button:hover, #content-pro .woocommerce-message a.button:hover, body #content-pro .woocommerce input.button:hover,
	body #content-pro .woocommerce a.button.checkout-button:hover {
		border-color: <?php echo esc_attr(get_theme_mod('button_font_background_pro', '#0ce682' )); ?>;
	}

	.reply a,
	body a.progression-button.default-button:hover span,
	body #content-pro #comments #respond input#submit:hover, body a.progression-button.default-button:hover,
	body input.wpcf7-submit:hover, body a.more-link:hover,
	.shop-container-pro a.button,
	.woocommerce input.button:hover,.woocommerce .checkout_coupon input.button:hover,.woocommerce .place-order input.button:hover,.woocommerce .cart_totals  a.button:hover,.woocommerce  .return-to-shop a.button.wc-backward:hover,body.woocommerce .summary button.button:hover,
	body.woocommerce #content-pro .product .shop-container-pro a.button, body.woocommerce #content-pro #soundbyte-sidebar a.button, body.woocommerce.single-product #content-pro #respond input#submit,body #content-pro button.single_add_to_cart_button, #content-pro .woocommerce-message a.button, body #content-pro .woocommerce input.button, body #content-pro .woocommerce a.button.checkout-button {
		color: <?php echo esc_attr(get_theme_mod('button_font_hover_pro', '#0ce682' )); ?>;
	}

	body.woocommerce #content-pro .product .shop-container-pro a.button, body.woocommerce #content-pro #soundbyte-sidebar a.button, body.woocommerce.single-product #content-pro #respond input#submit, body #content-pro button.single_add_to_cart_button, #content-pro .woocommerce-message a.button, body #content-pro .woocommerce input.button, body #content-pro .woocommerce a.button.checkout-button, body input.wpcf7-submit:hover,
	body a.more-link:hover, body #content-pro #comments #respond input#submit:hover, body a.progression-button.default-button:hover {
		background-color: <?php echo esc_attr(get_theme_mod('button_font_background_hover_pro', '#fff' )); ?>;
		border-color: <?php echo esc_attr(get_theme_mod('button_font_hover_pro', '#0ce682' )); ?>;
	}

	body.woocommerce .summary input.qty, body .woocommerce .shop_table input.qty {
		border-color: <?php echo esc_attr(get_theme_mod('button_font_hover_pro', '#0ce682' )); ?>;
	}

	body #content-pro .woocommerce a.button:hover, input#submit-progression:hover, body #content-pro a.button:hover, footer .tagcloud a:hover, #navigation-sidebar-progression .tagcloud a:hover, body #content-pro #respond input#submit:hover, body a.progression-button:hover, body input#submit, body .highlight-section-progression a.progression-button.default-button:hover, #progression-home-slider .progression-button-icons a.progression-button:hover, .progression-button-icons a.progression-button:hover {
		background-color: <?php echo esc_attr(get_theme_mod('button_font_background_secondary', '#26afd1' )); ?>;
		border-color: <?php echo esc_attr(get_theme_mod('button_font_background_secondary', '#26afd1' )); ?>;
		color: <?php echo esc_attr(get_theme_mod('button_font_background_hover_pro', '#fff' )); ?>;
	}


	/* FONT COLORS */
	a { color:<?php echo esc_attr(get_theme_mod('default_font_link_pro', '#26afd1')); ?>; }
	a:hover, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
	#soundbyte-page-title .soundbyte-podcast-title-progression a.soundbyte-podcast-play-progression,
	#soundbyte-page-title .soundbyte-podcast-title-progression .soundbyte-podcast-progression-meta div,
	h2.about-single-title-progression,
	.about-content-progression a i:hover,
	#progression-home-slider progression-button-icons i:hover, .progression-button-icons i:hover,
	#progression-home-slider .slider-progression-soundbyte-podcast-title div ,
	#progression-home-slider a.slider-play-progression,
	body #progression-home-slider .flex-control-paging li a.flex-active,
	.category-meta-progression a,
	.author-meta-progression a, .meta-comments-progression a, .soundbyte-date-progression a:hover,
	.post-meta-progression span.meta-comments-progression:before,
	footer#site-footer .follow-us-progression ul li a,
	.isotope-index-text .soundbyte-podcast-progression-meta div,
	.isotope-index-text a.soundbyte-podcast-play-progression,
	.soundbyte-time-pro,
	#boxed-layout-pro .widget p.total strong,
	#boxed-layout-pro .widget p.total span.amount,
	.checkout-basket-pro .sub-total-pro {
		color:<?php echo esc_attr(get_theme_mod('default_hover_link_font_color_pro', '#0ce682')); ?>;
	}
	#commentform input:focus, .wpcf7 textarea:focus,
	.wpcf7 input:focus, .wpcf7 textarea:focus, #commentform input:focus, #commentform textarea:focus,
	.checkout-basket-pro .sub-total-pro {
		border-color:<?php echo esc_attr(get_theme_mod('default_hover_link_font_color_pro', '#0ce682')); ?>;
	}
	#soundbyte-download-podcast:before, #filters .btn:active,#filters .btn.is-checked,#filters .btn:hover	{
		border-bottom-color:<?php echo esc_attr(get_theme_mod('default_hover_link_font_color_pro', '#0ce682')); ?>;
	}
	#boxed-layout-pro .widget p.total {border-top-color:<?php echo esc_attr(get_theme_mod('default_hover_link_font_color_pro', '#0ce682')); ?>;}

	/* PAGE TITLE BACKGROUNDS */
	/* Page */
	<?php  global $post; if(is_page() && get_post_meta($post->ID, 'progression_header_image', true)): ?><?php $gallery_pro = get_post_meta( get_the_id(), 'progression_header_image', false ); foreach ( $gallery_pro as $single_gallery_img ) ?><?php $image = wp_get_attachment_image_src($single_gallery_img, 'full'); ?>#soundbyte-page-title {background-image:url(<?php echo esc_attr($image[0]);?>);}<?php endif ?>

	/* Index */
	<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(is_home()  && get_post_meta($cover_page->ID, 'progression_header_image', true) ): ?><?php $gallery_pro = get_post_meta( $cover_page->ID, 'progression_header_image', false ); foreach ( $gallery_pro as $single_gallery_img ) ?><?php $image = wp_get_attachment_image_src($single_gallery_img, 'full'); ?>#soundbyte-page-title {background-image:url(<?php echo esc_attr($image[0]);?>);}<?php endif ?><?php endif ?>

	/* Post */
	<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(is_singular( 'post' )   && get_post_meta($cover_page->ID, 'progression_header_image', true) ): ?>
	<?php $gallery_pro = get_post_meta( $cover_page->ID, 'progression_header_image', false ); foreach ( $gallery_pro as $single_gallery_img ) ?><?php $image = wp_get_attachment_image_src($single_gallery_img, 'full'); ?>#soundbyte-page-title {background-image:url(<?php echo esc_attr($image[0]);?>);}<?php endif ?><?php endif ?>

	/* Episode */
	<?php global $post; if(is_singular('episode') && get_post_meta($post->ID, 'progression_header_image_episode', true)): ?><?php $gallery_pro = get_post_meta( get_the_id(), 'progression_header_image_episode', false ); foreach ( $gallery_pro as $single_gallery_img ) ?><?php $image = wp_get_attachment_image_src($single_gallery_img, 'full'); ?>#soundbyte-page-title {background-image:url(<?php echo esc_attr($image[0]);?>);}<?php endif ?>

	/* Shop*/
	<?php if (class_exists('Woocommerce')) : ?><?php $your_shop_page = get_post( wc_get_page_id( 'shop' ) ); if(is_shop() && get_post_meta($your_shop_page->ID, 'progression_header_image', true) ): ?>
		<?php $gallery_pro = get_post_meta( wc_get_page_id( 'shop' ) , 'progression_header_image', false ); foreach ( $gallery_pro as $single_gallery_img ) ?><?php $image = wp_get_attachment_image_src($single_gallery_img, 'full'); ?>#soundbyte-page-title {background-image:url(<?php echo esc_attr($image[0]);?>);}<?php endif ?>
	<?php endif ?>
	<?php if (class_exists('Woocommerce')) : ?><?php $your_shop_page = get_post( wc_get_page_id( 'shop' ) ); if(is_singular( 'product' ) && get_post_meta($your_shop_page->ID, 'progression_header_image', true) ): ?>
		<?php $gallery_pro = get_post_meta( wc_get_page_id( 'shop' ) , 'progression_header_image', false ); foreach ( $gallery_pro as $single_gallery_img ) ?><?php $image = wp_get_attachment_image_src($single_gallery_img, 'full'); ?>#soundbyte-page-title {background-image:url(<?php echo esc_attr($image[0]);?>);}<?php endif ?>
	<?php endif ?>


	/* MISC */
	body {background-color:<?php echo esc_attr(get_theme_mod('body_bg_color_pro', '#ffffff')); ?>;
	<?php if (get_theme_mod( 'body_bg_image_pro')) : ?>background-image:url("<?php echo esc_attr(get_theme_mod( 'body_bg_image_pro' )); ?>"); <?php if (get_theme_mod( 'body_bg_cover_pro', 'cover-pro') == "cover-pro") : ?>background-position: center center;-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;<?php else: ?>background-repeat:repeat-all;<?php endif ?><?php endif ?>}

	header#masthead-progression {background-color: <?php echo esc_attr(get_theme_mod('header_bg_color_pro', 'rgba(0, 0, 0, 0)') ); ?>; <?php if (get_theme_mod( 'header_img_bg_image_pro')) : ?>background-image:url("<?php echo esc_attr(get_theme_mod( 'header_img_bg_image_pro' )); ?>"); <?php if (get_theme_mod( 'header_img_bg_cover_pro', 'cover-pro') == "cover-pro") : ?>background-position: center center;-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;<?php else: ?>background-repeat:repeat-all;<?php endif ?><?php endif ?>}

	body #pro-scroll-top { color:<?php echo esc_attr(get_theme_mod('pro_scroll_color', '#ffffff')); ?>; background: <?php echo esc_attr(get_theme_mod('pro_scroll_bg_color', 'rgba(0,0,0,  0.3)')); ?>; border-top:1px solid <?php echo esc_attr(get_theme_mod('pro_scroll_border_color', 'rgba(255,255,255,  0.2)')); ?>; border-left:1px solid <?php echo esc_attr(get_theme_mod('pro_scroll_border_color', 'rgba(255,255,255,  0.2)')); ?>; border-right:1px solid <?php echo esc_attr(get_theme_mod('pro_scroll_border_color', 'rgba(255,255,255,  0.2)')); ?>; }

	body a#pro-scroll-top:hover {background: <?php echo esc_attr(get_theme_mod('pro_scroll_hvr_bg_color', '#0ce682')); ?>; border-color:<?php echo esc_attr(get_theme_mod('pro_scroll_hvr_border_color', '#0ce682')); ?>; color:<?php echo esc_attr(get_theme_mod('pro_scroll_hvr_color', '#ffffff')); ?>;}
	<?php if (get_theme_mod( 'pro_scroll_top') == "scroll-off-pro") : ?>a#pro-scroll-top {display:none;}<?php endif ?>

	.sk-circle .sk-child:before, .sk-rotating-plane, .sk-double-bounce .sk-child, .sk-wave .sk-rect, .sk-wandering-cubes .sk-cube, .sk-spinner-pulse, .sk-chasing-dots .sk-child, .sk-three-bounce .sk-child, .sk-fading-circle .sk-circle:before, .sk-cube-grid .sk-cube{background-color:<?php echo esc_attr(get_theme_mod('pro_page_loader_text', '#24cdc1')); ?>;}
	#page-loader-pro { background:<?php echo esc_attr(get_theme_mod('pro_page_loader_bg', '#1b1d27')); ?>; color:<?php echo esc_attr(get_theme_mod('pro_page_loader_text', '#84adc0')); ?>; }

	<?php if ( get_theme_mod( 'pro_site_layout_wide') == 'boxed-pro') : ?>
	#boxed-layout-pro {
		position:relative;
		width:1200px;
		margin-left:auto; margin-right:auto;
		background:<?php echo esc_attr(get_theme_mod('boxed_bg_color_pro', '#f7f8f8')); ?>;-moz-box-shadow:0px 0px 15px rgba(0, 0, 0, 0.05); -webkit-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.05); box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.05);
	}
	@media only screen and (min-width: 960px) and (max-width: 1240px) {
		body #boxed-layout-pro {width:92%;}
	}
	<?php endif; ?>
	*/
</style>
    <?php
}
add_action('wp_head', 'qube_customize_css');
