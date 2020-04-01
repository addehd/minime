<?php get_header(); ?>

<?php echo $wp_version; ?>

<?php if( have_posts()) {
	while( have_posts()) {
		the_content();
	}
}?>

<?php get_footer(); ?>	