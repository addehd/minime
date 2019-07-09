<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Idell Grafisk Profil</title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/profiles/profile.css'?>;">
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:400,500,600&display=swap" rel="stylesheet">
</head>
<body>

<?php $profileDirection = get_template_directory_uri() . '/profiles/' . $current_user->ID . '/'; ?>

<!-- <?php var_dump($current_user); ?> -->

<section id="play">
<video preload="auto" autoplay="true" loop="loop" muted="muted" volume="0">
	<source src="<?php echo $profileDirection;?>inspiration.mp4" type="video/mp4">
	<!-- Sorry, your browser does not support HTML5 video. -->
	</video>
	<h1 id="slogan">Idell. Grafisk profil</h1>
</section>

<div class="wrap">
	<section class="colors">
		<div class="orange">
			<span class="color">#ffe603</span>
			<span class="color">rgb(255, 230, 3)</span>
		</div>

		<div class="tree">
			<div class="green">
				<span class="color">#0ac834</span>
				<span class="color">rgb(10, 200, 52)</span>
			</div>
			
			<div class="blue">
				<span class="color">#2db8ff</span>
				<span class="color">rgb(45, 184, 255)</span>
		 </div>
		</div>
	</section>

	<section class="main-logo">
		<img src="<?php echo $profileDirection;?>img/logo/logo-one.svg" alt="">
		<a href="<?php echo $profileDirection;?>/img/logo/logo-one.svg" download>Download</a>
	</section>

	<section class="second-logo">
		<div>e
				<img src="<?php echo $profileDirection;?>img/logo/logo-dark.svg" alt="">
				<a href="<?php echo $profileDirection;?>/img/logo/logo-dark.svg" download>Download</a>
		</div>

		<div class="mini-logo">
				<img src="<?php echo $profileDirection;?>img/logo/logo-mini.svg" alt="">
				<a href="<?php echo $profileDirection;?>/img/logo/logo-mini.svg" download>Download</a>
		</div>
	</section>

	<section>
		<img class="img-responsive" src="<?php echo $profileDirection;?>img/visitkort.jpg" alt="Visitkort Idell">
		<a class="visitkort" href="<?php echo $profileDirection;?>downloads/visitkort.zip" download>Download</a>
	</section>
	
	<section class="fonts">
		<div>
			<img class="tred img-responsive" src="<?php echo $profileDirection;?>img/mode/3d.jpg" alt="" class="img-responsive">
	  </div>
		
		<div class="right-font">
			<img class="font img-responsive" src="<?php echo $profileDirection;?>img/fonts.png" alt="Visitkort Idell">
			<a class="visitkort" href="<?php echo $profileDirection;?>downloads/fonts.zip" download>Download</a>
		</div>
	</section>
</div>

<script>

function copyStringToClipboard (str) {
   // Create new element
   var el = document.createElement('textarea');
   // Set value (string to be copied)
   el.value = str;
   // Set non-editable to avoid focus and move outside of view
   el.setAttribute('readonly', '');
   el.style = {position: 'absolute', left: '-9999px'};
   document.body.appendChild(el);
   // Select text inside element
   el.select();
   // Copy text to clipboard
   document.execCommand('copy');
   // Remove temporary element
   document.body.removeChild(el);
}

var color = document.querySelectorAll('.color')

color.forEach(function(elem) {
    elem.addEventListener("click", function(e) {
        copyStringToClipboard(e.srcElement.innerText)
    })
})

</script>

</body>
</html>