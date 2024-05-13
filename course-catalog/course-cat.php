<?php 
/*
Plugin name: Course Catelog
Description: This is course Catelog Plugin 
version: 1.0
Author: jigs
Author URI: http://localhost/event/
text domain: myplugin
*/

if(!defined('ABSPATH')){
    header('Location: /event');
    DIE('');
}


// /----for active plugin------------
function activation_plugin(){
    flush_rewrite_rules( true );
}
register_activation_hook(__FILE__, 'activation_plugin');


// -----for deactivation  plugin-----------
function deactivation_plugin(){
    
}
register_deactivation_hook(__FILE__, 'deactivation_plugin');


// ---------custom post-------
function custom_post_course() {
    $labels = array(
        'name'               => __( 'Course Catelogs','taxonomy general name', 'myplugin' ),
        'singular_name'      => __( 'Course Catelog' ,'taxonomy singualar name', 'myplugin'),
        'add_new'            => __( 'Add New Course' ),
        'add_new_item'       => __( 'Add New Course' ),
        'edit_item'          => __( 'Edit Course' ),
        'new_item'           => __( 'New Course' ),
        'all_items'          => __( 'All Courses' ),
        'view_item'          => __( 'View Course ' ),
        'search_items'       => __( 'Search Course ' ),
        'featured_image'     => 'Image',
        'set_featured_image' => 'Add Image'
    );

    $args = array(
        'labels'            => $labels,
        'description'       => 'Holds our custom course post specific data',
        'public'            => true,
        'rewrite'           => array( 'slug' => 'course', 'with_front' => false   ),
        'menu_position'     => 8,
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
        'taxonomies'         => array( 'course_category', 'course_tag', 'Lessons' ),
        'capability_type' => 'post',
        'hierarchical' => false,
        'show_ui'          => true,
        'publicly_queryable' => true,
    );
    register_post_type('course', $args);
}
add_action( 'init', 'custom_post_course', 0 );




// -------- texaonomy 'category'-----
function cat_texonomy(){
    $labels1  = array(
        'name' => __('Categories'),
        'singular_name' => __('category'),
    );
    $arg = array(
        'labels'            => $labels1,
        'description'       => 'Holds our custom course post specific data',
        'public'            => true,
        'rewrite'           => array( 'slug' => 'course_category'  , 'with_front' => false ),
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
        'taxonomies'         => array( 'course_category' ),
        'capability_type' => 'post',
        'hierarchical' => true,
        'show_admin_column' => true,
        );
        register_taxonomy('category' , 'course', $arg);
}
add_action( 'init', 'cat_texonomy');
// -----------------------------

// -------- texaonomy 'Tag'-----

function tag_texonomy(){
    $labels1  = array(
        'name' => __('Tags'),
        'singular_name' => __('tag'),
        
    );
    $arg = array(
        'labels'            => $labels1,
        'description'       => 'Holds our custom course post specific data',
        'public'            => true,
        'rewrite'           => array( 'slug' => 'course_tag'  , 'with_front' => false ),
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
        'taxonomies'         => array( 'course_tag' ),
        'capability_type' => 'post',
        'hierarchical' => true,
        'show_admin_column' => true,
        );
        register_taxonomy('course_tag' , 'course', $arg);
}
add_action( 'init', 'tag_texonomy');
// ----------------------------------

// -------- texaonomy 'lessons'-----
function lesson_texonomy(){
    $labels1  = array(
        'name' => __('Lessons'),
        'singular_name' => __('Lesson'),  
    );
    $arg = array(
        'labels'            => $labels1,
        'description'       => 'Holds our custom course post specific data',
        'public'            => true,
        'rewrite'           => array( 'slug' => 'lessons'  , 'with_front' => false ),
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
        'taxonomies'         => array( 'Lesson' ),
        'capability_type' => 'post',
        'hierarchical' => false,
        'show_admin_column' => true,        
        );
        register_taxonomy('Lessons' , 'course', $arg);
}
add_action( 'init', 'lesson_texonomy');
// -------------


?>