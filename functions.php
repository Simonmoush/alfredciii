<?php

add_action("wp_enqueue_scripts", "aciii_enqueue_scripts");

function aciii_enqueue_scripts(){
	wp_enqueue_style("alfred_style", get_template_directory_uri() . "/assets/styles/alfred.css");
	wp_enqueue_script("clouds_js", get_template_directory_uri() . "/assets/js/clouds.js");
	wp_enqueue_script("single_page", get_template_directory_uri() . "/assets/js/single_page.js");
}

// don't show the admin bar on the front end if the user is logged in
add_filter( 'show_admin_bar', '__return_false' );

// allows images to be full size
//add_filter( 'big_image_size_threshold', '__return_false' );

// returns an array of image urls and thier classes
function get_all_images_from_post(){
	global $post;

	$num_matches = preg_match_all('/<img\s+.*src="(.*)"\s+.*>/U', $post->post_content, $matches);
	if(!$num_matches){
		return [];
	}
	$img_urls = $matches[1]; // matches[1] is the capture group with just the url
	return $img_urls;
}

function get_first_img_from_post() {
	$all_urls = get_all_images_from_post();
	if(!empty($all_urls))
	return $all_urls[0];
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
