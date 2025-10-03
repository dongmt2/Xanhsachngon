<?php
/**
 * Mega Mart Theme Customizer.
 *
 * @package Mega Mart 
 */

 if ( ! class_exists( 'Mega_Mart_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Mega_Mart_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'admin_enqueue_scripts',array( $this, 'mega_mart_admin_script' ) ); 
			add_action( 'customize_preview_init',array( $this, 'mega_mart_customize_preview_js' ) );
			add_action( 'customize_register',    array( $this, 'mega_mart_customizer_register' ) );
			add_action( 'after_setup_theme',     array( $this, 'mega_mart_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function mega_mart_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';

			$wp_customize->register_control_type( 'Mega_Mart_Control_Sortable' );
			/**
			 * Helper files
			 */
			require MEGA_MART_PARENT_INC_DIR . '/customizer/customizer-controls.php';
			require MEGA_MART_PARENT_INC_DIR . '/customizer/sanitization.php';
		}
		
		
		/**
		 * Admin Script
		 */
		function mega_mart_admin_script() {
			wp_enqueue_style('mega-mart-admin-style', get_template_directory_uri() . '/inc/customizer/assets/css/admin.css');
			wp_enqueue_script( 'mega-mart-admin-script', MEGA_MART_PARENT_INC_URI . '/customizer/assets/js/admin-script.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'mega-mart-customizer-section-script', MEGA_MART_PARENT_INC_URI . '/customizer/assets/js/customizer-section.js', array( 'jquery' ), '', true );
			wp_localize_script( 'mega-mart-admin-script', 'mega_mart_ajax_object',
				array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
			);
		}
		
		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function mega_mart_customize_preview_js() {
			wp_enqueue_script( 'mega-mart-customizer', MEGA_MART_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}

		// Include customizer customizer settings.
			
		function mega_mart_customizer_settings() {
			require MEGA_MART_PARENT_INC_DIR . '/customizer/customizer-options/mega-mart-header.php';
			require MEGA_MART_PARENT_INC_DIR . '/customizer/customizer-options/mega-mart-footer.php';
			require MEGA_MART_PARENT_INC_DIR . '/customizer/customizer-options/mega-mart-blog.php';
			require MEGA_MART_PARENT_INC_DIR . '/customizer/customizer-options/mega-mart-general.php';
			require MEGA_MART_PARENT_INC_DIR . '/customizer/customizer-options/mega_mart_recommended_plugin.php';
			require MEGA_MART_PARENT_INC_DIR . '/customizer/customizer-options/mega-mart-pro.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Mega_Mart_Customizer::get_instance();