<?php 

$title = get_field('building_name');
$coordinates = get_field('building_coordinates');
$floor_amount = get_field('floor_amount');
$building_type = get_field('building_type');
$building_ecology = get_field('building_ecology');
$content = get_field('building_description');
$image = get_field('building_image');
$room = get_field('room');
  
  ?>

<section class="section">
  <div class="inner-container">
    <article class="building">

      <h1 class="building__title"><?php echo $title; ?></h1>

      <div class="building__general">
        <div>
          <div class="building__details">
            Розташування: <p><?php echo $coordinates; ?></p>
          </div>
          <div class="building__details">
            Кількість поверхів: <p><?php echo $floor_amount; ?></p>
          </div>
          <div class="building__details">
            Тип будівлі: <p><?php echo $building_type; ?></p>
          </div>
          <div class="building__details">
            Екологічність: <p><?php echo $building_ecology; ?></p>
          </div>
        </div>


        <?php if( $image ) { 
          
          $image_url = $image['url'];
          $image_medium = $image['sizes']['medium'];
          $image_alt = $image['alt'];
          ?>

        <a href="<?php echo esc_url($image_url); ?>" class="building__general-image" data-lightbox="image">
          <img src="<?php echo esc_url($image_medium); ?>" alt="<?php echo $image_alt; ?>" />
        </a>
        <?php  } ?>
      </div>

      <div class="building__description"><?php if($content) : echo $content; endif; ?></div>

      <?php if($room) {
          
          $square = $room['square'];
          $rooms_amount = $room['rooms_amount'];
          $balcony = $room['balcony'];
          $bathroom = $room['bathroom'];
          $image = $room['rooms_image']['sizes']['medium'];
          $image_alt = $room['rooms_image']['alt']; 
          $image_url = $room['rooms_image']['url']; ?>

      <div class="building__general">

        <a href="<?php echo esc_url($image_url); ?>" data-lightbox="image" class="building__general-image">
          <img src="<?php echo esc_url($image); ?>" alt="<?php echo $image_alt; ?>" />
        </a>

        <div>
          <div class="building__details">
            Площа: <p><?php echo $square; ?></p>
          </div>
          <div class="building__details">
            Кількість кімнат: <p><?php echo $rooms_amount; ?></p>
          </div>
          <div class="building__details">
            Є балкон: <p><?php echo $balcony; ?></p>
          </div>
          <div class="building__details">
            Є санвузол: <p><?php echo $bathroom; ?></p>
          </div>
        </div>

      </div>
      <?php } ?>
    </article>
  </div>
</section>
