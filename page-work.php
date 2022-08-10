<?php get_header(); ?>

<style>
	.flex-grow{
		flex: 1 0 auto;
	}

	.work-item{
		transition: width 0.3s;
		width: 10px;
	}
	.work-item:hover{
		width: 33%;
	}

	img{
		object-fit: cover;
	}

	span{
		opacity: 0%;
		/*transition: opacity 0.1s;*/
		font-size: 3em;
		color: white;
	}
	.work-item:hover > span{
		font-weight: normal;
		opacity: 100%;
		width: 100%;
		background-color: rgba(0,0,0,0.5);
	}
</style>

<div class="flex w-100 h-100">

	<?php $q = new WP_Query(["posts_per_page" => -1]); while($q->have_posts()){ $q->the_post(); ?>
		<a class="tc flex flex-grow justify-center items-center h-100 work-item relative bl br bw2 b--white" href="<?= the_permalink(); ?>">
			<img class="absolute h-100 z-back" src="<?= get_first_img_from_post(); ?>">
			<!--<span><?php the_title(); ?></span>-->
		</a>
	<?php } ?> 
</div>

<?php get_footer(); ?>
