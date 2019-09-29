<?php

namespace Aisconverse;


class Test {

	static $root_path = '';
	static $plugin_path = '';
	static $file = '';


	static $classes = '';
	static $configs = '';
	static $logs = '';


	static $root_url = '';
	static $assets_url = '';

	static $template_dir_path = '';


	static function load( string $file ) {

		ini_set( 'unserialize_callback_func', 'spl_autoload_call' );

		self::$root_path   = realpath( dirname( WPINC ) ) . '/';
		self::$plugin_path = realpath( dirname( $file ) ) . '/';
		self::$file        = $file;

		self::$classes = self::$plugin_path . 'classes/';
		self::$configs = self::$plugin_path . 'configs/';
		self::$logs    = self::$plugin_path . 'logs/';

		self::$root_url   = get_template_directory_uri() . '/';
		self::$assets_url = self::$root_url . 'assets/';

		self::$template_dir_path = \get_template_directory() . '/';

		try {

			\spl_autoload_register( [ __CLASS__, 'load_class' ] );

			Theme::load();
		} catch ( \Exception $ex ) {

			\wp_die( $ex->getMessage() );
		}
	}

	static function load_class( string $name ) {

		$file = self::find_file( $name, self::$classes );

		if ( FALSE === $file ) {
			return FALSE;
		}

		include $file;

		return class_exists( $name ) || trait_exists( $name );
	}

	static function load_config( string $name ) : array {

		$file = self::find_file( $name, self::$configs );

		if ( FALSE === $file ) {
			return [];
		}

		$config = include $file;

		return is_array( $config ) ? $config : [];
	}


	static function find_file( string $name, string $dir ) {

		$file = $dir;
		$name = ltrim( $name, '/\\' );

		switch ( $dir ) {

			case self::$classes:

				$namespaces = explode( '\\', $name );
				$class      = array_pop( $namespaces );

				if ( count( $namespaces ) > 0 && $namespaces [0] == __NAMESPACE__ ) {
					array_shift( $namespaces );
				}

				$namespace = count( $namespaces ) > 0
					? implode( '/', $namespaces )
					: '';

				$file .= "{$namespace}/{$class}.php";

				break;

			case self::$configs:

				$file .= "{$name}.php";

				break;

			case self::$logs:

				$file .= $name;

				break;
		}

		return is_file( $file ) ? $file : FALSE;
	}


	static function list_classes( string $namespace, bool $strip_base = NULL ) : array {

		$namespace = trim( $namespace, '\\' );
		$strip_base = $strip_base ?: TRUE;

		if ( ! is_dir( $path = self::$classes . str_replace( '\\', '/', $namespace ) ) ) {
			return [];
		}

		$files = array_diff( scandir( $path ), [ '.', '..' ] );

		return array_reduce( $files, function ( $carry, $file ) use ( $namespace, $strip_base ) {

			if ( preg_match( '#\.php$#', $file ) and ( ! $strip_base or strpos( $file, 'Base' ) === FALSE ) ) {
				$carry [ $name = str_replace( '.php', '', $file ) ] = 'Aisconverse\\' . $namespace . '\\' . $name;
			}

			return $carry;

		}, [] );
	}

	static function list_files( string $path, string $ext = NULL ) : array {

		$files = array_diff( scandir( $path ), [ '.', '..' ] );

		return $ext === NULL

			? $files

			: array_reduce( $files, function ( $c, $i ) use ( $path, $ext ) {

				if ( preg_match( '#\.' . $ext . '$#', $i ) ) {
					$c [ str_replace( ".{$ext}", '', $i ) ] = "{$path}/{$i}";
				}

				return $c;
			}, [] );
	}
}