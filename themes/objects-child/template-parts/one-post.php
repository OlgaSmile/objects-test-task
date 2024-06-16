<li class="books__item">
  <div class="books__item-head">
    <?php the_title(); ?>

    <div class="books__item-image">
    <?php get_template_part( 'template-parts/thumbnail' ); ?>
    </div>

  </div>

  <div class="books__item-body">
    <div class="books__item-description"><?php 
  $content = get_the_content();
  if($content){
    echo wp_html_excerpt( $content, 250, '...' ); 
  } ?>
    </div>
    <a class="books__item-link" href="<?php the_permalink(); ?>">Читати більше</a>
  </div>

</li>