<?php
$products = wc_get_products( array( 'posts_per_page' => - 1 ) );

$all_prices = array();

foreach ( $products as $product ) {
	$all_prices[] = $product->get_price();
}

$min_price = 0;
$max_price = ! empty( $all_prices ) ? max( $all_prices ) : 0;

$step = 10;
?>
<div class="qodef-grid-item qodef-simple-section">
	<div class="qodef-e-price-filter">
		<h5 class="qodef-e-filter-title"><?php esc_html_e( 'Price', 'dunker-core' ); ?></h5>
		<div class="qodef-e-options-wrapper">
			<div class="qodef-price-slider">
				<span class="qodef-min-max-price">
					<span class="qodef--min"><?php echo esc_html( $min_price ); ?></span>
					<span class="qodef--max"><?php echo esc_html( $max_price ); ?></span>
				</span>
			</div>
			<?php if ( 'sidebar' === $advanced_filter_type ) : ?>
			<div class="qodef-price-slider-placeholder">
				<div class="ui-slider-range"></div>
				<span class="ui-slider-handle"></span>
				<span class="ui-slider-handle"></span>
			</div>
			<button type="submit" class="qodef-button qodef-layout--filled qodef-size--small">
				<span class="qodef-m-text"><?php echo esc_html__( 'Filter', 'dunker-core' ); ?></span>
			</button>
			<?php endif; ?>
		</div>
		<div class="qodef-price-slider-amount" data-step="<?php echo esc_attr( $step ); ?>">
			<input type="text" id="min_price" name="min_price" value="<?php echo esc_attr( $min_price ); ?>" data-min="<?php echo esc_attr( $min_price ); ?>" placeholder="<?php echo esc_attr__( 'Min price', 'dunker-core' ); ?>"/>
			<input type="text" id="max_price" name="max_price" value="<?php echo esc_attr( $max_price ); ?>" data-max="<?php echo esc_attr( $max_price ); ?>" placeholder="<?php echo esc_attr__( 'Max price', 'dunker-core' ); ?>"/>
		</div>
	</div>
</div>
