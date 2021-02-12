<?php
	get_header();
	while ( have_posts() ) : the_post(); ?>
	<section class="post" id="post-<?php the_ID(); ?>">
		<header class="post-header">
			<h3 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		</header>
		<div class="post-description">
			<?php the_content(); ?>
		</div>
	</section>
<?php endwhile; ?>
<?php get_footer(); ?>
