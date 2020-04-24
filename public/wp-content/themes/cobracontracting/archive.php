<?php get_header(); ?>

    <div class="container">

        <?php the_archive_title( '<h1 class="page-title">', '</h1>' );?>       

        <div id="articles">
            <div class="articles-wrap">
                <div class="row">
<?php
                    if ( have_posts() ) :
                    while (have_posts()) : the_post();
?>
                    <?php get_template_part( 'template-parts/projects/project', 'articles' ); ?>	
                </div>		
                         
                
                <?php endwhile;?>
                   <?php endif; ?>
                <?php wp_reset_postdata(); ?>

            </div>
            
        </div><!--END #articles -->
    </div><!--END .container -->


<?php get_footer();?>
