<?php

/***************************************************
# Lanoba
****************************************************/

add_shortcode( 'lanoba', 'lb_shortcode' );
	function lb_shortcode () {
		do_action( 'wordpress_social_login' );
	}

?>