<?php
/*
Template Name: all_posts
*/
get_header();
?>

<section class="section">
  <div class="inner-container">

    <h1 class="page-title"><?php the_title(); ?></h1>

    <?php 
      $args = array(
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
      );

      $query = new WP_Query($args);

      if ( $query->have_posts() ) { ?>

    <ul class="books__list">

      <?php while ( $query->have_posts() ) {
          $query->the_post();

          get_template_part( 'template-parts/one-post');
          
          } ?>

    </ul>

    <?php }
    
    wp_reset_postdata(); ?>

  </div>
</section>