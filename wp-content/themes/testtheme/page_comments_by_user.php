<?php
/**
 * 
  Template Name: Komentarze użytkownika
 *
 */
get_header();
?>
<div class="row">
    <div class="col-md-9 col-sm-6 col-xs-12">
        <h2>Twoje komentarze:</h2>
        <?php
        $params = array(
            'user_id' => get_current_user_id(),
        );
        $comments = get_comments($args);
        ?>
        
        <?php foreach ($comments as $comment) : ?>
        <div class="comment">
            <h4><?php echo $comment->comment_author ;?> </h4>
            <small><?php echo $comment->comment_date ;?></small><br>
            <p>
                <?php echo $comment->comment_content;?>
            </p>
        </div>
        <hr />
        <?php endforeach; ?>

    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <?php get_sidebar(); ?>
    </div>
</div> <!--div.row-->
<?php get_footer(); ?>
