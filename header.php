<!DOCTYPE html>
<html>
  <head>
    <title><?php wp_title('-', true, 'right'); ?></title>
    <?php show_favicon(); ?>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/style.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/resource/vendor/font-awesome/css/font-awesome.min.css" />
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/resource/script/jquery-3.2.1.min.js"></script>
	<?php wp_head(); ?>
  </head>
  <body>
    <div id="Container" class="Page">
      <div id="Header">
        <h1><a href="<?php echo get_site_url(); ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
        <a href="<?php echo get_site_url(); ?>/about-me/"><span>&raquo; About Me</span></a>
      </div>
