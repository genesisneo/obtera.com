<?php get_header(); ?>

<article class="content-page">

  <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        get_template_part('/src/components/content', 'page');
      endwhile;
    else:
      get_template_part('/src/components/content', 'none');
    endif;
  ?>

</article>

<style type="text/css">
  <?php include(get_template_directory() . '/src/assets/scss/page.css'); ?>
</style>

<script type="text/javascript" defer>
  document.addEventListener('DOMContentLoaded', function() {

    // parallax
    initializeParallax(document.querySelector('.obtera'));

    // auto enable fancybox if href is image
    $('.post-content a[href$=".jpg"],' +
      '.post-content a[href$=".jpeg"],' +
      '.post-content a[href$=".png"],' +
      '.post-content a[href$=".gif"],' +
      '.post-content a [href$=".bmp"]').each(function() {
      $(this).attr('data-fancybox','obtera');
      $('[data-fancybox]').fancybox({
        buttons: [
          "zoom",
          "download",
          "close"
        ],
        transitionEffect: "slide",
      });
    });

    // auto enable fancybox on galleries
    if ($('.gallery').length) {
      var galleryId = $('.gallery').attr('id');
      $('#' + galleryId + ' a[href$=".jpg"],' +
        '#' + galleryId + ' a[href$=".jpeg"],' +
        '#' + galleryId + ' a[href$=".png"],' +
        '#' + galleryId + ' a[href$=".gif"],' +
        '#' + galleryId + ' a[href$=".bmp"]').each(function() {
        $(this).attr('data-fancybox',galleryId);
        $('[data-fancybox="' + galleryId + '"]').fancybox({
          buttons: [
            "zoom",
            "download",
            "close"
          ],
          transitionEffect: "slide",
        });
      });
    }

  });
</script>

<?php get_footer(); ?>
