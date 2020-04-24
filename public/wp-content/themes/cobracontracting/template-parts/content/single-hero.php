<!--Check if the editor wants a hero banner. If not just show title-->
<?php if (get_field('banner')):
    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'banner' ); 
    $background_position = get_field('background_position'); 
    $series = get_field('series');
?>
        
        
<?php 
    if( $background_position ) :
        $backgroundPosition = "background-position: $background_position "; 
    else:
        $backgroundPosition = "background-position: center"; 
    endif; 
?>

    <div id="hero">
        <div class="hero-bg" style="background-image:url(<?php echo esc_url( $thumbnail[0] ); ?>); <?php echo strtolower($backgroundPosition); ?>"></div>
        <div class="hero-inner">
            <div class="container">
                <h1><?php echo the_title(); ?></h1>
                <div class="post-meta-top">
                    <ul class="categories">
                        <li><?php echo get_the_category_list('<span> / </span>'); ?></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

<?php endif; ?> 

