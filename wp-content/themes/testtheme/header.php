<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset') ?>" />
        <title><?php bloginfo('name'); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <?php wp_head() ?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <a id="topBanner" href="<?php echo home_url(); ?>">
                        <div id="topBanner"><?php bloginfo('name'); ?></div>
                    </a>
                </div>
                <div class="col-md-2 menu">
                    <?php if (is_user_logged_in()): ?>
                        <a class="btn btn-default" href="<?php echo get_site_url(); ?>/logout">Wyloguj</a>
                        <a class="btn btn-default" href="<?php echo get_site_url(); ?>/profile">Edytuj profil</a>
                    <?php else: ?>
                        <a class="btn btn-default" href="<?php echo get_site_url(); ?>/logowanie">Logowanie</a>
                        <a class="btn btn-default" href="<?php echo get_site_url(); ?>/rejestracja">Rejestracja</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php advman_ad("HTML"); ?>