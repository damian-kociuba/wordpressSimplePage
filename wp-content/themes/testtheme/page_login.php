<?php
/**
 * 
Template Name: Logowanie
 *
 */

add_filter( 'wpmem_login_form_rows', 'my_register_form_rows' );

function my_register_form_rows( $form )
{
	/**
	 * The registration form is brought in with $form
	 * You can append to it or filter it
	 */
         foreach($form as &$field) {
             $field['row_before'] = '<div class="form-group">';
             $field['field_before'] = '<div class="col-sm-8">';
             $field['field'] = str_replace('class="', 'class="form-control ', $field['field']);
             $field['field_after'] = '</div>';
             $field['row_after'] = '</div>';
             $field['label'] = str_replace('Wybierz nazwę użytkownika', 'Nazwa użytkownika', $field['label']);
             $field['label'] = '<div class="col-sm-4 control-label">'.$field['label'].'</div>';
         }
	return $form;
}

add_filter( 'wpmem_login_form', 'my_register_form_filter' );

function my_register_form_filter( $form )
{
	$form = str_replace('class="form"', 'class="form-horizontal"', $form);
	$form = str_replace('Existing Users Log In', 'Logowanie', $form);
	return $form;
}


get_header();
?>
<style type="text/css">
    .form-group {margin-bottom: 4px;}
</style>
<div class="row">
    <div class="col-md-6 col-md-offset-3 col-xs-12">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div style="width:500px; margin:auto; background-color: lightgray">

                <?php
                // Start the loop.
                while (have_posts()) : the_post();
                    ?>
                    <?php the_content(); ?>
                <?php endwhile;
                ?>
                </div>    
            </main><!-- .site-main -->
        </div><!-- .content-area -->
    </div>
</div> <!--div.row-->

<?php get_footer(); ?>
