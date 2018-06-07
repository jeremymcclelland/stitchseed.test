<?
class flex_content_builder{
	
	private $main_page_id = '';
	private $content = false;
	private $flex_content_data = false;
	private $flex_content_html = false;
	
	function __construct($id){
		if($id){
			$this->main_page_id = $id;
		} else {
			die('FATAL ERROR!');	
		}
		$this->flex_content_data = get_field('flexible_content_sections',$this->main_page_id);
		$this->build_flex_content();
	}
	
	public function get_section_content_html(){
		return $this->flex_content_html;
	}
	
	private function build_flex_content(){
		$html = '';	
		if($this->flex_content_data){
			foreach($this->flex_content_data as $section){

				$section_layout = $section['acf_fc_layout'];
				
				
				
				switch($section_layout){
					
					case 'flexible_content_section_general_content':
						$html .= $this->build_section_general_content($section);
						break;
						
					case 'flexible_content_section_rabbit_grid':
						$html .= $this->build_section_rabbit_grid($section);
						break;
					
					case 'flexible_content_section_cpt_feed':
						$html .= $this->build_section_cpt_feed($section);
						break;
					case 'flexible_content_section_cpt_feed_list':
						$html .= $this->build_section_cpt_feed_list($section);
						break;		
					
					case 'flexible_content_section_full_width_rabbit':
						$html .= $this->build_section_full_width_rabbit($section);
						break;	
					
					case 'flexible_content_section_content_banner':
						$html .= $this->build_section_content_banner($section);
						break;	

				}
			}
			
			$this->flex_content_html = $html;
		}
	}
	



	
	//BUILD General content///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	private function build_section_general_content($data){
		$html = '';
		if($data){

			$title = $data['flexible_content_section_general_content_title'];
			
			if($title){
				$title_content = '<div class="col-md-12"><h2 class="general-title text-center">' . $title . '</h2><hr class="general-hr"></div>';
			}
			
			$background_color =  $data['flexible_content_section_general_content_background_color'];
			$padding_top =  $data['flexible_content_section_general_content_padding_top'];
			$padding_bottom =  $data['flexible_content_section_general_content_padding_bottom'];
			
			$background_style_html = 'style="background-color: ' . $background_color . '; padding-top: ' . $padding_top . 'px; padding-bottom: ' . $padding_bottom . 'px"';
			
			$content = $data['flexible_content_section_general_content_content'];
			$link_type = $data['flexible_content_section_general_content_link_type'];
			$internal = $data['flexible_content_section_general_content_internal_link'];
			$external = $data['flexible_content_section_general_content_external_link'];
			$file = $data['flexible_content_section_general_content_file_link'];
			$link_text = $data['flexible_content_section_general_content_link_text'];
			
			
			
			$flex_link = '';
			$target = '';
			
			if($link_type == 'internal'){
				$flex_link = $internal;
			
			} elseif($link_type == 'external'){
				$flex_link = $external;
				$target = 'target="_blank"';
			
			} elseif($link_type == 'file'){
				$flex_link = $file;
				$target = 'target="_blank"';
			}
			
			if($link_type !== 'none'){
				$link_content = '<div class="col-md-12 text-center"><a href="' . $flex_link . '" ' . $target . ' class="btn btn-default">' . $link_text . '</a></div>';
			}
	
			if($content){
				
				$html .= '
				
				<div class="general-flex-content-wrapper" ' . $background_style_html . '>
					<div class="container">
						<div class="row">'
						. $title_content . '
							<div class="col-md-12">
								
							<div class="inner-content-wrapper">' . $content . '</div>
				
							</div>
							
							' . $link_content . '
						
						</div>
					</div>
				</div>
				
				
				
				';
				
			}
								
			return $html;
		}
	}
	
	//END END END General Content///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	//BUILD Rabbit Grid///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	private function build_section_rabbit_grid($data){
		$html = '';
		if($data){
			
			$section_title = $data['flexible_content_section_rabbit_grid_section_title'];
			$section_blurb = $data['flexible_content_section_rabbit_grid_section_blurb'];

			$columns = $data['flexible_content_section_rabbit_grid_columns'];
			$grid_type = $data['flexible_content_section_rabbit_grid_type'];
			
			
			$html .= '
			
			<div class="rabbit-grid-wrapper">
			
			<div class="container">
				<div class="row">
			
			
			
			';
			
			if($section_title || $section_blurb) {
				$html .= '<div class="col-md-12 text-center">';
			
			
				if($section_title){
					$html .= '<h2>' . $section_title . '</h2><hr>';
				}
				
				if($section_blurb){
					$html .= '<p>' . $section_blurb . '</p>';
				}
				$html .= '</div>';

			}
			
			if($grid_type == 'relational'){
				
				$relational_rabbits = $data['flexible_content_section_rabbit_grid_relational'];
				
				foreach($relational_rabbits as $relational_rabbit){
					
					setup_postdata($relational_rabbit);
					
					$image = get_the_post_thumbnail_url($relational_rabbit);
					
					if(!$image){
						$image = get_stylesheet_directory_uri() . '/assets/media/default.png';
					}
					
					
					$title = get_the_title($relational_rabbit);
					
					$excerpt = excerpt_custom(20, $relational_rabbit);
										
					$link = get_the_permalink($relational_rabbit);
					
					
					$html .= '
					
						<div class="' . $columns . '">
							<div class="well">
								<div class="background-image" style="background-image: url(\'' . $image . '\'); background-position: center center; background-size: cover;">
									<img src="' . $image . '" class="hidden-sm hidden-md hidden-lg" alt="' . $title . '"/>
								</div>
									
								<div class="match-height">
									<h3>' . $title . '</h3>
									<p>' . $excerpt . '</p>
								</div>
								<a class="btn btn-default btn-block" href="' . $link . '">View More</a>
							
							</div>
							
							
						
						</div>
					
					
					';
					
					
				}
				
				wp_reset_query();
				
			} else {
				
				
				$freeform_rabbits = $data['flexible_content_section_rabbit_grid_freeform'];
				
				
				foreach($freeform_rabbits as $freeform_rabbit){
					
					
					$image = $freeform_rabbit['flexible_content_section_rabbit_grid_freeform_rabbit_image'];
					$title = $freeform_rabbit['flexible_content_section_rabbit_grid_freeform_rabbit_title'];
					$excerpt = $freeform_rabbit['flexible_content_section_rabbit_grid_freeform_rabbit_excerpt'];
					$link_type = $freeform_rabbit['flexible_content_section_rabbit_grid_freeform_rabbit_link_type'];
					$internal = $freeform_rabbit['flexible_content_section_rabbit_grid_freeform_rabbit_internal_link'];
					$external = $freeform_rabbit['flexible_content_section_rabbit_grid_freeform_rabbit_external_link'];
					$file = $freeform_rabbit['flexible_content_section_rabbit_grid_freeform_rabbit_file_link'];
					$link_text = $freeform_rabbit['flexible_content_section_rabbit_grid_freeform_rabbit_link_text'];
					
					
					$flex_link = '';
					$target = '';
					
					if($link_type == 'internal'){
						$flex_link = $internal;
					
					} elseif($link_type == 'external'){
						$flex_link = $external;
						$target = 'target="_blank"';
					
					} elseif($link_type == 'file'){
						$flex_link = $file;
						$target = 'target="_blank"';
					}
					
					if($link_type !== 'none'){
						$link_content = '<a href="' . $flex_link . '" ' . $target . ' class="btn btn-default btn-block">' . $link_text . '</a>';
					}else{
						$link_content = '';
					}

					
					
					
					$html .= '
					
						<div class="' . $columns . '">
							<div class="well">
								<div class="background-image" style="background-image: url(\'' . $image . '\'); background-position: center center; background-size: cover;">
									<img src="' . $image . '" class="hidden-sm hidden-md hidden-lg" alt="' . $title . '"/>
								</div>
									
								<div class="match-height">
									<h3>' . $title . '</h3>
									<p>' . $excerpt . '</p>
								</div>
								' . $link_content . '
							
							</div>
							
							
						
						</div>
					
					
					';
					
					
				}
				
				
			}		
			
			
			$html .= '
			
			
				</div>
			</div>
			</div>
			
			
			';
			
			


			return $html;
		}
	}
	
	//END END END Rabbit Grid///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//BUILD CPT Feed Carousel///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	private function build_section_cpt_feed($data){
		$html = '';
		if($data){
			
			
			$slide_columns = $data['flexible_content_section_cpt_feed_items_per_slide'];
			$background_color = $data['flexible_content_section_cpt_feed_background_color'];
			$color = 'style="background-color: ' . $background_color . '"';
			
			$section_title = $data['flexible_content_section_cpt_feed_feed_title'];
			$section_blurb = $data['flexible_content_section_cpt_feed_feed_content'];
			
			$posttype_slug = $data['flexible_content_section_cpt_feed_cpt_selection'];
			$post_count = $data['flexible_content_section_cpt_feed_show_amount'];
			
			$link_type = $data['flexible_content_section_cpt_feed_view_all_link'];
			$internal = $data['flexible_content_section_cpt_feed_internal_link'];
			$link_text = $data['flexible_content_section_cpt_feed_link_text'];
			
			$link_html = '';
			if($link_type == 'internal'){
				$link_html = '<div class="col-md-12 text-center"><a href="' . $internal . '" class="btn btn-default">' . $link_text . '</a></div>';
			} 
						
			
			

			
			$html .= '
			
			<div class="cpt-feed-carousel-wrapper" ' . $color . '>
			
			<div class="container">
				<div class="row">
			
			
			
			';
			
			if($section_title || $section_blurb) {
				$html .= '<div class="col-md-12 text-center">';
			
			
				if($section_title){
					$html .= '<h2>' . $section_title . '</h2><hr>';
				}
				
				if($section_blurb){
					$html .= '<p>' . $section_blurb . '</p>';
				}
				$html .= '</div>
				
				</div>
				
				<div class="row">
				
				
				
				';

			}
			
			
			
			
			$args = array(
			    'post_type' => $posttype_slug,
			    'posts_per_page' => $post_count,
			);
			
			// The Query
			$the_query = new WP_Query( $args );
			
			// The Loop
			if ( $the_query->have_posts() ) {
				
				$html .= '
				
				<div class="col-md-12">
				<div class="owl-carousel owl-carousel-' . $slide_columns . ' owl-theme">
				
				';
				
				
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					
					
					
					$image = get_the_post_thumbnail_url();
					
					if(!$image){
						$image = get_stylesheet_directory_uri() . '/assets/media/default.png';
					}
					
					
					$title = get_the_title();
					
					$excerpt = excerpt(20);
										
					$link = get_the_permalink();
					
					
					$html .= '
					
						<article class="well item">
							<div class="inner-item">
								<div class="background-image" style="background-image: url(\'' . $image . '\'); background-position: center center; background-size: cover;">
									<img src="' . $image . '" class="hidden-sm hidden-md hidden-lg" alt="' . $title . '"/>
								</div>
									
								<h3>' . $title . '</h3>
								<p>' . $excerpt . '</p>
								
							</div>
							<div class="inner-item">
								<a class="btn btn-default btn-block" href="' . $link . '">View More</a>
							</div>
								
						</article>
						
						
						
						
			
					
					
					';
					
					
					
				}
				
				

				/* Restore original Post Data */
				wp_reset_postdata();
				
			$html .= '</div></div>'; //ends owl-carousel	
				
			} else {
				// no posts found
			}
			
			
			
						
			
			$html .= $link_html . '
			
			
				</div>
			</div>
			</div>
			
			
			';
			
			


			return $html;
		}
	}
	
	//END END END CPT Feed Carousel///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//BUILD CPT Feed List///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	private function build_section_cpt_feed_list($data){
		$html = '';
		if($data){
			
			
			
			$layout = $data['flexible_content_section_cpt_feed_list_feed_layout'];
			$columns = $data['flexible_content_section_cpt_feed_list_feed_grid_columns'];
			
			
			
			$background_color = $data['flexible_content_section_cpt_feed_list_background_color'];
			$color = 'style="background-color: ' . $background_color . '"';
			
			$section_title = $data['flexible_content_section_cpt_feed_list_feed_title'];
			$section_blurb = $data['flexible_content_section_cpt_feed_list_feed_content'];
			
			$posttype_slug = $data['flexible_content_section_cpt_feed_list_cpt_selection'];
			$post_count = $data['flexible_content_section_cpt_feed_list_show_amount'];
			
			$link_type = $data['flexible_content_section_cpt_feed_list_view_all_link'];
			$internal = $data['flexible_content_section_cpt_feed_list_internal_link'];
			$link_text = $data['flexible_content_section_cpt_feed_list_link_text'];
			
			$link_html = '';
			if($link_type == 'internal'){
				$link_html = '<div class="col-md-12 text-center"><a href="' . $internal . '" class="btn btn-default">' . $link_text . '</a></div>';
			} 
						
			
			

			
			$html .= '
			
			<div class="cpt-feed-list-wrapper" ' . $color . '>
			
			<div class="container">
				<div class="row">
			
			
			
			';
			
			if($section_title || $section_blurb) {
				$html .= '<div class="col-md-12 text-center">';
			
			
				if($section_title){
					$html .= '<h2>' . $section_title . '</h2><hr>';
				}
				
				if($section_blurb){
					$html .= '<p>' . $section_blurb . '</p>';
				}
				$html .= '</div>
				
				</div>
				
				<div class="row">
				
				
				
				';

			}
			
			
			
			
			$args = array(
			    'post_type' => $posttype_slug,
			    'posts_per_page' => $post_count,
			);
			
			// The Query
			$the_query = new WP_Query( $args );
			
			// The Loop
			if ( $the_query->have_posts() ) {
				
				
				if($layout == 'unstructured'){
					
					$html .= '
				
					<div class="col-md-12">
						<ul class="list-unstyled">
					
					';
					
				}
				
				
				
				
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					
					
					
					$image = get_the_post_thumbnail_url();
					
					if(!$image){
						$image = get_stylesheet_directory_uri() . '/assets/media/default.png';
					}
					
					
					$title = get_the_title();
					
					$excerpt = excerpt(20);
										
					$link = get_the_permalink();
					
					
					
					if($layout == 'grid'){
						
						$html .= '<div class="' . $columns . '">';
						
						$match_height = 'match-height';
						
					} else {
						
						$html .= '<li>';
						
						$match_height = '';
					}
					
					
					$html .= '
					
						<article class="well item">
							
								<div class="background-image" style="background-image: url(\'' . $image . '\'); background-position: center center; background-size: cover;">
									<img src="' . $image . '" class="hidden-sm hidden-md hidden-lg" alt="' . $title . '"/>
								</div>
									
									<div class="content ' . $match_height . '">
										<h3>' . $title . '</h3>
										<p>' . $excerpt . '</p>
									</div>
									<a class="btn btn-default btn-block" href="' . $link . '">View More</a>
						</article>
					
					';
					
					
					if($layout == 'grid'){
						
						$html .= '</div>';
						
					} else {
						
						$html .= '</li>';
						
					}
					
					
					
					
				}
				
				

				/* Restore original Post Data */
				wp_reset_postdata();
				
				if($layout == 'unstructured'){
					
					$html .= '
						</ul>
						</div>
					
					';
					
				}
				
			} else {
				// no posts found
			}
			
			
			
						
			
			$html .= $link_html . '
			
			
				</div>
			</div>
			</div>
			
			
			';
			
			


			return $html;
		}
	}
	
	//END END END CPT Feed Carousel///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//BUILD Full Width Rabbit///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	private function build_section_full_width_rabbit($data){
		$html = '';
		if($data){
			
			
			$layout = $data['flexible_content_section_full_width_rabbit_layout'];
			$theme = $data['flexible_content_section_full_width_rabbit_theme'];
			$image = $data['flexible_content_section_full_width_rabbit_image'];
			$image_url = $image['url'];
			$position = $data['flexible_content_section_full_width_rabbit_image_position'];
			$title = $data['flexible_content_section_full_width_rabbit_title'];
			$subtitle = $data['flexible_content_section_full_width_rabbit_sub_title'];
			if($subtitle){
				$subtitle_content = '<h3>' . $subtitle . '</h3>';
			}else{
				$subtitle_content = '';
			}
			$content = $data['flexible_content_section_full_width_rabbit_content'];
			$link_type = $data['flexible_content_section_full_width_rabbit_link_type'];
			$internal = $data['flexible_content_section_full_width_rabbit_internal_link'];
			$external = $data['flexible_content_section_full_width_rabbit_external_link'];
			$file = $data['flexible_content_section_full_width_rabbit_file_link'];
			$link_text = $data['flexible_content_section_full_width_rabbit_link_text'];
			
			
			$flex_link = '';
			$target = '';
			
			
			if($link_type == 'internal'){
				$flex_link = $internal;
			
			} elseif($link_type == 'external'){
				$flex_link = $external;
				$target = 'target="_blank"';
			
			} elseif($link_type == 'file'){
				$flex_link = $file;
				$target = 'target="_blank"';
			}
			
			if($link_type !== 'none'){
				$link_content = '<a href="' . $flex_link . '" ' . $target . ' class="btn btn-block btn-default">' . $link_text . '</a>';
			}

			
			$media_html .= '
			
			
				<div class="item rabbit-image" style="background-image: url(\''.$image_url . '\'); background-position: center ' . $image_position . '; background-size: cover;">
					<img src="' . $image_url . '" alt="' . $title . '" class="img-responsive hidden-sm hidden-md hidden-lg">
				</div> 
			
			
			';
			
			
			
			$html .= '
		
		
			<div class="full-width-flex-rabbit-wrapper ' . $theme . '">
			
			
				<div class="flex-wrapper ' . $layout . '">
				
				
					' . $media_html . '
				
					<div class="item rabbit-content">
						<div class="text-wrap">
						<h2>' . $title . '</h2>
						' . $subtitle_content . '
						' . $content . '
						
						' . $link_content . '
						
						</div>
						
						
						
					</div> 
				
				
				</div>
			
			
			</div>
			
			
	
			
			';

			
			
			
			
			
			
			
			

								
			return $html;
		}
	}
	
	//END END END Full Width Rabbit///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	//BUILD Content Banner///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	private function build_section_content_banner($data){
		$html = '';
		if($data){
			
			
			$banner_layout = $data['flexible_content_section_content_banner_width'];
			$content_wrap = $data['flexible_content_section_content_content_container_width'];
			
			
			$image = $data['flexible_content_section_content_banner_image'];
			$image_alignment = $data['flexible_content_section_content_banner_image_alignment'];
			$content_layout = $data['flexible_content_section_content_banner_content_layout'];
			
			if($banner_layout == 'full'){
				$full = 'style="background-image: url(\'' . $image["url"] . '\'); background-position: center ' . $image_alignment . '; background-size: cover;"';
			}else {
				$contained = 'style="background-image: url(\'' . $image["url"] . '\'); background-position: center ' . $image_alignment . '; background-size: cover;"';
			}
			
			
			
			//OVERLAY
			
			$add_overlay = $data['flexible_content_section_content_banner_add_overlay'];
			$overlay_color = $data['flexible_content_section_content_banner_overlay_color'];
			$overlay_opacity = $data['flexible_content_section_content_banner_overlay_opacity'];
			
			
			$background = '';
			if($add_overlay){
				$rgba = hex2rgba($overlay_color, $overlay_opacity);
				
				$background = 'style="background-color: ' . $rgba . ';"';
			}

			
			
			
			//Gradient
			$add_gradient = $data['flexible_content_section_content_content_container_add_gradient'];
			$gradient_direction = $data['flexible_content_section_content_content_container_gradient_direction'];
			
			if($add_gradient){
				
				switch ($gradient_direction) {
				    case 'lr':
				        $background = 'style="background: linear-gradient(to right, '. $rgba . ' 30%,rgba(0,0,0,0) 100%);"';
				        break;
				    case 'rl':
				        $background = 'style="background: linear-gradient(to right, rgba(0,0,0,0) 0%, '. $rgba . ' 70%);"';
				        break;
				    case 'tb':
				        $background = 'style="background: linear-gradient(to bottom,  '. $rgba . ' 30%,rgba(0,0,0,0) 100%);"';
				        break;
				    case 'bt':
				         $background = 'style="background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, '. $rgba . ' 70%);"';
				        break;
				}
				
				
			}
			
			$add_multiply = $data['flexible_content_section_content_banner_add_multiply_effect'];
			$mult_color = $data['flexible_content_section_content_banner_multiply_color'];
			
			
			$multiply = '';
			$multiply_color = '';
			
			if($add_multiply){
				
				$multiply = 'background-blend-mode: luminosity;';
				$multiply_color = $mult_color;
				
			}
			
			
			
			
			$alignment = $data['flexible_content_section_content_banner_content_alignment'];
			
			
			$title = $data['flexible_content_section_content_banner_title'];
			
			if($title){
				$title = '<h2>' . $title . '</h2>';
			}
			$subtitle = $data['flexible_content_section_content_banner_sub_title'];
			if($subtitle){
				$subtitle = '<h3>' . $subtitle . '</h3>';
			}
			
			$content = $data['flexible_content_section_content_banner_content'];
			
			$link_type = $data['flexible_content_section_content_banner_link_type'];
			$internal = $data['flexible_content_section_content_banner_internal_link'];
			$external = $data['flexible_content_section_content_banner_external_link'];
			$file = $data['flexible_content_section_content_banner_file_link'];
			$link_text = $data['flexible_content_section_content_banner_link_text'];
			
			
			$flex_link = '';
			$target = '';
			
			
			if($link_type == 'internal'){
				$flex_link = $internal;
			
			} elseif($link_type == 'external'){
				$flex_link = $external;
				$target = 'target="_blank"';
			
			} elseif($link_type == 'file'){
				$flex_link = $file;
				$target = 'target="_blank"';
			}
			
			if($link_type !== 'none'){
				$link_content = '<a href="' . $flex_link . '" ' . $target . ' class="btn btn-block btn-default">' . $link_text . '</a>';
			}
			
			
			$margins = $data['flexible_content_section_content_banner_contained_margins'];
			
			$margins_style = '';
			if($margins){
				$margins_style = 'style="padding: ' . $margins . 'px 0;"';
			}
			
			$top = $data['flexible_content_section_content_banner_link_textcontent_margin_top'];
			$bottom = $data['flexible_content_section_content_banner_link_textcontent_margin_bottom'];
			$left = $data['flexible_content_section_content_banner_link_textcontent_margin_left'];
			$right = $data['flexible_content_section_content_banner_link_textcontent_margin_right'];
			
			$content_margins = 'margin: ' . $top . '% ' . $right . '% ' . $bottom . '% ' . $left . '%;';
			
			$add_content_color = $data['flexible_content_section_content_banner_add_content_background_color'];
			$content_bg_color = $data['flexible_content_section_content_banner_content_background_color'];
			$content_bg_opacity = $data['content_background_color_opacity'];
			
			if($add_content_color){
				$content_rgba = hex2rgba($content_bg_color, $content_bg_opacity);
				$content_background = 'background-color: ' . $content_rgba . ';';
			}
			
			$content_inline_style = 'style="' . $content_margins . ' ' . $content_background . '";';
						
				
				$html .= '
				
				<div class="content-banner-wrapper" ' . $margins_style . '>
				
					<div class="outer-container ' . $banner_layout . '" style="background: url(\'' . $image["url"] . '\') center ' . $image_alignment . '/ cover ' . $multiply_color . '; ' . $multiply . '">
					
						<img class="img-responsive hidden-sm hidden-md hidden-lg" src="' . $image["url"] . '"/>
						
						<div class="overlay"  ' . $background .'>
					
						<div class="' . $content_wrap . '">
							<div class="row">
								<div class="'. $content_layout . ' content-column ' . $alignment . '">
									<div class="mobile-content-wrapper" style="background-color: ' . $content_bg_color . ' ;">
									<div class="content-wrapper" ' . $content_inline_style . '>
										' . $title . '
										' . $subtitle . '
										' . $content . '
										
										' . $link_content . '
									</div>
									</div>
								</div>
							
							</div>
						
						</div>
						
						</div>
						
					</div>
					
					
				</div>
				
				';
				
								
			return $html;
		}
	}
	
	//END END END Content Banner///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





}









?>

