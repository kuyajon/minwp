<?php
	get_header();
	the_archive_title( '<h2>', '</h2>' );
	the_archive_description( '<div>', '</div>' );
?>
<?php if (have_posts()) : while (have_posts()) : the_post();
	get_template_part( 'content' );
endwhile; endif; ?>
<?php
	minwp_paging_nav();
	get_footer();
?>
