<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link href="<?php echo get_template_directory_uri(); ?>/css/min.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo get_template_directory_uri(); ?>/css/theme.min.css" rel="stylesheet" type="text/css">
		<?php wp_head(); ?>
	</head>
	<body>
		<nav class="nav" tabindex="-1" onclick="this.focus()">
			<div class="container">
				<a class="pagename current" href="/"><?php bloginfo( 'name' ); ?></a>
				<?php echo strip_tags( wp_nav_menu( array( 'container' => false, 'echo' => false, 'items_wrap' => '%3$s', 'depth' => 0, 'theme_location' => 'primary' ) ), '<a>' ); ?>
			</div>
		</nav>
		<button class="btn-close btn btn-sm">×</button>
		<div id="pg-main" class="container">
			<div class="row">
				<div class="col c12">
					<?php dynamic_sidebar( 'header' ); ?>
				</div>
			</div>
			<div class="row">
				<div class="col c8">
					<div id="pg-content">
