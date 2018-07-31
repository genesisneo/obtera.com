<?php
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die ('Please do not load this page directly.');
  }
  if (post_password_required()) {
    return;
  }
?>

<?php if (comments_open() || have_comments() || get_comments_number()) : ?>
  <h4 class="mb-3 pb-3 comment-title">
    <?php printf( _nx('One comment on "%2$s"', '%1$s comments on "%2$s"', get_comments_number(), 'comments title', 'obtera'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>'); ?>
  </h4>
  <ul class="comment-list">
    <?php
      wp_list_comments(
        array(
          'style' => 'ul',
          'type' => 'all',
          'short_ping' => true,
          'callback' => 'obtera_comments',
        )
      );
    ?>
  </ul>
  <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
    <div class="row mb-3 justify-content-center">
      <?php previous_comments_link( __( 'Older comments', 'obtera' ) ); ?>
      <?php next_comments_link( __( 'Newer comments', 'obtera' ) ); ?>
    </div>
  <?php endif; ?>
<?php endif; ?>
<?php if (comments_open()) : ?>
  <h4 id="respond" class="mb-3 pb-3 comment-form-title">Share your thoughs</h4>
  <form method="post" action="<?php echo site_url('/wp-comments-post.php') ?>">
    <?php if (!is_user_logged_in()) : ?>
      <div class="form-group">
        <label for="author">Name</label>
        <input type="text" id="author" name="author" class="form-control" placeholder="Jame Corney" required />
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="jcorney@mail.com" required />
      </div>
      <div class="form-group">
        <label for="url">Website</label>
        <input type="url" id="url" name="url" class="form-control" placeholder="https://jamescorney.com" required />
      </div>
    <?php endif; ?>
    <div class="form-group">
      <label for="comment">Comment</label>
      <textarea id="comment" name="comment" class="form-control" rows="4" required></textarea>
    </div>
    <div class="form-group">
      <?php if (is_user_logged_in()) : ?>
        <p class="float-right mt-2 mb-0">Logged in as <?php echo get_user_option('user_nicename') ?></p>
      <?php endif; ?>
      <button type="submit" class="btn btn-primary">Post comment</button>
      <?php comment_form_hidden_fields() ?>
    </div>
  </form>
<?php else : ?>
  <p class="m-0">Sorry, comments are closed for this article.</p>
<?php endif ?>

<style type="text/css">
  <?php include(get_template_directory() . '/src/assets/scss/comments.css'); ?>
</style>
