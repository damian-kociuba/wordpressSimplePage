<?php get_header(); ?>
<div class="row">
    <div class="col-md-9 col-sm-6 col-xs-12">
        <h4>Najpopularniejsze</h4>
        <?php
        $query = new WP_Query(array(
            'meta_key' => 'rating',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'posts_per_page' => 5
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

        <h4>Najnowsze</h4>
        <?php
        $query_by_date = new WP_Query(array(
            'order' => 'DESC',
            'posts_per_page' => 5
        ));
        ?>
        <?php if ($query_by_date->have_posts()): ?>
            <div class="container-fluid">
                <?php while ($query_by_date->have_posts()) : $query_by_date->the_post(); ?>
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
        
        <h4>Wygasną niedługo</h4>
        <?php
        $query = new WP_Query(array(
            'meta_key' => '_expiration-date',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'posts_per_page' => 5
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
                                | os. edycja:
                                <?php the_modified_date(); ?>
                                <?php the_modified_time(); ?>
                                | wygasa:
                                <?php
                                $data = get_post_meta(get_the_ID(), '_expiration-date');
                                echo date('d-m-Y H:i',$data[0]);
                                ?>
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
</div>
<?php get_footer(); ?>