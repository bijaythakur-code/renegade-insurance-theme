<?php

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
}
add_action('wp_enqueue_scripts', 'rgi_load_scripts');
