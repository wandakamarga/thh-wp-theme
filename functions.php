<?php 
	if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 300, 300, true ); // default Post Thumbnail dimensions (cropped)
	}
?>