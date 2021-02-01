<?php
/* Template Name: Blog */ ?>
<?php get_header(); ?>
<div class="blog">
  <div class="page-header">
    <h2>Blog</h2>
  </div>
  <?php
    $current_tag = single_tag_title($prefix = '', $display = FALSE);
    $categories = get_categories( array('hide_empty' => TRUE) );

    foreach($categories as $category) {
      $args=array(
        'posts_per_page' => -1,
        'tag' => $current_tag,
        'cat' => $category->term_id,
        'orderby'=> 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
      );

      $the_query = new WP_Query( $args );
      if ( $the_query->have_posts() ) { ?>
        <div class="category-header">
          <h3><?php echo $category->name; ?></h3>
          <ul>
          <?php
            while ( $the_query->have_posts() ) {
              $the_query->the_post(); ?>
              <li id="post-<?php the_ID(); ?>"><span><?php the_time('d M Y') ?></span> <i class="Seperate">&raquo;</i> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          <?php } ?>
          </ul>
        </div>
      <?php
      }
    }
    wp_reset_postdata(); ?>
</div>
<!--End Main Content-->
<?php get_footer(); ?>
