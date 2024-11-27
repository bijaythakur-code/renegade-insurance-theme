<?php

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
