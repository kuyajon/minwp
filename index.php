<?php get_header(); ?>
<h2 class="content-subhead">Recent Posts</h2>
<?php if (have_posts()) : while (have_posts()) : the_post();
	get_template_part( 'content' );
endwhile; endif; ?>
<?php
	minwp_paging_nav();
	get_footer();
?>
