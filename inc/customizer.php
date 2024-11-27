<?php

function rgi_customizer($wp_customize)
{

  ////// Header CTA Button
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


  ////// Footer Settings

  $wp_customize->add_section(
    'footer_settings',
    array(
      'title' => __('Footer Settings', 'renegade-insurance'),
      'description' => __('Footer Settings', 'renegade-insurance')
    )
  );


  // Footer Logo
  $wp_customize->add_setting(
    'footer_logo_image',
    array(
      'default' => '', // Default value is empty
      'sanitize_callback' => 'esc_url_raw',
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'footer_logo_image',
      array(
        'label' => __('Footer Logo', 'renegade-insurance'),
        'description' => __('Upload the footer logo image.', 'renegade-insurance'),
        'section' => 'footer_settings',
        'settings' => 'footer_logo_image'
      )
    )
  );

  // Footer Contact Us Heading
  $wp_customize->add_setting(
    'footer_contact_us_heading',
    array(
      'default' => __('Contact Us', 'renegade-insurance'),
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'footer_contact_us_heading',
    array(
      'label' => __('Contact Us Heading', 'renegade-insurance'),
      'section' => 'footer_settings',
      'type' => 'text',
    )
  );

  // Contact Email
  $wp_customize->add_setting(
    'footer_contact_email',
    array(
      'default' => 'info@renegadeinsurance.com',
      'sanitize_callback' => 'sanitize_email',
    )
  );

  $wp_customize->add_control(
    'footer_contact_email',
    array(
      'label' => __('Contact Email', 'renegade-insurance'),
      'section' => 'footer_settings',
      'type' => 'email',
    )
  );

  // Contact Phone
  $wp_customize->add_setting(
    'footer_contact_phone',
    array(
      'default' => '+1 707-233-933',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'footer_contact_phone',
    array(
      'label' => __('Contact Phone Number', 'renegade-insurance'),
      'section' => 'footer_settings',
      'type' => 'text',
    )
  );

  // Contact Address
  $wp_customize->add_setting(
    'footer_contact_address',
    array(
      'default' => '9450 SW Gemini Dr, PMB 47941, Beaverton, Oregon 97008-7105',
      'sanitize_callback' => 'sanitize_textarea_field',
    )
  );

  $wp_customize->add_control(
    'footer_contact_address',
    array(
      'label' => __('Contact Address', 'renegade-insurance'),
      'section' => 'footer_settings',
      'type' => 'textarea',
    )
  );

  // Footer Connect With Us Heading
  $wp_customize->add_setting(
    'footer_connect_heading',
    array(
      'default' => __('Connect with Us', 'renegade-insurance'),
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'footer_connect_heading',
    array(
      'label' => __('Connect with us Heading', 'renegade-insurance'),
      'section' => 'footer_settings',
      'type' => 'text',
    )
  );


  // Social Links (Facebook, Twitter, LinkedIn, Instagram)
  $social_links = ['Facebook', 'Twitter', 'LinkedIn', 'Instagram'];
  foreach ($social_links as $social) {
    $wp_customize->add_setting(
      'footer_social_' . strtolower($social),
      array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      'footer_social_' . strtolower($social),
      array(
        'label' => __('' . $social . ' URL', 'renegade-insurance'),
        'section' => 'footer_settings',
        'type' => 'url'
      )
    );
  }

  // Learn More heading
  $wp_customize->add_setting(
    'footer_learn_more_heading',
    array(
      'default' => __('Learn More', 'renegade-insurance'),
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'footer_learn_more_heading',
    array(
      'label' => __('Learn More Heading', 'renegade-insurance'),
      'section' => 'footer_settings',
      'type' => 'text',
    )
  );

  // Legal Heading
  $wp_customize->add_setting(
    'footer_legal_heading',
    array(
      'default' => __('Legal', 'renegade-insurance'),
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'footer_legal_heading',
    array(
      'label' => __('Legal Heading', 'renegade-insurance'),
      'section' => 'footer_settings',
      'type' => 'text',
    )
  );

  // Footer Headings and Content of last two footer item
  $footer_items = [
    'assurance' => [
      'heading' => __('Designed for Assurance', 'renegade-insurance'),
      'text'    => __('We have ethical and professional agents who always put our clients’ best interests forward.', 'renegade-insurance'),
      'image'   => get_template_directory_uri() . '/assets/images/placeholder.png',
    ],
    'accountability' => [
      'heading' => __('Accountability at the Forefront', 'renegade-insurance'),
      'text'    => __('We are held to a higher standard for customer service, transparency and ethical business practices.', 'renegade-insurance'),
      'image'   => get_template_directory_uri() . '/assets/images/placeholder.png',
    ],
  ];

  foreach ($footer_items as $key => $data) {

    // for heading
    $wp_customize->add_setting(
      "footer_{$key}_heading",
      array(
        'default' => $data['heading'],
        'sanitize_callback' => 'sanitize_text_field',
      )
    );

    $wp_customize->add_control(
      "footer_{$key}_heading",
      array(
        'label' => __($data['heading'] . ' Heading', 'renegade-insurance'),
        'section' => 'footer_settings',
        'type' => 'text',
      )
    );

    // for text
    $wp_customize->add_setting(
      "footer_{$key}_text",
      array(
        'default' => $data['text'],
        'sanitize_callback' => 'sanitize_textarea_field',
      )
    );

    $wp_customize->add_control(
      "footer_{$key}_text",
      array(
        'label' => __($data['heading'] . ' Text', 'renegade-insurance'),
        'section' => 'footer_settings',
        'type' => 'textarea',
      )
    );

    // for image
    $wp_customize->add_setting(
      "footer_{$key}_image",
      array(
        'default' => $data['image'],
        'sanitize_callback' => 'esc_url_raw',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
        $wp_customize,
        "footer_{$key}_image",
        array(
          'label' => __($data['heading'] . ' Image', 'renegade-insurance'),
          'section' => 'footer_settings',
          'settings' => "footer_{$key}_image",
        )
      )
    );
  }

  // Copyright
  $wp_customize->add_setting(
    'footer_copyright',
    array(
      'default' => '© ' . date('Y') . ' Renegade Insurance',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'footer_copyright',
    array(
      'label' => __('Copyright Text', 'renegade-insurance'),
      'section' => 'footer_settings',
      'type' => 'text',
    )
  );
}

add_action('customize_register', 'rgi_customizer');
