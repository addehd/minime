<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo Get_bloginfo(); ?></title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">
	<?php wp_head(); ?>
</head>

<body>
	<header>
		<?php wp_nav_menu(array( 'menu' => 'Example'))?>
	</header>
	