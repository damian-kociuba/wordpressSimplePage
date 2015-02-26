<?php
/**
 * The template for displaying all single posts and attachments
 *
 */
get_header();
?>
<div class="row">
    <div class="col-md-9 col-sm-6 col-xs-12">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php
                // Start the loop.
                while (have_posts()) : the_post();
                    ?>
                    <h3>
                        <?php the_title(); ?>
                    </h3>
                    <em>
                        Autor: <?php the_author(); ?> | Data: <?php the_date(); ?><br />
                        <?php the_tags(); ?>
                    </em>
                    <br /><br />
                    <?php the_content(); ?>


                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                // End the loop.
                endwhile;
                ?>

            </main><!-- .site-main -->
        </div><!-- .content-area -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <?php get_sidebar(); ?>
    </div>
</div> <!--div.row-->
<?php get_footer(); ?>
