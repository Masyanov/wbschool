<?php
/*
Template Name: Статьи
*/

get_template_part('template-parts/header');
?>

<main>
  <section class="materials">
    <div class="container">
      <?php get_template_part('template-parts/breadcrumb'); ?>
      <div class="materials__wrapper">
        <svg class="background-image" width="1100" height="1166" aria-hidden="true">
          <use xlink:href="#background-image"></use>
        </svg>
        <h1 class="title title--h1 title--center">Полезные статьи</h1>
          <ul class="materials-block" style="margin-bottom: 53px;">
              <?php
              global $wp_query;
              $save_wpq = $wp_query;
              $wp_query = new WP_Query([
                      'posts_per_page' => 7,
                      'post_type' => 'articles',
                      'orderby' => 'date',
                      'order' => 'DESC',
                      'paged' => (get_query_var('paged') ? get_query_var('paged') : 1)
                  ]
              );



              $idx = 0;



              while ($wp_query->have_posts()):?>
                  <?php
                  $idx++;
                  $wp_query->the_post(); ?>

                  <?php if ($idx === 1): ?>
                      <li class="materials-block__item materials-block__item--big">
                          <article class="card-article card-article--big">
                              <div class="card-article__img-wrapper">
                                  <picture>
                                      <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($wp_query->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($wp_query->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($wp_query->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($wp_query->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                  </picture>
                              </div>
                              <div class="card-article__text-content"><a>
                                      <h3 class="title card-article__title">
                                          <?= get_the_title($wp_query->ID) ?></h3></a>
                                  <p
                                          class="card-article__description">

                                      <?php echo carbon_get_post_meta($id, 'post-details-mini-desc'); ?></p>
                                  <ul class="card-article__authors">
                                      <?php $speaker = carbon_get_post_meta($id, 'speakers_association'); ?>
                                      <?php foreach ($speaker as $speak) : ?>
                                          <li class="card-article__author">
                                              <picture>
                                                  <?= get_the_post_thumbnail($speak['id'], 'full') ?>
                                              </picture>
                                              <p class="card-article__author-name">
                                                  <?= get_the_title($speak['id']) ?></p>
                                          </li>
                                      <?php endforeach; ?>
                                  </ul>
                                  <a class="link link link--blue link--uppercase link--letter-spacing card-article__link"
                                     href="<?= get_permalink($wp_query->ID) ?>">Читать далее
                                      <svg width="16" height="9" aria-hidden="true">
                                          <use xlink:href="#arrow"></use>
                                      </svg>
                                  </a>
                              </div>
                          </article>
                      </li>
                  <?php else: ?>
                      <li class="materials-block__item">
                          <article class="card-article">
                              <div class="card-article__img-wrapper card-article__img">
                                  <picture>
                                      <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($wp_query->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($wp_query->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($wp_query->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($wp_query->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                  </picture>
                              </div>





                              <div class="card-article__text-content"><a>
                                      <h3 class="title card-article__title"><?= get_the_title($wp_query->ID) ?></h3></a>
                                  <p
                                          class="card-article__description"><?php echo carbon_get_post_meta($id, 'post-details-mini-desc'); ?></p>
                                  <ul class="card-article__authors">

                                      <?php $speaker = carbon_get_post_meta($id, 'speakers_association'); ?>

                                      <?php foreach ($speaker as $speak) : ?>
                                          <li class="card-article__author">
                                              <picture>
                                                  <?= get_the_post_thumbnail($speak['id'], 'full') ?>
                                              </picture>
                                              <p class="card-article__author-name"><?= get_the_title($speak['id']) ?></p>
                                          </li>
                                      <?php endforeach; ?>
                                  </ul>
                                  <a class="link link link--blue link--uppercase link--letter-spacing card-article__link"
                                     href="<?= get_permalink($wp_query->ID) ?>">Читать далее
                                      <svg width="16" height="9" aria-hidden="true">
                                          <use xlink:href="#arrow"></use>
                                      </svg>
                                  </a>
                              </div>
                          </article>
                      </li>
                  <?php endif; ?>

              <?php endwhile; ?>
          </ul>
          <style>
              .pagination {
                  padding: 0 0 93px !important;
              }

          </style>
          <?php
        // пагинация
        the_posts_pagination();
        ?>


        <?php
        // вернем global $wp_query
        wp_reset_postdata();
        $wp_query = $save_wpq;
        ?>


      </div>
    </div>
  </section>
</main>


<?php get_template_part('template-parts/footer'); ?>
