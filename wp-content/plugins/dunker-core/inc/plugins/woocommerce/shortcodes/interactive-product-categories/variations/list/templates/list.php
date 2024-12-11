<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-grid-inner">
		<?php foreach ( $items as $item ) { ?>

			<div class="qodef-e qodef-grid-item">
				<div class="qodef-e-inner">

					<div class="qodef-e-title-wrapper">
						<<?php echo esc_attr( $title_tag ); ?> class="qodef-e-title">
							<a itemprop="url" href=<?php echo get_term_link( $item -> slug, 'product_cat' ); ?>  target="<?php echo esc_attr( $link_target ); ?>">
								<?php echo esc_html( $item -> name ); ?>
							</a>
						</<?php echo esc_attr( $title_tag ); ?>>

						<div class="qodef-e-count">
							<?php echo '(' . esc_html( $item -> count ) . ')' ; ?>
						</div>

						<div class="qodef-e-image">
							<a itemprop="url" href=<?php echo get_term_link( $item -> slug, 'product_cat' ); ?> target="<?php echo esc_attr( $link_target ); ?>">
								<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/interactive-product-categories', 'templates/post-info/image', '', $item ); ?>
							</a>
						</div>
					</div>

				<div class="qodef-e-brands">
					<span>
						<?php
						$brands = $this_shortcode->get_secondary_taxonomy_terms( $item -> term_id, $params );
						foreach ( $brands as $brand ) { ?>

							<a href="<?php echo esc_url( get_term_link( $brand -> term_id )) ?>">
								<?php echo esc_html( $brand -> name ); ?>
							</a>
						<?php
						}
						?>
					</span>
				</div>

				<div class="qodef-e-button">
					<a class="qodef-button" itemprop="url" href=<?php echo get_term_link( $item -> slug, 'product_cat' ); ?>  target="<?php echo esc_attr( $link_target ); ?>">
						<?php echo dunker_core_get_svg_icon('slider-arrow-right'); ?>
					</a>
				</div>
			</div>
			</div>

		<?php } ?>
	</div>
</div>
