<?php get_header(); ?>


	<ul class="post-list">
	<?php query_posts('cat=-15'); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<li>
			<div class="post-date"><?php the_time('d/m/Y'); ?></div><div class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		</li>
  <?php endwhile; else: ?>
  <?php _e('Clear'); ?>
  <?php endif; ?>
	</ul>

<?php get_footer(); ?>
