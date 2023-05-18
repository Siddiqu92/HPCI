<?php
/*
Template Name: Custom Index Template
*/
?>

<?php get_header(); ?>

<section class="container">
    <div class="row">
        <div class="col-md-8">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class(); ?>>
                        <h2><?php the_title(); ?></h2>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e('Sorry, no posts found.', 'textdomain'); ?></p>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
