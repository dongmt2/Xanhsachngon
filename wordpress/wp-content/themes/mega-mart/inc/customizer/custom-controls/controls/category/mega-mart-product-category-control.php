<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * A class to create a dropdown for all categories in your WordPress site
 */
 class Mega_Mart_Product_Category_Control extends WP_Customize_Control
 {
    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
		
		$this->cats = get_terms( array(
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
		) );
		
        // $this->cats = get_terms('product_cat');

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content() {
		if (!empty($this->cats)) {
			$values = $this->value(); // current setting value (should be an array)
			if (!is_array($values)) {
				$values = explode(',', $values); // fallback in case it's a comma-separated string
			}
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
				<select multiple <?php $this->link(); ?>>
					<?php foreach ($this->cats as $cat) : 
						$is_selected = in_array($cat->slug, $values);
					?>
						<option value="<?php echo esc_attr($cat->slug); ?>" <?php selected($is_selected, true); ?>>
							<?php echo esc_html($cat->name); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</label>
			<?php
		}
	}

 }
?>