<?php get_header(); ?>
  <div id="Content">
    <div id="Single-Post">
      <div class="Header">
        <h1><?php the_title(); ?></h1>
      </div>
      <?php
      if ( has_post_thumbnail() ) {
        echo '<div class="Featured-Image">';
          the_post_thumbnail();
        echo '</div>';
      }
      ?>
      <div class="Post-Content">
      <?php
      if (have_posts()) :
        while (have_posts()) :
          the_post();
          the_content();
        endwhile;
      endif;
      ?>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
