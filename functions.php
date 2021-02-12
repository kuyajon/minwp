<?php
// Setup theme
if ( ! function_exists( 'minwp_setup' ) ) :
function minwp_setup() {
	register_nav_menus( array(
		'primary' 	=> esc_html__( 'Main Menu', 'minwp' ),
		'footer' => esc_html__( 'Footer Menu', 'minwp' ),
	));
}
endif; //minwp_setup
add_action( 'after_setup_theme', 'minwp_setup' );

// Register sidebars
if ( ! function_exists( 'minwp_widgets_init' ) ) :
function minwp_widgets_init() {
	register_sidebar(
		array(
			'name'		  => __( 'Right Side Widget Area', 'minwp' ),
			'id'			=> 'primary',
			'description'   => __( 'Widgets in right sidebar.', 'minwp' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'		  => __( 'Top Widget Area', 'minwp' ),
			'id'			=> 'header',
			'description'   => __( 'Widgets in top.', 'minwp' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
	register_sidebar(
		array(
			'name'		  => __( 'Bottom Left Widget Area', 'minwp' ),
			'id'			=> 'bottom-left',
			'description'   => __( 'Widgets in bottom left.', 'minwp' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'		  => __( 'Bottom Middle Widget Area', 'minwp' ),
			'id'			=> 'bottom-middle',
			'description'   => __( 'Widgets in bottom middle.', 'minwp' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'		  => __( 'Bottom Right Widget Area', 'minwp' ),
			'id'			=> 'bottom-right',
			'description'   => __( 'Widgets in bottom right.', 'minwp' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
endif; //minwp_widgets_init
add_action( 'widgets_init', 'minwp_widgets_init' );

// Display date info of post
if ( ! function_exists( 'minwp_posted_on' ) ) :
function minwp_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
	$posted_on = sprintf(
		_x( '%s', 'post date', 'minwp' ), $time_string );
	echo $posted_on;
}
endif; //minwp_posted_on

// Display tags and categories
if ( ! function_exists( 'minwp_entry_meta' ) ) :
function minwp_entry_meta() {
	if ( 'post' == get_post_type() ) {
		$categories_list = preg_replace('/<a /', '<a class="post-category post-category-color-1"', get_the_category_list( ' ' ));
		if ( $categories_list ) {
			printf( '<span class="links__cat">%1$s %2$s</span>',
				_x( '&nbsp;&nbsp;Categories: ', 'Used before category names.', 'minwp' ),
				$categories_list
			);
		}
		$tags_list = preg_replace('/<a /', '<a class="post-category post-category-color-2"', get_the_tag_list( ' ' ));
		if ( $tags_list ) {
			printf( '&nbsp;&nbsp;<span class="links__tag">%1$s %2$s</span>',
				_x( 'Tags:', 'Used before tag names.', 'minwp' ),
				$tags_list
			);
		}
	}
}
endif; //minwp_entry_meta

if ( ! function_exists( 'minwp_excerpt_more' ) ) :
function minwp_excerpt_more( $more ) {
	return '';
}
endif; //minwp_excerpt_more
add_filter('excerpt_more', 'minwp_excerpt_more'); // remove [...]
remove_filter( 'the_excerpt', 'wpautop' ); // remove p container tag

// Navigation links
if ( ! function_exists( 'minwp_paging_nav' ) ) :
function minwp_paging_nav() {
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	$paged		= get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts	= explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	$links = paginate_links( array(
		'base'	 => $pagenum_link,
		'format'   => $format,
		'total'	=> $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 3,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'blm_basic' ),
		'next_text' => __( 'Next &rarr;', 'blm_basic' ),
		'type'	  => 'list',
	) );

	if ( $links ) :
	?>
	<h3 class="content-subhead">Posts navigation</h3>
		<?php echo $links; ?>
	<?php
	endif;
}
endif; //minwp_paging_nav
