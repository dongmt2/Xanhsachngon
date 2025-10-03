<?php
/* Notifications in customizer */
require get_template_directory() . '/inc/customizer/customizer-notify.php';
$mega_mart_config_customizer = array(
	'recommended_plugins'       => array(
		'woocommerce' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>WooCommerce</strong> plugin for taking full advantage of all the features this theme has to offer.', 'mega-mart')),
		),
		'ecommerce-companion' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>eCommerce Companion</strong> plugin for taking full advantage of all the features this theme has to offer.', 'mega-mart')),
		)
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'mega-mart' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'mega-mart' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'mega-mart' ),
	'activate_button_label'     => esc_html__( 'Activate', 'mega-mart' ),
	'mega_mart_deactivate_button_label'   => esc_html__( 'Deactivate', 'mega-mart' ),
);
Mega_Mart_Customizer_Notify::init( apply_filters( 'mega_mart_customizer_notify_array', $mega_mart_config_customizer ) );



class mega_mart_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof mega_mart_import_dummy_data ) ) {
			self::$instance = new mega_mart_import_dummy_data;
			self::$instance->mega_mart_setup_actions();
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	

	/**
	 * Setup the actions used for this class.
	 */
	public function mega_mart_setup_actions() {

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'mega_mart_import_customize_scripts' ), 0 );

	}
	
	

	public function mega_mart_import_customize_scripts() {

	wp_enqueue_script( 'mega-mart-import-customizer-js', get_template_directory_uri() . '/inc/customizer/assets/js/import-customizer.js', array( 'customize-controls' ) );
	}
}

$mega_mart_import_customizers = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
mega_mart_import_dummy_data::init( apply_filters( 'mega_mart_import_customizer', $mega_mart_import_customizers ) );