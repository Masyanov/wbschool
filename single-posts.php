<?php
/*
Template Name: Статья
*/

get_template_part('template-parts/header');
?>

<main>
    <section class="article">
        <div class="container">

                <?php get_template_part('template-parts/breadcrumb'); ?>

            <div class="article__wrapper">
                <? $speaker = carbon_get_post_meta(get_the_ID(),'speakers_association');?>
                <? foreach ($speaker as $speak) :?>

                <div class="article__author">
                    <picture>
                        <?= get_the_post_thumbnail($speak['id'], 'full') ?>
                    </picture>

                    <div class="article__author-text">
                        <a href="<?= get_permalink($speak['id']) ?>">
                        <p class="article__author-name"><?= get_the_title($speak['id']) ?></p>
                        </a>
                        <time"><?php the_date( 'd F Y' ); ?></time>
                    </div>
                </div>
                <? endforeach; ?>
                <div class="article__content">
                    <h1><?= get_the_title() ?></h1>
                    <div class="article__lead">
                        <p><? echo carbon_get_post_meta(get_the_ID(), 'post-details-mini-desc'); ?></p>
                    </div>
                    <figure class="article__img-wrapper">
                        <div class="article__img">
                            <picture>
                                <?= get_the_post_thumbnail(get_the_ID(), 'full') ?>
                            </picture>
                        </div>

                    </figure>
                    <?= get_the_content() ?>
                </div>
            </div>
        </div>
        <ul class="courses-block">
        <!--                ВЫВОД ЛИДМАГНИТА-->

        <li class="courses-block__item courses-block__item--big" style="margin-bottom: 50px">

            <? $lidMain = carbon_get_post_meta(get_the_ID(),'courses-one_association');?>
            <? foreach ($lidMain as $lid) :?>
                <article class="card-course">
                    <div class="card-course__img-wrapper">
                        <picture>
                            <?= get_the_post_thumbnail($lid['id'], 'full') ?>
                        </picture>
                    </div>
                    <div class="card-course__text-content">
                        <p class="card-course__info"><span class="card-course__format card-course__format--blue"> <? echo carbon_get_post_meta($lid['id'], 'on-off'); ?></span><span class="card-course__start"><? echo carbon_get_post_meta($lid['id'], 'date-main'); ?></span></p>
                        <a href="<?= get_permalink($lid['id']) ?>">
                            <h3 class="title card-course__title"><?= get_the_title($lid['id']) ?></h3></a>
                        <p class="card-course__description"><? echo carbon_get_post_meta($lid['id'], 'courses-mini-desc'); ?></p>

                        <ul class="card-course__speakers">
                            <? $speaker = carbon_get_post_meta($lid['id'],'speakers_association');?>
                            <? foreach ($speaker as $speak) :?>

                                <li class="card-course__speaker">
                                    <picture>
                                        <?= get_the_post_thumbnail($speak['id'], 'full') ?>
                                    </picture>
                                    <a href="<?= get_permalink($speak['id']) ?>">
                                    <p class="card-course__speaker-name"><?= get_the_title($speak['id']) ?></p>
                                    </a>
                                </li>
                            <? endforeach; ?>
                        </ul>

                        <a class="link link link--blue link--uppercase link--letter-spacing card-course__link" href="<?= get_permalink($lid['id']) ?>">Подробнее о курсе
                            <svg width="16" height="9" aria-hidden="true">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </a>
                    </div>
                </article>
            <? endforeach; ?>
        </li>
        <!--               конец кода ВЫВОД ЛИДМАГНИТА-->
            </ul>

        <?php get_template_part('template-parts/recomended-posts'); ?>
</main>


<?php get_template_part('template-parts/footer'); ?>
