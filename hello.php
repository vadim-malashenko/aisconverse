<?php

/*
Plugin Name: Hello
Author: Vadim Malashenko
Version: 0.0.1
*/

add_action ('wp', function () {

	if ( is_front_page ()) {

		$front_page_id = get_option( 'page_on_front' );

		add_filter( 'the_content', function ( $content ) use ($front_page_id) {

			global $post;

			if ($post->ID != $front_page_id)

				return $content;

			$color = [ 'red', 'orange', 'green', 'blue' ] [date ( 'h' ) % 4];

			return $content . "<div id=\"hello-plugin\" style=\"color: {$color}\">Hello, World!</div>";
		} );
	}
} );
