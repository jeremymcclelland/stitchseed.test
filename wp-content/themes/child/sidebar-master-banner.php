<?php

$use_master_banner = get_field('use_master_banner');
$master_banner_image = get_field('master_banner_image');
$master_banner_title_override = get_field('master_banner_title_override');

$alignment = get_field('master_banner_image_alignment');

if(!$alignment) {
	$alignment == 'center';
}

if(!$master_banner_title_override){
	$master_banner_title_override = get_the_title();
}


if($use_master_banner){
	
	$banner_html = '';
	
	$banner_html .= '
	<div class="strapped">
		<div class="master-header-wrapper" style="background-image: url(\'' . $master_banner_image["url"] . '\'); background-position: center ' . $alignment . '; background-size: cover;">
			<div class="title-wrapper">
				<div class="container">
					<h1>' . $master_banner_title_override . '</h1>
				</div>
			</div>
			<img src="' . $master_banner_image["url"] . '" class="img-responsive hidden-sm hidden-md hidden-lg" alt="' . $master_banner_title_override . '">
			
		</div>
	</div>	
	
	';
	
	
	echo $banner_html;
}
	
	
?>


