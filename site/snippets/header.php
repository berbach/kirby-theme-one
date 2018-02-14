<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <?php if ($favicon != ''): ?>
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $favicon['180'] ?>">
        <link rel="icon" type="image/png" href="<?php echo $favicon['32'] ?>" sizes="32x32">
        <link rel="icon" type="image/png" href="<?php echo $favicon['16'] ?>" sizes="16x16">
        <link rel="mask-icon" href="<?php echo $favicon['32'] ?>" color="<?php echo $site->base_color() ?>">
        <meta name="theme-color" content="#ffffff">
    <?php endif ?>

    <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
    <?php if ($page->intro() == ''): ?>
        <meta name="description" content="<?php echo $site->description()->html() ?>">
    <?php else: ?>
        <meta name="description" content="<?php echo $page->intro()->html() ?>">
    <?php endif ?>
    <meta property="og:site_name" content="<?php echo $site->title()->html() ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php echo $page->title()->html() ?>"/>
    <?php if ($page->intro() == ''): ?>
        <meta property="og:description" content="<?php echo $site->description()->html() ?>"/>
    <?php else: ?>
        <meta property="og:description" content="<?php echo $page->intro()->html() ?>"/>
    <?php endif ?>
    <meta property="og:url" content="<?php echo $page->url() ?>"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="<?php echo $page->title()->html() ?>"/>
    <?php if ($page->intro() == ''): ?>
        <meta name="twitter:description" content="<?php echo $site->description()->html() ?>"/>
    <?php else: ?>
        <meta name="twitter:description" content="<?php echo $page->intro()->html() ?>"/>
    <?php endif ?>
    <meta name="twitter:url" content="<?php echo $page->url() ?>"/>

    <?php echo css('assets/dist/main.css') ?>

    <style>
        a,
        .page-contact_spacer .fa,
        .page-fullscreen_box a,
        .page-blog_list__item a,
        .page-blog_about i:first-of-type,
        .page-blog_list__item h3 a:hover,
        .page-blog_about a:hover,
        .page-header .navbar-default .navbar-nav > li > a:focus, .page-header .navbar-default .navbar-nav > li > a:hover {
            color: <?php echo $site->base_color() ?>
        }

        .page-gallery .grid-item_link:hover {
            background-color: rgba(<?php echo $baseAsRgb[0] ?>, <?php echo $baseAsRgb[1] ?>, <?php echo $baseAsRgb[2] ?>, .9);
        }

        .page-headline h1 {
            border-top: 4px solid <?php echo $site->base_color() ?>;
        }

        .page-text li::before, .page-footer a:hover {
            color: <?php echo $site->base_color() ?>;
        }

        .page-header .navbar-default .navbar-nav > li > a, .page-footer a, .page-fullscreen_box, .page-footer {
            color: <?php echo $site->font_color() ?>;
        }

        .navbar-default .navbar-toggle .icon-bar {
            background-color: <?php echo $site->font_color() ?>;
        }

        .page-fullscreen_box {
            background-color: rgba(<?php echo $bgAsRgb[0] ?>, <?php echo $bgAsRgb[1] ?>, <?php echo $bgAsRgb[2] ?>, .8);
        }

        .page-header .navbar-default, .page-footer {
            background-color: <?php echo $site->bg_color() ?>
        }

        .page-gallery .grid-item_link {
            color: <?php echo $site->bg_color() ?>
        }

        <?php $bigimage = $page->big_header()->toFile() ?>
        <?php if ($bigimage): ?>
        <?php echo adaptiveBackground($bigimage, ['class' => '.big-header',
                                                    'lg_width' => 1920,
                                                    'md_width' => 1200,
                                                    'sm_width' => 920,
                                                    'xs_width' => 720]) ?>
        <?php endif ?>
        <?php $header = $page->header()->toFile() ?>
        <?php if ($header): ?>
        <?php echo adaptiveBackground($header, ['class' => '.header',
                                                'lg_width' => 1920,
                                                'md_width' => 1200,
                                                'sm_width' => 920,
                                                'xs_width' => 720]) ?>
        <?php else: ?>
        <?php $header = $pages->find('home')->big_header()->toFile() ?>
        <?php if ($header): ?>
        <?php echo adaptiveBackground($header, ['class' => '.header',
                                                'lg_width' => 1920,
                                                'md_width' => 1200,
                                                'sm_width' => 920,
                                                'xs_width' => 720]) ?>
        <?php endif ?>
        <?php endif ?>
    </style>
    <?php if ($site->googleanalytics() != ''): ?>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', '<?php echo $site->googleanalytics() ?>', 'auto');
            ga('set', 'anonymizeIp', true);
            ga('send', 'pageview');
        </script>
    <? endif ?>

</head>
<body>
<!--[if lt IE 10]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<header class="page-header">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo url() ?>">
                    <?php $image = $site->logo()->toFile(); ?>
                    <?php if ($image): ?>
                        <img src="<?php echo $logo ?>" alt="<?php echo $site->title()->html() ?>"/>
                    <?php endif ?>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php snippet('menu') ?>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
