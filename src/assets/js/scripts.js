$(window).on("load", function() {

  // remove domain name in all links
  for (var i=0; i<$('a').length; i++) {
    var path = $('a')[i].getAttribute('href'),
        expression = new RegExp("^https?://" + window.location.hostname, 'i'),
        newPath;
    if (path !== null && expression.test(path)) {
      newPath = path.replace(window.location.origin, '');
      $('a')[i].setAttribute('href', newPath);
    }
  }

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
      $('.search-input').focus();
      return false;
    } else {
      if (gtag) {
        gtag('event', 'search', {
          'event_category': 'search',
          'event_label': 'search',
          'value': $('.search-input').val()
        });
      }
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

  // send event to google analytics if link have data-action
  $('.post-content a[data-action]').on('click', function() {
    if (gtag) {
      var dataAction = this.getAttribute('data-action');
      var dataCategory = this.getAttribute('data-category');
      var dataLabel = this.getAttribute('data-label');
      var dataValue = this.getAttribute('href');
      gtag('event', dataAction, {
        'event_category': dataCategory,
        'event_label': dataLabel,
        'value': dataValue
      });
    }
  });

});
