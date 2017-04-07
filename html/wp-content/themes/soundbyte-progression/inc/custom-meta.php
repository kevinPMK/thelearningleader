<?php
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function pro_page_metaboxes( array $meta_boxes_pro ) {

	$page_fields_pro = array(

		array(
			'id' => 'progression_sub_title',
			'name' => esc_html__('Sub-title (optional)', 'soundbyte-progression'),
			'type' => 'text'
		),


		array(
			'id' => 'progression_page_title',
			'name' => esc_html__('Page Title Display', 'soundbyte-progression'),
			'type' => 'radio',
			'options' => array(
				'show' => esc_html__('Default Display', 'soundbyte-progression'),
				'hide' => esc_html__('Hide Page Title', 'soundbyte-progression'),
				'slider' => esc_html__('Display Slider', 'soundbyte-progression'),
			),
			'default' => 'show',
			'cols' => '6'
		),

		array(
			'id' => 'progression_page_sidebar',
			'name' => esc_html__('Sidebar Display', 'soundbyte-progression'),
			'type' => 'radio',
			'options' => array(
				'hidden-sidebar' => esc_html__('Hide Sidebar', 'soundbyte-progression'),
				'right-sidebar' => esc_html__('Sidebar Right', 'soundbyte-progression'),
				'left-sidebar' => esc_html__('Sidebar Left', 'soundbyte-progression')
			),
			'default' => 'hidden-sidebar',
			'cols' => '6'
		),

		array(
			'id' => 'progression_header_image',
			'name' => esc_html__('Page Title Background Image', 'soundbyte-progression'),
			'type' => 'image',
			'cols' => '6'
		),

	);

	$meta_boxes_pro[] = array(
		'title' => esc_html__('Page Settings', 'soundbyte-progression'),
		'pages'      => array('page'),
		'priority'    => 'core', // Meta box context
		'context'    => 'normal', // Meta box context
		'fields' => $page_fields_pro
	);

	return $meta_boxes_pro;

}
add_filter( 'cmb_meta_boxes', 'pro_page_metaboxes' );



function progression_post_metaboxes( array $meta_boxes_pro ) {

	$post_fields_pro = array(
		array(
			'id' => 'pro_gallery',
			'name' => esc_html__('Image Gallery', 'soundbyte-progression'),
			'desc' => esc_html__('Add-in images to display a gallery.', 'soundbyte-progression'),
			'type' => 'image',
			'repeatable' => true
		),
		array(
			'id' => 'pro_video_post',
			'name' => esc_html__('Audio/Video Embed', 'soundbyte-progression'),
			'desc' => esc_html__('Paste in your video url or embed code', 'soundbyte-progression'),
			'type' => 'text'
		),
		array(
			'id' => 'pro_external_link',
			'name' => esc_html__('External Link', 'soundbyte-progression'),
			'desc' => esc_html__('Make your post link to another page', 'soundbyte-progression'),
			'type' => 'text'
		)
	);

	$meta_boxes_pro[] = array(
		'title' => esc_html__('Post Settings', 'soundbyte-progression'),
		'pages'      => array('post'),
		'priority'   => 'high', // Meta box priority
		'context'    => 'normal', // Meta box context
		'fields' => $post_fields_pro
	);

	return $meta_boxes_pro;

}
add_filter( 'cmb_meta_boxes', 'progression_post_metaboxes' );



function pro_episode_metaboxes( array $meta_boxes_pro ) {

	$episode_fields_pro = array(

	array(
		'id' => 'pro_slider_checkbox',
		'name' => esc_html__('Check to Add to Slider', 'soundbyte-progression'),
		'type' => 'checkbox',
		'cols' => '6',
	),
	array(
		'id' => 'page_title_audio_download',
		'name' => esc_html__('Page Title Audio Download Button', 'soundbyte-progression'),
		'type' => 'checkbox',
		'cols' => '6',
	),
	array(
		'id' => 'pro_slider_extra_text',
		'name' => esc_html__('Slider Short Text', 'soundbyte-progression'),
		'desc' => esc_html__('Enter the slider short description', 'soundbyte-progression'),
		'type' => 'textarea',
	),

	array(
		'id' => 'pro_time_text',
		'name' => esc_html__('Episode Length', 'soundbyte-progression'),
		'desc' => esc_html__('Example: 59 MINS', 'soundbyte-progression'),
		'type' => 'text',
		'cols' => '6',
	),
	
	array(
		'id' => 'pro_duration_int',
		'name' => esc_html__('Duration (numbers only)', 'soundbyte-progression'),
		'desc' => esc_html__('Example: 34:18', 'soundbyte-progression'),
		'type' => 'text',
		'cols' => '6',
	),	
	
	array(
		'id' => 'pro_filesize',
		'name' => esc_html__('File Size', 'soundbyte-progression'),
		'desc' => esc_html__('Fill in file size in bytes (If not computed automatically)', 'soundbyte-progression'),
		'type' => 'text',
		'cols' => '12',
	),		


	array(
		'id' => 'slider_main_title',
		'name' => esc_html__('Slider Main Left Title', 'soundbyte-progression'),
		'desc' => esc_html__('Left custom title of the slider', 'soundbyte-progression'),
		'type' => 'textarea_code',
		'cols' => '6',
	),

	array(
		'id' => 'slider_main_left_subtitle',
		'name' => esc_html__('Slider Left Social Icons', 'soundbyte-progression'),
		'desc' => esc_html__('Left section of the slider', 'soundbyte-progression'),
		'type' => 'textarea_code',
		'cols' => '6',
	),

	array(
		'id' => 'pro_slider_button_text',
		'name' => esc_html__('Slider Left Button Link Text', 'soundbyte-progression'),
		'desc' => esc_html__('Insert Link Text', 'soundbyte-progression'),
		'type' => 'text',
		'cols' => '6',
	),

	array(
		'id' => 'pro_slider_button_link',
		'name' => esc_html__('Slider Left Button Link URL', 'soundbyte-progression'),
		'desc' => esc_html__('Insert URL Only', 'soundbyte-progression'),
		'type' => 'text',
		'cols' => '6',
	),

	array(
		'id' => 'progression_header_image_episode',
		'name' => esc_html__('Page Title Background Image', 'soundbyte-progression'),
		'desc' => esc_html__('Add-in the image to be featured on the main Slider / Page Title', 'soundbyte-progression'),
		'type' => 'image',
		'cols' => '6',
	),

	array(
		'id' => 'page_title_audioplayer_file',
		'name' => esc_html__('Slider / Page Title Audio file', 'soundbyte-progression'),
		'desc' => esc_html__('Add-in the audio file to be featured on the main Slider / Page Title', 'soundbyte-progression'),
		'type' => 'file',
		'cols' => '6',
	),
	
	array(
		'id' => 'page_title_audioplayer_embed',
		'name' => esc_html__('Slider / Page Title Audio Embed code (Optional)', 'soundbyte-progression'),
		'desc' => esc_html__('Add-in the full embed code to be displayed on the main Slider / Page Title (Only displays when there is no audio file uploaded. This field is built to show any embedded content such as YouTube, SoundCloud and more. You can also use the Audio Player shortcode to display an externally hosted MP3 file. Example: [audio mp3="http://traffic.libsyn.com/name/file.mp3"][/audio]  )', 'soundbyte-progression'),
		'type' => 'textarea',
	),

	array(
		'id' => 'pro_external_rss_file',
		'name' => esc_html__('Use an external URL for the RSS feed audio file', 'soundbyte-progression'),		
		'type' => 'checkbox',
	),	
	array(
		'id' => 'pro_external_rss_file_link',		
		'name' => esc_html__('External audio file URL for the RSS feed', 'soundbyte-progression'),
		'desc' => esc_html__('If you have an audio file hosted externally (For example: Libsyn, Bulbrry, SoundCloud etc.), check the above box and fill-in the direct link to the file here', 'soundbyte-progression'),				
		'type' => 'text_url',
	),

	array(
		'id' => 'progression_rss_image_episode',
		'name' => esc_html__('RSS Feed Episode Image', 'soundbyte-progression'),
		'desc' => esc_html__('Add-in the image to be featured on the RSS feed (Recommended Size: 1400 x 1400 px.)', 'soundbyte-progression'),
		'type' => 'image',
		'cols' => '12',
	),	

	);

	$meta_boxes_pro[] = array(
		'title' => esc_html__('Episode Settings', 'soundbyte-progression'),
		'pages'      => array('episode'),
		'priority'    => 'core', // Meta box context
		'context'    => 'normal', // Meta box context
		'fields' => $episode_fields_pro
	);

	return $meta_boxes_pro;

}
add_filter( 'cmb_meta_boxes', 'pro_episode_metaboxes' );
