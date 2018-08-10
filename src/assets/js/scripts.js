$(window).on("load", function() {

  // remove splash if the page is fully loaded
  $('.obtera .splash').fadeOut(500, function() {
    $('.obtera').removeClass('show-splash');
  });
  
});

$(function() {

  // activate lazy loading
  $('.obtera .lazy').lazy({
    appendScroll: $('.obtera'),
    effect: 'fadeIn',
    threshold: 250,
    visibleOnly: true
  });

  // add shadow class on header once srolled
  $('.obtera').scroll(function() {
    if ($(this).scrollTop() > 1) {
      $('header').addClass('shadow');
    } else {
      $('header').removeClass('shadow');
    }
  });

  // search validation
  $('.search-form .btn').click(function() {
    if ($('.search-input').val() === '') {
      return false;
    }
  });

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
