<div class="main-mobile-nav sticky-nav <?php echo mega_mart_sticky_menu(); ?>">
	<div class="container">
		<div class="row">
			<div class="col-12 p-0"> 
				<div class="main-mobile-menu navbar-area">
					<div class="main-menu-right main-mobile-left">
						<div class="logo">
						   <?php do_action('mega_mart_logo'); ?>
						</div>
					</div>
					<div class="main-mobile-right">
						<?php do_action('mega_mart_hdr_account');  ?>
					</div>
				</div>
			</div>
			<div class="col-12">
			<?php 
				$hs_product_search	= get_theme_mod( 'hs_product_search','1');
				if($hs_product_search=='1'){ ?>
				<div class="header-search-form">
				<?php	
					do_action('mega_mart_hdr_product_search'); ?> 	
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>