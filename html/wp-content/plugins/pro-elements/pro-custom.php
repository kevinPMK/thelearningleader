<?php
/*
Plugin Name: Progression Elements
Text Domain: pro-elements
Plugin URI: http://http://progressionstudios.com
Description: This plugin registers custom elements for Progression Studios
Version: 1.1
Author: Progression Studios
Author URI: http://progressionstudios.com/
Author Email: contact@progressionstudios.com
License: GNU General Public License v3.0
*/

/* Translation */
add_action('plugins_loaded', 'pro_elements_textdomain');
function pro_elements_textdomain() {
	load_plugin_textdomain( 'pro-elements', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}



/* Custom Post Type */

/**
 * Registering Custom Post Type
 */
add_action('init', 'progression_custom_post_init');
function progression_custom_post_init() {

	register_post_type(
		'episode',
		array(
			'labels' => array(
				'name' => esc_html__( 'Episodes', 'soundbyte-progression' ),
				'singular_name' => esc_html__( 'Episode', 'soundbyte-progression' )
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-microphone',
			'rewrite' => array('slug' => 'episodes'),
			'supports' => array('title', 'editor', 'thumbnail', 'comments'),
			'can_export' => true,
		)
	);
	register_taxonomy(
		'episode_type', 'episode',
		array(
			'hierarchical' => true,
			'label' => esc_html__( 'Episode Categories', 'soundbyte-progression' ),
			'query_var' => true,
			'rewrite' => true
		)
	);

}




function progression_studios_plugin_google_maps_customizer( $wp_customize ) {
	$wp_customize->add_section( 'progression_studios_panel_google_Maps', array(
		'priority'    => 800,
       'title'       => esc_html__( 'Google Maps', 'invested-progression' ),
    ) );
	 
	$wp_customize->add_setting( 'progression_studios_google_maps_api' ,array(
		'default' =>  '',
		'sanitize_callback' => 'progression_studios_plugin_google_maps_sanitize_text',
	) );
	$wp_customize->add_control( 'progression_studios_google_maps_api', array(
		'label'          => 'Google Maps API Key',
		'description'    => 'See documentation under "Google Maps API Key" for directions. Get API key: https://developers.google.com/maps/documentation/javascript/get-api-key',
		'section' => 'progression_studios_panel_google_Maps',
		'type' => 'text',
		'priority'   => 10,
		)
	
	);
}
add_action( 'customize_register', 'progression_studios_plugin_google_maps_customizer' );
/* Sanitize Text */
function progression_studios_plugin_google_maps_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}





add_action( 'wp_enqueue_scripts', 'google_maps_pro_script' );

function google_maps_pro_script() {
	
   if ( get_theme_mod( 'progression_studios_google_maps_api') ) {
       $progression_studios_google_api_url =  '?key='. get_theme_mod('progression_studios_google_maps_api');
	} else {
		$progression_studios_google_api_url = '';
	}
	
	wp_register_script( 'google_maps_pro', 'https://maps.google.com/maps/api/js' . $progression_studios_google_api_url, 1 );
	wp_register_script( 'gomap_pro', get_template_directory_uri() . '/js/jquery.gomap-1.3.3.min.js', array( 'jquery' ), '20120206', false );
}


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'QUBE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// CSS Styles in Admin
function pro_vc_wp_admin_style() {
    wp_register_style( 'pro-vc-styles',  plugin_dir_url( __FILE__ ) . 'assets/style.css' );
    wp_enqueue_style( 'pro-vc-styles' );
}
add_action( 'admin_enqueue_scripts', 'pro_vc_wp_admin_style' );



// Element Shortcodes

if( !function_exists( 'js_composer' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'elements/highlight-shortcode.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'elements/episodes-shortcode.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'elements/map-shortcode.php' );
}


//Default Templates
if ( ! function_exists( 'js_composer' ) ) require_once( plugin_dir_path( __FILE__ ) . 'templates/custom-templates.php' );


?>
