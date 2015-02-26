<?php

/**
 * 
  Template Name: Edycja profilu
 *
 */
function theme_name_scripts() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'theme_name_scripts');

get_header();
?>

<div class="container" style="width:500px;">
    <?php /*[wp-members page=user-profile]*/?>
    
    <div class="row" style="border:solid black 1px; padding:10px 5px; margin: 10px auto;">
        <div class="col-md-3">
            <?php echo get_avatar(get_current_user_id() , 80 ); ?>
        </div>
        <div class="col-md-9">
            <?php 
                $user = wp_get_current_user();
                $birthDateYear = $user->get('birth_date');
                if($birthDateYear > 0) {
                    
                    $now = new DateTime();
                    $age = $now->format('Y') - $birthDateYear;
                }
            
            ?>
            <span style="float: left">
            <?php echo $user->get('user_login');?> <br />
            Lokalizacja: <?php echo $user->get('localization');?> <br />
            Płeć: <?php echo ($user->get('sex') == 1 ? 'Mężczyzna':'Kobieta');?> <br />
            Wiek: <?php echo $age; ?> <br />
            </span>
            <a href="<?php echo site_url();?>/wp-admin/profile.php" class="btn btn-default" style="margin-left: 20px; margin-top:50px;">Ustawienia profilu</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"><a class="btn btn-default" href="<?php echo site_url();?>/post?id=[currentuser_id]">Moje posty</a></div>
        <div class="col-md-3"><a class="btn btn-default" href="<?php echo site_url();?>/add_post">Dodaj post</a></div>
        <div class="col-md-3"><a class="btn btn-default" href="<?php echo site_url();?>/comments">Moje komentarze</a></div>
    </div>
    <!--div.row-->

</div>
<?php
get_footer();
