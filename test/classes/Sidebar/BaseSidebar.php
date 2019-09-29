<?php

namespace Aisconverse\Sidebar;


abstract class BaseSidebar {

	static $id = '';
	static $name = '';
	static $desc = '';
	static $class = '';
	static $before_widget = '';
	static $after_widget = '';
	static $before_title = '';
	static $after_title = '';

	static function register() {

		static::$id    = preg_replace( '#[^a-z0-9-]+#', '', preg_replace( '#[\\\]+#', '-', strtolower( static::class ) ) );
		static::$name  = str_replace( '\\Sidebar\\', ' ', static::class );
		static::$class = preg_replace( '#-[^-]+$#', '', static::$id );

		\register_sidebar( [
			'name'          => static::$name,
			'id'            => static::$id,
			'description'   => static::$desc,
			'class'         => static::$class,
			'before_widget' => static::$before_widget,
			'after_widget'  => static::$after_widget,
			'before_title'  => static::$before_title,
			'after_title'   => static::$after_title
		] );
	}

	static function is_active() {

		return \is_active_sidebar( static::$id );
	}

	static function render() {

		\dynamic_sidebar( static::$id );
	}

	static function render_if_active() {

		if ( \is_active_sidebar( static::$id ) ) {
			\dynamic_sidebar( static::$id );
		}
	}
}