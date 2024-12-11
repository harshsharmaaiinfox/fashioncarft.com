<div class="qodef-product-list-filter-vertical">
	<div class="qodef-filter-items-wrapper">
		<div class="qodef-filter-items">
			<div class="qodef-grid-item">
				<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/category', '', $params ); ?>
			</div>
			<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/brand', '', $params ); ?>
			<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/attribute', '', array( 'attribute_filter' => $first_attribute_filter ) ); ?>
			<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/attribute', '', array( 'attribute_filter' => $second_attribute_filter ) ); ?>
			<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/price', '', $params ); ?>
		</div>
	</div>
</div>
