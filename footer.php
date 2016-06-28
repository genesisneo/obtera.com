
<!-- Footer -->
<footer id="footer">

    <div class="row">

        <div class="columns small-12 medium-4">
            <h1 id="search">Search</h1>
            <form id="search-form" class="search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="text" id="search-input" name="s" placeholder="Search..." value="" />
                <input type="submit" id="search-submit" value="" />
            </form>
            <h1 id="followus">Follow us</h1>
            <ul class="footer-social-networks">
                <li><a href="http://facebook.com/obteracom"><span class="facebook"></span>facebook.com/obteracom</a></li>
                <li><a href="http://twitter.com/obteracom"><span class="twitter"></span>twitter.com/obteracom</a></li>
                <li><a href="http://plus.google.com/+Obteracom"><span class="googleplus"></span>plus.google.com/+obteracom</a></li>
                <li><a href="http://youtube.com/obteracom"><span class="youtube"></span>youtube.com/obteracom</a></li>
                <li><a href="http://feeds.feedburner.com/obteracom"><span class="rss"></span>feeds.feedburner.com/obteracom</a></li>
            </ul>
        </div>

        <div class="columns small-12 medium-8">
            <?php
                if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer") ) : endif;
            ?>
        </div>

    </div>

    <div class="row">

        <div class="columns">
            <p class="copyrights">
                2015 &copy; All rights reserved | obtera.com
            </p>
        </div>

    </div>


</footer>

<!-- Google Analytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-68704357-1', 'auto');
    ga('send', 'pageview');
</script>

<!-- Sitelinks Search Box -->
<!-- https://developers.google.com/structured-data/slsb-overview -->
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "WebSite",
    "url": "http://obtera.com/",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "http://obtera.com/?s={query}",
        "query-input": "required name=query"
    }
}
</script>

<!-- AddThis Analytics -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-562f202ecd1822ce" async="async"></script>

<!-- WordPress Scripts -->
<?php wp_footer(); ?>

</body></html>
