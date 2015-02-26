<?php

/**
 * 
  Template Name: Dodaj post
 *
 */
function theme_name_scripts() {
    wp_enqueue_script('addPostScript', get_template_directory_uri() . '/addPostScript.js', array(), '1.0.0', true);

    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'theme_name_scripts');

get_header();

if (!empty($_POST)) {

    $tags = array();
    $tags[] = filter_input(INPUT_POST, 'tag1', FILTER_SANITIZE_STRING);
    $tags[] = filter_input(INPUT_POST, 'tag2', FILTER_SANITIZE_STRING);
    $tags[] = filter_input(INPUT_POST, 'tag3', FILTER_SANITIZE_STRING);
    $post = array(
        'post_content' => filter_input(INPUT_POST, 'post_content', FILTER_SANITIZE_STRING), // The full text of the post.
        'post_name' => filter_input(INPUT_POST, 'post_title', FILTER_SANITIZE_URL), // The name (slug) for your post
        'post_title' => filter_input(INPUT_POST, 'post_title', FILTER_SANITIZE_STRING), // The title of your post.
        'post_status' => 'publish', // Default 'draft'.
        'post_author' => get_current_user_id(), // The user ID number of the author. Default is the current user ID.
        'post_category' => array(), // Default empty.
        'tags_input' => $tags, // Default empty.
    );
    $newPostId = wp_insert_post($post, $wp_error);
    if ($newPostId) {
        $expiredDate = filter_input(INPUT_POST, 'expired_date');
        $expiredDateTimestamp = strtotime($expiredDate);
        add_post_meta( $newPostId, '_expiration-date', $expiredDateTimestamp );
        add_post_meta( $newPostId, '_expiration-date-options', serialize(array('expireType'=>'private', 'id'=>$newPostId)) );
        add_post_meta( $newPostId, '_expiration-date-status', 'saved' );
        
        $sourceType = filter_input(INPUT_POST, 'source_type', FILTER_SANITIZE_SPECIAL_CHARS);
        add_post_meta( $newPostId, 'source_type', $sourceType );
        if($sourceType === 'link') {
            $link = filter_input(INPUT_POST, 'source_url', FILTER_SANITIZE_URL);
            add_post_meta( $newPostId, 'source_url', $link );
        } elseif($sourceType === 'paper') {
            $sourceTitle = filter_input(INPUT_POST, 'source_title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sourcePublicationNumber = filter_input(INPUT_POST, 'source_publication_number', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            add_post_meta( $newPostId, 'source_title', $sourceTitle );
            add_post_meta( $newPostId, 'source_publication_number', $sourcePublicationNumber );
        }
        
        $message = 'Dodano post';
    }
}
?>

<?php if (!current_user_can('edit_posts')) : ?>
    <p class="bg-danger"><?php echo 'Brak uprawień'; ?></p>
<?php else: ?>

    <div class="row">
        <div class="col-md-9 col-sm-6 col-xs-12" style="padding:10px 25px">

            <?php if (isset($message)): ?>
                <p class="bg-success"><?php echo $message; ?></p>
            <?php endif; ?>

            <h3 class="text-center">Dodaj post</h3>
            <h6 class="text-center">Wszystkie pola są obowiązkowe</h6>
            <form action="" method="post" >
                <div class="form-group">
                    <label for="post_title">Tytuł: </label>
                    <input required class="form-control" type="text" name="post_title" value=""/>
                </div>
                <div class="form-group">
                    <label for="post_title">Treść: </label>
                    <textarea required class="form-control" rows="10" name="post_content"></textarea>
                </div>
                <div class="form-horizontal">
                    <div class="row row-condensed form-group">
                        <label class="col-md-1 col-xs-4 control-label" for="post_title">Tag 1:</label>
                        <div class="col-md-3 col-xs-8">
                            <input class="form-control" name="tag1" />
                        </div>
                        <label class="col-md-1 col-xs-4 control-label" for="post_title">Tag 2:</label>
                        <div class="col-md-3 col-xs-8">
                            <input class="form-control" name="tag2" />
                        </div>
                        <label class="col-md-1 col-xs-4 control-label" for="post_title">Tag 3:</label>
                        <div class="col-md-3 col-xs-8">
                            <input class="form-control" name="tag3" />
                        </div>
                    </div>
                    <div class="row row-condensed form-group">
                        <label class="col-md-1 col-xs-4 control-label" for="post_title">Źródło:</label>
                        <div class="col-md-4 col-xs-8">
                            <select class="form-control" id="source_type" name="source_type">
                                <option value="link">Link</option>
                                <option value="paper">Wydawnictwo papierowe</option>
                            </select>
                        </div>
                        <label class="col-md-3 col-xs-4 control-label" for="post_title">Data wygaśnięcia:</label>
                        <div class="col-md-4 col-xs-8">
                            <input required type="date" class="form-control" name="expired_date" />
                        </div>
                    </div>
                    <hr />
                    <div class="row row-condensed form-group" id="source_link_details">
                        <label class="col-md-1 col-xs-4 control-label" for="post_title">Link:</label>
                        <div class="col-md-11 col-xs-8">
                            <input type="url" class="form-control" name="source_url" />
                        </div>
                    </div>

                    <div class="row row-condensed form-group" id="source_paper_details">
                        <label class="col-md-1 col-xs-4 control-label" for="post_title">Tytuł:</label>
                        <div class="col-md-5 col-xs-8">
                            <input class="form-control" name="source_title" />
                        </div>
                        <label class="col-md-2 col-xs-4 control-label" for="post_title">nr wydania:</label>
                        <div class="col-md-3 col-xs-8">
                            <input class="form-control" name="source_publication_number" />
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <input class="btn btn-primary" type="submit" />
                </div>
            </form>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <?php get_sidebar(); ?>
        </div>
    </div> <!--div.row-->
<?php endif; ?>

<?php
get_footer();
