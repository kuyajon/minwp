<section class="post" id="post-<?php the_ID(); ?>">
	<header class="post-header">
		<h3 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<p class="post-meta">
			<?php minwp_posted_on(); ?>
			<?php minwp_entry_meta(); ?>
		</p>
	</header>
	<div class="post-description">
		<p>
			<?php the_excerpt(); ?>
		    <a class="more-link" href="<?php the_permalink() ?>">Read More &raquo;</a>
		</p>
	</div>
</section>
