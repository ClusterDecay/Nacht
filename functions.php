<?php
/**
 * @package Dag
 */

/**
 * Registers the menus
 */
add_action( 'init', 'my_custom_menu' );
function my_custom_menu() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' )
        )
    );
};

/**
 * Enables the post thumbnails
 */
add_theme_support( 'post-thumbnails' );

/**
 * Enables the post thumbnails
 */
if ( function_exists('register_sidebar') ){
register_sidebar();
}

/**
 * Enables extra post-formats
 */
add_theme_support( 'post-formats', array( 'aside' ) );

/**
 * Shortens titles
 */
function the_titlesmall() { 
	if (strlen($post->post_title) > 10) {
		echo substr(the_title($before = '', $after = '', FALSE), 0, 10) . '...'; } else {
		the_title();
	}
}

/**
 * Wraps iframes with div
 */
function div_wrapper($content) {
    // match any iframes
    $pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
    preg_match_all($pattern, $content, $matches);

    foreach ($matches[0] as $match) {
        // wrap matched iframe with div
        $wrappedframe = '<div class="video">' . $match . '</div>';
        //replace original iframe with new in content
        $content = str_replace($match, $wrappedframe, $content);
    }

    return $content;    
}
add_filter('the_content', 'div_wrapper');

/**
 * Clears the default wordpress gallery style
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Prints a neat <title> tag based on what is being viewed.
 */
function dag_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'dag' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'dag_wp_title', 10, 2 );

/**
 * Infinite Scroll - Courtesy of Paul Irish
 */
function custom_theme_js(){
	wp_register_script( 'infinite_scroll',  get_template_directory_uri() . '/js/jquery.infinitescroll.js', array('jquery'),null,true );
	if( ! is_singular() ) {
		wp_enqueue_script('infinite_scroll');
	}
}
add_action('wp_enqueue_scripts', 'custom_theme_js');

function custom_infinite_scroll_js() {
	if( ! is_singular() ) { ?>
	<script>
	var infinite_scroll = {
		loading: {
			img: "<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif",
			msgText: "<?php _e( '', 'custom' ); ?>",
			finishedMsg: "<?php _e( ';-)', 'custom' ); ?>"
		},
		"nextSelector":"#navigation .previous a",
		"navSelector":"#navigation",
		"itemSelector":"#main .post",
		"contentSelector":"#main"
	};
	jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
	</script>
	<?php
	}
}
add_action( 'wp_footer', 'custom_infinite_scroll_js',100 );

/**
 * Dates "ago" - Courtesy of Binary Moon
 */
function bm_human_time_diff_enhanced( $duration = 1 ) {

	$post_time = get_the_time('U');
	$human_time = '';

	$time_now = date('U');

	// use human time if less that $duration days ago (60 days by default)
	// 60 seconds * 60 minutes * 24 hours * $duration days
	if ( $post_time > $time_now - ( 60 * 60 * 24 * $duration ) ) {
		$human_time = sprintf( __( '%s ago', 'binarymoon'), human_time_diff( $post_time, current_time( 'timestamp' ) ) );
	} else {
		$human_time = get_the_date("d M Y");
	}

	return $human_time;

}