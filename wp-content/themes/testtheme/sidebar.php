<h4>Szukaj:</h4>
<form>
    <input class="form-control" type="text">
</form>

<ul role="navigation">
    <?php wp_list_pages('title_li=<h2>' . __('Pages') . '</h2>'); ?>

    <li><h2><?php _e('Archives'); ?></h2>
        <ul>
            <?php wp_get_archives(array('type' => 'monthly')); ?>
        </ul>
    </li>

    <?php wp_list_categories(array('show_count' => 1, 'title_li' => '<h2>' . __('Categories') . '</h2>')); ?>
</ul>
<ul>
    <?php /* If this is the frontpage */ if (is_home() || is_page()) { ?>
        Strona główna

    <?php } ?>

</ul>

<?php wp_tag_cloud();?>