<?php
function librebooks_register_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'librebooks_site_info' , array(
		'title'      => __('Add Site Info','librebooks'),
		'priority'   => 20,
) );

$wp_customize->add_setting(
		'librebooks_front_page_welcome_message',
		array(
				'default'     => '',

				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_front_page_welcome_message', array(
		'label'      => __('Home Page Welcome Message', 'librebooks'),
		'section'    => 'librebooks_site_info',
		'settings'   => 'librebooks_front_page_welcome_message',
		'type'       => 'textarea',
));

$wp_customize->add_setting(
		'librebooks_fb_id',
		array(
				'default'     => '',

				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_fb_id', array(
		'label'      => __('Facebook App ID', 'librebooks'),
		'section'    => 'librebooks_site_info',
		'settings'   => 'librebooks_fb_id',
		'type'       => 'text',
));
$wp_customize->add_setting(
		'librebooks_fb_page',
		array(
				'default'     => '',

				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_fb_page', array(
		'label'      => __('Facebook Page', 'librebooks'),
		'section'    => 'librebooks_site_info',
		'settings'   => 'librebooks_fb_page',
		'type'       => 'text',
));
$wp_customize->add_setting(
		'librebooks_twt_account',
		array(
				'default'     => '',

				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_twt_account', array(
		'label'      => __('Twitter Account', 'librebooks'),
		'section'    => 'librebooks_site_info',
		'settings'   => 'librebooks_twt_account',
		'type'       => 'text',
));
	$wp_customize->add_section( 'librebooks_custom_code' , array(
		'title'      => __('Add Header/Footer Content','librebooks'),
		'priority'   => 20,
) );
	/* Custom Content Section */

$wp_customize->add_setting(
		'librebooks_custom_header_code',
		array(
				'default'     => '',

				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_custom_header_code', array(
		'label'      => __('Add Header Content Code', 'librebooks'),
		'section'    => 'librebooks_custom_code',
		'settings'   => 'librebooks_custom_header_code',
		'type'       => 'textarea',
));

$wp_customize->add_setting(
		'librebooks_custom_footer_code',
		array(
				'default'     => '',
				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_custom_footer_code', array(
		'label'      => __('Add Footer Content Code', 'librebooks'),
		'section'    => 'librebooks_custom_code',
		'settings'   => 'librebooks_custom_footer_code',
		'type'       => 'textarea',
));
}
add_action( 'customize_register', 'librebooks_register_theme_customizer' );
?>