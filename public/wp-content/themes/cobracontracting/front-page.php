<?php get_header(); ?>
<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>
<?php
$currentPage = get_query_var('paged');
 

    // General arguments

    $posts = new WP_Query(array(
        'post_type' => 'post', // Default or custom post type
        'posts_per_page' => 10, // Max number of posts per page
        //'category_name' => 'My category', // Your category (optional)
        'paged' => $currentPage
    ));
?>
    

<?php   if ($posts->have_posts()) :
        while ($posts->have_posts()) :
            $posts->the_post();
?>
            <a href="<?php the_permalink(); ?>" aria-label="Read <?php the_title(); ?>">
                <div class='post-wrap'>
                <?php echo the_title(); ?>
                <?php the_excerpt(); ?>
                </div>
            </a>
<?php                
        endwhile;
    endif;
?>
<?php get_footer();