<div class="navigation__wrapper">

  <div class="navigation__box">
    <?php $next_post = get_next_post(true);

        if( ! empty( $next_post ) ) { ?>

    <a class="navigation__text" href="<?php echo get_permalink( $next_post ); ?>">
      &#60; <div><?php echo esc_html( $next_post->post_title ); ?>
      </div>
    </a>

    <?php } ?>
  </div>

  <div class="navigation__box">
    <?php $previous_post = get_previous_post(true);

        if( ! empty( $previous_post ) ) { ?>

    <a class="navigation__text navigation__text-right" href="<?php echo get_permalink( $previous_post ); ?>">
      <div><?php echo esc_html( $previous_post->post_title ); ?></div> &#62;
    </a>

    <?php } ?>
  </div>

</div>