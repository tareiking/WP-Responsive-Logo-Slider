<?php
/**
 * Plugin Name: Easy Logo Slider (using slickslider.js)
 * Plugin URI: http://www.sennza.com.au/
 * Description: Creates a responsive logo slider
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
		add_action( 'wp_enqueue_scripts', array( $this, 'logo_slider_scripts' ) );
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

	/**
	 * Enqueue slider scripts if on frontend
	 */
	function logo_slider_scripts(){
		if ( ! is_admin() ):
			wp_enqueue_script( 'slick-slider', plugins_url( '/assets/js/slick.min.js', __FILE__ ), array( 'jquery' ), '1.3.6', true );
			wp_enqueue_script( 'logo-slider-js', plugins_url( 'assets/js/logo.slider.js', __FILE__ ), array(
					'slick-slider',
				), '1.0', true );
			wp_enqueue_style( 'logo-slider-styles', plugins_url( '/assets/css/slick.css', __FILE__ ), array(), 1.0 );
		endif;
	}
	/**
	 * Gets the slider and returns it as a template
	 * @return mixed, template file
	 */
	public static function do_slider() {
		$plugindir        = dirname( __FILE__ );
		$templatefilename = 'slider-template.php';
		if ( file_exists( TEMPLATEPATH . '/' . $templatefilename ) ) {
			$return_template = TEMPLATEPATH . '/' . $templatefilename;
			require_once( $return_template );
		} else {
			$return_template = $plugindir . '/templates/' . $templatefilename;
			require_once( $return_template );
		}
	}
}

} // endif
require_once( plugin_dir_path( __FILE__ ) . '/easy-logo-slider-widget.php' );

SZ_Easy_Logo_Slider::get_instance();
