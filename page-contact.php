<?php get_header(); ?>

<?php while(have_posts()){ the_post(); ?>
	<div class="text-content">
	<?php the_content(); ?>
	</div>

<?php } ?>

<?php get_footer(); ?>
