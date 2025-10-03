<?php
get_header();
?>

<div class="row">
    <div class="col-md-<?php popularis_ecommerce_main_content_width_columns(); ?>">
        <div class="main-content-page">
            <div class="error-template text-center">
                <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'popularis-ecommerce' ); ?></h1>
                <p class="error-details">
					<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'popularis-ecommerce' ); ?>
                </p>
                <div class="error-actions">
					<?php get_search_form(); ?>    
                </div>
            </div>
        </div>
    </div>

	<?php get_sidebar( 'sidebar-1' ); ?>

</div>

<?php
get_footer();
