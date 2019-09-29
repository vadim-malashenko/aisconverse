<?php


function d() {
	echo '<pre>' . print_r( func_get_args(), 1 ) . '</pre>';
}

require realpath( __DIR__ ) . '/classes/Test.php';

\Aisconverse\Test::load( __FILE__ );