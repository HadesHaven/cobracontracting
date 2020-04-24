<article>
    <?php
    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
    $startDate = strtotime(get_field('event_start_date_time'));
    $startDateFormatted = date('F j, Y', $startDate);
    $startTimeFormatted = date('g:i a', $startDate);
    $endDate = strtotime(get_field('event_end_date_time'));
    $endDateFormatted = date('F j, Y', $endDate);
    $endTimeFormatted = date('g:i a', $endDate);    
    ?>
    
    <?php if ( has_post_thumbnail() ) : ?>
    <a class="article-image-link" href="<?php the_permalink(); ?>" aria-label="<?php echo get_the_post_thumbnail_caption($post->ID)?>">
        <div class="article-image" style="background-image:url(<?php echo esc_url( $thumbnail[0] ); ?>)">
            <?php get_template_part( 'template-parts/content/format', 'icon' ); ?>
        </div>
    </a>
    <?php endif; ?>

    <a href="<?php the_permalink(); ?>" aria-label="Read <?php the_title(); ?>">
        <h2><?php the_title(); ?></h2>
    </a>

    <?php if( get_post_type() == 'events' ) : ?>

        <!-- For Events -->
        <div class="post-meta meta-event">
			
            <p><strong>Event Date:</strong>                
                <?php 
                    if( $startDateFormatted == $endDateFormatted ) :
                        echo $startDateFormatted . " " . $startTimeFormatted . " - " . $endTimeFormatted;
                    else: 
                        echo $startDateFormatted . " " . $startTimeFormatted . " - " . $endDateFormatted . " " . $endTimeFormatted;
                    endif; 
                ?> 
                <?php the_field('timezone')?>
            </p>

            <?php if( get_field('city_or_town') ): ?>
                <p><strong>Location: </strong><?php the_field('city_or_town')?></p>
            <?php endif; ?>
            
        </div>

    <?php else: ?>

        <!-- For Post Formats -->
        <div class="post-meta">
            <ul class="categories">
                <li><?php echo get_the_category_list('<span> / </span>'); ?></li>
            </ul>
        </div>

    <?php endif; ?>

</article>

