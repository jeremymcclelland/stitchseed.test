<?

add_image_size('page-width',2000);

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_and_styles', 999 );
function enqueue_scripts_and_styles() {
	wp_enqueue_style( 'theme-parent-style', TEMPLATE_DIR_URI . '/style.css' );

	
	
	//enqueue_media_boxes();
	//enqueue_venobox();
	
	wp_enqueue_script( 'match-height', CHILD_DIR_URI . '/assets/plugins/match-height/jquery.matchHeight.js',array('jquery'));

	enqueue_owl();
	
	wp_enqueue_style( 'child-style', CHILD_DIR_URI . '/assets/theme.less', array( 'theme-parent-style' ));
	
	wp_enqueue_script( 'my-script', CHILD_DIR_URI . '/assets/script/script.js',array('jquery'));
	
}

function elp_typekit_inline() {
if ( wp_script_is( 'site-typekit', 'done' ) ) { ?>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php }
}
add_action( 'wp_head', 'elp_typekit_inline' );



function enqueue_owl(){
	wp_enqueue_script( 'owl-carousel', CHILD_DIR_URI . '/assets/plugins/owl-carousel/owl.carousel.min.js',array('jquery'));
	wp_enqueue_style( 'owl-carousel', CHILD_DIR_URI . '/assets/plugins/owl-carousel/owl.carousel.min.css', array( 'theme-parent-style' ), wp_get_theme()->get('Version0') );
	wp_enqueue_style( 'owl-theme', CHILD_DIR_URI . '/assets/plugins/owl-carousel/owl.theme.default.min.css', array( 'theme-parent-style' ), wp_get_theme()->get('Version') );

}

function enqueue_venobox(){
	wp_enqueue_style( 'venobox', CHILD_DIR_URI . '/assets/plugins/venobox/venobox.css', array( 'theme-parent-style' ));
	wp_enqueue_script( 'venobox', CHILD_DIR_URI . '/assets/plugins/venobox/venobox.min.js',array('jquery') );

}

function enqueue_light_gallery(){
	wp_enqueue_style( 'light-gallery', CHILD_DIR_URI . '/assets/plugins/lightgallery/lightgallery.min.css', array( 'theme-parent-style' ));
	wp_enqueue_script( 'light-gallery', CHILD_DIR_URI . '/assets/plugins/lightgallery/lightgallery.min.js',array('jquery'));
	wp_enqueue_script( 'light-gallery-thumbnail', CHILD_DIR_URI . '/assets/plugins/lightgallery/lg-thumbnail.min.js',array('jquery'));
}


function enqueue_media_boxes(){
	wp_enqueue_style( 'mediaboxes', CHILD_DIR_URI . '/assets/plugins/mediaboxes/mediaBoxes.css', array( 'theme-parent-style' ));
	wp_enqueue_script( 'mediaboxes', CHILD_DIR_URI . '/assets/plugins/mediaboxes/jquery.mediaBoxes.js',array('jquery') );
	wp_enqueue_script( 'mediaBoxes-dropdown', CHILD_DIR_URI . '/assets/plugins/mediaboxes/jquery.mediaBoxes.dropdown.js',array('jquery') );

	wp_enqueue_style( 'magnific-popup', CHILD_DIR_URI . '/assets/plugins/magnific-popup/magnific-popup.css', array( 'theme-parent-style' ));
	wp_enqueue_script( 'magnific-popup', CHILD_DIR_URI . '/assets/plugins/magnific-popup/jquery.magnific-popup.min.js',array('jquery') );
	
	wp_enqueue_style( 'fancybox', CHILD_DIR_URI . '/assets/plugins/fancybox/jquery.fancybox.min.css', array( 'theme-parent-style' ));
	wp_enqueue_script( 'fancybox', CHILD_DIR_URI . '/assets/plugins/fancybox/jquery.fancybox.min.js',array('jquery') );
	
	wp_enqueue_script( 'isotope', CHILD_DIR_URI . '/assets/plugins/isotope/jquery.isotope.min.js',array('jquery') );
	
	wp_enqueue_script( 'images-loaded', CHILD_DIR_URI . '/assets/plugins/images-loaded/jquery.imagesLoaded.min.js',array('jquery') );

	wp_enqueue_script( 'transit', CHILD_DIR_URI . '/assets/plugins/transit/jquery.transit.min.js',array('jquery') );

	wp_enqueue_script( 'jquery-easing', CHILD_DIR_URI . '/assets/plugins/jquery-easing/jquery.easing.js',array('jquery') );
	
	wp_enqueue_script( 'waypoints', CHILD_DIR_URI . '/assets/plugins/waypoints/waypoints.min.js',array('jquery') );
	
	wp_enqueue_script( 'modernizr', CHILD_DIR_URI . '/assets/plugins/modernizr/modernizr.custom.min.js',array('jquery') );	
	
}


remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

remove_action( 'wp_head', 'rsd_link' );


// First we create a function
function list_terms_custom_taxonomy( $atts ) {

//CLEAN!!!!!!!!///////////////////////

// Inside the function we extract custom taxonomy parameter of our shortcode

	extract( shortcode_atts( array(
		'name' => '',
		'custom_taxonomy' => '',
	), $atts ) );


// arguments for function wp_list_categories
$args = array( 
taxonomy => $custom_taxonomy,
title_li => $name,
'show_count'         => 1,
);

// We wrap it in unordered list 
echo '<ul>'; 
echo wp_list_categories($args);
echo '</ul>';
}

// Add a shortcode that executes our function
add_shortcode( 'ct_terms', 'list_terms_custom_taxonomy' );

//Allow Text widgets to execute shortcodes

add_filter('widget_text', 'do_shortcode');


// TypeKit/////////////////////////////////////////////////////
wp_enqueue_script( 'site-typekit', '//use.typekit.net/'.TYPEKIT_CODE.'.js');

function add_typekit_inline() {
	if ( wp_script_is( 'opportunitystartsathome-typekit', 'done' ) ) { ?>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<?php }
}

add_action( 'wp_head', 'add_typekit_inline' );



add_action( 'after_setup_theme', 'custom_menu_registration' );

function custom_menu_registration() {  
	register_nav_menus(array(
	  'main' => 'Main',
	  'utility' => 'Utility',
	  'footer-one' => 'Footer One',
	  'footer-two' => 'Footer Two',
	  'social' => 'Social',
	));
}


function custom_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_filter('upload_mimes', 'custom_mime_types');


function enqueue_parent_style() {
  //  wp_enqueue_style( 'parent-theme-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_parent_style', 999 );


//Excerpt Custom Length///////////////////////////////////////////

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

function excerpt_custom($limit, $id) {
      $excerpt = explode(' ', get_the_excerpt($id), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}


function content($limit) {
    $content = explode(' ', get_the_content(), $limit);

    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }

    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);

    return $content;
}

function content_custom($limit, $id) {
    $content = explode(' ', get_the_content($id), $limit);

    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }

    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);

    return $content;
}



function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}



//Register Custom Sidebars

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'SP Sidebar', '_tk' ),
        'id' => 'sp-sidebar',
        'description' => __( 'Sidebar for specialty products', '_tk' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
    ) );
    
    
    register_sidebar( array(
        'name' => __( 'Resources Sidebar', '_tk' ),
        'id' => 'resources-sidebar',
        'description' => __( 'Sidebar for resources', '_tk' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
    ) );
}



?>