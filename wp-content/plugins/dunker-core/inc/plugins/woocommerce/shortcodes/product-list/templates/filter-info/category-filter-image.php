 <?php if ( ! empty( $product_categories ) ) { ?>
<div class="qodef-category-holder">
	<span class="qodef-m-category-filter-tagline"><?php esc_html_e( 'Explore by categories', 'dunker-core' ); ?></span>
	<div class="qodef-filter-category-singular qodef-filter-links" data-type="category">
		<div class="qodef-e-options-wrapper qodef-h1">
			<?php
			foreach ( $product_categories as $category ) {
				$filter_value = is_numeric( $category->slug ) ? $category->term_id : $category->slug;
				?>
				<a class="qodef-m-filter-item" href="#" data-taxonomy="product_cat" data-filter="<?php echo esc_attr( $filter_value ); ?>">
					<?php
					$params['category'] = $category;
					dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/category-image', '', $params );
					?>
					<span class="qodef-m-category-name">
						<?php echo esc_html( $category->name ); ?>
						<span class="qodef-m-category-count">(<?php echo esc_html( $category->count ); ?>)</span>
					</span>
				</a>
			<?php } ?>
		</div>
	</div>
</div>
	<?php
}
