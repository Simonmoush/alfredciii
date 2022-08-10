<?php

add_action("wp_enqueue_scripts", "acii_enqueue_scripts");

function acii_enqueue_scripts(){
	global $wp;

	wp_enqueue_style("tachions", "https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css");
	wp_enqueue_style("alfred_style", get_template_directory_uri() . "/assets/styles/alfred.css");
	wp_enqueue_script("clouds_js", get_template_directory_uri() . "/assets/js/clouds.js");
	wp_enqueue_script("single_page", get_template_directory_uri() . "/assets/js/single_page.js");

}

add_filter( 'show_admin_bar', '__return_false' );

add_filter( 'big_image_size_threshold', '__return_false' );

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


function change_post_label(){
	global $menu;
	global $submenu;
	$menu[5][0] = "Shoots";

	$submenu["edit.php"][5][0] = "Shoots";
	$submenu["edit.php"][10][0] = "Add Shoot";
	$submenu["edit.php"][16][0] = "Shoot Tags";
}

function change_post_object() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Shoots';
	$labels->singular_name = 'Shoot';
	$labels->add_new = 'Add Shoot';
	$labels->add_new_item = 'Add Shoot';
	$labels->edit_item = 'Edit Shoot';
	$labels->new_item = 'Shoots';
	$labels->view_item = 'View Shoot';
	$labels->search_items = 'Search Shoots';
	$labels->not_found = 'No Shoots found';
	$labels->not_found_in_trash = 'No Shoots found in Trash';
	$labels->all_items = 'All Shoots';
	$labels->menu_name = 'Shoots';
	$labels->name_admin_bar = 'Shoots';
}

add_action("admin_menu", "change_post_label");
add_action("init", "change_post_object");
