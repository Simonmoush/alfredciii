<?php get_header(); ?>

<div id="work-page">
<div id="work-menu">
<?php
	$q = new WP_Query(["posts_per_page" => -1]);
	while($q->have_posts()){
		$q->the_post();

		?>
		<div class='work-item'>
			<a href="<?= the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</div>
		<?php
	}
?>
</div>
</div>

<?php get_footer();
