<?

define('TYPEKIT_CODE','XXXXX');
define('TEMPLATE_DIR_URI',get_template_directory_uri());//'https://seed2017.thedesigngrouponline.com/wp-content/themes/_tk-master');
define('CHILD_DIR_URI',get_stylesheet_directory_uri());//'https://seed2017.thedesigngrouponline.com/wp-content/themes/child');

if(get_template_directory_uri() != TEMPLATE_DIR_URI){
	echo '<strong>Error</strong>';
}

if(get_stylesheet_directory_uri() != CHILD_DIR_URI){
	echo '<strong>Error</strong>';
}

?>