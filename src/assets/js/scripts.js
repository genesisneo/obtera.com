$(function(){

  // activate lazy loading
  if (!!$.lazy || !!$.Lazy) {
    $('.obtera .lazy').lazy({
      appendScroll: $('.obtera'),
      effect: 'fadeIn',
      threshold: 100,
      visibleOnly: true
    });
  }

  // add shadow class on header once srolled
  $('.obtera').scroll(function() {
    if ($(this).scrollTop() > 1) {
      $('header').addClass('shadow');
    } else {
      $('header').removeClass('shadow');
    }
  });

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

  // search validation
  $('.search-form .btn').click(function() {
    if ($('.search-input').val() === '') {
      $('.search-input').focus();
      return false;
    } else {
      if (gtag) {
        gtag('event', 'Search', {
          'event_category': 'Search',
          'event_label': 'Search',
          'value': $('.search-input').val()
        });
      }
    }
  });

});
