<article class="object">
  <a href="<?php echo get_permalink(); ?>" class="object__link">
    <?php 
      $title = get_field('building_name');
      $content = get_field('building_description');
      $image = get_field('building_image');
    ?>
    <h2><?php echo esc_html($title); ?></h2>
    <div>
      <?php if ($content) {
          echo wp_html_excerpt($content, 200, '...');
      } ?>
    </div>
    <div class="">
      <?php if ($image) { 
          $image_medium = $image['sizes']['medium'];
          $image_alt = $image['alt'];
      ?>
      <div class="building__general-image">
        <img src="<?php echo esc_url($image_medium); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
      </div>
      <?php } ?>
    </div>
  </a>
</article>