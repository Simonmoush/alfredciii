<?php get_header(); ?>

<div id="character_select">
	<?php $q = new WP_Query(["posts_per_page" => -1]); while($q->have_posts()){ $q->the_post(); ?>

	<a class="window" href="<?= the_permalink(); ?>">
		<img class="view" src="<?= get_first_img_from_post(); ?>">
	</a>

	<?php } ?> 
</div>

<?php get_footer(); ?>
