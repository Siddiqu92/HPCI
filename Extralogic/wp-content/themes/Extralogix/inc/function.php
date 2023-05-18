<?php
function my_theme_enqueue_scripts() {
    // Enqueue stylesheets and scripts
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

function my_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    register_nav_menus(array('primary' => 'Primary Menu'));
}
add_action('after_setup_theme', 'my_theme_setup');
