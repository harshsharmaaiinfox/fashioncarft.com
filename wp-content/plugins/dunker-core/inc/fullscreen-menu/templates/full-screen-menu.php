<?php $right_section_image = dunker_core_get_post_value_through_levels( 'qodef_fullscreen_menu_right_section_image' ); ?>

<div id="qodef-fullscreen-area">
	<?php if ( $fullscreen_menu_in_grid ) { ?>
	<div class="qodef-content-grid">
	<?php } ?>

		<div id="qodef-fullscreen-area-inner">
			<?php if ( has_nav_menu( 'fullscreen-menu-navigation' ) ) { ?>
				<nav class="qodef-fullscreen-menu" role="navigation" aria-label="<?php esc_attr_e( 'Full Screen Menu', 'dunker-core' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'fullscreen-menu-navigation',
							'container'      => '',
							'link_before'    => '<span class="qodef-menu-item-text">',
							'link_after'     => '</span>',
							'walker'         => new DunkerCoreRootMainMenuWalker(),
							'menu_area'      => 'fullscreen',
						)
					);
					?>
				</nav>
			<?php } ?>
		</div>
		<?php if ( isset( $right_section_image ) ) { ?>
			<div id="qodef-fullscreen-area-right" style="<?php echo 'background-image: url(' . esc_url( wp_get_attachment_image_url( $right_section_image, 'full' ) ) . ')'; ?>"></div>
		<?php } ?>

	<?php if ( $fullscreen_menu_in_grid ) { ?>
	</div>
	<?php } ?>
</div>
