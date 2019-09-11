<?php 

/* Template Name: Front */ ?>

<?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>

<?php while ($the_query -> have_posts()) {

	$the_query -> the_post();

	echo get_the_post_thumbnail(); ?>

	<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

	<?php the_excerpt(__('(more…)')); ?>

<?php }

wp_reset_postdata();
?>

<script>

var ourRequest = new XMLHttpRequest()
ourRequest.open('GET', 'http://localhost:8888/min/wp-json/wp/v2/posts')
ourRequest.onload = function() {
  if (ourRequest.status >= 200 && ourRequest.status < 400) {
    var data = JSON.parse(ourRequest.responseText)
    console.log(data[0])

  } else {
    console.log("Connected to the server, but it returned an error.")
  }
}

ourRequest.onerror = function() {
  console.log("Connection error")
}

ourRequest.send()

</script>