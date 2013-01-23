<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title( '|', true, 'right' );

        // Add the blog name.
        bloginfo( 'name' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf('Página %s', max( $paged, $page ) );
        ?></title>

        <meta name="viewport" content="width=device-width">

        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" />

        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,700,400italic,700italic,300italic' rel='stylesheet' type='text/css'>

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <header id="site-header" class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">

                    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <?php if(is_page(12) || is_single('56')){ ?>
                        <span class="brand"><?php bloginfo('name') ?></span>
                    <?php } else { ?>
                        <a class="brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name') ?></a>
                    <!-- Everything you want hidden at 940px or less, place within here -->
                    <div class="nav-collapse">
                        <ul class="nav">
                            <?php wp_nav_menu(array('theme_location' => 'topmenu', 'container' => false, 'items_wrap' => '%3$s', 'menu_id' => 'top-nav', 'walker' => new Bootstrap_Walker_Nav_Menu())); ?>
                            <?php if(is_user_logged_in()) : ?>
                                <li class="logout"><a href="<?php echo wp_logout_url(home_url()); ?>" title="Logout" class=>Sair</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </header>

        <section id="site-content">
            <?php if(!is_front_page() && function_exists('bcn_display')) : ?>
                <section id="breadcrumbs">
                    <div class="container">
                        <div class="breadcrumb">
                            <small><?php bcn_display(); ?></small>
                        </div>
                    </div>
                </section>
            <?php endif; ?>