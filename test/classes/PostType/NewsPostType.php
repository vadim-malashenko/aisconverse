<?php

namespace Aisconverse\PostType;


class NewsPostType extends BasePostType {


	static $name = 'news';

	static function args() : array {

		return array_merge( static::ARGS, [

			'label'  => __( 'News' ),
			'labels' => [
				'name'                  => __( 'News' ),
				'singular_name'         => __( 'News' ),
				'menu_name'             => __( 'News' ),
				'name_admin_bar'        => __( 'News' ),
				'add_new'               => __( 'Add New' ),
				'add_new_item'          => __( 'Add New News' ),
				'edit_item'             => __( 'Edit News' ),
				'new_item'              => __( 'New News' ),
				'view_item'             => __( 'View News' ),
				'view_items'            => __( 'View News' ),
				'search_items'          => __( 'Search News' ),
				'not_found'             => __( 'No News found' ),
				'not_found_in_trash'    => __( 'No News found in Trash' ),
				'parent_item_colon'     => '',
				'all_items'             => __( 'All News' ),
				'archives'              => __( 'News Archives' ),
				'attributes'            => __( 'News Attributes' ),
				'uploaded_to_this_item' => __( 'Uploaded to this News' )
			],

			'supports' => [
				'title',
				'editor',
				'thumbnail',
				'comments'
			],

			'menu_position' => 110,
			'menu_icon'     => 'dashicons-format-gallery',

			'hierarchical' => FALSE,

			'rewrite' => [
				'slug'       => 'news',
				'with_front' => TRUE,
				'pages'      => FALSE,
				'feeds'      => FALSE
			]
		] );
	}
}