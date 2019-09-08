<?php 

/* Template Name: ACF */ ?>

<?php get_header() ?>

<?php if( have_posts()) {
	while( have_posts()) {
		the_post();
		the_title();
		the_content();	
	}
}?>

<?php
echo '<p>' . get_field('namn') . '</p>';
echo '<p>' . get_field('slogan').'</p>';
echo '<p>' . get_field('varden').'</p>'	;
?>

<?php
if( have_rows('usp') ){
	while (have_rows('usp')) {
		the_row();
		the_sub_field('rubrik');
		the_sub_field('beskrivning');
	}
}
?>

<?php get_footer() ?>