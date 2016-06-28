
<?php
    if ( !empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thank you.');
    if ( post_password_required() ) {
        return;
    }
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>

        <h3 class="comments-title">
            <?php
                printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title'), number_format_i18n( get_comments_number() ), get_the_title() );
            ?>
        </h3>

        <ul class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'ul',
                    'short_ping'  => true,
                    'avatar_size' => 45,
                    'type'       => 'comment',
                    'callback'  => obtera
                ) );
            ?>
        </ul>

    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.'); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>

</div>
