<!DOCTYPE html>
<html>

<head>
  <title><?php wp_title('-', true, 'right'); ?></title>
  <?php show_favicon(); ?>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/resource/vendor/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/resource/vendor/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" />
  <?php wp_head(); ?>
</head>

<body>
  <div id="Menu-Utama">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
        <img src="https://ericliputra.com/wp-content/uploads/2020/07/Favicon.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        <span class="navbar-brand-name"><?php echo get_bloginfo('name'); ?></span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php
      wp_nav_menu(array(
        'theme_location'    => 'primary',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'navbarSupportedContent',
        'menu_id'           => '',
        'menu_class'        => 'navbar-nav ml-auto',
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker(),
      ));
      ?>
    </nav>
  </div>