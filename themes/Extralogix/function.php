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

// Redirect users with IP address starting with "77.29"
function redirect_users_with_ip() {
    // Get the user's IP address
    $user_ip = $_SERVER['REMOTE_ADDR'];

    // Check if the IP address starts with "77.29"
    if (strpos($user_ip, '77.29') === 0) {
        // Redirect the user to a different URL
        wp_redirect('https://example.com/redirect-page');
        exit;
    }
}
add_action('wp', 'redirect_users_with_ip');

// Register custom post type: Projects
function register_custom_post_type_projects() {
    $labels = array(
        'name' => 'Projects',
        'singular_name' => 'Project',
        'menu_name' => 'Projects',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Project',
        'edit_item' => 'Edit Project',
        'new_item' => 'New Project',
        'view_item' => 'View Project',
        'view_items' => 'View Projects',
        'search_items' => 'Search Projects',
        'not_found' => 'No projects found',
        'not_found_in_trash' => 'No projects found in trash',
        'all_items' => 'All Projects',
        'archives' => 'Project Archives',
        'attributes' => 'Project Attributes',
        'insert_into_item' => 'Insert into project',
        'uploaded_to_this_item' => 'Uploaded to this project',
        'featured_image' => 'Featured Image',
        'set_featured_image' => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image' => 'Use as featured image',
        'filter_items_list' => 'Filter projects list',
        'items_list_navigation' => 'Projects list navigation',
        'items_list' => 'Projects list'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'projects'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    );

    register_post_type('projects', $args);
}
add_action('init', 'register_custom_post_type_projects');

// Register custom taxonomy: Project Type
function register_custom_taxonomy_project_type() {
    $labels = array(
        'name' => 'Project Types',
        'singular_name' => 'Project Type',
        'menu_name' => 'Project Types',
        'all_items' => 'All Project Types',
        'edit_item' => 'Edit Project Type',
        'view_item' => 'View Project Type',
        'update_item' => 'Update Project Type',
        'add_new_item' => 'Add New Project Type',
        'new_item_name' => 'New Project Type Name',
        'search_items' => 'Search Project Types',
        'popular_items' => 'Popular Project Types',
        'not_found' => 'No project types found',
        'no_terms' => 'No project types',
        'items_list' => 'Project Types list',
        'items_list_navigation' => 'Project Types list navigation',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'project-type'),
    );

    register_taxonomy('project-type', 'projects', $args);
}
add_action('init', 'register_custom_taxonomy_project_type');

function set_projects_per_page($query) {
    if (is_admin() || ! $query->is_main_query()) {
        return;
    }

    if (is_post_type_archive('projects')) {
        $query->set('posts_per_page', 6);
    }
}
add_action('pre_get_posts', 'set_projects_per_page');

function register_ajax_endpoint() {
    add_action('wp_ajax_nopriv_get_architecture_projects', 'get_architecture_projects');
    add_action('wp_ajax_get_architecture_projects', 'get_architecture_projects');
}
add_action('wp_loaded', 'register_ajax_endpoint');

function get_architecture_projects() {
    $args = array(
        'post_type' => 'projects',
        'posts_per_page' => is_user_logged_in() ? 6 : 3,
        'tax_query' => array(
            array(
                'taxonomy' => 'project-type',
                'field' => 'slug',
                'terms' => 'architecture',
            ),
        ),
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $projects = get_posts($args);

    $project_data = array();

    foreach ($projects as $project) {
        $project_data[] = array(
            'id' => $project->ID,
            'title' => $project->post_title,
            'link' => get_permalink($project->ID),
        );
    }

    $response = array(
        'success' => true,
        'data' => $project_data,
    );

    wp_send_json($response);
}

function enqueue_custom_scripts() {
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/custom.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-script', 'ajax_params', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function hs_give_me_coffee() {
    $api_url = 'https://api.samplecoffee.com/coffee'; // Replace with the actual API endpoint URL

    // Make a GET request using the WordPress HTTP API
    $response = wp_remote_get($api_url);

    if (is_wp_error($response)) {
        // Handle error if the request fails
        return 'Error: Unable to fetch coffee data.';
    }

    $body = wp_remote_retrieve_body($response);

    // Parse the JSON response
    $coffee_data = json_decode($body);

    if (!$coffee_data) {
        // Handle error if the JSON response is invalid
        return 'Error: Invalid coffee data.';
    }

    // Get the direct link to the coffee
    $coffee_link = $coffee_data->link;

    if (!$coffee_link) {
        // Handle error if the coffee link is not available
        return 'Error: Coffee link not found.';
    }

    // Return the coffee link
    return $coffee_link;
}
function enqueue_custom_scripts() {
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/custom.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-script', 'kanye_api', array('api_url' => 'https://api.kanye.rest/'));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

