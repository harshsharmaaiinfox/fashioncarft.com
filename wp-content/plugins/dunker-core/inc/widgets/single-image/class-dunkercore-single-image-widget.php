<?php

if ( ! function_exists( 'dunker_core_add_single_image_widget' ) ) {
	/**
	 * function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function dunker_core_add_single_image_widget( $widgets ) {
		$widgets[] = 'DunkerCore_Single_Image_Widget';

		return $widgets;
	}

	add_filter( 'dunker_core_filter_register_widgets', 'dunker_core_add_single_image_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class DunkerCore_Single_Image_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_base( 'dunker_core_single_image' );
			$this->set_name( esc_html__( 'Dunker Single Image', 'dunker-core' ) );

			$this->set_widget_option(
				array(
					'field_type' => 'image',
					'name'       => 'dark_skin_image',
					'title'      => esc_html__( 'Dark Skin Image', 'dunker-core' ),
				)
			);

			$this->set_widget_option(
				array(
					'field_type' => 'image',
					'name'       => 'light_skin_image',
					'title'      => esc_html__( 'Light Skin Image', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type'    => 'select',
					'name'          => 'retina_scaling',
					'title'         => esc_html__( 'Enable Retina Scaling', 'dunker-core' ),
					'description'   => esc_html__( 'Image uploaded should be two times the height.', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'yes_no' ),
					'default_value' => '',
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'single_image_link',
					'title'      => esc_html__( 'Link', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type'    => 'select',
					'name'          => 'single_image_link_target',
					'options'       => dunker_core_get_select_type_options_pool( 'link_target' ),
					'title'         => esc_html__( 'Link target', 'dunker-core' ),
					'default_value' => '_self',
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'select',
					'name'       => 'image_alignment',
					'title'      => esc_html__( 'Image Alignment', 'dunker-core' ),
					'options'    => array(
						''       => esc_html__( 'Default', 'dunker-core' ),
						'left'   => esc_html__( 'Left', 'dunker-core' ),
						'center' => esc_html__( 'Center', 'dunker-core' ),
						'right'  => esc_html__( 'Right', 'dunker-core' ),
					),
				)
			);
		}

		public function render( $atts ) { ?>
			<?php
			$dark_skin_image  = wp_get_attachment_image_src( $atts['dark_skin_image'], 'full' );
			$light_skin_image = wp_get_attachment_image_src( $atts['light_skin_image'], 'full' );

			$styles = array();

			$image_alignment = $atts['image_alignment'];
			if ( ! empty( $image_alignment ) ) {

				if ( 'left' === $image_alignment ) {
					$styles[] = 'justify-content: flex-start';
				} elseif ( 'right' === $image_alignment ) {
					$styles[] = 'justify-content: flex-end';
				} elseif ( 'center' === $image_alignment ) {
					$styles[] = 'justify-content: center';
				}
			}

			$image_alignment = implode( ';', $styles );
			?>

			<div class="qodef-single-image-widget" <?php qode_framework_inline_style( $image_alignment ); ?>>
				<?php if ( ! empty( $atts['single_image_link'] ) ) { ?>
					<a itemprop="url" href="<?php echo esc_url( $atts['single_image_link'] ); ?>" target="<?php echo esc_attr( $atts['single_image_link_target'] ); ?>">
				<?php } ?>


				<?php
				if ( isset( $atts['retina_scaling'] ) && 'yes' === $atts['retina_scaling'] ) {
					if ( ! empty( $dark_skin_image ) ) {
						?>
						<div class="qodef-single-image-dark-skin">
							<img itemprop="image" src="<?php echo esc_url( $dark_skin_image[0] ); ?>" width="<?php echo round( $dark_skin_image[1] / 2 ); ?>" height="<?php echo round( $dark_skin_image[2] / 2 ); ?>" alt="<?php echo esc_attr( $dark_skin_image[3] ); ?>" />
						</div>
						<?php
					}
					if ( ! empty( $light_skin_image ) ) {
						?>
						<div class="qodef-single-image-light-skin">
							<img itemprop="image" src="<?php echo esc_url( $light_skin_image[0] ); ?>" width="<?php echo round( $light_skin_image[1] / 2 ); ?>" height="<?php echo round( $light_skin_image[2] / 2 ); ?>" alt="<?php echo esc_attr( $dark_skin_image[3] ); ?>" />
						</div>
						<?php
					}
				} else {
					?>
					<div class="qodef-single-image-dark-skin">
						<?php echo wp_get_attachment_image( $atts['dark_skin_image'], 'full' ); ?>
					</div>
					<div class="qodef-single-image-light-skin">
						<?php echo wp_get_attachment_image( $atts['light_skin_image'], 'full' ); ?>
					</div>
				<?php } ?>
				<?php if ( ! empty( $atts['single_image_link'] ) ) { ?>
					</a>
				<?php } ?>
			</div>
			<?php
		}
	}
}
