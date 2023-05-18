<?php
get_header(); // Include the header template
?>

<main id="main" class="site-main">
    <div class="container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                // Display the project content here
                // You can customize the project layout as per your requirements
                ?>
                <h2><?php the_title(); ?></h2>
                <div><?php the_content(); ?></div>
                <?php
            }
            // Display pagination
            the_posts_pagination(array(
                'prev_text' => __('Previous', 'textdomain'),
                'next_text' => __('Next', 'textdomain'),
            ));
        } else {
            // If there are no projects found
            ?>
            <p><?php _e('No projects found.', 'textdomain'); ?></p>
            <?php
        }
        ?>
    </div>
</main>

<?php
get_footer(); // Include the footer template
?>
