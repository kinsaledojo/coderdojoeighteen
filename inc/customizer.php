<?php

add_action( 'customize_register', 'coderdojo_customizer_settings' );
function coderdojo_customizer_settings( $wp_customize ) {

    $wp_customize->add_section( 'coderdojo_header' , array(
        'title'      => 'Header',
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'header_cta_text' , array(
        'default'     => 'This Button',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_cta_text', array(
        'label'        => 'Call To Action Text',
        'section'    => 'coderdojo_header',
        'settings'   => 'header_cta_text',
        'type' => 'text'
    ) ) );

    $wp_customize->add_setting( 'header_cta_link' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_cta_link', array(
        'label'        => 'Call To Action Link',
        'section'    => 'coderdojo_header',
        'settings'   => 'header_cta_link',
        'type' => 'text'
    ) ) );

    $wp_customize->add_section( 'coderdojo_footer' , array(
        'title'      => 'Footer',
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'footer_text' , array(
        'default'     => 'The CoderDojo movement believes that an understanding of programming languages is increasingly important in the modern world, that it’s both better and easier to learn these skills early, and that nobody should be denied the opportunity to do so.',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text', array(
        'label'        => 'Text',
        'section'    => 'coderdojo_footer',
        'settings'   => 'footer_text',
        'type' => 'textarea'
    ) ) );

    $wp_customize->add_setting( 'footer_address' , array(
        'default'     => 'CoderDojo Foundation (CRO No: 524255 a registered charity: CHY 20812), Dogpatch Labs Unit 1, The CHQ building, Custom House Quay, Dublin, Ireland, D01 Y6H7',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_address', array(
        'label'        => 'Address',
        'section'    => 'coderdojo_footer',
        'settings'   => 'footer_address',
        'type' => 'textarea'
    ) ) );
}