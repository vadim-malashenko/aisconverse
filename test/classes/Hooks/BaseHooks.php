<?php

namespace Aisconverse\Hooks;


abstract class BaseHooks {


	const HOOKS = [];


	static function add() {

		try {

			$class    = new \ReflectionClass ( static::class );
			$methods  = $class->getMethods( \ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_STATIC );
			$_methods = [];

			foreach ( $methods as $method ) {
				if ( strpos( $method->name, '_' ) !== 0 ) {
					static::hook( $method );
				} else {
					$_methods [ $method->name ] = $method;
				}
			}

			foreach ( static::HOOKS as $tag ) {
				static::hook( $_methods [ '_' . preg_replace( '#[^a-z0-9_]#i', '_', $tag ) ], $tag );
			}
		} catch ( \ReflectionException $ex ) {
		} catch ( \Exception $ex ) {
		}

	}

	static function hook( \ReflectionMethod $method, string $tag = NULL ) {

		if ( preg_match( '#ActionHooks$#', static::class ) ) {
			$hook = '\\add_action';
		} elseif ( preg_match( '#FilterHooks$#', static::class ) ) {
			$hook = '\\add_filter';
		} else {
			return;
		}

		$tag      = ( $tag === NULL ) ? $method->name : $tag;
		$priority = 10;
		$matches  = [];

		if ( preg_match( '#_(\d+)$#', $method->name, $matches ) ) {

			$priority = intval( $matches [1] );
			$tag      = preg_replace( "#_{$priority}$#", '', $method->name );
		}

		if ( ! ( $accepted_args = $method->getNumberOfParameters() ) ) {
			$hook ( $tag, [ static::class, $method->name ], $priority );
		} else {
			$hook ( $tag, [ static::class, $method->name ], $priority, $accepted_args );
		}
	}
}