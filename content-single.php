      <div id="Content">
        <?php setPostViews(get_the_ID()); ?>
        <div id="Single-Post">
          <div class="Header">
            <h1><?php the_title(); ?></h1>
          </div>
          <div class="Entry-Meta">
            <span class="DateTime"><?php the_time('d M Y') ?></span>
            <span class="View"><i class="fa fa-eye"></i><?php echo getPostViews(get_the_ID()); ?></span>
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
          if (have_posts()):
            while (have_posts()): the_post();
              the_content();
            endwhile;
          endif;
          ?>
          <div class="Social-Sharing">
            <h3>Share</h3>
            <ul>
              <li id="PopupSharing" ><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" onclick="return popitup('https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>')" title="Share on Facebook" target="_blank" onclick="this.target=’_blank’;"><i class="fa fa-facebook-square"></i></a></li>
              <li id="PopupSharing" ><a id="Popup" href="https://twitter.com/intent/tweet?text=I read <?php echo urlencode(get_the_title()); ?>+From <?php echo get_permalink(); ?>" onclick="return popitup('https://twitter.com/intent/tweet?text=I read <?php echo urlencode(get_the_title()); ?>+From <?php echo get_permalink(); ?>')" title="Share on Twitter" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
              <li id="PopupSharing" ><a id="Popup" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" onclick="return popitup('https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>')" title="Share on Google+" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
            </ul>
          </div>          
          <div class="Tags">
            <h3>Tags</h3>
              <span><?php the_tags('<ul><li>', '</li><li>', '</li></ul>'); ?></span>
          </div>
          <?php
            $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
            if( $related ) foreach( $related as $post ) {
              setup_postdata($post); ?>
              <div class="Related-Post">
                <h3>Related Post</h3>
                <ul>
                  <li><span><?php the_time('d M Y') ?></span> &raquo; <a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
                </ul>
              </div>
          <?php
          } wp_reset_postdata(); ?>
          <!-- <?php comments_template(); ?> -->
        </div>
      </div>
