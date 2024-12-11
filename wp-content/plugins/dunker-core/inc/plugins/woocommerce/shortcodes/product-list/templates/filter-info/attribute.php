<?php if ( ! empty( $attribute_filter ) ) {
	$attributes     = get_terms( 'pa_' . $attribute_filter );
	$attribute_id   = wc_attribute_taxonomy_id_by_name( 'pa_' . $attribute_filter );
	$attribute_ob   = wc_get_attribute( $attribute_id );
	$attribute_type = $attribute_ob->type;
	?>
	<div class="qodef-grid-item">
		<div class="qodef-filter-attribute qodef-filter-checkbox-type" data-type="<?php echo esc_attr( $attribute_filter ); ?>">
			<h5 class="qodef-e-filter-title qodef-e-expandable"><?php echo esc_html( ucfirst( $attribute_filter ) ); ?></h5>
			<div class="qodef-e-options-wrapper">
				<?php
				foreach ( $attributes as $attribute ) {
					$attribute_meta  = get_term_meta( $attribute->term_id, '_yith_wccl_value' );
					$attribute_color = 'colorpicker' === $attribute_type && $attribute_meta ? $attribute_meta[0] : '';
					$attribute_label = 'label' === $attribute_type && $attribute_meta ? $attribute_meta[0] : '';
					$attribute_name  = ! empty( $attribute_label ) ? $attribute_label : $attribute->name;
					?>
					<div class="qodef-e-checkbox">
						<label for="<?php echo esc_attr( $attribute->slug ); ?>">
							<?php if ( ( qode_framework_is_installed( 'yith-color-and-label-variations' ) || is_plugin_active( 'yith-woocommerce-color-label-variations-premium' ) ) && ! empty( $attribute_color ) ) { ?>
								<span class="qodef-color-holder">
									<span class="qodef-e-color" style="background-color: <?php echo esc_attr( $attribute_color ); ?>"></span>
								</span>
							<?php } ?>
							<span class="qodef-e-label">
								<?php echo esc_html( $attribute_name ); ?>
							</span>
						</label>
						<input type="checkbox" id="<?php echo esc_attr( $attribute->slug ); ?>" name="qodef-product-attribute" title="<?php echo esc_html( $attribute->name ); ?>" data-id="<?php echo esc_attr( $attribute->slug ); ?>" data-type="<?php echo esc_attr( $attribute_filter ); ?>" value="">
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php
}
?>
