<article <?php post_class('archive-article'); ?>>                   
        <div class="post-item row">
            <div class="news-thumb col-md-12">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( 'popularis-ecommerce-img' ); ?>
                </a>
            </div>
			<div class="news-text-wrap col-md-12">
				<?php popularis_ecommerce_entry_footer( 'cats' ) ?>    
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
				<span class="posted-date">
					<?php echo esc_html( get_the_date() ); ?>
				</span>
				<?php popularis_ecommerce_author_meta(); ?>
				<div class="post-excerpt">
					<?php the_excerpt(); ?>
				</div>
			</div>

		</div>
</article>
