$(function(){

    /* Navigation click event */
    $('a[href^="#"]').click(function () {
        $('html, body').animate({ scrollTop:$(this.hash).offset().top-60 },500);
        if (this.id == 'nav-search') {
            setTimeout(function() { $('#search-input').focus(); }, 750);
        }
        return false;
    });

    /* Attachment with fix */
    var item = $('.item');
    var caption = $('.wp-caption');
    caption.each(function() {
        if ($(this).width() > item.width())
            $(this).css("width","100%");
    });

    /* Window scroll animation */
    var win = $(window);
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

    /* Gallery and image attachements */
    $('a[href$=".jpg"], a[href$=".png"], a[href$=".gif"], a[href$=".bmp"]').attr('data-imagelightbox', 's');
    var selectorS = 'a[data-imagelightbox="s"]';
    var instanceS = $( selectorS ).imageLightbox({
        onStart: function(){
            overlayOn();
            closeButtonOn( instanceS );
        },
        onEnd: function(){
            overlayOff();
            closeButtonOff();
            activityIndicatorOff();
        },
        onLoadStart: function(){
            activityIndicatorOn();
        },
        onLoadEnd: function(){
            activityIndicatorOff();
        }
    });
    $('.gallery .gallery-item .gallery-icon a[href$=".jpg"], .gallery .gallery-item .gallery-icon a[href$=".png"], .gallery .gallery-item .gallery-icon a[href$=".gif"], .gallery .gallery-item .gallery-icon a[href$=".bmp"]').attr('data-imagelightbox', 'g');'a[data-imagelightbox="g"]';
    var selectorG = 'a[data-imagelightbox="g"]';
    var instanceG = $( selectorG ).imageLightbox({
        onStart: function(){
            overlayOn();
            closeButtonOn( instanceG );
            arrowsOn( instanceG, selectorG );
        },
        onEnd: function(){
            overlayOff();
            closeButtonOff();
            arrowsOff();
            activityIndicatorOff();
        },
        onLoadStart: function(){
            activityIndicatorOn();
        },
        onLoadEnd: function(){
            activityIndicatorOff();
            $( '.imagelightbox-arrow' ).css( 'display', 'block' );
        }
    });

});