<?php get_header(); ?>

<style>
	.fp-img-col{
		top: 0px;
		display: flex;
		flex-direction: column;
	}
</style>
<?php
	if (have_posts() ) :
		while ( have_posts() ) :

			the_post();

			$images = get_all_images_from_post();

			if(empty($images)){ continue; }

			// set up an array for each column
			$num_columns = wp_is_mobile() ? 1 : 4; // mobile site has a single column
			$image_columns = [];
			for($c = 0; $c < $num_columns; $c++){
				$image_columns[] = [];
			}

			$i = 0;
			foreach($images as $img_data){
				$col = $i % $num_columns;
				$image_columns[$col][] = $img_data["url"];
				$i++;
			}
			?> <div id="home-grid"> <?php
			foreach($image_columns as $col => $image_column){
				?> <div class="fp-img-col flex flex-column<?= $col%2 == 1 ? "-reverse" : ""; ?> w-25-ns w-100 mh1 relative"> <?php
				foreach($image_column as $url){
					?> <img class="flex-size w-100 mv1" src="<?= $url; ?>"> <?php
				}
				?> </div> <?php
			}
			?> </div> <?php

		endwhile;
	endif;
?>

<?php get_footer(); ?>
