<?php if(!isset($_GET["single_page"])) : ?>
<html>
<head>
	<title><?php wp_title(); ?></title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Faster+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@800&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;400;700&display=swap');

	#title{
		text-align: center;
		font-family: 'Raleway', sans-serif;
		font-size: 3em;
		letter-spacing: .2em;
	}

	#subtitle{
		text-align: center;
		font-family: 'Raleway', sans-serif;
		font-weight: normal;
		font-size: 1em;
		letter-spacing: 1em;
	}
	
	a{
		font-family: 'Raleway', sans-serif;
		text-decoration: none;
		color: black;
	}

	a:hover{
		font-weight: bold;
		letter-spacing: 0.1em;
	}

</style>

<div class="w-100 h-100 flex noverflow">
	<div class="flex-size w-25 h-100 flex flex-column justify-between">
		<div>
			<h1 id="title">ALFRED<br>COLEMAN<br>III</h1>
			<h2 id="subtitle">PHOTOGRAPHY</h2>
		</div>

		<nav class="flex flex-column w-100">
			<a class="pv4 flex items-center justify-center w-100" href="<?= site_url("/"); ?>">Home</a>
			<a class="pv4 flex items-center justify-center w-100" href="<?= site_url("/work"); ?>">Work</a>
			<a class="pv4 flex items-center justify-center w-100" href="<?= site_url("/contact"); ?>">Contact</a>
		</nav>
		<audio class="w-100" controls autoplay loop>
			<source src="<?=get_template_directory_uri() . '/assets/music/ma.mp3'; ?>" type="audio/mpeg">
		</audio>
	</div>
	<div class="flex-size w-75 dynamic-content">
<?php endif; ?>
