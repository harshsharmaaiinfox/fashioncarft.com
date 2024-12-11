<?php if ( class_exists( 'DunkerCore_Button_Shortcode' ) ) { ?>
	<div class="qodef-m-button">
		<?php
        $button_overlay_params = array(
            'button_layout' => 'textual',
            'text'          => esc_html__( 'Explore collection', 'dunker' ),
            'link'          => '#',
        );

        echo DunkerCore_Button_Shortcode::call_shortcode( $button_overlay_params );
        ?>
        <span class="qodef-m-button-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="19.192" height="18.406">
                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2">
                    <path d="M1 9.193h16" stroke-linecap="butt" shape-rendering="geometricPrecision"></path>
                    <path d="m10 16.992 7.779-7.778"></path>
                    <path d="m10 1.414 7.778 7.779"></path>
                </g>
            </svg>
        </span>
	</div>
<?php } ?>
