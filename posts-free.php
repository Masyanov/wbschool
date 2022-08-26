<?php
/*
Template Name: Бесплатные материалы
*/

get_template_part('template-parts/header');
?>

<main>
    <section class="materials">
        <div class="container">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a class="link link--opacity" href="index.html">Главная
                    </a>
                </li>
                <li class="breadcrumbs__item"><span>Статьи</span>
                </li>
            </ul>
            <div class="materials__wrapper">
                <svg class="background-image" width="1100" height="1166" aria-hidden="true">
                    <use xlink:href="#background-image"></use>
                </svg>
                <h1 class="title title--h1 title--center">Полезные статьи</h1>
                <ul class="materials-block">
                    <? $postsMain = carbon_get_theme_option('posts_association');?>
                    <? foreach ($postsMain as $post) :?>
                    <li class="materials-block__item materials-block__item--big">
                        <article class="card-article card-article--big">
                            <div class="card-article__img-wrapper">
                                <picture>
                                    <?= get_the_post_thumbnail($post['id'], 'full') ?>
                                </picture>
                            </div>
                            <div class="card-article__text-content"><a>
                                    <h3 class="title card-article__title"><?= get_the_title($post['id']) ?></h3></a>
                                <p class="card-article__description"><? echo carbon_get_post_meta($post['id'], 'courses-mini-desc'); ?></p>
                                <ul class="card-article__authors">
                                    <? $speaker = carbon_get_post_meta($post['id'],'speakers_association');?>
                                    <? foreach ($speaker as $speak) :?>
                                    <li class="card-article__author">
                                        <picture>
                                            <?= get_the_post_thumbnail($speak['id'], 'full') ?>
                                        </picture>
                                        <p class="card-article__author-name"><?= get_the_title($speak['id']) ?></p>
                                    </li>
                                    <? endforeach; ?>
                                </ul>
                                <a class="link link link--blue link--uppercase link--letter-spacing card-article__link" href="<?= get_permalink($post['id']) ?>">Читать далее
                                    <svg width="16" height="9" aria-hidden="true">
                                        <use xlink:href="#arrow"></use>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </li>
                    <? endforeach; ?>

                    <?
                    $categories = get_categories([
                        'taxonomy' => 'posts-categories',
                        'type' => 'post',
                        'child_of' => 0,
                        'parent' => '',
                        'orderby' => 'name',
                        'order' => 'DESC',
                        'hide_empty' => 1,
                        'hierarchical' => 1,
                        'exclude' => '',
                        'include' => '',
                        'number' => 0,
                        'pad_counts' => false,
                    ]);
                    ?>

                    <?
                    $home_posts = get_posts([
                            'numberposts' => -1,
                            'post_type' => 'posts',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'posts-categories',
                                    'field' => 'slug',// тут можно указать slug и ниже вписать ярлыки нужных рубрик
                                    'terms' => 'free',

                                ]
                            ],
                            'orderby' => 'date',
                            'order' => 'ASC',
                        ]
                    );
                    ?>
                    <? foreach ($home_posts as $home_post) :?>
                        <li class="materials-block__item">
                            <article class="card-article">
                                <div class="card-article__img-wrapper">
                                    <picture>
                                        <?= get_the_post_thumbnail($home_post->ID, 'full') ?>
                                    </picture>
                                </div>
                                <div class="card-article__text-content"><a>
                                        <h3 class="title card-article__title"><?= $home_post->post_title ?></h3></a>
                                    <p class="card-article__description"><? echo carbon_get_post_meta($home_post->ID, 'courses-mini-desc'); ?></p>
                                    <ul class="card-article__authors">
                                        <? $speaker = carbon_get_post_meta($home_post->ID,'speakers_association');?>
                                        <? foreach ($speaker as $speak) :?>
                                            <li class="card-article__author">
                                                <picture>
                                                    <?= get_the_post_thumbnail($speak['id'], 'full') ?>
                                                </picture>
                                                <p class="card-article__author-name"><?= get_the_title($speak['id']) ?></p>
                                            </li>
                                        <? endforeach; ?>
                                    </ul>
                                    <a class="link link link--blue link--uppercase link--letter-spacing card-article__link" href="<?= get_permalink($home_post->ID) ?>">Читать далее
                                        <svg width="16" height="9" aria-hidden="true">
                                            <use xlink:href="#arrow"></use>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        </li>
                    <? endforeach; ?>



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
