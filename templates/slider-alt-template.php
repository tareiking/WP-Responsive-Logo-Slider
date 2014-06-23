<?php
/**
 * Alternative Logo Slider Template:
 * Displays as a 3 x 3 grid
 */
$defaults  = array(
	'post_type'       => 'logo_slider',
	'posts_per_page'  => -1,
);
$slides_per_row = 3;
$counter = 0;
$slider_items = new WP_Query( $defaults );

if ( $slider_items->have_posts() ): ?>

	<div class="slider responsive">

			<?php while ( $slider_items->have_posts() ) : $slider_items->the_post(); ?>

				<?php if ( $counter % $slides_per_row == 0 ) : ?>
					<div class="slider-row">
				<?php endif ?>

					<?php if ( has_post_thumbnail() ): ?>
						<?php the_post_thumbnail( 'logo_slider-thumb' ); ?>
					<?php endif; ?>
				<?php $counter++; ?>

				<?php if ( $counter % $slides_per_row == 0 ) : ?>
					</div>
				<?php endif ?>

			<?php endwhile; ?>
	</div>

<?php else: ?>
	<p>There aren't any sliders.</p>
<?php endif; ?>
<?php wp_reset_query(); ?>