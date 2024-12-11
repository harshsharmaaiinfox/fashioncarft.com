<?php
$data                     = array();
$data['slidesPerView']    = 'auto';
$data['spaceBetween']     = 124;
$data['spaceBetween1024'] = 76;
$data['autoplay']         = false;
$data['sliderScroll']     = true;

if ( ! empty( $product_categories ) ) { ?>
<div class="qodef-category-holder">
	<div class="qodef-filter-category-singular qodef-filter-links qodef-swiper-container" data-type="category" <?php echo qode_framework_get_inline_attr( json_encode( $data ), 'data-options' ); ?>>
		<div class="qodef-e-options-wrapper swiper-wrapper">
			<?php
			foreach ( $product_categories as $category ) {
				$filter_value = is_numeric( $category->slug ) ? $category->term_id : $category->slug;
				?>
				<div class="qodef-m-filter-item-holder swiper-slide">
					<div class="qodef-m-filter-item-info">
						<?php echo esc_html( $category->count ) . ' ' . esc_html__( 'Products', 'dunker' ); ?>
						<span class="qodef-info-separator-single"></span>
						<a class="qodef-m-filter-category" href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>"><?php esc_html_e( 'View All', 'dunker' ); ?></a>
					</div>
					<a class="qodef-m-filter-item" href="#" data-taxonomy="product_cat" data-filter="<?php echo esc_attr( $filter_value ); ?>">
						<h1 class="qodef-m-category-name"><?php echo esc_html( $category->name ); ?></h1>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
	<?php
}
