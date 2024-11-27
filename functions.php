<?php

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/testimonial-cpt.php';
require get_template_directory() . '/inc/franchise-process-cpt.php';

// Load styles and scripts
function rgi_load_scripts()
{

  // slick css

  wp_enqueue_style('slick-core-style', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');

  // theme main style
  wp_enqueue_style('rgi-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all'); // For development to avoid cache

  // wp_enqueue_style('rgi-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'), 'all'); // For production

  // slick js
  wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);

  // show on home page
  if (is_front_page()) {
    // slick init js
    wp_enqueue_script('slick-init-js', get_template_directory_uri() . '/assets/js/slick-init.js', array('slick-js'), null, true);
  }

  // navigation js
  wp_enqueue_script('navigation-js', get_template_directory_uri() . '/assets/js/navigation.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'rgi_load_scripts');



// Change the placeholder for the title input
add_filter('enter_title_here', 'change_title_placeholder');
function change_title_placeholder($title)
{
  $screen = get_current_screen();

  if ('testimonial' === $screen->post_type) {
    $title = 'Add Person Name';
  }

  if ('franchise-process' === $screen->post_type) {
    $title = 'Add Process Number';
  }

  return $title;
}


// Theme Configuration for Renegade Insurance Them
function rgi_theme_config()
{

  // Main Menu
  register_nav_menus(
    array(
      'rgi_main_menu' => esc_html__('Main Menu', 'renegade-insurance')
    )
  );

  // Footer Learn More Menu
  register_nav_menus(
    array(
      'rgi_footer_learn_more_menu' => esc_html__('Footer Learn More Menu', 'renegade-insurance')
    )
  );

  // Footer Legal Menu
  register_nav_menus(
    array(
      'rgi_footer_legal_menu' => esc_html__('Footer Legal Menu', 'renegade-insurance')
    )
  );

  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo', array(
    'width' => 200,
    'height'    => 110,
    'flex-height'   => true,
    'flex-width'    => true
  ));
  add_theme_support('automatic-feed-links');
  add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));

  // Enable dynamic generation of the <title> tag by WordPress
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'rgi_theme_config', 0);

/**
 * Fallback for the `wp_body_open` function for backward compatibility.
 * 
 * This function ensures older versions of WordPress (pre-5.2) can still use
 * the `wp_body_open` hook to insert additional content at the beginning of the <body> tag.
 */
if (! function_exists('wp_body_open')) {
  function wp_body_open()
  {
    do_action('wp_body_open');
  }
}
