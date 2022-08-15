<?php
/**
 * Template Name: Etusivu
 *
 * @package Froggy
 */

get_header();?>

<div class="content-area" id="primary">
    <main id="main" class="site-main" role="main">

        <?php
while (have_posts()): the_post();
    get_template_part('template-parts/content', 'page');
endwhile; // End of the loop.
?>

    </main><!-- #main -->
</div>

<?php
get_footer();