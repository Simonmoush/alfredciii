<?php get_header(); ?>

<?php
	if (have_posts() ) :
		while ( have_posts() ) :

			the_post();

			$all_images = get_all_images_from_post();

			if(empty($all_images)){ continue; }

			// set up an array for each list
			$num_lists = 4;
			$image_lists = [];
			for($l = 0; $l < $num_lists; $l++){
				$image_lists[] = [];
			}

			foreach($all_images as $i => $url){
				$list = $i % $num_lists;
				$image_lists[$list][] = $url;
			}
			?> <div id="image-lists"> <?php
			foreach($image_lists as $list => $image_list){
				?>
				<div class="fp-img-list <?= $list%2 == 1 ? 'reverse' : 'forward'; ?>">
				<?php
				foreach($image_list as $url){
					?> <img class="fp-img" src="<?= $url; ?>"> <?php
				}
				?> </div> <?php
			}
			?> </div> <?php

		endwhile;
	endif;
?>

<?php get_footer(); ?>
