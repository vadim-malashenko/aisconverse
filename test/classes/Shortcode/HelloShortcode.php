<?php

namespace Aisconverse\Shortcode;


class HelloShortcode {

	static function render( $attrs ) {

		?>

        <div class="test-shortcode">Hello Wordl!</div>

		<?php
	}
}