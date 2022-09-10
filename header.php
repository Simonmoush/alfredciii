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
	<div id="sidebar">
		<div>
			<h1 id="title">Alfred<br>Coleman<br>III</h1>
			<h2 id="subtitle">Photography</h2>
		</div>
		
		<hr class="sidebar-separator">

		<ul id="nav">
			<li><a href="<?= site_url("/"); ?>">Home</a></li>
			<li><a href="<?= site_url("/work"); ?>">Work</a></li>
			<li><a href="<?= site_url("/contact"); ?>">Contact</a></li>
		</ul>

		<hr class="sidebar-separator">

		<div id="sidebar-footer">
			<hr class="separator">
			<div>Instagram: themanwhosmellsofsunflowers</div>
			<div>Email: alfredcolemanthe3rd@gmail.com</div>
			<hr class="separator">
		</div>

		<?php if(false): ?>
			<audio id="audio-player" controls autoplay loop>
				<source src="<?=get_template_directory_uri() . '/assets/music/ma.mp3'; ?>" type="audio/mpeg">
			</audio>
		<?php endif; ?>
	</div>
	<div id="content">

<?php endif; ?>
