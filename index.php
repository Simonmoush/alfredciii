<?php get_header(); ?>
<div id="posts">
	<?php
	$query = new WP_Query(array(
		'category_name' => "featured",
		'orderby' => 'rand',
		"posts_per_page" => -1
	));
	$images_to_show = [];
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
		$images = get_all_images_from_post();

		if(empty($images)){ continue; }// the posts loop

		foreach($images as $img_data){

			if(strpos($img_data["class"], "exclude") !== false){ continue; } // the images loop

			ob_start();

			?> 
			<div class="post">
				<a href="<?= get_permalink(); ?>">
					<img class="homepage-img"src="<?= $img_data["url"]; ?>">
				</a>
			</div>
			<?php

			$images_to_show[] = ob_get_contents();
			ob_end_clean();
		}
	endwhile; else :
		?> <p><?php esc_html_e( 'No Photos' ); ?></p> <?php
	endif;

	if(!empty($images_to_show)){
		shuffle($images_to_show);
		foreach($images_to_show as $image_to_show){
			echo($image_to_show);
		}
	}
?> </div> <?php


get_footer();

?>
