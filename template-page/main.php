<?php
/*
Template Name: Главная
*/

get_template_part('template-parts/header');
?>

<main>
    <section class="intro">
        <div class="container container--no-padding">
            <h1 class="visually-hidden">Белая медведица — учебный центр для стоматологов.</h1>
            <div class="intro__content">
                <h2 class="title"><?= carbon_get_post_meta(get_the_ID(), 'hero-title')?></h2>
                <p class="intro__content-text"><?= carbon_get_post_meta(get_the_ID(), 'hero-desc')?></p>
            </div>
            <div class="video">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= carbon_get_post_meta(get_the_ID(), 'video')?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                <div class="video__cover">
                    <picture>
                        <source type="image/webp" srcset="<?= carbon_get_post_meta(get_the_ID(), 'hero-img')?>.webp, <?= carbon_get_post_meta(get_the_ID(), 'hero-img')?>.webp 2x"><img src="<?= carbon_get_post_meta(get_the_ID(), 'hero-img')?>" srcset="<?= carbon_get_post_meta(get_the_ID(), 'hero-img')?> 2x" width="800" height="432" alt="">
                    </picture>
                </div>
                <button class="video__btn" type="button" aria-label="Начать воспроизведение">
                    <svg width="44" height="44" aria-hidden="true">
                        <use xlink:href="#icon-play"></use>
                    </svg>
                </button>
            </div>
        </div>
    </section>
    <section class="advantages">
        <div class="container">
            <div class="advantages__bg advantages__bg--left">
                <svg width="1152" height="772" aria-hidden="true">
                    <use xlink:href="#great-bear"></use>
                </svg>
            </div>
            <div class="advantages__bg advantages__bg--right">
                <svg width="720" height="723" aria-hidden="true">
                    <use xlink:href="#little-bear"></use>
                </svg>
            </div>
            <ul class="advantages__list-courses">
                <li class="card-img">
                    <div class="card-img__img">
                        <picture>
                            <source type="image/webp" srcset="<?= carbon_get_post_meta(get_the_ID(), 'img1')?>.webp, <?= carbon_get_post_meta(get_the_ID(), 'img1')?>.webp 2x"><img src="<?= carbon_get_post_meta(get_the_ID(), 'img1')?>" srcset="<?= carbon_get_post_meta(get_the_ID(), 'img1')?> 2x" width="800" height="432" alt="">
                        </picture>
                    </div>
                    <p class="card-img__info"><span class="card-img__text"><?= carbon_get_post_meta(get_the_ID(), 'title1')?></span><?= carbon_get_post_meta(get_the_ID(), 'desc1')?></p>
                </li>
                <li class="card-img">
                    <div class="card-img__img">
                        <picture>
                            <source type="image/webp" srcset="<?= carbon_get_post_meta(get_the_ID(), 'img2')?>.webp, <?= carbon_get_post_meta(get_the_ID(), 'img2')?>.webp 2x"><img src="<?= carbon_get_post_meta(get_the_ID(), 'img2')?>" srcset="<?= carbon_get_post_meta(get_the_ID(), 'img2')?> 2x" width="800" height="432" alt="">
                        </picture>
                    </div>
                    <p class="card-img__info"><span class="card-img__text"><?= carbon_get_post_meta(get_the_ID(), 'title2')?></span><?= carbon_get_post_meta(get_the_ID(), 'desc2')?></p>
                </li>
            </ul>
            <h2 class="title title--h2">Преимущества наших курсов</h2>
            <ul class="advantages__list">
                <li class="item">
                    <p><span class="item__number"><?= carbon_get_post_meta(get_the_ID(), 'count-adv1')?></span><span><?= carbon_get_post_meta(get_the_ID(), 'title-adv1')?></span>
                    </p><?= carbon_get_post_meta(get_the_ID(), 'desc-adv1')?>
                </li>
                <li class="item">
                    <p><span class="item__number"><?= carbon_get_post_meta(get_the_ID(), 'count-adv2')?></span><span><?= carbon_get_post_meta(get_the_ID(), 'title-adv2')?></span>
                    </p><?= carbon_get_post_meta(get_the_ID(), 'desc-adv2')?>
                </li>
                <li class="item">
                    <p><span class="item__number"><?= carbon_get_post_meta(get_the_ID(), 'count-adv3')?></span><span><?= carbon_get_post_meta(get_the_ID(), 'title-adv3')?></span>
                    </p><?= carbon_get_post_meta(get_the_ID(), 'desc-adv3')?>
                </li>
            </ul>
        </div>
    </section>


<!--    КУРСЫ И МАСТЕР-КЛАССЫ-->


    <section class="main-courses">
        <div class="container">
            <h2 class="title title--h2 title--center">Курсы и мастер-классы</h2>
            <div class="main-courses__bg main-courses__bg--left">
                <svg width="1451" height="973" aria-hidden="true">
                    <use xlink:href="#great-bear"></use>
                </svg>
            </div>
            <div class="main-courses__bg main-courses__bg--right">
                <svg width="1000" height="700" aria-hidden="true">
                    <use xlink:href="#little-bear"></use>
                </svg>
            </div>
            <ul class="courses-block">

<!--                ВЫВОД ЛИДМАГНИТА-->

                <li class="courses-block__item courses-block__item--big">

                        <? $lidMain = carbon_get_post_meta(get_the_ID(),'lid_association');?>
                        <? foreach ($lidMain as $lid) :?>
                    <article class="card-course">
                        <div class="card-course__img-wrapper">
                            <picture>
                                <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($lid['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($lid['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($lid['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($lid['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
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
                                        <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                    </picture>
                                    <p class="card-course__speaker-name"><?= get_the_title($speak['id']) ?></p>
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

                <? $coursesMain = carbon_get_post_meta(get_the_ID(),'courses_association');?>
                <? foreach ($coursesMain as $course) :?>


                <li class="courses-block__item">
                    <article class="card-course">
                        <div class="card-course__img-wrapper">
                            <picture>
                                <?= get_the_post_thumbnail($course['id'], 'full') ?>
                            </picture>
                        </div>
                        <div class="card-course__text-content">
                            <style>
                                .online {
                                    font-family: Roboto;
                                    color: #578DD9;
                                    font-size: 12px;
                                }
                                .offline {
                                    font-family: Roboto;
                                    color: #FB5151;
                                    font-size: 12px;
                                }
                            </style>

                            <p class="card-course__info"><span class="card-course__format <?php echo carbon_get_post_meta($course['id'], 'on-off'); ?>"><? echo carbon_get_post_meta($course['id'], 'on-off'); ?></span><span class="card-course__start"><? echo carbon_get_post_meta($course['id'], 'date-main'); ?></span></p><a href="#">
                                <h3 class="title card-course__title"><?= get_the_title($course['id']) ?></h3></a>
                            <p class="card-course__description"><? echo carbon_get_post_meta($course['id'], 'courses-mini-desc'); ?></p>
                            <ul class="card-course__speakers">
                                <? $speaker = carbon_get_post_meta($course['id'],'speakers_association');?>
                                <? foreach ($speaker as $speak) :?>


                                    <li class="card-course__speaker">

                                        <picture>
                                            <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                        </picture>
                                        <p class="card-course__speaker-name"><?= get_the_title($speak['id']) ?></p>
                                    </li>
                                <? endforeach; ?>

                            </ul>
                            <a class="link link link--blue link--uppercase link--letter-spacing card-course__link" href="<?= get_permalink($course['id']) ?>">Подробнее о курсе
                                <svg width="16" height="9" aria-hidden="true">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </a>
                        </div>
                    </article>
                </li>
                <? endforeach; ?>
            </ul>
            <div class="main-courses__btn">
                <a class="btn btn btn--white btn--uppercase btn--padding-13-30" href="/courses/">Посмотреть все курсы
                    <svg width="16" height="9" aria-hidden="true">
                        <use xlink:href="#arrow"></use>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <section class="process">
        <div class="container container--no-padding">
            <h2 class="title title--h2 title--center">Как проходит обучение</h2>
            <p class="process__text">Преподаем в уникальном формате — лекции и открытые операции</p>
            <div class="process__list-wrapper">
                <ul class="process__list process__list--offline">
                    <li class="item-list">
                        <div class="item-list__top"><span class="item-list__info item-list__info--red">офлайн</span>
                            <h3 class="title title--h6"><?= carbon_get_post_meta(get_the_ID(), 'how-title1')?></h3>
                        </div>
                        <p class="item-list__text"><?= carbon_get_post_meta(get_the_ID(), 'how-desc1')?></p>
                    </li>
                    <li class="item-list">
                        <h3 class="title title--h6"><?= carbon_get_post_meta(get_the_ID(), 'how-title2')?></h3>
                        <p class="item-list__text"><?= carbon_get_post_meta(get_the_ID(), 'how-desc2')?></p>
                    </li>
                    <li class="item-list">
                        <h3 class="title title--h6"><?= carbon_get_post_meta(get_the_ID(), 'how-title3')?></h3>
                        <p class="item-list__text"><?= carbon_get_post_meta(get_the_ID(), 'how-desc3')?></p>
                    </li>
                </ul>
                <ul class="process__list process__list--online">
                    <li class="item-list">
                        <div class="item-list__top"><span class="item-list__info item-list__info--blue">онлайн</span>
                            <h3 class="title title--h6"><?= carbon_get_post_meta(get_the_ID(), 'how-title12')?></h3>
                        </div>
                        <p class="item-list__text"><?= carbon_get_post_meta(get_the_ID(), 'how-desc12')?></p>
                    </li>
                    <li class="item-list">
                        <h3 class="title title--h6"><?= carbon_get_post_meta(get_the_ID(), 'how-title22')?></h3>
                        <p class="item-list__text"><?= carbon_get_post_meta(get_the_ID(), 'how-desc22')?></p>
                    </li>
                </ul>
            </div>
            <div class="process__slider">
                <div class="process__slides swiper-wrapper slider">
                    <? $howPhoto = carbon_get_post_meta(get_the_ID(),'how-photo');?>
                    <? foreach ($howPhoto as $photo) : ?>
                        <div class="process__slide process__slide swiper-slide process__slide--horizontal">
                            <picture>
                                <source type="image/webp" srcset="<?echo $photo ['how-photo_image'];?>.webp, <?echo $photo ['how-photo_image'];?>.webp 2x"><img src="<?echo $photo ['how-photo_image'];?>" srcset="<?echo $photo ['how-photo_image'];?> 2x" width="360" height="240" alt="Процесс обучения">
                            </picture>
                        </div>

                    <? endforeach; ?>
                </div>
                <div class="process__slider-buttons">
                    <button class="btn process__slider-button process__slider-button--prev" type="button">
                        <svg width="12" height="24" aria-hidden="true">
                            <use xlink:href="#arrow-slider"></use>
                        </svg>
                    </button>
                    <button class="btn process__slider-button process__slider-button--next" type="button">
                        <svg width="12" height="24" aria-hidden="true">
                            <use xlink:href="#arrow-slider"></use>
                        </svg>
                    </button>
                </div>
                <div class="process__pagination">
                    <div class="process__slider-pagination swiper-scrollbar"></div>
                </div>
            </div>
        </div>
    </section>
    <div class="promo">
		<style>

			@media (max-width: 767px){
				.img-for-desc img{
					height: 120% !important;
				}
.promo img {
    object-position: left;
    height: 120% !important;
}
				}
		</style>
        <picture class="img-for-desc">
           <img src="<?= carbon_get_post_meta(get_the_ID(), 'word-main-image')?>" width="1440" height="704" alt="фотография врача">
        </picture>
        <div class="container">
            <div class="promo__content">
                <picture>
                    <img src="<?= carbon_get_post_meta(get_the_ID(), 'word-main-image')?>" width="767" height="440" alt="фон">
                </picture>
                <p class="promo__title"><span class="promo__title-decor">«</span><?= carbon_get_post_meta(get_the_ID(), 'word-main-title')?></p>
                <p class="promo__text"><?= carbon_get_post_meta(get_the_ID(), 'word-main-text')?></p>
                <p class="promo__text"><?= carbon_get_post_meta(get_the_ID(), 'word-main-text2')?></p>
                <span class="promo__name"><?= carbon_get_post_meta(get_the_ID(), 'word-main-fi')?></span>
                <span class="promo__sign"><?= carbon_get_post_meta(get_the_ID(), 'word-main-pro')?></span>
            </div>
        </div>
    </div>
    <section class="courses-schedule" style="padding-top: 75px;">
        <div class="container">
            <h2 class="title title--h2">Расписание офлайн курсов на&nbsp;2022 год</h2>
            <p class="courses-schedule__text">Онлайн курсы вы&nbsp;можете приобрести и&nbsp;пройти в&nbsp;любой момент</p>
            <div class="schedule">
                <table>
                    <tr>
                        <th>дата</th>
                        <th>курс</th>
                        <th>спикеры</th>
                    </tr>


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
                            'numberposts' => 1-6,
                            'post_type' => 'courses',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'courses-categories',
                                    'field' => 'slug',// тут можно указать slug и ниже вписать ярлыки нужных рубрик
                                    'terms' => 'offlajn',
                                ]
                            ],
                            'orderby' => 'date',
                            'order' => 'ASC',
                        ]
                    );
                    ?>

                    <?php $coursesItems = [];
                    foreach ($home_posts as $home_post) {
                        $postID = $home_post->ID;
                        $dateStart = carbon_get_post_meta($home_post->ID, 'date-start');
                        $title = $home_post->post_title;
                        $coursesItems[$postID] = [
                            'id' => $postID,
                            'dateStart' => $dateStart,
                            'title' => $title,

                        ];
                    }
                    usort($coursesItems, function ($a, $b) {
                        return (strtotime($a['dateStart']) - strtotime($b['dateStart']));
                    });
                    ?>

                    <pre>
<!--                        --><?// print_r($coursesItems) ?>
                    </pre>
                    <? foreach ($coursesItems as $coursesItem) :
                    $GLOBALS['start'] = carbon_get_post_meta($coursesItem['id'], 'date-start'); ?>
                    <?php if($GLOBALS['start'] != ""):?>
                    <tr>

                        <td>
                            <time datetime="<? echo carbon_get_post_meta($coursesItem['id'], 'date-start');?>">
                                <? echo date_i18n('d F', strtotime($GLOBALS['start']));?>
                            </time></td>
                        <td><a href="<?= get_permalink($coursesItem['id']) ?>"><?= $coursesItem['title'] ?></a></td>


                            <td>
                                <? $speaker = carbon_get_post_meta($coursesItem['id'],'speakers_association');?>
                                <? foreach ($speaker as $speak) :?>
                                    <p>
                                        <picture>
                                            <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                        </picture>
                                        <span><?= get_the_title($speak['id']) ?></span>
                                    </p>
                                <? endforeach; ?>
                                
                            </td>
                        </tr>
                        <?php endif;?>
                    <? endforeach; ?>
                </table>
            </div>
            <a class="btn btn--white btn--uppercase btn--padding-13-30" href="/raspisanie/">Показать полное расписание
            </a>
        </div>
    </section>

    <section class="cards-main">
        <div class="container">
            <h2 class="title title--h2">Бесплатные материалы</h2>
            <div class="cards-main__bg cards-main__bg--left">
                <svg width="1452" height="973" aria-hidden="true">
                    <use xlink:href="#great-bear"></use>
                </svg>
            </div>
            <div class="cards-main__bg cards-main__bg--right">
                <svg width="1000" height="700" aria-hidden="true">
                    <use xlink:href="#little-bear"></use>
                </svg>
            </div>
            <ul class="cards-grid">



                <? $freeMain = carbon_get_post_meta(get_the_ID(),'free_association');?>
                <? foreach ($freeMain as $free) :?>
                        <li class="materials-block__item">
                            <article class="card-article">
                                <div class="card-article__img-wrapper">
                                    <picture>
                                        <?= get_the_post_thumbnail($free['id'], 'full') ?>

                                    </picture>
                                </div>
                                <div class="card-article__text-content"><a>
                                        <h3 class="title card-article__title"><?= get_the_title($free['id']) ?></h3></a>
                                    <p class="card-article__description"><? echo carbon_get_post_meta($free['id'], 'free-mini-desc'); ?></p>
<!--                                    <ul class="card-article__authors">-->
<!--                                        --><?// $speaker = carbon_get_post_meta($free['id'],'speakers_association');?>
<!--                                        --><?// foreach ($speaker as $speak) :?>
<!--                                            <li class="card-article__author">-->
<!--                                                <picture>-->
<!--                                                    --><?//= get_the_post_thumbnail($speak['id'], 'full') ?>
<!--                                                </picture>-->
<!--                                                <p class="card-article__author-name">--><?//= get_the_title($speak['id']) ?><!--</p>-->
<!--                                            </li>-->
<!--                                        --><?// endforeach; ?>
<!--                                    </ul>-->
                                    <a class="link link link--blue link--uppercase link--letter-spacing card-article__link" href="<?= get_permalink($free['id']) ?>">Читать далее
                                        <svg width="16" height="9" aria-hidden="true">
                                            <use xlink:href="#arrow"></use>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        </li>

                    <? endforeach; ?>

            </ul>
            <div class="cards-main__btn">
                <a class="btn btn btn--light-gray btn--uppercase btn--padding-13-30" href="/free/">Все бесплатные материалы
                </a>
            </div>

        </div>
    </section>
</main>

<?php get_template_part('template-parts/footer'); ?>
