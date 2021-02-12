<?php
get_header(); ?>
<h2 >Search Results for: <?php echo get_search_query(); ?> </h2>
<?php
	if ( have_posts() ) : ?>
		<?php while (have_posts()) : the_post();
			get_template_part( 'content' );
		endwhile; ?>

		<?php //blm_basic_paging_nav(); ?>
		<?php else: ?>
		<div class="content__area-noresults">
			<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
		</div>
<?php
	endif;
	minwp_paging_nav();
	get_footer();
?>


