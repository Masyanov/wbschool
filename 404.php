<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wbdent
 */

get_template_part('template-parts/header');
?>

<main>
    <div class="container">
        <div class="page-404__content" style="margin-top: 30px"><span class="page-404__message">Ошибка 404</span>
            <h1 class="title title--h9">К&nbsp;сожалению, такой страницы нет</h1>
            <p class="page-404__info">Она удалена или в&nbsp;адресе есть ошибка.</p>
            <p class="page-404__info page-404__info--desktop">Возможно вы искали один из&nbsp;наших курсов. Перейдите <a
                        class="page-404__link link" href="/">на&nbsp;главную страницу</a> или посмотрите наши
                популярные курсы ниже:
            </p>
            <p class="page-404__info page-404__info--mobile">Возможно вы искали один из&nbsp;наших курсов.</p>
            <p class="page-404__info page-404__info--mobile"> Перейдите <a class="page-404__link link"
                                                                           href="index.html">на&nbsp;главную
                    страницу</a> или посмотрите наши популярные курсы ниже:
            </p>
        </div>
        <section>


            <ul class="courses-block">
                <?
                $categories = get_categories([
                    'taxonomy' => 'courses-categories',
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
                        'numberposts' => 1 - 4,
                        'post_type' => 'courses',
                        'tax_query' => [
                            [
                                'taxonomy' => 'courses-categories',
                                'field' => 'slug',// тут можно указать slug и ниже вписать ярлыки нужных рубрик
                                'terms' => ['offlajn', 'onlajn'],

                            ]
                        ],
                        'orderby' => 'date',
                        'order' => 'ASC',
                    ]
                );
                ?>
                <? foreach ($home_posts as $home_post) : ?>
                    <li class="courses-block__item">
                        <article class="card-course">
                            <div class="card-course__img-wrapper">
                                <picture>
                                    <?= get_the_post_thumbnail($home_post->ID, 'full') ?>
                                </picture>
                            </div>
                            <div class="card-course__text-content">
                                <p class="card-course__info">

                                            <span class="card-course__format card-course__format--<? echo carbon_get_post_meta($home_post->ID, 'on-off'); ?>">
                                                <? echo carbon_get_post_meta($home_post->ID, 'on-off'); ?></span>

                                    <span class="card-course__start">
                                                <? echo carbon_get_post_meta($home_post->ID, 'date-main'); ?></span></p>

                                <a href="#"><h3 class="title card-course__title"><?= $home_post->post_title ?></h3></a>
                                <p class="card-course__description"><? echo carbon_get_post_meta($home_post->ID, 'courses-mini-desc'); ?></p>
                                <ul class="card-course__speakers">
                                    <? $speaker = carbon_get_post_meta($home_post->ID, 'speakers_association'); ?>
                                    <? foreach ($speaker as $speak) : ?>
                                        <li class="card-course__speaker">
                                            <picture>
                                                <?= get_the_post_thumbnail($speak['id'], 'full') ?>
                                            </picture>
                                            <p class="card-course__speaker-name"><?= get_the_title($speak['id']) ?></p>
                                        </li>
                                    <? endforeach; ?>
                                </ul>
                                <a class="link link link--blue link--uppercase link--letter-spacing card-course__link"
                                   href="<?= get_permalink($home_post->ID) ?>">Подробнее о курсе
                                    <svg width="16" height="9" aria-hidden="true">
                                        <use xlink:href="#arrow"></use>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </li>
                <? endforeach; ?>


            </ul>

            <div class="main-courses__btn"  style="margin-bottom: 30px">
                <a class="btn btn btn--white btn--uppercase btn--padding-13-30" href="/courses/">Посмотреть все курсы
                    <svg width="16" height="9" aria-hidden="true">
                        <use xlink:href="#arrow"></use>
                    </svg>
                </a>
            </div>

        </section>
</main><!-- #main -->

<?php get_template_part('template-parts/footer'); ?>
