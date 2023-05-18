<?php get_header(); ?>

<?php
    // Start the Loop
    if (have_posts()) :
        while (have_posts()) : the_post();
            // Display post content
            the_content();
        endwhile;
    else:
        // If no posts are found, display message
        _e('Sorry, no posts found.', 'textdomain');
    endif;
?>

<?php get_footer(); ?>
