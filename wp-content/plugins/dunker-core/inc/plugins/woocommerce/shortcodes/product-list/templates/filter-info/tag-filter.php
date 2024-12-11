<?php if ( ! empty( $product_tags ) ) { ?>
<div class="qodef-tag-holder">
	<div class="qodef-filter-tag-singular qodef-filter-links" data-type="tag">
		<div class="qodef-e-options-wrapper">
			<?php
			foreach ( $product_tags as $tag ) {
				$filter_value = is_numeric( $tag->slug ) ? $tag->term_id : $tag->slug;
				?>
				<div class="qodef-m-filter-item-holder">
					<a class="qodef-m-filter-link" href="#" data-taxonomy="product_tag" data-filter="<?php echo esc_attr( $filter_value ); ?>">
						<span class="qodef-m-tag-name"><?php echo esc_html( $tag->name ); ?></span>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
	<?php
}
