
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>

    <!-- META -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, minimum-scale=1, maximum-scale=1, minimal-ui" />

    <!-- DETAILS -->
    <meta name="author" content="Obtera">
    <meta name="description" content="This is a brain-child of the brothers Ezekiel and Genesis Obtera, both creative and always forward thinking in their own ways.">
    <meta name="keywords" content="graphic, designer, web, ui, artist, flash, animation, filipino, philippines, kabayan, pinoy, good, top, amazing, best, user, interface, apple, ios, iphone, ipad, ipod, google, android, nexus, windows, phone, tablet, desktop, cartoon, social, powerpoi">

    <!-- APPLE -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/assets/img/icons/icon.png" />
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/assets/img/icons/icon72x72.png" sizes="72x72" />
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/assets/img/icons/icon114x114.png" sizes="114x114" />
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/assets/img/icons/icon144x144.png" sizes="144x144" />

    <!-- MICROSOFT -->
    <meta name="theme-color" content="#0b4068" />
    <meta name="application-name" content="Obtera" />
    <meta name="msapplication-TileColor" content="#0b4068" />
    <meta name="msapplication-square70x70logo" content="<?php bloginfo('template_url'); ?>/assets/img/icons/icon70x70.png" />
    <meta name="msapplication-square150x150logo" content="<?php bloginfo('template_url'); ?>/assets/img/icons/icon150x150.png" />
    <meta name="msapplication-wide310x150logo" content="<?php bloginfo('template_url'); ?>/assets/img/icons/icon310x150.png" />
    <meta name="msapplication-square310x310logo" content="<?php bloginfo('template_url'); ?>/assets/img/icons/icon310x310.png" />
    <meta name="msapplication-notification" content="frequency=30;polling-uri=<?php bloginfo('rss_url'); ?>;cycle=1"/>
    <meta name="msvalidate.01" content="1B42EF49F3894041D55ABBD83A0337D0" />

    <!-- STYLE -->
    <link href="http://feeds.feedburner.com/obteracom" rel="alternate" type="application/rss+xml" title="Obtera.com RSS" />
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php bloginfo('template_url'); ?>/assets/img/obtera.ico" rel="shortcut icon" />
    <link href="<?php bloginfo('template_url'); ?>/assets/css/g-grid.css" rel="stylesheet" type="text/css" />
    <link href="<?php bloginfo('template_url'); ?>/assets/css/obtera.css" rel="stylesheet" type="text/css" />
    <link href="<?php bloginfo('template_url'); ?>/assets/css/jqueryLightbox.css" rel="stylesheet" type="text/css" />
    <link href="<?php bloginfo('pingback_url'); ?>" rel="pingback">

    <!-- SCRIPT -->
    <script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/assets/js/jqueryPlugins.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/assets/js/jqueryScript.js"></script>

    <!-- WordPress Scripts -->
    <?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
    <?php wp_head(); ?>

</head><body>

<!-- Navigation -->
<header class="navigation">
    <nav class="row">
        <div class="columns small-6">
            <a href="<?php echo get_option('home'); ?>">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/obtera.png" class="logo">
            </a>
        </div>
        <div class="columns small-6">
            <ul class="navigation-items">
                <li>
                    <a href="#aboutus" id="nav-aboutus" title="About us"></a>
                </li>
                <li>
                    <a href="#followus" id="nav-contactus" title="Contact us"></a>
                </li>
                <li>
                    <a href="#search" id="nav-search" title="Search"></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
