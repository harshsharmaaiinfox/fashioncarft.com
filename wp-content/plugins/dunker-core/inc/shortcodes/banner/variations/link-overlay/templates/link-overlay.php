<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php dunker_core_template_part( 'shortcodes/banner', 'templates/parts/image', '', $params ); ?>
	<div class="qodef-m-content">
		<div class="qodef-m-content-inner">
			<?php dunker_core_template_part( 'shortcodes/banner', 'templates/parts/subtitle', '', $params ); ?>
			<?php dunker_core_template_part( 'shortcodes/banner', 'templates/parts/title', '', $params ); ?>
			<?php dunker_core_template_part( 'shortcodes/banner', 'templates/parts/text', '', $params ); ?>
		</div>
        <?php dunker_core_template_part( 'shortcodes/banner', 'templates/parts/button-overlay', '', $params); ?>
	</div>
	<?php dunker_core_template_part( 'shortcodes/banner', 'templates/parts/link', '', $params ); ?>
</div>
