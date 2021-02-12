					</div>
				</div>
				<div class="col c4">
					<div id="pg-side">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-widget-container">
			<div class="container">
				<div class="row">
				<div class="col c4"><?php dynamic_sidebar( 'bottom-left' ); ?></div>
				<div class="col c4"><?php dynamic_sidebar( 'bottom-middle' ); ?></div>
				<div class="col c4"><?php dynamic_sidebar( 'bottom-right' ); ?></div>
				</div>
			</div>
		</div>
		<div id="pg-footer">
			<p>
				Copyright &copy; <?php echo date("Y"); ?> <?php echo $_SERVER['SERVER_NAME']; ?> | All rights reserved. |
				<?php echo strip_tags( wp_nav_menu( array( 'container' => false, 'echo' => false, 'items_wrap' => '%3$s', 'depth' => 0, 'theme_location' => 'footer' ) ), '<a>' ); ?>
			</p>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
