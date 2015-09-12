<?php
  add_theme_support('menus');
  register_nav_menus(array(
  'menu' => 'Header'
  ));

  function new_excerpt_more( $more ) {
	   return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'your-text-domain' ) . '</a>';
  }
  add_filter( 'excerpt_more', 'new_excerpt_more' );

  function custom_excerpt_length( $length ) {
	   return 40;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

  function custom_breadcrumbs() {

      // Settings
      $separator          = '&gt;';
      $breadcrums_id      = 'breadcrumbs';
      $breadcrums_class   = 'breadcrumbs';
      $home_title         = 'Homepage';

      // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
      $custom_taxonomy    = 'product_cat';

      // Get the query & post information
      global $post,$wp_query;

      // Do not display on the homepage
      if ( !is_front_page() ) {

          // Build the breadcrums
          echo '<ul class="' . $breadcrums_id . '" class="' . $class . '">';

          // Home page
          echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
          echo '<li class="separator separator-home"> ' . $separator . ' </li>';

          if ( is_archive() && !is_tax() && !is_category() ) {

              echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';

          } else if ( is_archive() && is_tax() && !is_category() ) {

              // If post is a custom post type
              $post_type = get_post_type();

              // If it is a custom post type display name and link
              if($post_type != 'post') {

                  $post_type_object = get_post_type_object($post_type);
                  $post_type_archive = get_post_type_archive_link($post_type);

                  echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                  echo '<li class="separator"> ' . $separator . ' </li>';

              }

              $custom_tax_name = get_queried_object()->name;
              echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

          } else if ( is_single() ) {

              // If post is a custom post type
              $post_type = get_post_type();

              // If it is a custom post type display name and link
              if($post_type != 'post') {

                  $post_type_object = get_post_type_object($post_type);
                  $post_type_archive = get_post_type_archive_link($post_type);

                  echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                  echo '<li class="separator"> ' . $separator . ' </li>';

              }

              // Get post category info
              $category = get_the_category();

              // Get last category post is in
              $last_category = end(array_values($category));

              // Get parent any categories and create array
              $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
              $cat_parents = explode(',',$get_cat_parents);

              // Loop through parent categories and store in variable $cat_display
              $cat_display = '';
              foreach($cat_parents as $parents) {
                  $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                  $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
              }

              // If it's a custom post type within a custom taxonomy
              $taxonomy_exists = taxonomy_exists($custom_taxonomy);
              if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                  $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                  $cat_id         = $taxonomy_terms[0]->term_id;
                  $cat_nicename   = $taxonomy_terms[0]->slug;
                  $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                  $cat_name       = $taxonomy_terms[0]->name;

              }

              // Check if the post is in a category
              if(!empty($last_category)) {
                  echo $cat_display;
                  echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

              // Else if post is in a custom taxonomy
              } else if(!empty($cat_id)) {

                  echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                  echo '<li class="separator"> ' . $separator . ' </li>';
                  echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

              } else {

                  echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

              }

          } else if ( is_category() ) {

              // Category page
              echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';

          }

          echo '</ul>';

      }

  }


?>
