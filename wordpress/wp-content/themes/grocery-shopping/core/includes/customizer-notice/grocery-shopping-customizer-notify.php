<?php

class Grocery_Shopping_Customizer_Notify {

	private $config = array(); // Declare $config property
	
	private $grocery_shopping_recommended_actions;
	
	private $recommended_plugins;
	
	private static $instance;
	
	private $grocery_shopping_recommended_actions_title;
	
	private $grocery_shopping_recommended_plugins_title;
	
	private $dismiss_button;
	
	private $grocery_shopping_install_button_label;
	
	private $grocery_shopping_activate_button_label;
	
	private $grocery_shopping_deactivate_button_label;

	
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Grocery_Shopping_Customizer_Notify ) ) {
			self::$instance = new Grocery_Shopping_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	
	public function setup_config() {

		global $grocery_shopping_customizer_notify_recommended_plugins;
		global $grocery_shopping_customizer_notify_grocery_shopping_recommended_actions;

		global $grocery_shopping_install_button_label;
		global $grocery_shopping_activate_button_label;
		global $grocery_shopping_deactivate_button_label;

		$this->grocery_shopping_recommended_actions = isset( $this->config['grocery_shopping_recommended_actions'] ) ? $this->config['grocery_shopping_recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->grocery_shopping_recommended_actions_title = isset( $this->config['grocery_shopping_recommended_actions_title'] ) ? $this->config['grocery_shopping_recommended_actions_title'] : '';
		$this->grocery_shopping_recommended_plugins_title = isset( $this->config['grocery_shopping_recommended_plugins_title'] ) ? $this->config['grocery_shopping_recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$grocery_shopping_customizer_notify_recommended_plugins = array();
		$grocery_shopping_customizer_notify_grocery_shopping_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$grocery_shopping_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->grocery_shopping_recommended_actions ) ) {
			$grocery_shopping_customizer_notify_grocery_shopping_recommended_actions = $this->grocery_shopping_recommended_actions;
		}

		$grocery_shopping_install_button_label    = isset( $this->config['grocery_shopping_install_button_label'] ) ? $this->config['grocery_shopping_install_button_label'] : '';
		$grocery_shopping_activate_button_label   = isset( $this->config['grocery_shopping_activate_button_label'] ) ? $this->config['grocery_shopping_activate_button_label'] : '';
		$grocery_shopping_deactivate_button_label = isset( $this->config['grocery_shopping_deactivate_button_label'] ) ? $this->config['grocery_shopping_deactivate_button_label'] : '';

	}

	
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'grocery_shopping_plugin_notification_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'grocery_shopping_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_quality_customizer_notify_dismiss_action', array( $this, 'grocery_shopping_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_ti_customizer_notify_dismiss_recommended_plugins', array( $this, 'grocery_shopping_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	
	public function grocery_shopping_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'grocery-shopping-customizer-notify-css', get_template_directory_uri() . '/core/includes/customizer-notice/css/grocery-shopping-customizer-notify.css', array());

		wp_enqueue_style( 'plugin-install' );
		wp_enqueue_script( 'plugin-install' );
		wp_add_inline_script( 'plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'updates' );

		wp_enqueue_script( 'grocery-shopping-customizer-notify-js', get_template_directory_uri() . '/core/includes/customizer-notice/js/grocery-shopping-customizer-notify.js', array( 'customize-controls' ));
		wp_localize_script(
			'grocery-shopping-customizer-notify-js', 'groceryshoppingCustomizercompanionObject', array(
				'ajaxurl'            => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'base_path'          => admin_url(),
				'activating_string'  => __( 'Activating', 'grocery-shopping' ),
			)
		);

	}

	
	public function grocery_shopping_plugin_notification_customize_register( $wp_customize ) {

		
		require_once get_template_directory() . '/core/includes/customizer-notice/grocery-shopping-customizer-notify-section.php';

		$wp_customize->register_section_type( 'Grocery_Shopping_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new Grocery_Shopping_Customizer_Notify_Section(
				$wp_customize,
				'grocery-shopping-customizer-notify-section',
				array(
					'title'          => $this->grocery_shopping_recommended_actions_title,
					'plugin_text'    => $this->grocery_shopping_recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	
	public function grocery_shopping_customizer_notify_dismiss_recommended_action_callback() {

		global $grocery_shopping_customizer_notify_grocery_shopping_recommended_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html( $action_id ); /* this is needed and it's the id of the dismissable required action */ 

		if ( ! empty( $action_id ) ) {
			
			if ( get_option( 'grocery_shopping_customizer_notify_show' ) ) {

				$grocery_shopping_customizer_notify_show_grocery_shopping_recommended_actions = get_option( 'grocery_shopping_customizer_notify_show' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$grocery_shopping_customizer_notify_show_grocery_shopping_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$grocery_shopping_customizer_notify_show_grocery_shopping_recommended_actions[ $action_id ] = false;
						break;
				}
				update_option( 'grocery_shopping_customizer_notify_show', $grocery_shopping_customizer_notify_show_grocery_shopping_recommended_actions );

				
			} else {
				$grocery_shopping_customizer_notify_show_grocery_shopping_recommended_actions = array();
				if ( ! empty( $grocery_shopping_customizer_notify_grocery_shopping_recommended_actions ) ) {
					foreach ( $grocery_shopping_customizer_notify_grocery_shopping_recommended_actions as $grocery_shopping_lite_customizer_notify_recommended_action ) {
						if ( $grocery_shopping_lite_customizer_notify_recommended_action['id'] == $action_id ) {
							$grocery_shopping_customizer_notify_show_grocery_shopping_recommended_actions[ $grocery_shopping_lite_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$grocery_shopping_customizer_notify_show_grocery_shopping_recommended_actions[ $grocery_shopping_lite_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					update_option( 'grocery_shopping_customizer_notify_show', $grocery_shopping_customizer_notify_show_grocery_shopping_recommended_actions );
				}
			}
		}
		die(); 
	}

	
	public function grocery_shopping_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html( $action_id ); /* this is needed and it's the id of the dismissable required action */

		if ( ! empty( $action_id ) ) {

			$grocery_shopping_lite_customizer_notify_show_recommended_plugins = get_option( 'grocery_shopping_customizer_notify_show_recommended_plugins' );

			switch ( $_GET['todo'] ) {
				case 'add':
					$grocery_shopping_lite_customizer_notify_show_recommended_plugins[ $action_id ] = false;
					break;
				case 'dismiss':
					$grocery_shopping_lite_customizer_notify_show_recommended_plugins[ $action_id ] = true;
					break;
			}
			update_option( 'grocery_shopping_customizer_notify_show_recommended_plugins', $grocery_shopping_lite_customizer_notify_show_recommended_plugins );
		}
		die(); 
	}

}
