<?php get_header() ?>

<?php if( have_posts()) {
	while( have_posts()) {
		the_post();
		the_title();
		the_content();
		echo get_the_post_thumbnail();
	}
}?>

<?php get_footer() ?>