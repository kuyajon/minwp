<?php
	get_header();
	while (have_posts()) : the_post(); ?>
		<section class="post" id="post-<?php the_ID(); ?>">
			<header class="post-header">
				<h3 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				<p class="post-meta">
					<?php minwp_posted_on(); ?>
					<?php minwp_entry_meta(); ?>
				</p>
			</header>
			<div class="post-description">
				<?php the_content(); ?>
			</div>
			<div class="post-navigation">
				<h3 class="content-subhead">Post navigation</h3>
				<div class="post__nav--previous">
					<?php previous_post_link( 'Previous Post: %link' ); ?>
				</div>
				<div class="post__nav--next">
					<?php next_post_link( ' Next Post: %link' ); ?>
				</div>
				<div style="clear: both"></div>
			</div>
		</section>
	<?php // If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) : comments_template();
					//endif;
	endwhile; ?>
<?php get_footer(); ?>
