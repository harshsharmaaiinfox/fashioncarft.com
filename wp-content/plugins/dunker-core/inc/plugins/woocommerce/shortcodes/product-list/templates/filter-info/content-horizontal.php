<div class="qodef-product-list-filter-horizontal">
	<div class="qodef-filter-items-wrapper qodef-content-grid">
		<div class="qodef-filter-actions">
			<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/active-filters', '', $params ); ?>
			<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/close-filter', '', $params ); ?>
		</div>
		<div class="qodef-filter-items">
			<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/price', '', $params ); ?>
			<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/brand', '', $params ); ?>
			<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/attribute', '', array( 'attribute_filter' => $first_attribute_filter ) ); ?>
			<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/attribute', '', array( 'attribute_filter' => $second_attribute_filter ) ); ?>
		</div>
	</div>
</div>
