<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="qodef-search-cover-form" method="get">
	<div class="qodef-m-inner">
		<h3 class="qodef-m-form-title"><?php echo esc_html__( 'What are you looking for?', 'dunker-core' ); ?></h3>
		<div class="qodef-m-form-fields">
			<input type="text" placeholder="<?php esc_attr_e( 'Type your search', 'dunker-core' ); ?>" name="s" class="qodef-m-form-field" autocomplete="off" required/>
				<?php
				dunker_core_get_opener_icon_html(
					array(
						'html_tag'     => 'button',
						'option_name'  => 'search',
						'custom_icon'  => 'search',
						'custom_class' => 'qodef-m-form-submit',
					)
				);
				?>
			<div class="qodef-m-form-line"></div>
		</div>
		<?php
		dunker_core_get_opener_icon_html(
			array(
				'option_name'  => 'search',
				'custom_icon'  => 'search',
				'custom_class' => 'qodef-m-close',
			),
			false,
			true
		);
		?>
	</div>
</form>
