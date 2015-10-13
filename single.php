<?php get_header(); ?>
  <?php custom_breadcrumbs(); ?>
  <div class="post-list">
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="post-title single-title">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </div>
  <div class="post-content"><?php the_content(); ?></div>
  <div style="clear:both;"></div>
  <ul class="post-meta">
    <li>Tags: <?php the_tags(''); ?></li>
    <li>Category: <?php the_category(', ') ?></li>
  </ul>

  </div>
  <?php
  if ( comments_open() || get_comments_number() ) :
    comments_template();
  endif;
  endwhile;
  ?>
<?php get_footer(); ?>
