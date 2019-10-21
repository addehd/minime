<?php get_header(); ?>


<div id="app">
</div>

<?php echo $wp_version; ?>

<?php if( have_posts()) {
	while( have_posts()) {
		the_post();
		the_title();
		the_content();
	}
}?>

<?php get_footer(); ?>	