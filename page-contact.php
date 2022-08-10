<?php get_header(); ?>

<?php while(have_posts()){ the_post(); ?>
	<style>
	#contact{
		font-family: 'Raleway', sans-serif;
	}
	.contact-header{
		font-size: 2em;
	}
	</style>
	<div id="contact" class="h-100 w-100 tc flex justify-center items-center">
		<div>

			<div class="f3 pv2 ph5">
			<?php the_content(); ?>
			</div>

			<hr>

			<h1 class="f2">Email: <span>alfredcolemanthe3rd@gmail.com</span></h1>
			<h1 class="f2">Instagram: <span>themanwhosmellsofsunflowers</span></h1>
		</div>
	</div>

<?php } ?>

<?php get_footer(); ?>
