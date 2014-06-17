<?php
$defaults  = array(
	'post_type'       => 'logo_slider',
	'posts_per_page'  => -1,
);

// $args = wp_parse_args( $args, $defaults );
$slider_items = new WP_Query( $defaults );

if ( $slider_items->have_posts() ): ?>

	<div class="slider responsive">
		<?php while ( $slider_items->have_posts() ) : $slider_items->the_post(); ?>
			<?php if ( has_post_thumbnail() ): ?>
				<div>
					<?php the_post_thumbnail( 'logo_slider-thumb' ); ?>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
	</div>

<?php else: ?>
	<p>There aren't any sliders.</p>
<?php endif; ?>
<?php wp_reset_query(); ?>