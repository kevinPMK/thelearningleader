<?php

/**
 * Map Location Shortcode
 */



// [pro_google_maps location_columns_pro="" etc...]
add_shortcode( 'pro_google_maps', 'pro_google_maps_func' );
function pro_google_maps_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
	   'map_address_pro' => '1600 Holloway Ave, San Francisco, CA 94132',
	   'map_height_pro' => '500px',
	   'map_zoom_pro' => '12',
	   'map_pin_heading_pro' => '',
	   'map_pin_text_pro' => '',
	   'map_type_pro' => 'ROADMAP',
	   'map_image_pro' => '',
	   'map_pin_open_close' => '',
   ), $atts ) );
   
   wp_enqueue_script( 'google_maps_pro' );
   wp_enqueue_script( 'gomap_pro' );

   
	$output_pro = '';
	
	STATIC $idpro = 0;
	$idpro++;
	
	ob_start();
	?>
		
		<div id="pro-google-container-pro">
			<div id="pro-google-map-listing-<?php echo esc_attr($idpro) ?>" style="height:<?php echo esc_attr( $map_height_pro ) ?>"></div>
		</div>
		
		<script type="text/javascript"> 
		jQuery(document).ready(function($) {
			'use strict';
			
		    $("#pro-google-map-listing-<?php echo esc_attr($idpro) ?>").goMap({ 
		        markers: [
					{address: '<?php echo esc_attr( $map_address_pro ) ?>',  
					<?php if($map_image_pro): ?>
					<?php $image = wp_get_attachment_image_src($map_image_pro, 'large'); ?>
					icon: '<?php echo esc_attr($image[0]);?>',<?php endif; ?><?php if($map_pin_heading_pro): ?>html: {content: "<div class='google-maps-pin'><h6><?php echo esc_attr( $map_pin_heading_pro ) ?></h6><div class='google-maps-pin-text'><?php echo esc_attr( $map_pin_text_pro ) ?></div></div>", popup:<?php if($map_pin_open_close): ?>true<?php else: ?>false<?php endif; ?> }<?php endif; ?>}
				],
				scrollwheel: false, 
				disableDoubleClickZoom: true,
				zoom: <?php echo esc_attr( $map_zoom_pro ) ?>,
				maptype: '<?php echo esc_attr( $map_type_pro ) ?>' 
		    }); 

		});
		</script>

    <?php
	
   	return $output_pro. ob_get_clean();
	
}


add_action( 'vc_before_init', 'pro_google_maps_integrateVC' );
function pro_google_maps_integrateVC() {
   vc_map( array(
      "name" => __( "Pro Map", "pro-elements" ),
	  "description" => __( "Google Maps Location", "pro-elements" ),
      "base" => "pro_google_maps",
	  "weight" => 100,
      "class" => "",
      "category" => __( "Pro Elements", "pro-elements"),
	  'icon' => 'vc-icon',

      "params" => array(
          array(
            "type" => "textfield",
			"holder" => "div",
 			"class" => "",
             "heading" => __( "Map Address", "pro-elements" ),
             "param_name" => "map_address_pro",
             "value" => __( "1600 Holloway Ave, San Francisco, CA 94132", "pro-elements" ),
          ),
          array(
            "type" => "textfield",
			"holder" => "div",
 			"class" => "",
             "heading" => __( "Map Pin Heading", "pro-elements" ),
             "param_name" => "map_pin_heading_pro",
             "value" => __( "", "pro-elements" ),
          ),
          array(
            "type" => "textfield",
			"holder" => "div",
 			"class" => "",
             "heading" => __( "Map Pin Text", "pro-elements" ),
             "param_name" => "map_pin_text_pro",
             "value" => __( "", "pro-elements" ),
          ),
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => __( "Map Height", "pro-elements" ),
             "param_name" => "map_height_pro",
             "value" => __( "500px", "pro-elements" ),
          ),
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => __( "Map Zoom", "pro-elements" ),
             "param_name" => "map_zoom_pro",
             "value" => __( "12", "pro-elements" ),
          ),
          array(
            "type" => "attach_image",
 			"class" => "",
             "heading" => __( "Custom Map Pin", "pro-elements" ),
             "param_name" => "map_image_pro",
             "value" => __( "", "pro-elements" ),
          ),
          array(
            "type" => "checkbox",
 			"class" => "",
             "heading" => __( "Open Map Marker Automatically", "pro-elements" ),
             "param_name" => "map_pin_open_close",
             "value" => "",
          ),
          array(
             "type" => "dropdown",
 			"class" => "",
             "heading" => __( "Map Type", "pro-elements" ),
             "param_name" => "map_type_pro",
 			"value"       => array(
 			        'Road Map'   => 'ROADMAP',
 			        'Hybrid Map'   => 'HYBRID',
 			        'Satellite Map'	  => 'SATELLITE',
 			        'Terrain Map'   => 'TERRAIN',
 			),
 			"std"         => 'ROADMAP',
          ),
      )
   ) );
}