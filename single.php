<?php get_header(); ?>

<?php while(have_posts()){ ?>
	<?php
		the_post();

		$images = get_all_images_from_post();
		$title = get_the_title();
	?>

	<div id="shoot-container">
		<?php foreach($images as $url){ ?> 
			<img class="shoot-img" src="<?= $url; ?>">
		<?php } ?>

	</div>
<?php } ?>

<?php get_footer(); ?>
