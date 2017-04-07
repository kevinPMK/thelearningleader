<?php

/**
 * Map Location Shortcode
 */



// [pro_highlight_element location_columns_pro="" etc...]
add_shortcode( 'pro_highlight_element', 'pro_highlight_element_func' );
function pro_highlight_element_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
	   'title_pro' => 'Support The Show',
        'pro_btn_text' => 'Make A Donation',
        'pro_btn_icon' => '',
	    'pro_icon_url' => '#!',
 	    'icon_type' => '',
 	    'icon_fontawesome' => '',
 	    'icon_openiconic' => '',
 	    'icon_typicons' => '',
 	    'icon_entypo' => '',
 	    'icon_linecons' => '',

        'title_font_size_pro' => '',
        'title_font_color_pro' => '',



   ), $atts ) );

	$content = wpb_js_remove_wpautop($content, true);

	$icon_wrapper = false;

	if ( 'true' === $pro_btn_icon ) {
		vc_icon_element_fonts_enqueue( $icon_type );

		if ( isset( ${"i_icon_" . $icon_type} ) ) {
			if ( 'pixelicons' === $icon_type ) {
				$icon_wrapper = true;
			}
			$iconClass = ${"i_icon_" . $icon_type};
		} else {

			if ( 'openiconic' === $icon_type ) {
				$iconClass = $icon_openiconic;
			}
			elseif ( 'typicons' === $icon_type ) {
				$iconClass = $icon_typicons;
			}
			elseif ( 'entypo' === $icon_type ) {
				$iconClass = $icon_entypo;
			}
			elseif ( 'linecons' === $icon_type ) {
				$iconClass = $icon_linecons;
			}
			 else {
			$iconClass = $icon_fontawesome;}
		}

		if ( $icon_wrapper ) {
			$icon_html = '<i class="vc_btn3-icon"><span class="vc_btn3-icon-inner ' . esc_attr( $iconClass ) . '"></span></i>';
		} else {
			$icon_html = '<i class="vc_btn3-icon ' . esc_attr( $iconClass ) . '"></i>';
		}
		}




	$output_pro = '';

	STATIC $idpro = 0;
	$idpro++;

	ob_start();
	?>


		<div class="highlight-section-progression">

				<?php if($title_pro): ?><h2 class="highlight-title-progression" style ="font-size:<?php echo esc_attr( $title_font_size_pro ) ?>; color:<?php echo esc_attr( $title_font_color_pro ) ?>;"><?php echo esc_attr( $title_pro ) ?></h2><?php endif; ?>
				<?php if($content): ?><div class="highlight-description-pro"><?php echo wp_kses_post( $content ) ?></div><?php endif; ?>

				<?php if($pro_icon_url): ?>
					<a class="progression-button default-button" href="<?php echo esc_attr($pro_icon_url);?>"><?php if($pro_btn_icon): ?><?php echo  wp_kses_post($icon_html); ?><?php endif; ?><?php if($pro_btn_text): ?><?php echo esc_attr( $pro_btn_text ); ?><?php endif;?></a>
				<?php endif; ?>

					<div class="clearfix-pro"></div>
		</div><!-- close .highlight-section-progression -->




    <?php

   	return $output_pro. ob_get_clean();

}


add_action( 'vc_before_init', 'pro_highlight_element_integrateVC' );
function pro_highlight_element_integrateVC() {
   vc_map( array(
      "name" => __( "Pro Highlight", "pro-elements" ),
	  "description" => __( "Add Highlight Section", "pro-elements" ),
      "base" => "pro_highlight_element",
	  "weight" => 100,
      "class" => "",
      "category" => __( "Pro Elements", "pro-elements"),
	  'icon' => 'vc-icon',

      "params" => array(
          array(
            "type" => "textfield",
			"holder" => "div",
 			"class" => "",
             "heading" => __( "Title", "pro-elements" ),
             "param_name" => "title_pro",
             "value" => __( "Support The Show", "pro-elements" ),
          ),

          array(
            "type" => "textarea_html",
 			"class" => "",
             "heading" => __( "Description", "pro-elements" ),
             "param_name" => "content",
             "value" => __( "Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named.", "pro-elements" ),
          ),

          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => __( "Button URL", "pro-elements" ),
             "param_name" => "pro_icon_url",
             "value" => __( "#!", "pro-elements" ),
          ),

          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => __( "Button Text", "pro-elements" ),
             "param_name" => "pro_btn_text",
             "value" => __( "Make A Donation", "pro-elements" ),
          ),

          array(
             "type" => "checkbox",
             "class" => "",
             "heading" => __( "Add Button Icon?", "pro-elements" ),
             "param_name" => "pro_btn_icon",
          ),


  			 array(
  			'type' => 'dropdown',
  			'heading' => __( 'Icon library', 'progression' ),
  			'value' => array(
  				__( 'Font Awesome', 'progression' ) => 'fontawesome',
  				__( 'Open Iconic', 'progression' ) => 'openiconic',
  				__( 'Typicons', 'progression' ) => 'typicons',
  				__( 'Entypo', 'progression' ) => 'entypo',
  				__( 'Linecons', 'progression' ) => 'linecons',
  			),
  			'dependency' => array(
  				'element' => 'pro_btn_icon',
  				'not_empty' => true,
  			),
  			'param_name' => 'icon_type',
  			'description' => __( 'Select icon library.', 'progression' ),
  		),
  		array(
  			'type' => 'iconpicker',
  			'heading' => __( 'Icon', 'progression' ),
  			'param_name' => 'icon_fontawesome',
  			'value' => 'fa fa-info-circle',
  			'settings' => array(
  				'emptyIcon' => false, // default true, display an "EMPTY" icon?
  				'iconsPerPage' => 200, // default 100, how many icons per/page to display
  			),
  			'dependency' => array(
  				'element' => 'icon_type',
  				'value' => 'fontawesome',
  			),
  			'description' => __( 'Select icon from library.', 'progression' ),
  		),
  		array(
  			'type' => 'iconpicker',
  			'heading' => __( 'Icon', 'progression' ),
  			'param_name' => 'icon_openiconic',
  			'settings' => array(
  				'emptyIcon' => false, // default true, display an "EMPTY" icon?
  				'type' => 'openiconic',
  				'iconsPerPage' => 200, // default 100, how many icons per/page to display
  			),
  			'dependency' => array(
  				'element' => 'icon_type',
  				'value' => 'openiconic',
  			),
  			'description' => __( 'Select icon from library.', 'progression' ),
  		),
  		array(
  			'type' => 'iconpicker',
  			'heading' => __( 'Icon', 'progression' ),
  			'param_name' => 'icon_typicons',
  			'settings' => array(
  				'emptyIcon' => false, // default true, display an "EMPTY" icon?
  				'type' => 'typicons',
  				'iconsPerPage' => 200, // default 100, how many icons per/page to display
  			),
  			'dependency' => array(
  				'element' => 'icon_type',
  				'value' => 'typicons',
  			),
  			'description' => __( 'Select icon from library.', 'progression' ),
  		),
  		array(
  			'type' => 'iconpicker',
  			'heading' => __( 'Icon', 'progression' ),
  			'param_name' => 'icon_entypo',
  			'settings' => array(
  				'emptyIcon' => false, // default true, display an "EMPTY" icon?
  				'type' => 'entypo',
  				'iconsPerPage' => 300, // default 100, how many icons per/page to display
  			),
  			'dependency' => array(
  				'element' => 'icon_type',
  				'value' => 'entypo',
  			),
  		),
  		array(
  			'type' => 'iconpicker',
  			'heading' => __( 'Icon', 'progression' ),
  			'param_name' => 'icon_linecons',
  			'settings' => array(
  				'emptyIcon' => false, // default true, display an "EMPTY" icon?
  				'type' => 'linecons',
  				'iconsPerPage' => 200, // default 100, how many icons per/page to display
  			),
  			'dependency' => array(
  				'element' => 'icon_type',
  				'value' => 'linecons',
  			),
  			'description' => __( 'Select icon from library.', 'progression' ),
  		),



array(
    "type" => "textfield",
    "class" => "",
    "heading" => __( "Title Font Size", "pro-elements" ),
    "param_name" => "title_font_size_pro",
    'group' => __( 'Design options', 'pro-elements' ),
    "std"         => '36px',
),

array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => __( "Title Font Color", "pro-elements" ),
    "param_name" => "title_font_color_pro",
    "std"         => '#ffffff',
    'group' => __( 'Design options', 'pro-elements' ),
),
      )
   ) );
}
