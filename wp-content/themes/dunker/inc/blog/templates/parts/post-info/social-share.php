<?php if ( class_exists( 'DunkerCore_Social_Share_Shortcode' ) ) { ?>
	<div class="qodef-e-info-item qodef-e-info-social-share">
		<?php
		$params                      = array();
		$params['layout']            = 'dropdown';
		$params['dropdown_behavior'] = 'left';
		$params['icon_font']         = 'ionicons';

		echo DunkerCore_Social_Share_Shortcode::call_shortcode( $params );
		?>
	</div>
<?php } ?>
