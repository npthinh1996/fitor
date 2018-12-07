<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name') ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <!-- Custom -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/static/css/style.css">
    <?php wp_head() ?>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <a class="navbar-brand" href="<?php echo home_url() ?>">Phim Tor</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'header-menu',
        'depth' => 2,
        'container_class' => 'collapse navbar-collapse',
        'container_id' => 'navbarResponsive',
        'menu_class' => 'navbar-nav mr-auto',
        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
        'walker' => new WP_Bootstrap_Navwalker
    ))
    ?>
    <form class="form-inline my-2 my-lg-0" action="http://localhost/wordpress">
        <input name="s" class="form-control mr-sm-2" type="search" placeholder="Nhập từ khóa" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
    </form>
</nav>
