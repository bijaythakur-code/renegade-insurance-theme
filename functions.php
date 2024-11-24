<?php

// Load styles and scripts
function rgi_load_scripts()
{
  wp_enqueue_style('rgi-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all'); // For development to avoid cache

  // wp_enqueue_style('rgi-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'), 'all'); // For production
}
add_action('wp_enqueue_scripts', 'rgi_load_scripts');
