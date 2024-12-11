<?php
$social_share_enabled = 'yes' === dunker_core_get_post_value_through_levels( 'qodef_portfolio_enable_social_share' );
$social_share_layout  = dunker_core_get_post_value_through_levels( 'qodef_social_share_layout' );

if ( class_exists( 'DunkerCore_Social_Share_Shortcode' ) && $social_share_enabled ) { ?>
	<div class="qodef-e qodef-info--social-share">
		<?php
		$params = array(
			'layout'    => $social_share_layout,
            'icon_font' => 'ionicons',
		);

        if( $social_share_layout === 'dropdown') {
            $params['dropdown_behavior'] = 'right';
        }

		echo DunkerCore_Social_Share_Shortcode::call_shortcode( $params );
		?>
	</div>
<?php } ?>
