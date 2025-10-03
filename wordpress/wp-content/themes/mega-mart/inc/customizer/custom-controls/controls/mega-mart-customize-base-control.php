<?php
/**
 * Customize Base control class. 
 *
 * @package Mega Mart
 *
 * @see     WP_Customize_Control
 * @access  public 
 */

/**
 * Class Mega_Mart_Customize_Base_Control
 */
class Mega_Mart_Customize_Base_Control extends WP_Customize_Control {

	/**
	 * Enqueue scripts all controls.
	 */
	public function enqueue() {

		wp_enqueue_script( 'select-script', MEGA_MART_PARENT_INC_URI . '/customizer/custom-controls/js/select.js', array( 'jquery' ), MEGA_MART_THEME_VERSION, true );
		wp_enqueue_style( 'select-style', MEGA_MART_PARENT_INC_URI . '/customizer/custom-controls/css/select.css', null, MEGA_MART_THEME_VERSION );

		// Main scripts.
		wp_enqueue_script(
			'mega-mart-controls',
			MEGA_MART_PARENT_INC_URI . '/customizer/custom-controls/js/controls.js',
			array(
				'jquery',
				'customize-base',
				'jquery-ui-button',
				'jquery-ui-sortable',
			),
			false,
			true
		);
	
		wp_enqueue_style( 'mega-mart-controls', MEGA_MART_PARENT_INC_URI . '/customizer/custom-controls/css/controls.css' );
		wp_enqueue_style( 'font-awesome', MEGA_MART_PARENT_URI . '/assets/css/all.min.css' );
	}


	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see    WP_Customize_Control::to_json()
	 * @access public
	 * @return void
	 */
	public function to_json() {

		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}

		$this->json['id']         = $this->id;
		$this->json['link']       = $this->get_link();
		$this->json['value']      = maybe_unserialize( $this->value() );
		$this->json['choices']    = $this->choices;
		$this->json['inputAttrs'] = '';

		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}
		$this->json['inputAttrs'] = maybe_serialize( $this->input_attrs() );

	}

	/**
	 * Render content is still called, so be sure to override it with an empty function in your subclass as well.
	 */
	protected function render_content() {
	}

	/**
	 * Renders the Underscore template for this control.
	 *
	 * @see    WP_Customize_Control::print_template()
	 * @access protected
	 * @return void
	 */
	protected function content_template() {
	}

	/**
	 * Returns an array of translation strings.
	 *
	 * @access protected
	 * @return array
	 */
	protected function l10n() {
		return array();
	}

}
