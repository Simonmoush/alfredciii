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

<div id="header">
	<h1 id="site-title">
		<a href="<?= get_home_url(); ?>">
			Alfred Coleman III
		</a>
	</h1>
	<nav id="main-nav">
		<div class="nav-item">
			<a href="<?= site_url("/work"); ?>">
				Work
			</a>
		</div>
		<div class="nav-item">
			<a href="<?= site_url("/contact"); ?>">
				Contact
			</a>
		</div>
	</nav>
</div>
