<?php get_header(); ?>

<div class="container my-3 archive">

  <div class="row">
    
    <?php
      if (have_posts()) :
        $postCount = 0;
        ?>
          <section class="col-12 mb-3 px-2 item">
            <h4>
              <span class="font-weight-normal">Results for:</span>
              <?php echo esc_html(get_search_query(false)); ?>
            </h4>
          </section>
        <?php
        while (have_posts()) : the_post();
          if ($postCount === 6) {
            echo google_adsense_ads();
          }
          get_template_part('/src/components/content', 'cards');
          $postCount++;
        endwhile;
        ?>
  </div>
  <div class="row justify-content-center">
        <?php
          next_posts_link('Older posts');
          previous_posts_link('Newer posts');
      else:
        get_template_part('/src/components/content', 'none');
      endif;
    ?>
    
  </div>

</div>

<style type="text/css">
  <?php include(get_template_directory() . '/src/assets/scss/default.css'); ?>
</style>

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    // item listener
    var win = $('.obtera');
    var allMods = $(".item");
    allMods.each(function(i, el) {
      var el = $(el);
      if (el.visible(true))
        el.addClass("slide visible");
    });
    win.scroll(function(event) {
      allMods.each(function(i, el) {
        var el = $(el);
        if (el.visible(true))
          el.addClass("slide");
      });
    });
  });
</script>

<?php get_footer(); ?>
