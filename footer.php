
<!-- Footer -->
<footer id="footer">

    <div class="row">

        <div class="columns small-12 medium-4">
            <h3 id="search">Search</h3>
            <form id="search-form" class="search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="text" id="search-input" name="s" placeholder="Search..." value="" />
                <input type="submit" id="search-submit" value="" />
            </form>
            <h3 id="followus">Follow us</h3>
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
                2017 &copy; All rights reserved | obtera.com
            </p>
        </div>

    </div>


</footer>

<!-- WordPress Scripts -->
<?php wp_footer(); ?>

</body></html>
