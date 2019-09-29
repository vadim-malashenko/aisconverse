<?php

return [
	'post-thumbnails'      => [
		'post'
	],
	'post-formats'         => [
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'audio',
		'video',
		'chat'
	],
	'custom-logo'          => [
		'width'       => NULL,
		'height'      => NULL,
		'flex-width'  => FALSE,
		'flex-height' => FALSE,
		'header-text' => ''
	],
	'custom-header'        => [
		'default-image'          => '',
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => FALSE,
		'flex-width'             => FALSE,
		'uploads'                => TRUE,
		'random-default'         => FALSE,
		'header-text'            => TRUE,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
		'video'                  => FALSE,
		'video-active-callback'  => 'is_front_page'
	],
	'custom-background'    => [
		'default-color'          => '',
		'default-image'          => '',
		'default-preset'         => 'default',
		'default-repeat'         => 'repeat',
		'default-position-x'     => 'left',
		'default-position-y'     => 'top',
		'default-size'           => 'auto',
		'default-attachment'     => 'scroll',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	],
	'html5'                => [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	],
	'menus'                => TRUE,
	'automatic-feed-links' => TRUE,
	'editor-style'         => TRUE,
	'widgets'              => TRUE
];