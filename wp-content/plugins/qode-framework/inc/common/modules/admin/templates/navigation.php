<div class="qodef-tabs-navigation-wrapper">
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="collapse navbar-collapse" id="navbar-collapse">
			<ul class="navbar-nav mr-auto">
				<?php
				foreach ( $pages as $page ) { ?>
					<?php
					$page_slug       = $page->get_slug();
					$page_title      = $page->get_title();
					$section_slug    = empty( $page_slug ) ? $options_name : $options_name . '_' . $page_slug;
					$dependency      = $page->get_dependency() ?? array();
					$dependency_data = array();

					$item_class   = array();
					$item_class[] = 'qodef-' . esc_attr( $page_slug );

					if ( ! empty( $dependency ) ) {
						$show = array_key_exists( 'show', $dependency ) ? qode_framework_return_dependency_options_array( $options_name, 'admin', $dependency['show'], true ) : array();
						$hide = array_key_exists( 'hide', $dependency ) ? qode_framework_return_dependency_options_array( $options_name, 'admin', $dependency['hide'] ) : array();

						$item_class[] = 'qodef-dependency-holder';
						$item_class[] = qode_framework_return_dependency_classes( $show, $hide );

						$dependency_data = qode_framework_return_dependency_data( $show, $hide );
					}
					?>
					<li class="nav-item <?php echo esc_attr( implode( ' ', $item_class ) ); ?>" <?php echo qode_framework_get_inline_attrs( $dependency_data, true ); ?>>
						<span class="nav-link" data-section="<?php echo esc_attr( $section_slug ); ?>">
								<?php if ( $page->get_icon() !== '' && $use_icons ) { ?>
									<i class="<?php echo esc_attr( $page->get_icon() ); ?> qodef-tooltip qodef-inline-tooltip left" data-placement="top" data-toggle="tooltip" title="<?php echo esc_attr( $page_title ); ?>"></i>
								<?php } ?>
							<span><?php echo esc_html( $page_title ); ?></span>
						</span>
					</li>
				<?php } ?>
			</ul>
		</div>
	</nav>
</div>
