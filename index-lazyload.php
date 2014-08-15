<html>
<head>
	<meta charset="UTF-8">
	<title>Toraja Heritage Hotel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Toraja Heritage Hotel, the Best Hotel in Tana Toraja.">
	<meta name="keywords" content="tana toraja, toraja, toraja heritage hotel, hotel, rantepao">
	<meta name="author" content="The 1984">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<!-- Lightbox Stylesheet -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lightbox/css/lightbox.css">
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container" style="text-align: center">
			<div class="logo-container">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" height="100" alt="">
			</div>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="toraja-navigation">
					<li><div class="navigation-logo"></div></li>
					<li class="filter">
						<a class="active home" href="javascript:void(0)">
							<img src="<?php echo get_template_directory_uri(); ?>/img/nav-icon-0.png" alt=""><br>Home
						</a>
					</li>
					<li class="filter">
						<a href="javascript:void(0)" data-filter=".rooms, .rooms-img">
							<img src="<?php echo get_template_directory_uri(); ?>/img/nav-icon-1.png" alt=""><br>Rooms
						</a>
					</li>
					<li class="filter">
						<a a href="javascript:void(0)" data-filter=".about, .facilities">
							<img src="<?php echo get_template_directory_uri(); ?>/img/nav-icon-2.png" alt=""><br>Facilities
						</a>
					</li>
					<li class="filter">
						<a href="javascript:void(0)" data-filter=".point-of-interests">
							<img src="<?php echo get_template_directory_uri(); ?>/img/nav-icon-3.png" alt=""><br>Destinations
						</a>
					</li>
					<li>
						<a class="reservation" href="javascript:void(0)">
							<img src="<?php echo get_template_directory_uri(); ?>/img/nav-icon-4.png" alt=""><br>Reservation
						</a>
					</li>
					<li>
						<a class="contact" href="javascript:void(0)">
							<img src="<?php echo get_template_directory_uri(); ?>/img/nav-icon-5.png" alt=""><br>Contact
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="isotope-container">
			<div class="stamp item item-w2 item-h1" style="display: table">
				<a id="intro-video-poster" data-toggle="modal" data-target="#intro-video-lightbox" href="#intro-video-lightbox">
				</a>
			</div>
			<!-- Query for Rooms -->
			<?php
			$args = array(
				'post_status' => 'publish',
				'category_name' => 'rooms',
				'order' => 'DESC',
				'orderby' => 'rand',
				'posts_per_page' => -1
				);
			$my_query = null;
			$my_query = new WP_Query($args);
			$counter = 1;
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();
				?>
				<?php if( has_tag('3x1') ) { ?>
				<a data-lightbox="<?php echo the_title(); ?>" href="<?php $imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID) , 'full'); echo $imgsrc[0]; ?>" id="rooms-box-<?php echo $counter?>" class="rooms item item-w3">
					<div class="box-featured-img two-third">
						<?php 
						if ( has_post_thumbnail() ) {
							$img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							echo '<img width="100%" height="100%" class="lazy" data-original="'.$img_url.'" />';
						}
						?>
						<div class="box-arrow-left"></div>
						
					</div>
					<div class="box-content one-third">
						<div class="box-content-center">
							<h3><?php echo the_title() ?></h3>
							<p><?php echo the_content() ?></p>
						</div>
					</div>
				</a>
				<div class="lightbox-gallery-images" style="display:none">
					<?php
						// Store the post title to a variable
						$title = get_the_title();
						// Store the wp-types image url to a variable
						$images = get_post_meta( get_the_ID(), 'wpcf-gallery-img' );
						// Loop for each of wp-type image urls
						foreach($images as $k => $url):
							// Render HTML
							echo '<a href="'.$url.'" data-lightbox="'.$title.'"></a>';
						endforeach;
					?>
				</div>
				<?php } else { ?>
				<a data-lightbox="<?php echo the_title() ?>" href="<?php $imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID) , 'full'); echo $imgsrc[0]; ?>" id="rooms-box-<?php echo $counter?>" class="rooms item item-w2">
					<div class="box-featured-img">
						<?php 
						if ( has_post_thumbnail() ) {
							$img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							echo '<img width="100%" height="100%" class="lazy" data-original="'.$img_url.'" />';
						}
						?>
						<div class="box-arrow-left"></div>
					</div>
					<div class="box-content">
						<div class="box-content-center">
							<h3><?php echo the_title() ?></h3>
							<p><?php echo the_content() ?></p>
						</div>
					</div>
				</a>
				<div class="lightbox-gallery-images" style="display:none">
					<?php
						// Store the post title to a variable
						$title = get_the_title();
						// Store the wp-types image url to a variable
						$images = get_post_meta( get_the_ID(), 'wpcf-gallery-img' );
						// Loop for each of wp-type image urls
						foreach($images as $k => $url):
							// Render HTML
							echo '<a href="'.$url.'" data-lightbox="'.$title.'"></a>';
						endforeach;
					?>
				</div>
				<?php } ?>
				<?php $counter++ ?>
			<?php endwhile; } wp_reset_query(); ?>
			<!-- End of Query for Rooms -->
			<!-- Query for Facilities -->
			<?php
			$args = array(
				'post_status' => 'publish',
				'category_name' => 'facilities',
				'order' => 'DESC',
				'orderby' => 'rand',
				'posts_per_page' => -1
				);
			$my_query = null;
			$my_query = new WP_Query($args);
			$counter = 1;
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();
				?>
				<?php if( has_tag('3x1') ) { ?>
				<div id="facilities-box-<?php echo $counter?>" class="facilities item item-w3">
					<div class="box-featured-img two-third">
						<?php 
						if ( has_post_thumbnail() ) {
							$img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							echo '<img width="100%" height="100%" class="lazy" data-original="'.$img_url.'" />';
						}
						?>
						<div class="box-arrow-left"></div>
						
					</div>
					<div class="box-content one-third">
						<div class="box-content-center">
							<h3><?php echo the_title() ?></h3>
							<p><?php echo the_content() ?></p>
						</div>
					</div>
				</div>
				<?php } else { ?>
				<div id="facilities-box-<?php echo $counter?>" class="facilities item item-w2">
					<div class="box-featured-img">
						<?php 
						if ( has_post_thumbnail() ) {
							$img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							echo '<img width="100%" height="100%" class="lazy" data-original="'.$img_url.'" />';
						}
						?>
						<div class="box-arrow-left"></div>
					</div>
					<div class="box-content">
						<div class="box-content-center">
							<h3><?php echo the_title() ?></h3>
							<p><?php echo the_content() ?></p>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php $counter++ ?>
			<?php endwhile; } wp_reset_query(); ?>
			<!-- End of Query for Facilities -->
			<!-- Query for About -->
			<?php
			$args = array(
				'post_status' => 'publish',
				'category_name' => 'about',
				'order' => 'DESC',
				'orderby' => 'rand',
				'posts_per_page' => -1
				);
			$my_query = null;
			$my_query = new WP_Query($args);
			$counter = 1;
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();
				?>

				<div id="about-box" class="about item item-w2 item-h3">
					<div class="box-featured-img">
						<?php 
						if ( has_post_thumbnail() ) {
							$img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							echo '<img width="100%" height="100%" class="lazy" data-original="'.$img_url.'" />';
						}
						?>
						<div class="box-arrow-up"></div>
					</div>
					<div class="box-content">
						<div class="box-content-center">
							<h3><?php echo the_title() ?></h3>
							<p><?php echo the_content() ?></p>
						</div>
					</div>
				</div>
				<?php $counter++ ?>
			<?php endwhile; } wp_reset_query(); ?>
			<!-- End of About -->
			<!-- Query for Point of Interests -->
			<?php
			$args = array(
				'post_status' => 'publish',
				'category_name' => 'point-of-interests',
				'order' => 'DESC',
				'orderby' => 'rand',
				'posts_per_page' => -1
				);
			$my_query = null;
			$my_query = new WP_Query($args);
			$counter = 1;
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();
				?>
				<?php if( has_tag('3x1') ) { ?>
				<div href="javascript:void(0)"  id="point-of-interests-box-<?php echo $counter?>" class="point-of-interests item item-w3">
					<div class="box-featured-img two-third">
						<?php 
						if ( has_post_thumbnail() ) {
							$img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							echo '<img width="100%" height="100%" class="lazy" data-original="'.$img_url.'" />';
						}
						?>
						<div class="box-arrow-left"></div>
					</div>
					<div class="box-content one-third">
						<div class="box-content-center">
							<h3><?php echo the_title() ?></h3>
							<p><?php echo the_content() ?></p>
						</div>
					</div>
				</div>
				<?php } else { ?>
				<div href="javascript:void(0)"  id="point-of-interests-box-<?php echo $counter?>" class="point-of-interests item item-w2">
					<div class="box-featured-img">
						<?php 
						if ( has_post_thumbnail() ) {
							$img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							echo '<img width="100%" height="100%" class="lazy" data-original="'.$img_url.'" />';
						}
						?>
						<div class="box-arrow-left"></div>
					</div>
					<div class="box-content">
						<div class="box-content-center">
							<h3><?php echo the_title() ?></h3>
							<p><?php echo the_content() ?></p>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php $counter++ ?>
			<?php endwhile; } wp_reset_query(); ?>
			<!-- End of Point of Interests -->
			<!-- Query for Photographs -->
			<?php
			$args = array(
				'post_status' => 'publish',
				'category_name' => 'photographs',
				'order' => 'DESC',
				'orderby' => 'rand',
				'posts_per_page' => -1
				);
			$my_query = null;
			$my_query = new WP_Query($args);
			$counter = 1;
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();
				?>
				<?php if( has_tag('2x1') ) { ?>
				<div id="photographs-box-<?php echo $counter?>" class="<?php if($counter <= 5) { echo 'about-img '; } else if( $counter > 5 AND $counter <= 10 ) { echo 'facilities-img '; } ?>photographs item item-w2">
					<div class="box-featured-img" style="width: 100%;">
						<?php 
						if ( has_post_thumbnail() ) {
							$img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							echo '<img width="100%" height="100%" class="lazy" data-original="'.$img_url.'" />';
						}
						?>
					</div>
				</div>
				<?php } else { ?>

				<div id="photographs-box-<?php echo $counter?>" class="<?php if($counter <= 5) { echo 'about-img '; } else if( $counter > 5 AND $counter <= 10 ) { echo 'facilities-img '; } ?>photographs item item-w1">
					<div class="box-featured-img" style="width: 100%;">
						<?php 
						if ( has_post_thumbnail() ) {
							$img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							echo '<img width="100%" height="100%" class="lazy" data-original="'.$img_url.'" />';
						}
						?>
					</div>
				</div>
				<?php } ?>
				<?php $counter++ ?>
			<?php endwhile; } wp_reset_query(); ?>
			<!-- End of Query for Photographs -->
			<!-- Query for Pattern -->
			<?php
			$args = array(
				'post_status' => 'publish',
				'category_name' => 'pattern',
				'order' => 'DESC',
				'orderby' => 'rand',
				'posts_per_page' => -1
				);
			$my_query = null;
			$my_query = new WP_Query($args);
			$counter = 1;
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();
				?>
				<?php if( has_tag('2x1') ) { ?>
				<div id="pattern-box-<?php echo $counter?>" class="<?php if($counter <= 5) { echo 'about-img '; } else if( $counter > 5 AND $counter <= 10 ) { echo 'facilities-img '; } ?>pattern item item-w2">
					<div class="box-featured-img" style="width: 100%;">
						<?php 
						if ( has_post_thumbnail() ) {
							$img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							echo '<img width="100%" height="100%" class="lazy" data-original="'.$img_url.'" />';
						}
						?>
					</div>
				</div>
				<?php } else if( has_tag('1x2') ) { ?>

				<div id="pattern-box-<?php echo $counter?>" class="<?php if($counter <= 5) { echo 'about-img '; } else if( $counter > 5 AND $counter <= 10 ) { echo 'facilities-img '; } ?>pattern item item-w1 item-h2">
					<div class="box-featured-img" style="width: 100%;">
						<?php 
						if ( has_post_thumbnail() ) {
							$img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							echo '<img width="100%" height="100%" class="lazy" data-original="'.$img_url.'" />';
						}
						?>
					</div>
				</div>
				<?php } else { ?>

				<div id="pattern-box-<?php echo $counter?>" class="<?php if($counter <= 5) { echo 'about-img '; } else if( $counter > 5 AND $counter <= 10 ) { echo 'facilities-img '; } ?>pattern item item-w1">
					<div class="box-featured-img" style="width: 100%;">
						<?php 
						if ( has_post_thumbnail() ) {
							$img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							echo '<img width="100%" height="100%" class="lazy" data-original="'.$img_url.'" />';
						}
						?>
					</div>
				</div>
				<?php } ?>
				<?php $counter++ ?>
			<?php endwhile; } wp_reset_query(); ?>
			<!-- End of Query for Pattern -->
		</div>
		<!-- End of Isotope Container -->
		<!-- Room Inquiry Container -->
		<div id="reservation-container">
			<?php gravity_form('2', $display_title=true, $display_description=true, $display_inactive=false, $field_values=null, $ajax=false, $tabindex); ?>
		</div>
		<!-- End of Room Inquiry -->
		<div id="contact-container">
			<?php gravity_form('1', $display_title=true, $display_description=true, $display_inactive=false, $field_values=null, $ajax=false, $tabindex); ?>
		</div>
	</div>

	<footer>
			<div class="footer-pattern-top"></div>
			<ul class="footer-links">
				<li><a onclick="swap_layout()" href="javascript:void(0)">Privacy Policy</a></li>
				<li>|</li>
				<li><a href="javascript:void(0)">Terms &amp; Conditions</a></li>
				<li>|</li>
				<li><a href="javascript:void(0)">Security &amp; Safety</a></li>
				<li>|</li>
				<li><a href="javascript:void(0)">Sitemap</a></li>
			</ul>
			<div class="copyright">Copyright &copy; 2014 - <a target="_blank" href="http://www.the1984.com">The 1984</a>.</div>
			<div class="footer-pattern-bot"></div>
	</footer>

	<!-- Modal -->
	<div class="modal fade" id="intro-video-lightbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <a href="javascript:void(0)" class="lb-close" data-dismiss="modal"></a>
	  <div class="modal-dialog">
	    <div class="modal-content">
	    	<iframe width="100%" height="80%" src="http://www.youtube.com/embed/_YUED7IIFUI" frameborder="0" allowfullscreen></iframe>
	    </div>
	  </div>
	</div>

	<!-- Script Section -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.0.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui-1.10.4.datepicker.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/packery-mode.pkgd.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fitvids.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.lazyload.min.js"></script>
	<!-- Lightbox script -->
	<script src="<?php echo get_template_directory_uri(); ?>/lightbox/js/lightbox.min.js"></script>
	<!-- Main Script -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
</body>
</html>