<?php

namespace Aisconverse\PostType;


abstract class BasePostType {

	const ARGS = [

		'capability_type' => 'post',

		'supports' => [
			'custom-fields',
			'title',
			'editor',
			'page-attributes',
			'thumbnail',
			'comments'
		],

		'hierarchical' => TRUE,
		'public'       => TRUE,

		'show_ui'           => TRUE,
		'show_in_rest'      => FALSE,
		'show_in_menu'      => TRUE,
		'show_in_nav_menus' => TRUE,
		'show_in_admin_bar' => TRUE,

		'can_export'  => TRUE,
		'has_archive' => TRUE,

		'exclude_from_search' => FALSE,
		'publicly_queryable'  => TRUE
	];

	static function load() {

	}


	static function register() {

		\register_post_type( static::$name, static::args() );
	}
}