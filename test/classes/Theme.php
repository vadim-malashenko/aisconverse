<?php

namespace Aisconverse;

class Theme {

	const NAME = 'Test';
	const ID = 'test';

	static function load() {

		\register_activation_hook( Test::$file, [ __CLASS__, 'activate' ] );
		\register_deactivation_hook( Test::$file, [ __CLASS__, 'deactivate' ] );

		static::add_hooks();
		static::add_shortcodes();
	}

	static function add_hooks() {

		$hooks = Test::list_classes( 'Hooks' );

		foreach ( $hooks as $hook ) {
			$hook::add();
		}
	}


	static function add_theme_features() {

		$theme_features = Test::load_config( 'theme_features' );

		if ( is_array( $theme_features ['post-thumbnails'] ) ) {

			$post_types = Test::list_classes( 'PostType' );

			foreach ( $post_types as $class_name => $class ) {
				$theme_features [ 'post-thumbnails' ] [] = $class::$name;
			}
		}

		foreach ( $theme_features as $feature => $args ) {
			\add_theme_support( $feature, $args );
		}
	}

	static function add_shortcodes() {

		$shortcodes = Test::list_classes( 'Shortcode' );

		foreach ( $shortcodes as $name => $class ) {
			\add_shortcode( strtolower( str_replace( 'Shortcode', '', $name ) ), [ $class, 'render' ] );
		}
	}


	static function register_post_types() {

		$post_types = Test::list_classes( 'PostType' );

		foreach ( $post_types as $name => $post_type ) {
			if ( ! \is_wp_error( $type = $post_type::register() ) ) {
				$post_type::load();
			}
		}
	}

	static function register_sidebars() {

		$sidebars = Test::list_classes( 'Sidebar' );

		foreach ( $sidebars as $sidebar ) {
			$sidebar::register();
		}
	}

	static function register_widgets() {

		$widgets = Test::list_classes( 'Widget' );

		foreach ( $widgets as $widget ) {
			$widget::register();
		}
	}


	static function enqueue_styles() {

		$handles = Test::load_config( 'styles' );

		foreach ( $handles as $handle => $src ) {

			\wp_register_style(
				$handle,
				stripos( $src, '//' ) === 0 ? $src : Test::$assets_url . 'styles/' . $src,
				[],
				NULL,
				'all'
			);

			\wp_enqueue_style( $handle );
		}
	}

	static function enqueue_scripts() {

		$handles = Test::load_config( 'scripts' );

		foreach ( $handles as $handle => $src ) {
			\wp_enqueue_script(
				$handle,
				stripos( $src, '//' ) === 0 ? $src : Test::$assets_url . 'scripts/' . $src,
				[],
				NULL,
				TRUE
			);
		}
	}


	static function activate() {

	}

	static function deactivate() {

	}
}