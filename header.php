<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo Get_bloginfo(); ?></title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">
	<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/vue/dist/vue.js?ver=5.1.1'></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
	<?php wp_head(); ?>
</head>

<body>
	<header>
		<?php wp_nav_menu(array( 'menu' => 'Example'))?>
	</header>
	<!-- <li><a href="http://localhost:8888/acfrest/wp-json/wp/v2/posts">http://localhost:8888/acfrest/wp-json/wp/v2/posts</a></li> -->
	