<?php
/*
Template Name: Projects Archive
*/
get_header(); // Add your header template code here
?>

<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type'      => 'project', // Replace 'project' with your custom post type name
    'posts_per_page' => 6,
    'paged'          => $paged,
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        // Display your project information here
    }
} else {
    // Display a message if there are no projects found
    echo 'No projects found.';
}

// Add pagination links
paginate_links( array(
    'format'    => '?paged=%#%',
    'current'   => max( 1, $paged ),
    'total'     => $query->max_num_pages,
    'prev_text' => '&laquo; Previous',
    'next_text' => 'Next &raquo;',
) );
?>



<?php get_footer(); // Add your footer template code here ?>

