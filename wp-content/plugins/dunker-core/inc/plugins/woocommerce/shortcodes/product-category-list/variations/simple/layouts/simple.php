<div <?php wc_product_cat_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-category-list', 'templates/post-info/title', '', $params ); ?>

		<div class="qodef-e-image">
			<a href="<?php echo get_term_link( $category_slug, $taxonomy ); ?>">
				<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-category-list', 'templates/post-info/image', '', $params ); ?>
			</a>
		</div>
	</div>
</div>
