<?php
/*
Template Name: Курс
*/

get_template_part('template-parts/header');
?>
    <main itemscope itemtype="http://schema.org/course">
        <section class="promotion">
            <div class="container">
                <div class="promotion__wrapper">
                    <div class="promotion__text-wrapper">
                        <?php get_template_part('template-parts/breadcrumb-w'); ?>
                        <h1 class="title title--white" itemprop="name"><?= get_the_title() ?></h1>
                        <?= get_the_content() ?>
                        <?php if (carbon_get_post_meta(get_the_ID(), 'link-for-pay') != ''): ?>
                            <button data-graph-path="" data-fancybox="" data-src="#modal-form"
                                    class="btn btn--white-blue btn--padding-11-40 btn--font-size-14 btn--fw-bold btn--uppercase promotion__button"
                                    type="button">Записаться на курс
                            </button>
                        <?php endif; ?>

                        <?php if (carbon_get_post_meta(get_the_ID(), 'link-for-pay-off') != ''): ?>
                            <a href="<? echo carbon_get_post_meta(get_the_ID(), 'link-for-pay-off'); ?>"
                               class="btn btn--white-blue btn--padding-11-40 btn--font-size-14 btn--fw-bold btn--uppercase promotion__button">Оплатить</a>
                        <?php endif; ?>
                        <style>
                            .modal-payment__custom-input input {
                                width: 100%;
                                height: 40px;
                                -webkit-box-flex: 1;
                                -ms-flex-positive: 1;
                                flex-grow: 1;
                                padding: 10px;
                                border-radius: 4px;
                                margin-top: 10px;
                                cursor: pointer;
                                background-color: #eff4f5;
                                border: 1px solid transparent;
                                outline: 0;
                                -webkit-transition: border .3s ease;
                                -o-transition: border .3s ease;
                                transition: border .3s ease;
                            }
                        </style>

                        <div id="modal-form" class="modal-payment"
                             style="display:none;max-width:500px;height: 100%;">
                            <?php echo carbon_get_post_meta(get_the_ID(), 'link-for-pay'); ?>
                        </div>


                        <div class="promotion__inner">
                            <?php if (carbon_get_post_meta(get_the_ID(), 'text-under-icon') != ''): ?>
                                <div class="promotion__when">
                                    <svg width="32" height="30" aria-hidden="true">
                                        <use xlink:href="#calendar"></use>
                                    </svg>
                                    <?php echo carbon_get_post_meta(get_the_ID(), 'text-under-icon'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (carbon_get_post_meta(get_the_ID(), 'on-off') != 'online'): ?>
                                <div class="promotion__when" itemscope itemtype="http://schema.org/PostalAddress">
                                    <svg width="20" height="29" aria-hidden="true">
                                        <use xlink:href="#pin"></use>
                                    </svg>
                                    <p class="promotion__text" itemprop="streetAddress">26-я линия Васильевского <br>
                                        острова, 15&nbsp;корп.&nbsp;2,
                                        <br> БЦ&nbsp;&laquo;Биржа&raquo;</p>
                                </div>
                            <?php endif; ?>
                            <?php if (carbon_get_post_meta(get_the_ID(), 'time') != ''): ?>
                                <div class="promotion__when promotion__when--time">
                                    <svg width="34" height="36" aria-hidden="true">
                                        <use xlink:href="#time"></use>
                                    </svg>
                                    <p class="promotion__text"><?php echo carbon_get_post_meta(get_the_ID(), 'time'); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="promotion__image">

                        <picture>
                            <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                        </picture>
                    </div>
                </div>
            </div>
        </section>
        <?php if ((carbon_get_post_meta(get_the_ID(), 'for1')) != ""): ?>
            <section class="whom">
                <div class="container">
                    <h2 class="visually-hidden">Для кого этот курс</h2>
                    <ul class="whom__list">

                        <li class="whom__item">
                            <svg width="33" height="33" aria-hidden="true">
                                <use xlink:href="#check-mark"></use>
                            </svg>
                            <p><?php echo carbon_get_post_meta(get_the_ID(), 'for1'); ?></p>
                        </li>

                        <li class="whom__item">
                            <svg width="33" height="33" aria-hidden="true">
                                <use xlink:href="#check-mark"></use>
                            </svg>
                            <p><?php echo carbon_get_post_meta(get_the_ID(), 'for2'); ?></p>
                        </li>

                    </ul>
                </div>
            </section>
        <?php endif; ?>


        <?php $forList = carbon_get_post_meta(get_the_ID(), 'for-list'); ?>

        <?php if (($forList) != null): ?>
            <section class="whom">
                <div class="container">
                    <h2 class="visually-hidden">Для кого этот курс</h2>
                    <ul class="whom__list">
                        <?php foreach ($forList as $for) : ?>

                            <li class="whom__item">
                                <svg width="33" height="33" aria-hidden="true">
                                    <use xlink:href="#check-mark"></use>
                                </svg>
                                <p><? echo $for['for-item']; ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
        <?php endif; ?>



        <?php if ((carbon_get_post_meta(get_the_ID(), 'frame-video')) != ""): ?>
            <section class="invitation">
                <div class="container container--big-padding container--no-padding-mobile">
                    <svg class="invitation__bg" width="1451" height="972" aria-hidden="true">
                        <use xlink:href="#big-dipper"></use>
                    </svg>
                    <h2 class="title title--center title--h2">Приглашение на курс</h2>
                    <div class="video video--max">

                        <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/<?php echo carbon_get_post_meta(get_the_ID(), 'frame-video'); ?>"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        <div class="video__cover">
                            <picture>
                                <img src="//img.youtube.com/vi/<?php echo carbon_get_post_meta(get_the_ID(), 'frame-video'); ?>/maxresdefault.jpg">
                            </picture>
                        </div>
                        <button class="video__btn" type="button" aria-label="Начать воспроизведение">
                            <svg width="44" height="44" aria-hidden="true">
                                <use xlink:href="#icon-play"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="invitation__text-block">
                        <p><?php echo carbon_get_post_meta(get_the_ID(), 'text1'); ?></p>
                        <p><?php echo carbon_get_post_meta(get_the_ID(), 'text2'); ?></p>
                        <p><?php echo carbon_get_post_meta(get_the_ID(), 'text3'); ?></p>
                        <p><?php echo carbon_get_post_meta(get_the_ID(), 'text4'); ?></p>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <section class="program-course">
            <div class="container">
                <div class="program-course__bg">
                    <svg width="1421" height="1316" aria-hidden="true">
                        <use xlink:href="#bears-scale"></use>
                    </svg>
                </div>
                <div class="program-course__wrapper">
                    <h2 class="title title--h2 title--center program-course__title">Программа курса</h2>

                    <?php if (carbon_get_post_meta(get_the_ID(), 'teoretic-main') != ""): ?>
                        <ul class="program-course__list program-course__list--program">
                            <li class="program-course__program-item">
                                <h3 class="title title--h3 program-course__program-title">Теория</h3>
                                <?php echo carbon_get_post_meta(get_the_ID(), 'teoretic-main'); ?>
                            </li>
                            <li class="program-course__program-item">
                                <h3 class="title title--h3 program-course__program-title">Практика</h3>
                                <?php echo carbon_get_post_meta(get_the_ID(), 'practic-main'); ?>
                            </li>
                        </ul>
                    <?php endif; ?>

                    <div class="program-course__inner">
                        <?php $program = carbon_get_post_meta(get_the_ID(), 'program'); ?>

                        <?php foreach ($program as $prog) : ?>
                            <div class="program-course__detailed">
                                <h3 class="title title--h3"><?= $prog['cicle-title'] ?></h3>
                                <ul class="program-course__list program-course__list--detailed">
                                    <?php if (($prog['teoriya']) != ""): ?>
                                        <li class="program-course__element">
                                            <h4 class="title title--h7">Теория</h4>
                                            <?= $prog['teoriya'] ?>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (($prog['practic']) != ""): ?>
                                        <li class="program-course__element">
                                            <h4 class="title title--h7">Практика</h4>
                                            <?= $prog['practic'] ?>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (($prog['resultat']) != ""): ?>
                                        <li class="program-course__element">
                                            <h4 class="title title--h7">Результат</h4>
                                            <?= $prog['resultat'] ?>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (($prog['bonus']) != ""): ?>
                                        <li class="program-course__element">
                                            <h4 class="title title--h7">Бонус</h4>
                                            <?= $prog['bonus'] ?>
                                        </li>
                                    <?php endif; ?>


                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php $schedules = carbon_get_post_meta(get_the_ID(), 'schedules'); ?>
        <!--        <pre>    --><?php //              print_r($schedules['0']['schedules-time']); ?><!--</pre>-->
        <?php if (($schedules['0']['schedules-time']) != ""): ?>
            <section class="schedule-course">
                <div class="container container--big-padding">
                    <h2 class="title title--h2 title--center">Расписание курса</h2>


                    <ul class="schedule-course__list">
                        <?php foreach ($schedules as $schedul) : ?>
                            <li class="schedule-course__item">
                                <span class="schedule-course__time"><?= $schedul['schedules-time'] ?></span>
                                <span class="schedule-course__text"><?= $schedul['schedules-text'] ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
        <?php endif; ?>
        <section class="speaker-course">


            <div class="container container--big-padding">
                <div class="speaker-course__bg">
                    <svg width="936" height="1012" aria-hidden="true">
                        <use xlink:href="#little-bear-scale"></use>
                    </svg>
                </div>
                <?php $GLOBALS['speaker'] = carbon_get_the_post_meta('speakers_association'); ?>
                <h2 class="title title--h2 title--center speaker-course__title">
                    <?php if (count($GLOBALS['speaker'])) echo (count($GLOBALS['speaker']) == 1) ? "Спикер" : "Спикеры"; ?>
                </h2>

                <?php $speaker = carbon_get_the_post_meta('speakers_association'); ?>


                <?php foreach ($speaker as $speak) : ?>
                    <?php
                    // Получаем информацию о спикерах из полей carbon
                    $getSpeakerTitleLeft = carbon_get_post_meta($speak['id'], 'speaker-title1');
                    $getSpeakerTitleRight = carbon_get_post_meta($speak['id'], 'speaker-title2');
                    $getSpeakerColumnLeft = carbon_get_post_meta($speak['id'], 'speaker-left-column');
                    $getSpeakerColumnRight = carbon_get_post_meta($speak['id'], 'speaker-right-column');
                    // получаем ссылку на изображение спикера
                    $speakerImageUrl = get_the_post_thumbnail_url($speak['id']);
                    //                print_r($getSpeakerTitleLeft);
                    ?>
                    <p class="speaker-course__speaker-name"><?= get_the_title($speak['id']) ?> </p>
                    <div class="speaker-course__img">
                        <picture>
                            <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                        </picture>
                    </div>
                    <div class="speaker-course__description" style="margin-bottom: 50px;">
                        <div class="speaker-course__description-wrap">
                            <p class="speaker-course__description-text"><?= $getSpeakerTitleLeft ?></p>
                            <?= $getSpeakerColumnLeft ?>
                        </div>
                        <div class="speaker-course__description-wrap">
                            <p class="speaker-course__description-text"><?= $getSpeakerTitleRight ?></p>
                            <?= $getSpeakerColumnRight ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


        </section>

        <?php $bronirovanie = carbon_get_post_meta(get_the_ID(), 'bronirovanie'); ?>

        <!--<pre>--><?php //print_r($bronirovanie[0]['bronirovanie-title']) ?><!--</pre>-->

        <?php if (($bronirovanie[0]['bronirovanie-title']) != ""): ?>
            <section class="course-booking">
                <div class="container container--big-padding">
                    <svg class="course-booking__bg" width="1468" height="2423" aria-hidden="true">
                        <use xlink:href="#bears"></use>
                    </svg>
                    <h2 class="title title--h2 title--center course-booking__title">Забронируйте место на курсе</h2>
                    <p class="course-booking__text">Сейчас самые низкие цены</p>
                    <div class="course-booking__wrapper">
                        <div class="course-booking__course">
                            <h3 class="title title--h5 course-booking__subtitle">Курс</h3>
                            <div class="course-booking__details">
                                <div class="course-booking__wrap">
                                    <h4 class="title title--h8 course-booking__details-title">Курс</h4>
                                    <p class="course-booking__details-text"><?= get_the_title() ?></p>
                                </div>
                                <? if (carbon_get_post_meta(get_the_ID(), 'date-start')): ?>
                                    <div class="course-booking__wrap">
                                        <h4 class="title title--h8 course-booking__details-title">Старт курса</h4>
                                        <?php $start = carbon_get_post_meta(get_the_ID(), 'date-start'); ?>
                                        <p class="course-booking__details-text">
                                            <time datetime="<?php echo carbon_get_post_meta(get_the_ID(), 'date-start'); ?>">
                                                <?php echo date_i18n('d F', strtotime($start)); ?>
                                            </time>

                                        </p>
                                    </div>
                                <? endif; ?>

                                <?php $speaker = carbon_get_the_post_meta('speakers_association');
                                ?>


                                <div class="course-booking__wrap">
                                    <h4 class="title title--h8 course-booking__details-title"><?php if (count($GLOBALS['speaker'])) echo (count($GLOBALS['speaker']) == 1) ? "Спикер" : "Спикеры"; ?></h4>
                                    <?php foreach ($speaker as $speak) : ?>
                                        <div class="course-booking__inner">
                                            <picture>
                                                <?= get_the_post_thumbnail($speak['id'], 'full') ?>
                                            </picture>
                                            <p class="course-booking__details-speaker"><?= get_the_title($speak['id']) ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>


                        <div class="course-booking__price">
                            <?php foreach ($bronirovanie as $bron) : ?>
                                <?php $GLOBALS['title-block'] = $bron['bronirovanie-title']; ?>
                                <div class="course-booking__price-wrap">
                                    <h3 class="title title--h5 course-booking__subtitle"><?= $GLOBALS['title-block'] ?></h3>
                                    <ul class="course-booking-card">
                                        <?php if (($bron['bronirovanie-paket']) != ""): ?>
                                            <li class="course-booking-card__item dark">
                                                <div class="course-booking-card__wrap">
                                                    <p class="course-booking-card__title">пакет</p>
                                                    <p class="course-booking-card__name"><?= $bron['bronirovanie-paket'] ?></p>
                                                </div>
                                                <?php if ($bron['bronirovanie-q']): ?>
                                                    <div class="course-booking-card__wrap">
                                                        <p class="course-booking-card__title">Осталось мест</p>
                                                        <div class="course-booking-card__inner"><span
                                                                    class="course-booking-card__seats-left"><?= $bron['bronirovanie-q'] ?></span><span
                                                                    class="course-booking-card__was-seats"> из <?= $bron['bronirovanie-iz'] ?></span>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="course-booking-card__wrap">
                                                    <p class="course-booking-card__title">пакет</p>
                                                    <div class="course-booking-card__inner">
                                                        <p class="course-booking-card__new-price"><?= $bron['bronirovanie-new-price'] ?>
                                                            ₽</p>
                                                        <?php if (($bron['bronirovanie-old-price']) != ""): ?>
                                                            <p class="course-booking-card__old-price"><?= $bron['bronirovanie-old-price'] ?>
                                                                ₽</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php if (($bron['link-for-pay-paket']) != ""): ?>
                                                    <button data-graph-path="" data-fancybox=""
                                                            data-src="#modal-form-one"
                                                            class="btn btn--blue btn--uppercase btn--fw-medium"
                                                            type="button">Записаться
                                                    </button>

                                                    <div id="modal-form-one" class="modal-payment"
                                                         style="display:none;max-width:500px;height: 100%;">
                                                        <?= $bron['link-for-pay-paket'] ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($bron['link-for-pay-paket-off'] != ''): ?>
                                                    <a href="<?= $bron['link-for-pay-paket-off'] ?>"
                                                       class="btn btn--white-blue btn--padding-11-40 btn--font-size-14 btn--fw-bold btn--uppercase promotion__button">Оплатить</a>
                                                <?php endif; ?>
                                            </li>
                                        <?php endif; ?>
                                        <?php if (($bron['bronirovanie-paket2']) != ""): ?>
                                            <li class="course-booking-card__item">
                                                <div class="course-booking-card__wrap">
                                                    <p class="course-booking-card__title">пакет</p>
                                                    <p class="course-booking-card__name"><?= $bron['bronirovanie-paket2'] ?></p>
                                                </div>
                                                <?php if (($bron['bronirovanie-iz2']) != ""): ?>
                                                    <div class="course-booking-card__wrap">
                                                        <p class="course-booking-card__title">Осталось мест</p>
                                                        <div class="course-booking-card__inner"><span
                                                                    class="course-booking-card__seats-left"><?= $bron['bronirovanie-q2'] ?></span><span
                                                                    class="course-booking-card__was-seats"> из <?= $bron['bronirovanie-iz2'] ?></span>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="course-booking-card__wrap">
                                                    <p class="course-booking-card__title">пакет</p>
                                                    <div class="course-booking-card__inner">
                                                        <p class="course-booking-card__new-price"><?= $bron['bronirovanie-new-price2'] ?>
                                                            ₽</p>
                                                        <?php if (($bron['bronirovanie-old-price2']) != ""): ?>
                                                            <p class="course-booking-card__old-price"><?= $bron['bronirovanie-old-price2'] ?>
                                                                ₽</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php if (($bron['link-for-pay-paket2']) != ""): ?>
                                                    <button data-graph-path="" data-fancybox=""
                                                            data-src="#modal-form-one"
                                                            class="btn btn--blue btn--uppercase btn--fw-medium"
                                                            type="button">Записаться
                                                    </button>

                                                    <div id="modal-form-one" class="modal-payment"
                                                         style="display:none;max-width:500px;height: 100%;">
                                                        <?= $bron['link-for-pay-paket2'] ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($bron['link-for-pay-paket2-off'] != ''): ?>
                                                    <a href="<?= $bron['link-for-pay-paket2-off'] ?>"
                                                       class="btn btn--white-blue btn--padding-11-40 btn--font-size-14 btn--fw-bold btn--uppercase promotion__button">Оплатить</a>
                                                <?php endif; ?>
                                            </li>
                                        <?php endif; ?>
                                        <?php if (($bron['bronirovanie-paket3']) != ""): ?>
                                            <li class="course-booking-card__item">
                                                <div class="course-booking-card__wrap">
                                                    <p class="course-booking-card__title">пакет</p>
                                                    <p class="course-booking-card__name"><?= $bron['bronirovanie-paket3'] ?></p>
                                                </div>
                                                <?php if (($bron['bronirovanie-iz3']) != ""): ?>
                                                    <div class="course-booking-card__wrap">
                                                        <p class="course-booking-card__title">Осталось мест</p>
                                                        <div class="course-booking-card__inner"><span
                                                                    class="course-booking-card__seats-left"><?= $bron['bronirovanie-q3'] ?></span><span
                                                                    class="course-booking-card__was-seats"> из <?= $bron['bronirovanie-iz3'] ?></span>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="course-booking-card__wrap">
                                                    <p class="course-booking-card__title">пакет</p>
                                                    <div class="course-booking-card__inner">
                                                        <p class="course-booking-card__new-price"><?= $bron['bronirovanie-new-price3'] ?>
                                                            ₽</p>
                                                        <?php if (($bron['bronirovanie-old-price3']) != ""): ?>
                                                            <p class="course-booking-card__old-price"><?= $bron['bronirovanie-old-price3'] ?>
                                                                ₽</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php if (($bron['link-for-pay-paket3']) != ""): ?>
                                                    <button data-graph-path="" data-fancybox=""
                                                            data-src="#modal-form-one"
                                                            class="btn btn--blue btn--uppercase btn--fw-medium"
                                                            type="button">Записаться
                                                    </button>

                                                    <div id="modal-form-one" class="modal-payment"
                                                         style="display:none;max-width:500px;height: 100%;">
                                                        <?= $bron['link-for-pay-paket3'] ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($bron['link-for-pay-paket3-off'] != ''): ?>
                                                    <a href="<?= $bron['link-for-pay-paket3-off'] ?>"
                                                       class="btn btn--white-blue btn--padding-11-40 btn--font-size-14 btn--fw-bold btn--uppercase promotion__button">Оплатить</a>
                                                <?php endif; ?>

                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            </section>
        <?php endif; ?>


        <?php $feedbackVideo = carbon_get_the_post_meta('feedback-video_association'); ?>

        <?php if (($feedbackVideo) != null): ?>
            <section class="reviews">
                <div class="container container--no-padding">
                    <h2 class="title title--h2 title--center reviews__title">Отзывы</h2>
                    <div class="reviews__slider swiper slider" data-reviews-slider>
                        <div class="reviews__buttons slider__buttons">
                            <button class="slider__button slider__button--prev">
                                <svg width="12" height="26" aria-hidden="true">
                                    <use xlink:href="#arrow-slider"></use>
                                </svg>
                            </button>
                            <button class="slider__button slider__button--next">
                                <svg width="12" height="26" aria-hidden="true">
                                    <use xlink:href="#arrow-slider"></use>
                                </svg>
                            </button>
                        </div>
                        <ul class="reviews__list swiper-wrapper slider__wrapper">


                            <?php foreach ($feedbackVideo as $video) : ?>
                                <?php
                                // Получаем информацию о спикерах из полей carbon
                                $code = carbon_get_post_meta($video['id'], 'frame-video');
                                $desc = carbon_get_post_meta($video['id'], 'desc');
                                $contact = carbon_get_post_meta($video['id'], 'contact');
                                $imgVideo = carbon_get_post_meta($video['id'], 'img-video');
                                ?>


                                <li class="reviews__item swiper-slide slider__slide">
                                    <div class="reviews__block">
                                        <div class="video video--max">
                                            <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/<?= $code ?>"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                            <div class="video__cover">
                                                <picture>
                                                    <img src="//img.youtube.com/vi/<?= $code ?>/maxresdefault.jpg">
                                                </picture>
                                            </div>

                                            <button class="video__btn" type="button"
                                                    aria-label="Начать воспроизведение">
                                                <svg width="44" height="44" aria-hidden="true">
                                                    <use xlink:href="#icon-play"></use>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="reviews__inner">
                                            <p class="reviews__text"><?= $desc ?></p>
                                            <p class="reviews__author"><?= get_the_title($video['id']) ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                        <div class="reviews__pagination slider__pagination slider__pagination--bullets swiper-pagination"></div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php $feedbacktext = carbon_get_the_post_meta('feedback-text_association'); ?>
        <?php if (($feedbacktext) != null): ?>
            <section class="feedback">
                <div class="container">
                    <h2 class="title title--h2 title--center">Отзывы участников</h2>
                    <div class="feedback__slider swiper slider" data-feedback-slider>
                        <div class="feedback__buttons slider__buttons">
                            <button class="slider__button slider__button--prev">
                                <svg width="12" height="26" aria-hidden="true">
                                    <use xlink:href="#arrow-slider"></use>
                                </svg>
                            </button>
                            <button class="slider__button slider__button--next">
                                <svg width="12" height="26" aria-hidden="true">
                                    <use xlink:href="#arrow-slider"></use>
                                </svg>
                            </button>
                        </div>
                        <ul class="feedback__list swiper-wrapper slider__wrapper">


                            <?php foreach ($feedbacktext as $text) : ?>
                                <?php
                                // Получаем информацию о спикерах из полей carbon
                                $code = carbon_get_post_meta($text['id'], 'code');
                                $desc = carbon_get_post_meta($text['id'], 'desc');
                                $contact = carbon_get_post_meta($text['id'], 'contact');
                                $link = carbon_get_post_meta($text['id'], 'link');
                                $img = carbon_get_post_meta($text['id'], 'img');
                                ?>

                                <li class="feedback__item swiper-slide slider__slide">
                                    <p class="feedback__text"><?= $desc ?></p>
                                    <div class="feedback__wrapper">
                                        <?php if (($img) != ""): ?>
                                            <picture>
                                                <img src="<?= $img ?>" width="56" height="56" alt="аватар">
                                            </picture>
                                        <?php endif; ?>

                                        <div class="feedback__inner">
                                            <p class="feedback__name"><?= get_the_title($text['id']) ?></p>
                                            <a class="link link--blue feedback__nickname"
                                               href="<?= $link ?>"><?= $contact ?>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                        <div class="feedback__pagination slider__pagination slider__pagination--progressbar swiper-pagination"></div>
                        <button class="btn btn--light-gray btn--uppercase feedback__more" type="button">Показать Еще
                            отзывы
                        </button>
                    </div>
                    <div class="feedback__links">
                        <?php if (carbon_get_post_meta(get_the_ID(), 'link-for-pay-off') != ''): ?>
                            <a href="<? echo carbon_get_post_meta(get_the_ID(), 'link-for-pay-off'); ?>"
                               class="btn btn--iris-blue btn--uppercase btn--fw-bold btn--padding-11-40 feedback__link">Хочу так же!</a>
                        <?php endif; ?>
                        <?php if (carbon_get_post_meta(get_the_ID(), 'link-for-pay') != ''): ?>
                            <button data-graph-path="" data-fancybox="" data-src="#modal-form"
                                    class="btn btn--iris-blue btn--uppercase btn--fw-bold btn--padding-11-40 feedback__link"
                                    type="button">Записаться на курс
                            </button>
                        <?php endif; ?>

                    </div>
                </div>
            </section>
        <?php endif; ?>
    </main>


<?php get_template_part('template-parts/footer'); ?>