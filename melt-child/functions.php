<?php

class DLpages_Customizer {
	function register($wp_customize) {
		// Add General Settings Section
		$wp_customize->add_section(
		'dlpages_general_settings',
			array(
				'title' => __( 'General Settings', 'micro-site' ),
				'priority' => 1,
				'capability' => 'edit_theme_options',
				'description' => __('Configure general site settings here.', 'micro-site'),
			)
		);
		// Add phone number field
		$wp_customize->add_setting( 'melt_phone_number',
			array(
				'default' => 'XXX-XXX-XXXX'
			)
		);
		// Add control for field
		$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'melt_phone_number_control',
			array(
				'label' => __( 'Phone Number', 'micro-site' ),
				'section' => 'dlpages_general_settings',
				'settings' => 'melt_phone_number',
				'priority' => 20,
			)
		));
		// Add Social Links section
		$wp_customize->add_section(
		'dlpages_sociallinks_section',
			array(
				'title' => __( 'Social Media Pages', 'micro-site' ),
				'priority' => 2,
				'capability' => 'edit_theme_options',
			)
		);
		// Add facebook field
		$wp_customize->add_setting( 'melt_facebook',
			array(
				'default' => '',
			)
		);
		// Add control for field
		$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'melt_facebook_control',
			array(
				'label' => __( 'Facebook Page URL', 'micro-site' ),
				'section' => 'dlpages_sociallinks_section',
				'settings' => 'melt_facebook',
				'priority' => 10,
			)
		));
		// Add twitter field
		$wp_customize->add_setting( 'melt_twitter',
			array(
				'default' => '',
			)
		);
		// Add control for field
		$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'melt_twitter_control',
			array(
				'label' => __( 'Twitter Page URL', 'micro-site' ),
				'section' => 'dlpages_sociallinks_section',
				'settings' => 'melt_twitter',
				'priority' => 20,
			)
		));
		// Add google+ field
		$wp_customize->add_setting( 'melt_gplus',
			array(
				'default' => '',
			)
		);
		// Add control for field
		$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'melt_gplus_control',
			array(
				'label' => __( 'Google+ Page URL', 'micro-site' ),
				'section' => 'dlpages_sociallinks_section',
				'settings' => 'melt_gplus',
				'priority' => 30,
			)
		));
		// Add instagram field
		$wp_customize->add_setting( 'melt_instagram',
			array(
				'default' => '',
			)
		);
		// Add control for field
		$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'melt_instagram_control',
			array(
				'label' => __( 'Instagram Page URL', 'micro-site' ),
				'section' => 'dlpages_sociallinks_section',
				'settings' => 'melt_instagram',
				'priority' => 40,
			)
		));
	}
}

add_action( 'customize_register' , array( 'DLpages_Customizer' , 'register' ) );

?>