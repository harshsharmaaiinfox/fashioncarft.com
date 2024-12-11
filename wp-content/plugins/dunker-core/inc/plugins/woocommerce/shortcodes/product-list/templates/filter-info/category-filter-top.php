<?php if ( ! empty( $product_categories ) ) { ?>
	<div class="qodef-category-holder">
		<a class="qodef-m-categories-mobile-opener" href="javascript:void(0)">
			<span class="qodef-m-text"><?php esc_html_e( 'Categories', 'dunker' ); ?></span>
			<span class="qodef-m-icon"></span>
		</a>
		<div class="qodef-filter-category-singular qodef-filter-links" data-type="category">
			<ul class="qodef-e-options-wrapper">
				<li class="qodef-m-filter-item-holder qodef-m-filter-all qodef--active">
					<a class="qodef-m-filter-link" href="#" data-taxonomy="product_cat" data-filter="*">
						<span class="qodef-m-category-name"><?php esc_html_e( 'All', 'dunker' ); ?></span>
					</a>
				</li>
				<?php
				foreach ( $product_categories as $category ) {
					$filter_value = is_numeric( $category->slug ) ? $category->term_id : $category->slug;
					?>
					<li class="qodef-m-filter-item-holder">
						<a class="qodef-m-filter-link" href="#" data-taxonomy="product_cat" data-filter="<?php echo esc_attr( $filter_value ); ?>">
							<span class="qodef-m-category-name"><?php echo esc_html( $category->name ); ?></span>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<?php
}
