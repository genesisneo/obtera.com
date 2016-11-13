<?php

/*
Adding title theme support
https://codex.wordpress.org/Title_Tag
*/
add_theme_support( 'title-tag' );

/* Enable feature image on posts */
add_theme_support('post-thumbnails');
set_post_thumbnail_size(460, 310, true);

/* Prevent .more-link auto-scroll */
function remove_more_jump_link($link) {
    $offset = strpos($link, '#more-');
    if ($offset) {
        $end = strpos($link, '"', $offset);
    }
    if ($end) {
        $link = substr_replace($link, '', $offset, $end - $offset);
    }
    return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

/* Adding class to next or previous post button */
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    return 'class="post-pagination"';
}

/*
Change exceprt read more '[...]'' to '...' and update
excerpt max word length to be shown, default is 55.
http://codex.wordpress.org/Excerpt
*/
function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_length() {
    return 55;
}
add_filter('excerpt_length', 'new_excerpt_length');

/* Adding supports for posts formats */
add_theme_support( 'post-formats', array(
	'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
) );

/*
Automatic insert any video attachment inside <div class="video-container">
https://wordpress.org/support/topic/adding-a-wrapping-div-to-video-embeds
*/
add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);
function my_embed_oembed_html($html, $url, $attr, $post_id) {
  return '<div class="video-container aligncenter">' . $html . '</div>';
}

/*
Add dashicons on themes for posts formats
http://wpsites.net/web-design/adding-dashicons-in-wordpress/
*/
add_action( 'wp_enqueue_scripts', 'dashicons_style_front_end' );
function dashicons_style_front_end() {
    wp_enqueue_style( 'dashicons' );
}

/* Comments template */
function obtera($comment, $args, $depth) {

    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }

?>

    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php endif; ?>

        <div class="comment-author vcard">
            <div class="comment-author-cell">
                <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            </div>
            <div class="comment-author-cell">
                <?php printf( __('<span class="fn">%s</span><br>'), get_comment_author_link() ); ?>
                <?php printf( __('<span class="date-time">%1$s at %2$s</span>'), get_comment_date(), get_comment_time() ); ?>
                <?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
            </div>
        </div>

        <?php if ( $comment->comment_approved == '0' ) : ?>
            <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
        <?php endif; ?>

        <?php comment_text(); ?>

        <div class="reply">
            <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>

        <?php if ( 'div' != $args['style'] ) : ?>
            </div>
        <?php endif; ?>

<?php

}

/*
Add "General" tag automatic on new post. "General" tag should
be added & published first or else it will cause an error.
http://stackoverflow.com/a/14705876
*/
function set_archive_tag_on_publish($post_id,$post) {
  if ($post->post_type == 'post'
    && $post->post_status == 'publish') {
      wp_set_post_tags( $post_id, 'General', true );
    }
  }
add_action('save_post','set_archive_tag_on_publish',10,2);

/* Footer widgets */
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Footer',
        'description' => 'Only one "Text" widget is currently supported. It will be use for "About us" section',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1 id="aboutus">',
        'after_title' => '</h1>'
    ));
}

/*
Disable other widgets except WP_Widget_Text
http://www.paulund.co.uk/how-to-remove-default-wordpress-widgets
*/
function remove_default_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    // unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
}
add_action('widgets_init', 'remove_default_widgets');

?>