<?php
/**
 *
 * Here's a widget for the stock ticker
 *
 */
class SZ_Easy_Logo_Slider_Widget extends WP_Widget
{
	function SZ_Easy_Logo_Slider_Widget() {

		$widget_opts = array(
				'classname' => 'easy-logo-slider-widget',
				'description' => 'Easy Logo Slider Widget',
		);

		$this->WP_Widget('easy_logo_slider_widget', 'Easy Logo Slider Widget', $widget_opts);
	}

	function widget($args, $instance) {
		SZ_Easy_Logo_Slider::do_slider();
	}

	// updates the widget options when saved.
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
}

// Load and Register the widget
add_action('widgets_init', 'register_easy_logo_slider_widget');

function register_easy_logo_slider_widget() {
	register_widget( 'SZ_Easy_Logo_Slider_Widget' );
}

