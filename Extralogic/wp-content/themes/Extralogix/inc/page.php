<?php get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        // Display page content
        the_content();
    endwhile;
else:
    // If no pages are found, display message
    _e('Sorry, no pages found.', 'textdomain');
endif;
?>

<?php get_footer(); ?>
