<a href="<?php the_permalink();?>" class="isotope-img-container">
    <div class="zoom-image-container-progression">
        <?php if(has_post_thumbnail()) : ?>
            <?php the_post_thumbnail( 'progression-episode-archive' );?>
        <?php elseif(get_post_meta($post->ID, 'progression_header_image_episode', true)) : ?>
            <?php $gallery_pro = get_post_meta( $post->ID, 'progression_header_image_episode', false ); foreach ( $gallery_pro as $single_gallery_img ) ?>
            <?php $image = wp_get_attachment_image( $single_gallery_img, 'progression-episode-archive');?>
            <?php echo $image;?>

        <?php else : ?>
            <img src="<?php echo get_template_directory_uri() . '/images/episode-placeholder.jpg'; ?>" alt="<?php bloginfo('name'); ?>"/>
        <?php endif; ?>
    </div>
</a>
<div class="isotope-index-text">
    <a href="<?php the_permalink();?>">
        <div class="soundbyte-divider-progression"></div>
        <div class="clearfix-progression"></div>
        <div class="soundbyte-podcast-progression-meta">
            <div class="alignleft"><?php $terms = get_the_terms( $post->ID , 'episode_type' );
                if($terms) {
                    foreach ( $terms as $term ) {
                    $term_link = get_term_link( $term, 'episode_type' );
                    if( is_wp_error( $term_link ) )
                    continue;
                    echo '<div>' . $term->name .'<span>,</span> </div>';
                    }
                }?>
            </div>
            <?php if(get_post_meta($post->ID, 'pro_time_text', true)): ?><div class="alignright"><i class="fa fa-clock-o"></i><?php echo esc_attr(get_post_meta($post->ID, 'pro_time_text', true));?></div><?php endif;?>
            <div class="clearfix-progression"></div>
        </div>
        <h2 class="soundbyte-podcast-progression-title"><?php the_title();?></h2>
        <div class="soundbyte-podcast-date-progression"><?php echo esc_attr(get_the_date('F d, Y'));?></div>
    </a>
    <a href="<?php the_permalink();?>" class="soundbyte-podcast-play-progression"><?php esc_attr_e('Read More', 'soundbyte-progression');?> <i class="fa fa-arrow-right"></i></a>
</div>
