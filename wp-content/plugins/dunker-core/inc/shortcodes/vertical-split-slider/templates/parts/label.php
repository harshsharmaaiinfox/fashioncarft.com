<?php if ( ! empty( $item['slide_content_label'] ) ) : ?>
	<div class="qodef-m-label-holder">
		<div class="qodef-m-label">
			<div class="qodef-m-label-counter">
				<?php echo esc_html( str_pad( $count, 2, '0', STR_PAD_LEFT ) ); ?>
			</div>
			<div class="qodef-m-label-text">
				<?php echo esc_html( $item['slide_content_label'] ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>
