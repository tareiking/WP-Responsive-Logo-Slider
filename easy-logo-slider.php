<?php
/**
 * Plugin Name: Easy Logo logo_slider (Slicklogo_slider.js)
 * Plugin URI: http://www.sennza.com.au/
 * Description: Creates a responsive easy logo logo_slider
 * Version: 0.1
 * Author: Sennza Pty Ltd, Bronson Quick, Ryan McCue, Lachlan MacPherson, Tarei King
 * Author URI: http://www.sennza.com.au/
 */

if ( ! class_exists('SZ_Easy_Logo_Slider') ) {

/**
* SZ_Easy_Logo_logo_slider class
*/
class SZ_Easy_Logo_Slider
{

	private static $instance;

	/**
	 * Create a new instance of our class
	 *
	 * @return SZ_Easy_Logo_logo_slider
	 */

	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new SZ_Easy_Logo_Slider;
		}

		return self::$instance;
	}
	/**
	 * Setup our required CPT's and Scripts
	 */
	function __construct(){
		add_action( 'init', array ( $this, 'register_logo_slider' ) );
	}

	/**
	 * Register our logo custom post type and slider image sizes
	 * @return none
	 */
	public function register_logo_slider() {
		$labels = array(
			'name'               => _x( 'Logo', 'logo_slider' ),
			'singular_name'      => _x( 'Logo Slider', 'logo_slider' ),
			'add_new'            => _x( 'Add New', 'logo_slider' ),
			'add_new_item'       => _x( 'Add New Logo', 'logo_slider' ),
			'edit_item'          => _x( 'Edit Logo', 'logo_slider' ),
			'new_item'           => _x( 'New Logo', 'logo_slider' ),
			'view_item'          => _x( 'View Logo', 'logo_slider' ),
			'search_items'       => _x( 'Search Logo Sliders', 'logo_slider' ),
			'not_found'          => _x( 'No logo sliders found', 'logo_slider' ),
			'not_found_in_trash' => _x( 'No logo slides found in Trash', 'logo_slider' ),
			'parent_item_colon'  => _x( 'Parent Slide:', 'logo_slider' ),
			'menu_name'          => _x( 'Logo Sliders', 'logo_slider' ),
			'all_items'          => _x( 'All Logo Sliders', 'logo_slider' ),
		);

		$args = array(
			'labels'              => $labels,
			'hierarchical'        => false,
			'description'         => 'A custom post type to easily generate logo slideshows',
			'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-slides',
			'menu_position'       => 20,
			'show_in_nav_menus'   => false,
			'publicly_queryable'  => true,
			'exclude_from_search' => true,
			'has_archive'         => false,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-slides'
		);

		register_post_type( 'logo_slider', $args );

		add_image_size( 'logo_slider-thumb', 105, 40, true ); // Hardcropped thumbnails
		add_image_size( 'logo_slider-medium', 300, 9999, false ); // Not cropped medium thumbnails
	}
}

} // endif

SZ_Easy_Logo_Slider::get_instance();
