<?php
/*
Template Name: Бесплатные материалы Free
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
                <h1 class="title title--h1 title--center">БЕСПЛАТНЫЕ МАТЕРИАЛЫ</h1>
                <ul class="materials-block">

                    <?php $home_posts = get_posts([
                            'numberposts' => -1,
                            'post_type' => 'free',
                            'orderby' => 'meta_value',
                            'meta_query' => array(array('key' => 'id-speaker')),
                            'order' => 'ASC',
                        ]
                    );
                    ?>
                    <?php foreach ($home_posts as $idx => $home_post) :?>
                     <?php if ($idx === 0):?>
                            <li class="materials-block__item materials-block__item--big">
                                <article class="card-article card-article--big">
                                    <div class="card-article__img-wrapper">
                                        <picture>
                                            <?= get_the_post_thumbnail($home_post->ID, 'full') ?>
                                        </picture>
                                    </div>
                                    <div class="card-article__text-content"><a>
                                            <h3 class="title card-article__title"><?= get_the_title($home_post->ID) ?></h3></a>
                                        <p class="card-article__description"><?php echo carbon_get_post_meta($home_post->ID, 'post-details-mini-desc'); ?></p>
                                        <ul class="card-article__authors">
                                            <?php $speaker = carbon_get_post_meta($home_post->ID,'speakers_association');?>
                                            <?php foreach ($speaker as $speak) :?>
                                                <li class="card-article__author">
                                                    <picture>
                                                        <?= get_the_post_thumbnail($speak['id'], 'full') ?>
                                                    </picture>
                                                    <p class="card-article__author-name"><?= get_the_title($speak['id']) ?></p>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <a class="link link link--blue link--uppercase link--letter-spacing card-article__link" href="<?= get_permalink($home_post->ID) ?>">Читать далее
                                            <svg width="16" height="9" aria-hidden="true">
                                                <use xlink:href="#arrow"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </article>
                            </li>
                        <?php else:?>
                            <li class="materials-block__item">
                                <article class="card-article">
                                    <div class="card-article__img-wrapper card-article__img">
                                        <picture>
                                            <?= get_the_post_thumbnail($home_post->ID, 'full') ?>
                                        </picture>
                                    </div>

                                    <div class="card-article__text-content"><a>
                                            <h3 class="title card-article__title"><?= $home_post->post_title ?></h3></a>
                                        <p class="card-article__description"><?php echo carbon_get_post_meta($home_post->ID, 'free-mini-desc'); ?></p>
                                        <a class="link link link--blue link--uppercase link--letter-spacing card-article__link" href="<?= get_permalink($home_post->ID) ?>">Читать далее
                                            <svg width="16" height="9" aria-hidden="true">
                                                <use xlink:href="#arrow"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </article>
                            </li>

                        <?php endif;?>
                    <?php endforeach; ?>



                </ul>




                <div class="pagination">
<!--                    <a class="pagination__item pagination__item--active disable">1</a>-->
<!--                    <a class="pagination__item" href="#">2</a>-->
<!--                    <a class="pagination__item" href="#">3</a>-->
<!--                    <a class="pagination__item" href="#">4</a>-->
<!--                    <a class="pagination__item" href="#">5</a>-->
<!--                    <a class="pagination__item pagination__item--last" href="#">далее</a>-->
                </div>
            </div>
        </div>
    </section>
</main>


<?php get_template_part('template-parts/footer'); ?>
