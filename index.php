<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php
	while ( have_posts() ) : the_post();?>
		<article class="post">
	  <h2><?php the_title(); ?></h2>
		<section class="content"><?php the_content(); ?></section>
		</article>
	<?php
	endwhile;
endif;
?>

<?php get_footer(); ?>	