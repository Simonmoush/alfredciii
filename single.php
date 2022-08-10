<?php get_header(); ?>

<?php while(have_posts()){ ?>
	<?php
		the_post();

		$images = get_all_images_from_post();
		$title = get_the_title();
		/*
		$big = in_category("big-shoots");
		$id = $big ? "shoot-bulk" : "shoot";
		*/
	?>

	<style>
		#shoot-container{
			width: 100%;
			height: 100%;
			overflow: scroll;
			display: flex;
			flex-flow: row wrap;
			justify-content: center;
		}
		
		.shoot-img{
			height: 95%;
			flex: 0 0 auto;
		}
	</style>

	<div id="shoot-container">

		<?php foreach($images as $img_data){ ?> 
			<img class="shoot-img pa1" src="<?= $img_data["url"]; ?>">
		<?php } ?>

	</div>
<?php } ?>

<?php get_footer(); ?>
