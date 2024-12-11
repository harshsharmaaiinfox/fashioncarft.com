<?php if ( ! empty( $product_brands ) ) { ?>
<div class="qodef-grid-item">
	<div class="qodef-filter-brands qodef-filter-checkbox-type" data-type="brand">
		<h5 class="qodef-e-filter-title qodef-e-expandable"><?php esc_html_e( 'Brand', 'dunker-core' ); ?></h5>
		<div class="qodef-e-options-wrapper">
			<?php
			foreach ( $product_brands as $product_brand ) {
				?>
				<div class="qodef-e-checkbox">
					<label for="<?php echo esc_attr( $product_brand->slug ); ?>">
						<span class="qodef-e-label"><?php echo esc_html( $product_brand->name ); ?></span>
					</label>
					<input type="checkbox" id="<?php echo esc_attr( $product_brand->slug ); ?>" name="qodef-product-brand" title="<?php echo esc_html( $product_brand->name ); ?>" data-id="<?php echo esc_attr( $product_brand->slug ); ?>" value="">
				</div>
			<?php } ?>
		</div>
	</div>
</div>
	<?php
}
