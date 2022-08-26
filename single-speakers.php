<?php
/*
Template Name: Спикер
*/

get_template_part('template-parts/header');
?>

<main>
    <section class="speaker">
        <div class="speaker__bg">
            <svg width="1451" height="972" aria-hidden="true">
                <use xlink:href="#big-dipper"></use>
            </svg>
        </div>
        <div class="container">
            <?php get_template_part('template-parts/breadcrumb'); ?>


            <section class="speaker__info speaker-info" itemscope itemtype="http://schema.org/Person">
                <div class="speaker-info__main">
                    <div class="speaker-info__img">
                        <picture>
                            <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                        </picture>
                    </div>
                    <div class="speaker-info__about">
                        <h1 class="title speaker-info__title" itemprop="name"><?= get_the_title() ?></h1>
                        <ul class="speaker-info__social-links social-links">
                            <?php if (carbon_get_post_meta(get_the_ID(), 'fb') != ""): ?>
                                <li class="social-links__item">
                                    <a class="link link--uppercase link--letter-spacing"
                                       href="<?php echo carbon_get_post_meta(get_the_ID(), 'fb'); ?>" target="_blank"
                                       rel="nofollow noopener noreferrer">Facebook
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (carbon_get_post_meta(get_the_ID(), 'youtube') != ""): ?>
                                <li class="social-links__item">
                                    <a class="link link--uppercase link--letter-spacing"
                                       href="<?php echo carbon_get_post_meta(get_the_ID(), 'youtube'); ?>" target="_blank"
                                       rel="nofollow noopener noreferrer">youtube
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (carbon_get_post_meta(get_the_ID(), 'instagram') != ""): ?>
                                <li class="social-links__item">
                                    <a class="link link--uppercase link--letter-spacing"
                                       href="<?php echo carbon_get_post_meta(get_the_ID(), 'instagram'); ?>"
                                       target="_blank" rel="nofollow noopener noreferrer">instagram
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <p class="speaker-info__position"><?php echo carbon_get_post_meta(get_the_ID(), 'speaker-title1'); ?></p>
                        <div class="speaker-info__text-wrapper">
                            <?php echo carbon_get_post_meta(get_the_ID(), 'speaker-left-column'); ?>
                        </div>
                        <?php echo carbon_get_post_meta(get_the_ID(), 'word-speaker'); ?>
                    </div>
                </div>


                <div class="speaker-info__education">
                    <?php $base = carbon_get_post_meta(get_the_ID(), 'base'); ?>
                    <?php if (($base) != null): ?>
                    <section class="speaker-info__education-block">
                        <h2 class="speaker-info__education-title">Базовое образование</h2>
                        <ul class="speaker-info__education-list">

                            <?php foreach ($base as $bas) : ?>
                                <li class="speaker-info__education-item">
                                    <time class="speaker-info__education-data"
                                          datetime="<?= $bas['base-god'] ?>"><?= $bas['base-god'] ?></time>
                                    <p class="speaker-info__education-name"><?= $bas['base-zavedenie'] ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </section>
                    <?php endif; ?>
                    <?php $congress = carbon_get_post_meta(get_the_ID(), 'congress'); ?>
                    <?php if (($congress) != null): ?>
                    <section class="speaker-info__education-block">
                        <h2 class="speaker-info__education-title">Конгрессы и стажировки</h2>


                        <style>
                            .hidden {
                                height: 250px;
                                overflow: hidden;

                                position: relative;
                            }

                            .hidden .bottom {
                                position: absolute;
                                bottom: 0;
                                background: linear-gradient(
                                        to bottom,
                                        rgb(255 217 29 / 0%),
                                        rgb(255, 255, 255) 90%);
                                width: 100%;
                                height: 80px;
                                opacity: 1;
                                transition: 0.3s;
                            }

                            .active {
                                height: 100%;
                                transition: all 0.5s;
                            }

                            .active-bottom {
                                display: none;
                                transition: 0.3s;
                            }
                        </style>


                        <div class="complete">
                            <ul id="hidden" class="speaker-info__education-list hidden">

                                <?php foreach ($congress as $con) : ?>
                                    <li class="speaker-info__education-item">
                                        <time class="speaker-info__education-data"
                                              datetime="<?= $con['base-congress-god'] ?>"><?= $con['base-congress-god'] ?></time>
                                        <p class="speaker-info__education-name"><?= $con['base-congress-name'] ?></p>
                                    </li>
                                <?php endforeach; ?>

                                <div id="bottom" class="bottom"></div>
                            </ul>
                        </div>


                        <button id="link"
                                class="link link link--blue link--uppercase link--letter-spacing speaker-info__link"
                                onclick="myFun()">
                            Узнать больше
                        </button>


                        <script type="text/javascript">
                            function myFun() {

                                let elemHidden = document.querySelector('#bottom');
                                elemHidden.classList.toggle('active-bottom');


                                let elem = document.querySelector('#hidden');
                                elem.classList.toggle('active');

                                let btnText = document.getElementById("link");
                                if (btnText.innerHTML === "Скрыть") {
                                    btnText.innerHTML = "Узнать больше";
                                } else {
                                    btnText.innerHTML = "Скрыть";
                                }

                            }
                        </script>
                    </section>
                    <?php endif; ?>
                </div>
            </section>
        </div>

        <?php $videoSpeaker = carbon_get_post_meta(get_the_ID(), 'video-speaker'); ?>
        <?php if (($videoSpeaker) != null): ?>
        <section class="video-slider swiper speaker__video">
            <ul class="video-slider__list swiper-wrapper">

                <?php foreach ($videoSpeaker as $video) : ?>
                    <li class="video-slider__item swiper-slide">
                        <h2 class="title video-slider__title">Cуть видео</h2>
                        <div class="video">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $video['code'] ?>"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            <div class="video__cover">
                                <picture>
                                    <img src="//img.youtube.com/vi/<?= $video['code'] ?>/maxresdefault.jpg">
                                </picture>
                            </div>
                            <button class="video__btn" type="button" aria-label="Начать воспроизведение">
                                <svg width="44" height="44" aria-hidden="true">
                                    <use xlink:href="#icon-play"></use>
                                </svg>
                            </button>
                        </div>
                        <p class="video-slider__comment"><?= $video['desc'] ?></p>
                    </li>

                <?php endforeach; ?>
            </ul>
            <div class="video-slider__buttons">
                <button class="video-slider__button video-slider__button--prev">
                    <svg width="12" height="26" aria-hidden="true">
                        <use xlink:href="#arrow-slider"></use>
                    </svg>
                </button>
                <button class="video-slider__button video-slider__button--next">
                    <svg width="12" height="26" aria-hidden="true">
                        <use xlink:href="#arrow-slider"></use>
                    </svg>
                </button>
            </div>
        </section>
        <?php endif; ?>
        <?php

        $courses = get_posts([
                'numberposts' => -1,
                'post_type' => 'courses',
            ]
        );
        $coursesSpeakers = [];

        foreach ($courses as $course) {
            $coursesSpeakers[$course->ID]['speakers'] = carbon_get_post_meta($course->ID, 'speakers_association');
            $coursesSpeakers[$course->ID]['speakers']['courseId'] = $course->ID;
        }



        $speakers = get_posts([
                'numberposts' => -1,
                'post_type' => 'speakers',
            ]
        );
        ?>
        <?php
        $coursesFinal = [];
        foreach ($coursesSpeakers as $coursesSpeaker): ?>
            <?php foreach ($coursesSpeaker as $items) : ?>
                <?php foreach ($items as $item) : ?>
                    <?php if ($item['id'] == get_the_ID()): ?>
                        <?php $coursesFinal[get_the_ID()][$items['courseId']] = $items['courseId'] ?>
                    <?php endif ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>

        <?php if (($coursesFinal) != null): ?>
        <section class="speaker__courses">
            <div class="speaker__courses-bg">
                <svg width="1451" height="972" aria-hidden="true">
                    <use xlink:href="#big-dipper"></use>
                </svg>
            </div>
            <div class="container">
                <h2 class="title title--h2 speaker__courses-title">Ведет курсы</h2>
                <p class="speaker__courses-description"><?php echo carbon_get_post_meta(get_the_ID(), 'speaker-title2'); ?></p>





                <?php
                foreach ($coursesFinal as $course) : ?>
                <ul class="speaker__courses-list">
                    <?php foreach ($course as $item) : ?>



                            <li class="speaker__courses-item">
                                <article class="card-course">
                                    <div class="card-course__img-wrapper">
                                        <picture>
                                            <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($item); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($item); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($item); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($item); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                        </picture>

                                    </div>
                                    <div class="card-course__text-content">
                                        <p class="card-course__info"><span
                                                    class="card-course__format card-course__format--blue"><?= carbon_get_post_meta($item, 'on-off') ?></span>
                                            <span class="card-course__start"><?= carbon_get_post_meta($item, 'date-main') ?></span>
                                        </p><a href="#">
                                            <h3 class="title card-course__title"><?= get_the_title($item) ?></h3>
                                        </a>
                                        <p class="card-course__description"><?= carbon_get_post_meta($item, 'courses-mini-desc') ?></p>
                                        <ul class="card-course__speakers">
                                            <?php $speakerThe = carbon_get_post_meta($item,'speakers_association');?>
                                            <?php foreach ($speakerThe as $speak) :?>

                                                <li class="card-course__speaker">
                                                    <picture>
                                                        <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                                    </picture>
                                                    <p class="card-course__speaker-name"><?= get_the_title($speak['id']) ?></p>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>

                                        <a class="link link link--blue link--uppercase link--letter-spacing card-course__link"
                                           href="<?= get_permalink($item) ?>">Подробнее о курсе
                                            <svg width="16" height="9" aria-hidden="true">
                                                <use xlink:href="#arrow"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </article>
                            </li>
                    <?php endforeach; ?>
                    <?php endforeach; ?>
                    </ul>

            </div>
        </section>
        <?php endif; ?>
    </section>
</main>


<?php get_template_part('template-parts/footer'); ?>
