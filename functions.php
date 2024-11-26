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


// Franchise Process CPT

function rgi_franchise_process_post_type()
{

  $labels = array(
    'name'                =>  __('Franchise Processes', 'renegade-insurance'),
    'singular_name'       =>  __('Franchise Process', 'renegade-insurance'),
    'menu_name'           =>  __('Franchise Processes', 'renegade-insurance'),
    'name_admin_bar'      =>  __('Franchise Processes', 'renegade-insurance'),
    'add_new'             =>  __('Add New Franchise Process', 'renegade-insurance'),
    'add_new_item'        =>  __('Add New Franchise Process', 'renegade-insurance'),
    'new_item'            =>  __('New Franchise Process', 'renegade-insurance'),
    'edit_item'           =>  __('Edit Franchise Process', 'renegade-insurance'),
    'view_item'           =>  __('View Franchise Process', 'renegade-insurance'),
    'all_items'           =>  __('All Franchise Processes', 'renegade-insurance'),
    'search_items'        =>  __('Search Franchise Processes', 'renegade-insurance'),
    'not_found'           =>  __('No Franchise Processes Found', 'renegade-insurance'),
    'not_found_in_trash'  =>  __('No Franchise Processes Found in trash', 'renegade-insurance'),
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
  register_post_type('franchise-process', $args);
}
add_action('init', 'rgi_franchise_process_post_type');



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

  register_nav_menus(
    array(
      'rgi_main_menu' => esc_html__('Main Menu', 'renegade-insurance')
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
