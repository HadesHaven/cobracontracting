<?php get_header(); ?>
	<div id="post-<?php the_ID(); ?>">
		<?php get_template_part( 'template-parts/content/single', 'hero' ); ?>
	</div>
<?php get_footer();?>



 