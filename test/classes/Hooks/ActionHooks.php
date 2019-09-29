<?php

namespace Aisconverse\Hooks;


class ActionHooks extends BaseHooks {


	static function init() {

		\Aisconverse\Theme::register_post_types();
	}


	static function after_setup_theme() {

		\Aisconverse\Theme::add_theme_features();
	}


	static function wp_enqueue_scripts() {

		\Aisconverse\Theme::enqueue_styles();
		\Aisconverse\Theme::enqueue_scripts();
	}


	static function widgets_init() {

		\Aisconverse\Theme::register_sidebars();
		\Aisconverse\Theme::register_widgets();
	}
}