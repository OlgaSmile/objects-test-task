<?php 

$content = get_the_content();
$title = get_the_title();

?>

<section class="section">
  <div class="inner-container">
    <article class="single__post">

      <div>
        <h1 class="single__post-title"><?php if($title) : echo $title; endif;?></h1>
        <div class="single__post-time">
          <?php the_time('d.m.Y'); ?>
        </div>
        <div class="single__post-description"><?php if($content) : echo $content; endif; ?></div>
      </div>

      <?php get_template_part( 'template-parts/thumbnail' ); ?>

    </article>
  </div>
</section>

<?php get_template_part( 'template-parts/navigation' ); ?>