<?php

function rgi_customizer($wp_customize)
{

  // Header CTA Button
  $wp_customize->add_section(
    'header_cta_button',
    array(
      'title' => __('Header CTA Button Settings', 'renegade-insurance'),
      'description' => __('Header CTA Button Settings', 'renegade-insurance')
    )
  );

  // Button Text
  $wp_customize->add_setting(
    'header_cta_button_text',
    array(
      'type' => 'theme_mod',
      'default' => __('Book a consultation', 'renegade-insurance'),
      'sanitize_callback' => 'sanitize_text_field'
    )
  );

  $wp_customize->add_control(
    'header_cta_button_text',
    array(
      'label' => __('Small Consultation CTA Message', 'renegade-insurance'),
      'description' => __('Please, type small cta message', 'renegade-insurance'),
      'section' => 'header_cta_button',
      'type' => 'text'
    )
  );

  // Phone Number URL  
  $wp_customize->add_setting(
    'header_phone_number_url',
    array(
      'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters
    )
  );

  $wp_customize->add_control(
    'header_phone_number_url',
    array(
      'label' => esc_html__('Please type phone number url here. EX: tel:+1707-233-933', 'renegade-insurance'),
      'section' => 'header_cta_button',
      'type' => 'url'
    )
  );

  // Phone Number Text  
  $wp_customize->add_setting(
    'header_phone_number_text',
    array(
      'type' => 'theme_mod',
      'default' => __('+1 707-233-933', 'renegade-insurance'),
      'sanitize_callback' => 'sanitize_text_field'
    )
  );

  $wp_customize->add_control(
    'header_phone_number_text',
    array(
      'label' => esc_html__('Please type phone number in text here. EX: +1 707-233-933', 'renegade-insurance'),
      'section' => 'header_cta_button',
      'type' => 'text'
    )
  );
}

add_action('customize_register', 'rgi_customizer');
