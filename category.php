<?php get_header(); ?>
  <div id="Content">
    <div class="BlogPost">
      <?php if ( have_posts() ) : ?>
        <div class="CategoryPost">
          <h2><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></h2>
          <ul>
          <?php while ( have_posts() ) : the_post(); ?>
            <li id="post-<?php the_ID(); ?>"><span><?php the_time('d M Y') ?></span> <i class="Seperate">&raquo;</i> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          <?php endwhile; ?>
          </ul>
        </div>
        <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
