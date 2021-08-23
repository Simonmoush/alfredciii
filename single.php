<?php
get_header();

while(have_posts()){
	the_post();
	$images = get_all_images_from_post();
	$title = get_the_title();
	$big = in_category("big-shoots");
	$id = $big ? "shoot-bulk" : "shoot";

	?> <div id="<?= $id; ?>"> <?php
	foreach($images as $img_data){ ?> 
		<img class="shoot-img"src="<?= $img_data["url"]; ?>">
	<?php }
	?> </div> <?php
}

get_footer();
