<?php
add_action("wp_enqueue_scripts", "acii_enqueue_scripts");
function acii_enqueue_scripts(){
	wp_enqueue_style("alfred_style", get_template_directory_uri() . "/assets/styles/general.css");
	wp_enqueue_script("general_js", get_template_directory_uri() . "/assets/js/general.js");
}

add_filter( 'show_admin_bar', '__return_false' );


// returns an array of image urls and thier classes
function get_all_images_from_post(){
	global $post;

	$regex = '/<img.+?(?:class.+?[\'"](.+?)[\'"])?.+?src=[\'"]([^\'"]+)[\'"].*?>/i';
	$output = preg_match_all($regex, $post->post_content, $matches);
	$images = [];

	if($output > 0){
		for($i = 0; $i < sizeof($matches[0]); $i++){
			$images[] = [
				"url" => $matches[2][$i],
				"class" => $matches[1][$i]
			];
		}

		return $images;
	}
	return [];
}

function get_first_img_from_post() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
	$first_img = $matches[1][0];

	if(empty($first_img)) {
		$first_img = "";
	}
	return $first_img;
}
