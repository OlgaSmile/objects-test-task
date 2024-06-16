<?php
/*
Template Name: home
*/
get_header();
?>

<section class="section">
  <div class="inner-container">

    <?php 
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
      );

    $query = new WP_Query($args);

    if ( $query->have_posts() ) { ?>

    <ul class="books__list">

      <?php while ( $query->have_posts() ) {
        $query->the_post();

        get_template_part( 'template-parts/one-post'); } ?>

    </ul>

    <?php }
    wp_reset_postdata(); ?>

    <a class="books__button" href="<?php the_field('all_posts_links', 'option') ?>">Дивитись усі пости</a>
  </div>
</section>

<section class="section">
  <div class="inner-container">

    <?php echo do_shortcode( '[shortcode_filter_func]' ) ?>

  </div>
</section>

<?php
get_footer(); ?>