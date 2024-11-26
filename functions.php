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


// Testimonials CPT

function rgi_register_testimonial_post_type()
{

  $labels = array(
    'name'                =>  __('Testimonials', 'renegade-insurance'),
    'singular_name'       =>  __('testimonial', 'renegade-insurance'),
    'menu_name'           =>  __('Testimonials', 'renegade-insurance'),
    'name_admin_bar'      =>  __('Testimonials', 'renegade-insurance'),
    'add_new'             =>  __('Add New Testimonial', 'renegade-insurance'),
    'add_new_item'        =>  __('Add New Testimonial', 'renegade-insurance'),
    'new_item'            =>  __('New Testimonial', 'renegade-insurance'),
    'edit_item'           =>  __('Edit Testimonial', 'renegade-insurance'),
    'view_item'           =>  __('View Testimonial', 'renegade-insurance'),
    'all_items'           =>  __('All Testimonials', 'renegade-insurance'),
    'search_items'        =>  __('Search Testimonials', 'renegade-insurance'),
    'not_found'           =>  __('No Testimonials Found', 'renegade-insurance'),
    'not_found_in_trash'  =>  __('No Testimonials Found in trash', 'renegade-insurance'),
  );

  $args = array(
    'labels'              =>  $labels,
    'has_archive'         =>  false,
    'public'              =>  false,
    'publicly_queryable' => false,
    'show_ui' => true,
    'exclude_from_search' => true,
    'show_in_nav_menus' => false,
    'hierarchical'        =>  false,
    'supports'            =>  array('title', 'custom-fields'),
    'rewrite'             =>  false,
    'show_in_rest'        =>  false
  );
  register_post_type('testimonial', $args);
}
add_action('init', 'rgi_register_testimonial_post_type');

add_filter('enter_title_here', 'change_title_placeholder');

// Change the placeholder for the title input of testimonial
function change_title_placeholder($title)
{
  $screen = get_current_screen();

  if ('testimonial' === $screen->post_type) {
    $title = 'Add Person Name';
  }

  return $title;
}
