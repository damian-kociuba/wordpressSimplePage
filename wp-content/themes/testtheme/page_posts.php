<?php
/**
 * 
Template Name: Posty użytkownika
 *
 */
get_header();
?>
<div class="row">
    <div class="col-md-9 col-sm-6 col-xs-12">
        <?php
        $query = new WP_Query(array(
            'author' => $_GET['id']
        ));
        ?>
        <?php if ($query->have_posts()): ?>
            <div class="container-fluid">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="post">
                        <div class="row header ">
                            <div class="title col-md-6">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>

                            </div>
                            <div class="col-md-6 text-right small">
                                Ocena: 
                                <?php
                                $data = get_post_meta(get_the_ID(), 'rating');
                                echo $data[0];
                                ?>
                                |
                                <?php the_modified_date(); ?>
                                <?php the_modified_time(); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <?php get_sidebar(); ?>
    </div>
</div> <!--div.row-->
<?php get_footer(); ?>
