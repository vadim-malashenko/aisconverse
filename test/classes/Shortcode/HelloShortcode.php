<?php

namespace Aisconverse\Shortcode;


class HelloShortcode {

	static function render( $attrs ) {

		?>

        <div id="hello-shortcode">Hello, Wordl!</div>

		<?php
	}
}