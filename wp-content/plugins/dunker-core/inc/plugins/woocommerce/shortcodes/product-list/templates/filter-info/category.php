<?php if ( ! empty( $product_categories ) ) { ?>
<div class="qodef-filter-category qodef-filter-checkbox-type" data-type="category">
	<h5 class="qodef-e-filter-title qodef-e-expandable qodef--active"><?php esc_html_e( 'Category', 'dunker-core' ); ?></h5>
	<div class="qodef-e-options-wrapper qodef--active">
		<?php
		foreach ( $product_categories as $category ) {
			?>
			<div class="qodef-e-checkbox">
				<label for="<?php echo esc_attr( $category->slug ); ?>">
					<span class="qodef-e-label"><?php echo esc_html( $category->name ); ?></span>
				</label>
				<input type="checkbox" id="<?php echo esc_attr( $category->slug ); ?>" name="qodef-product-category" title="<?php echo esc_html( $category->name ); ?>" data-id="<?php echo esc_attr( $category->slug ); ?>" value="">
			</div>
		<?php } ?>
	</div>
</div>
	<?php
}
