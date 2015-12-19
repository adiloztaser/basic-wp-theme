<?php get_header();?>
<div class="lazyload">
	<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$query_args = array(
			'post_type' => 'post',
			'posts_per_page' => 10,
			'paged' => $paged
		);
	 	query_posts($query_args);
		if (have_posts()) {
	?>

	<ul class="page post-list" id="p<?php echo $paged; ?>">

 <?php while (have_posts()) { the_post(); ?>
		<li>
			<div class="post-date"><?php the_time('d/m/Y'); ?></div>
			<div class="post-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</div>
		</li>
<?php } ?>

	</ul>
</div>

	<?php } ?>
	<div class="spinner">
	  <img src="<?php bloginfo('template_url'); ?>/loading.gif">
	</div>
	<button class="pagination" href="#">Load more post</button>
<?php get_footer(); ?>
