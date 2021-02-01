<?php
/* Template Name: Homepage */ ?>
  <?php get_header(); ?>
  <!--Welcome Section-->
  <section class="welcome" style="background-image:url('<?php echo stripslashes(get_option('mcmxcv_background_img')); ?>')">
    <div class="quote text-center">
      <h2><?php echo stripslashes(get_option('mcmxcv_welcome_text')); ?></h2>
    </div>
    <div class="overlay"></div>
  </section>
  <!--End Welcome Section-->
</div>
<!--End Main Content-->
  <?php wp_footer(); ?>
  <?php get_footer(); ?>
