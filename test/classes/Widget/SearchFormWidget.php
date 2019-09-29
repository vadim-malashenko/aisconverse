<?php

namespace Aisconverse\Widget;


class SearchFormWidget extends \WP_Widget {


	public static function register() {

		\register_widget( __CLASS__ );
	}

	public function __construct() {

		$widget_ops = [
			'classname'                   => 'search-form',
			'description'                 => __( 'Search form' ),
			'customize_selective_refresh' => TRUE
		];

		\WP_Widget::__construct( 'lsearch-form', 'Search form', $widget_ops );
	}

	public function widget( $args, $instance ) {

		echo $args ['before_widget'];

		?>

        <form class="search_form">

            <input name="search" placeholder="Search">

        </form>

		<?php

		echo $args ['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {

		return $new_instance;
	}

	public function form( $instance ) {


	}
}