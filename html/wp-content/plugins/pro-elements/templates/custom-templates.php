<?php

/**
 * Default Templates
 */



add_action( 'vc_load_default_templates_action','footer_pro_custom_template_for_vc' ); // Hook in
function footer_pro_custom_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( ' Homepage Template', 'pro-elements' ); // Assign name for your custom template
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/highlight_1_template_thumb-min.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['content']    = <<<CONTENT
            [vc_row full_width="stretch_row" css=".vc_custom_1456050551156{margin-top: -90px !important;padding-top: 25px !important;padding-bottom: 60px !important;background-color: #1a171a !important;}"][vc_column][pro_episode display_margins=""][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1456050655787{padding-top: 40px !important;background-color: #ffffff !important;}"][vc_column][vc_custom_heading text="About Us" use_theme_fonts="yes" el_class="title-heading-progression"][vc_row_inner css=".vc_custom_1456050911872{padding-bottom: 90px !important;}"][vc_column_inner width="1/2"][vc_single_image image="36" img_size="full"][/vc_column_inner][vc_column_inner width="1/2"][vc_separator color="custom" border_width="10" accent_color="rgba(26,23,26,0.08)" el_class="divider-pro"][vc_custom_heading text="Jane Doe" font_container="tag:h2|text_align:right" use_theme_fonts="yes" el_class="about-single-title-progression"][vc_custom_heading text="Designer / Developer" font_container="tag:h5|text_align:right" use_theme_fonts="yes" el_class="author-description-progression"][vc_column_text]
            <p style="text-align: right;">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove...</p>
            [/vc_column_text][vc_raw_html el_class="about-content-progression"]JTNDYSUyMGhyZWYlM0QlMjJodHRwJTNBJTJGJTJGd3d3LmZhY2Vib29rLmNvbSUyMiUyMHRhcmdldCUzRCUyMl9ibGFuayUyMiUzRSUzQ2klMjBjbGFzcyUzRCUyMmZhJTIwZmEtZmFjZWJvb2slMjIlM0UlM0MlMkZpJTNFJTNDJTJGYSUzRSUzQ2ElMjBocmVmJTNEJTIyaHR0cCUzQSUyRiUyRnR3aXR0ZXIuY29tJTIyJTIwdGFyZ2V0JTNEJTIyX2JsYW5rJTIyJTNFJTNDaSUyMGNsYXNzJTNEJTIyZmElMjBmYS10d2l0dGVyJTIyJTNFJTNDJTJGaSUzRSUzQyUyRmElM0U=[/vc_raw_html][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1456050979465{padding-bottom: 90px !important;}"][vc_column_inner width="1/2"][vc_separator color="custom" border_width="10" accent_color="rgba(26,23,26,0.08)" el_class="divider-pro"][vc_custom_heading text="John Doe" use_theme_fonts="yes" el_class="about-single-title-progression"][vc_custom_heading text="Designer / Developer" font_container="tag:h5|text_align:left" use_theme_fonts="yes" el_class="author-description-progression"][vc_column_text]
            <p style="text-align: left;">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove...</p>
            [/vc_column_text][vc_raw_html el_class="about-content-progression secondary-about"]JTNDYSUyMGhyZWYlM0QlMjJodHRwJTNBJTJGJTJGd3d3LmZhY2Vib29rLmNvbSUyMiUyMHRhcmdldCUzRCUyMl9ibGFuayUyMiUzRSUzQ2klMjBjbGFzcyUzRCUyMmZhJTIwZmEtZmFjZWJvb2slMjIlM0UlM0MlMkZpJTNFJTNDJTJGYSUzRSUzQ2ElMjBocmVmJTNEJTIyaHR0cCUzQSUyRiUyRnR3aXR0ZXIuY29tJTIyJTIwdGFyZ2V0JTNEJTIyX2JsYW5rJTIyJTNFJTNDaSUyMGNsYXNzJTNEJTIyZmElMjBmYS10d2l0dGVyJTIyJTNFJTNDJTJGaSUzRSUzQyUyRmElM0U=[/vc_raw_html][/vc_column_inner][vc_column_inner width="1/2"][vc_single_image image="52" img_size="full" alignment="right"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1456051170250{margin-bottom: -90px !important;padding-bottom: 90px !important;background-image: url(http://localhost/soundbyte/wp-content/uploads/2016/02/highlight-1.jpg?id=18) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][pro_highlight_element description_pro="

            Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named.

            " pro_icon_url="http://localhost/soundbyte/donate/" background_image="18" highlight_image_pro=""][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}


add_action( 'vc_load_default_templates_action','services_pro_custom_template_for_vc' ); // Hook in
function services_pro_custom_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( ' About Page', 'pro-elements' ); // Assign name for your custom template
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/highlight_2_template_thumb-min.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['content']    = <<<CONTENT
            [vc_row full_width="stretch_row" css=".vc_custom_1456051326852{margin-top: -35px !important;background-color: #ffffff !important;}"][vc_column][vc_custom_heading text="About Us" use_theme_fonts="yes" el_class="title-heading-progression"][vc_row_inner css=".vc_custom_1456050911872{padding-bottom: 90px !important;}"][vc_column_inner width="1/2"][vc_single_image image="36" img_size="full"][/vc_column_inner][vc_column_inner width="1/2"][vc_separator color="custom" border_width="10" accent_color="rgba(26,23,26,0.08)" el_class="divider-pro"][vc_custom_heading text="Jane Doe" font_container="tag:h2|text_align:right" use_theme_fonts="yes" el_class="about-single-title-progression"][vc_custom_heading text="Designer / Developer" font_container="tag:h5|text_align:right" use_theme_fonts="yes" el_class="author-description-progression"][vc_column_text]
            <p style="text-align: right;">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove...</p>
            [/vc_column_text][vc_raw_html el_class="about-content-progression"]JTNDYSUyMGhyZWYlM0QlMjJodHRwJTNBJTJGJTJGd3d3LmZhY2Vib29rLmNvbSUyMiUyMHRhcmdldCUzRCUyMl9ibGFuayUyMiUzRSUzQ2klMjBjbGFzcyUzRCUyMmZhJTIwZmEtZmFjZWJvb2slMjIlM0UlM0MlMkZpJTNFJTNDJTJGYSUzRSUzQ2ElMjBocmVmJTNEJTIyaHR0cCUzQSUyRiUyRnR3aXR0ZXIuY29tJTIyJTIwdGFyZ2V0JTNEJTIyX2JsYW5rJTIyJTNFJTNDaSUyMGNsYXNzJTNEJTIyZmElMjBmYS10d2l0dGVyJTIyJTNFJTNDJTJGaSUzRSUzQyUyRmElM0U=[/vc_raw_html][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1456050979465{padding-bottom: 90px !important;}"][vc_column_inner width="1/2"][vc_separator color="custom" border_width="10" accent_color="rgba(26,23,26,0.08)" el_class="divider-pro"][vc_custom_heading text="John Doe" use_theme_fonts="yes" el_class="about-single-title-progression"][vc_custom_heading text="Designer / Developer" font_container="tag:h5|text_align:left" use_theme_fonts="yes" el_class="author-description-progression"][vc_column_text]
            <p style="text-align: left;">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove...</p>
            [/vc_column_text][vc_raw_html el_class="about-content-progression secondary-about"]JTNDYSUyMGhyZWYlM0QlMjJodHRwJTNBJTJGJTJGd3d3LmZhY2Vib29rLmNvbSUyMiUyMHRhcmdldCUzRCUyMl9ibGFuayUyMiUzRSUzQ2klMjBjbGFzcyUzRCUyMmZhJTIwZmEtZmFjZWJvb2slMjIlM0UlM0MlMkZpJTNFJTNDJTJGYSUzRSUzQ2ElMjBocmVmJTNEJTIyaHR0cCUzQSUyRiUyRnR3aXR0ZXIuY29tJTIyJTIwdGFyZ2V0JTNEJTIyX2JsYW5rJTIyJTNFJTNDaSUyMGNsYXNzJTNEJTIyZmElMjBmYS10d2l0dGVyJTIyJTNFJTNDJTJGaSUzRSUzQyUyRmElM0U=[/vc_raw_html][/vc_column_inner][vc_column_inner width="1/2"][vc_single_image image="52" img_size="full" alignment="right"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1456051170250{margin-bottom: -90px !important;padding-bottom: 90px !important;background-image: url(http://localhost/soundbyte/wp-content/uploads/2016/02/highlight-1.jpg?id=18) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][pro_highlight_element description_pro="

            Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named.

            " pro_icon_url="http://localhost/soundbyte/donate/" background_image="18" highlight_image_pro=""][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}


add_action( 'vc_load_default_templates_action','membership_pro_custom_template_for_vc' ); // Hook in
function membership_pro_custom_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( ' Contact Page', 'pro-elements' ); // Assign name for your custom template
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/highlight_6_template_thumb-min.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['content']    = <<<CONTENT
            [vc_row css=".vc_custom_1456054373646{margin-right: 15% !important;margin-left: 15% !important;padding-bottom: 60px !important;}"][vc_column][vc_custom_heading text="GOT A QUESTION FOR THE HOSTS?" font_container="tag:h2|text_align:center" use_theme_fonts="yes"][vc_column_text]
            <p style="text-align: center;">She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown.</p>

            [/vc_column_text][vc_gmaps link="#E-8_JTNDaWZyYW1lJTIwc3JjJTNEJTIyaHR0cHMlM0ElMkYlMkZ3d3cuZ29vZ2xlLmNvbSUyRm1hcHMlMkZlbWJlZCUzRnBiJTNEJTIxMW0xOCUyMTFtMTIlMjExbTMlMjExZDYzMDQuODI5OTg2MTMxMjcxJTIxMmQtMTIyLjQ3NDY5NjgwMzMwOTIlMjEzZDM3LjgwMzc0NzUyMTYwNDQzJTIxMm0zJTIxMWYwJTIxMmYwJTIxM2YwJTIxM20yJTIxMWkxMDI0JTIxMmk3NjglMjE0ZjEzLjElMjEzbTMlMjExbTIlMjExczB4ODA4NTg2ZTYzMDI2MTVhMSUyNTNBMHg4NmJkMTMwMjUxNzU3YzAwJTIxMnNTdG9yZXklMkJBdmUlMjUyQyUyQlNhbiUyQkZyYW5jaXNjbyUyNTJDJTJCQ0ElMkI5NDEyOSUyMTVlMCUyMTNtMiUyMTFzZW4lMjEyc3VzJTIxNHYxNDM1ODI2NDMyMDUxJTIyJTIwd2lkdGglM0QlMjI2MDAlMjIlMjBoZWlnaHQlM0QlMjI0NTAlMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBzdHlsZSUzRCUyMmJvcmRlciUzQTAlMjIlMjBhbGxvd2Z1bGxzY3JlZW4lM0UlM0MlMkZpZnJhbWUlM0U=" css=".vc_custom_1455035381974{border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;}"][contact-form-7 id="131"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1456051170250{margin-bottom: -90px !important;padding-bottom: 90px !important;background-image: url(http://localhost/soundbyte/wp-content/uploads/2016/02/highlight-1.jpg?id=18) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][pro_highlight_element description_pro="

            Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named.

            " pro_icon_url="http://localhost/soundbyte/donate/" background_image="18" highlight_image_pro=""][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}


add_action( 'vc_load_default_templates_action','fourthy_custom_template_for_vc' ); // Hook in
function fourthy_custom_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( ' Donate Page', 'pro-elements' ); // Assign name for your custom template
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/donate_template_thumb.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['content']    = <<<CONTENT
            [vc_row][vc_column width="1/2"][vc_single_image image="76" img_size="full"][/vc_column][vc_column width="1/2"][vc_separator border_width="10" el_class="divider-pro"][vc_custom_heading text="Help Us Run The Show" font_container="tag:h3|text_align:left" use_theme_fonts="yes"][vc_column_text]And if she hasn’t been rewritten, then they are still using her. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.[/vc_column_text][vc_btn title="Donate" style="outline-custom" outline_custom_color="#0ce682" outline_custom_hover_background="#0ce682" outline_custom_hover_text="#ffffff" shape="square" size="lg" link="url:%23!||"][/vc_column][/vc_row][vc_row][vc_column][vc_column_text]Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque rem beatae blanditiis esse inventore perferendis error aspernatur, facilis tenetur fuga. Tempora delectus animi corporis enim ipsam necessitatibus repellat illum optio? Beatae iste explicabo, ratione qui quas sit, vero, voluptatum voluptates alias dolore ducimus maiores molestiae dicta ea deserunt minima tempora non cupiditate quam incidunt veniam tempore sint necessitatibus! Molestias, repudiandae.

            Beatae iste explicabo, ratione qui quas sit, vero, voluptatum voluptates alias dolore ducimus maiores molestiae dicta ea deserunt minima tempora non cupiditate quam incidunt veniam tempore sint necessitatibus! Molestias, repudiandae. Quibusdam officiis dolor amet, velit ab quasi temporibus commodi! Quod aliquid quidem deserunt, deleniti cumque, tenetur nesciunt facilis nulla fugit sapiente at dolor laboriosam consectetur veritatis debitis aliquam labore eos.

            Quibusdam officiis dolor amet, velit ab quasi temporibus commodi! Quod aliquid quidem deserunt, deleniti cumque, tenetur nesciunt facilis nulla fugit sapiente at dolor laboriosam consectetur veritatis debitis aliquam labore eos.

            Impedit earum dolorem cumque esse velit, necessitatibus cupiditate eligendi beatae, porro, voluptates qui ipsa eveniet, neque enim numquam natus. Dolores natus sint tempore voluptates consectetur sapiente, ipsum harum dolorum eaque![/vc_column_text][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}



add_action( 'vc_load_default_templates_action','episode_custom_template_for_vc' ); // Hook in
function episode_custom_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( ' Episodes Page', 'pro-elements' ); // Assign name for your custom template
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/episodes_template_thumb-min.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['content']    = <<<CONTENT
            [vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1456051573606{margin-top: -30px !important;padding-bottom: 60px !important;}"][vc_column][pro_episode title_episodes="" grid_columns="3" display_margins="true" blog_heading_font_pro="rgba(64,64,64,0.7)" blog_heading_font_hover_pro="#404040"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1456051170250{margin-bottom: -90px !important;padding-bottom: 90px !important;background-image: url(http://localhost/soundbyte/wp-content/uploads/2016/02/highlight-1.jpg?id=18) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][pro_highlight_element description_pro="

            Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named.

            " pro_icon_url="http://localhost/soundbyte/donate/" background_image="18" highlight_image_pro=""][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}


add_action( 'vc_load_default_templates_action','h_highlight_custom_template_for_vc' ); // Hook in
function h_highlight_custom_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( ' Highlight Template', 'pro-elements' ); // Assign name for your custom template
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/donate_template_thumb-min.png', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['content']    = <<<CONTENT
            [vc_row full_width="stretch_row" css=".vc_custom_1456051170250{margin-bottom: -90px !important;padding-bottom: 90px !important;background-image: url(http://localhost/soundbyte/wp-content/uploads/2016/02/highlight-1.jpg?id=18) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][pro_highlight_element description_pro="

            Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named.

            " pro_icon_url="http://localhost/soundbyte/donate/" background_image="18" highlight_image_pro=""][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}
