<?php

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
