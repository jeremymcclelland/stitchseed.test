<?php // Functions file

/* Standard functions (theme support, registering, etc.)
-------------------------------------------------------------------------------------------------------------------------------------- */

// Set shorthand filepath to theme. Now use THEME_DIR instead of get_template_directory_uri()
define('THEME_DIR', get_template_directory_uri());

## Disable Editing in Dashboard
define('DISALLOW_FILE_EDIT', true);

// Remove generator meta tag, hides wp version for security reasons
remove_action('wp_head', 'wp_generator');

// Add Featured Image Support
add_theme_support( 'post-thumbnails' );

// Add Post Format Support
add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );

// Add Advanced Custom Fields Options page to WordPress
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page('Options');
}

// Register Navigations - usage - wp_nav_menu(array('theme_location' => 'main-menu','menu_class' => 'main_menu'));
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
  	register_nav_menus( array(
      	'menu1' => __( 'Main Menu' ) //,
      	// 'menu2' => __( 'Secondary Menu' )
    ) );
}



/* Enqueue Styleshets & Javascripts (all css and js files go here)
-------------------------------------------------------------------------------------------------------------------------------------- */

// Load Stylesheets
add_action( 'wp_enqueue_scripts', 'my_enqueue_style' );
function my_enqueue_style() {

    wp_enqueue_style( 'import', THEME_DIR . '/prod/master-min.css', false );

}

// Load Javascripts
add_action( 'wp_enqueue_scripts', 'my_enqueue_script' );
function my_enqueue_script() {

    // Load a higher version of jquery
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"), false, '2.1.3');

    // Load other javascripts
    wp_enqueue_script( 'main', THEME_DIR . '/prod/master-min.js', array('jquery'), '0.1', false );

}



/* Custom functions for this project
-------------------------------------------------------------------------------------------------------------------------------------- */

/*

// Declare woocommerce support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Excerpt read more output
function new_excerpt_more($more) {
    return '...  <span class="readMore">Read More</span>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Excerpt length
function new_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Posts Count Function, counts number of posts going into loop - usage: $totalPosts = myPostCounter_get_posts_count();
function myPostCounter_get_posts_count() {
    global $wp_query;
    return $wp_query->post_count;
}

// Create seo friendly string, or html ID friendly string - usage: echo seoUrl($myStringVariable);
function seoUrl($string) {
    $string = strtolower($string); // lower case everything
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string); // make alphanumeric (removes all other characters)
    $string = preg_replace("/[\s-]+/", " ", $string); // clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s_]/", "-", $string); // convert whitespaces and underscore to dash
    return $string;
}

// Redirects
add_action( 'template_redirect', 'wpse101952_redirect' );
function wpse101952_redirect() {
    global $post;
    if( is_user_logged_in() && is_page(52) ) {
        $url = get_permalink( get_option('woocommerce_myaccount_page_id') );
        wp_redirect( $url );
        exit();
    }
}

// Add 'current-menu-item' class to parent link in header when on single page of that post type
add_filter( 'nav_menu_css_class', 'custom_active_item_classes', 10, 2 );
function custom_active_item_classes($classes = array(), $menu_item = false) {
    global $post;

    // Get post ID, if nothing found set to NULL
    $id = ( isset( $post->ID ) ? get_the_ID() : NULL );

    // Checking if post ID exist...
    if (isset( $id )){
        $classes[] = ($menu_item->url == get_post_type_archive_link($post->post_type)) ? 'current-menu-item active' : '';
    }

    return $classes;
}

// Console log php events
echo '<script>console.log("alert here");</script>';

// Display contents of array
echo '<pre>',print_r($myArray,1),'</pre>';

*/

?>