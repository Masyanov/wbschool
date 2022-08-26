<?php
/*
Template Name: Курсы
*/

get_template_part('template-parts/header');
?>

<main>
    <div class="courses">
        <div class="container">
            <?php get_template_part('template-parts/breadcrumb'); ?>
            <h1 class="title title--h1 title--center courses">Курсы и мастер‑классы</h1>
        </div>
    </div>
    <section class="tabs" data-tabs="parent">
        <svg class="background-image" width="1100" height="1166" aria-hidden="true">
            <use xlink:href="#background-image"></use>
        </svg>
        <div class="container">
            <div class="courses__tabs" style="display:none">
                <div class="tabs__scroll-wrapper">
                    <div class="tabs__controls" data-tabs="controls">
                        <button class="tabs__control" type="button" data-tabs="control">курсы для стоматологов</button>
                        <button class="tabs__control" type="button" data-tabs="control">мастер-классы для стоматологов</button>
                        <button class="tabs__control" type="button" data-tabs="control">курсы для управляющих</button>
                    </div>
                </div>
            </div>
            <div class="tabs__content" data-tabs="content">
                <div class="tabs__element" data-tabs="element">
                    <h2 class="title title--h2 title--center">курсы для стоматологов</h2>
                    <ul class="courses-block">

<!---->
<!--                        <li class="courses-block__item courses-block__item--big">-->
<!---->
<!--                            --><?php //$lidMain = carbon_get_theme_option('lid_association');?>
<!--                            --><?php //foreach ($lidMain as $lid) :?>
<!---->
<!--                                <article class="card-course">-->
<!--                                    <div class="card-course__img-wrapper">-->
<!--                                        <picture>-->
<!--                                            --><?//= get_the_post_thumbnail($lid['id'], 'full') ?>
<!--                                        </picture>-->
<!--                                    </div>-->
<!--                                    <div class="card-course__text-content">-->
<!--                                        <p class="card-course__info"><span class="card-course__format card-course__format--blue"> --><?php //echo carbon_get_post_meta($lid['id'], 'on-off'); ?><!--</span><span class="card-course__start">--><?php //echo carbon_get_post_meta($lid['id'], 'date-main'); ?><!--</span></p>-->
<!--                                        <a href="--><?//= get_permalink($lid['id']) ?><!--">-->
<!--                                            <h3 class="title card-course__title">--><?//= get_the_title($lid['id']) ?><!--</h3></a>-->
<!--                                        <p class="card-course__description">--><?php //echo carbon_get_post_meta($lid['id'], 'courses-mini-desc'); ?><!--</p>-->
<!---->
<!--                                        <ul class="card-course__speakers">-->
<!--                                            --><?php //$speaker = carbon_get_post_meta($lid['id'],'speakers_association');?>
<!--                                            --><?php //foreach ($speaker as $speak) :?>
<!---->
<!--                                                <li class="card-course__speaker">-->
<!--                                                    <picture>-->
<!--                                                        --><?//= get_the_post_thumbnail($speak['id'], 'full') ?>
<!--                                                    </picture>-->
<!--                                                    <p class="card-course__speaker-name">--><?//= get_the_title($speak['id']) ?><!--</p>-->
<!--                                                </li>-->
<!--                                            --><?php //endforeach; ?>
<!--                                        </ul>-->
<!---->
<!--                                        <a class="link link link--blue link--uppercase link--letter-spacing card-course__link" href="--><?//= get_permalink($lid['id']) ?><!--">Подробнее о курсе-->
<!--                                            <svg width="16" height="9" aria-hidden="true">-->
<!--                                                <use xlink:href="#arrow"></use>-->
<!--                                            </svg>-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                </article>-->
<!--                            --><?php //endforeach; ?>
<!--                        </li>-->


                        <?php
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

                        <?php
                            $home_posts = get_posts([
                                    'numberposts' => -1,
                                    'post_type' => 'courses',
                                    'tax_query' => [
                                        [
                                            'taxonomy' => 'courses-categories',
                                            'field' => 'slug',// тут можно указать slug и ниже вписать ярлыки нужных рубрик
                                            'terms' => 'courses-for-teeth',

                                        ]
                                    ],
                                    'orderby' => 'meta_value',
                                    'meta_query' => array(array('key' => 'id-course')),
                                    'order' => 'ASC',
                                ]
                            );

                            ?>




                        <?php foreach ($home_posts as $idx => $home_post) :?>


                            <?php if ($idx === 0):?>
                                <li class="courses-block__item courses-block__item--big">

                                        <article class="card-course">
                                            <div class="card-course__img-wrapper">
                                                <picture>
                                                    <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                                </picture>
                                            </div>
                                            <div class="card-course__text-content">
                                                <p class="card-course__info">
                                                    <style>
                                                        .offline {
                                                            font-family: Roboto;
                                                            color: #FB5151;
                                                            font-size: 12px;
                                                        }
                                                        .online {
                                                            font-family: Roboto;
                                                            color: #578DD9 ;
                                                            font-size: 12px;
                                                        }
                                                    </style>
                                            <span class="card-course__format card-course__format <?php echo carbon_get_post_meta($home_post->ID, 'on-off'); ?>">
                                                <?php echo carbon_get_post_meta($home_post->ID, 'on-off'); ?></span>

                                                    <span class="card-course__start">
                                                <?php echo carbon_get_post_meta($home_post->ID, 'date-main'); ?></span></p>

                                                <a href="<?= get_permalink($home_post->ID) ?>">
                                                    <h3 class="title card-course__title"><?= $home_post->post_title ?></h3></a>
                                                <p class="card-course__description"><?php echo carbon_get_post_meta($home_post->ID, 'courses-mini-desc'); ?></p>

                                                <ul class="card-course__speakers">
                                                    <?php $speaker = carbon_get_post_meta($home_post->ID,'speakers_association');?>
                                                    <?php foreach ($speaker as $speak) :?>
                                                        <li class="card-course__speaker">
                                                            <picture>
                                                                <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                                            </picture>
                                                            <p class="card-course__speaker-name"><?= get_the_title($speak['id']) ?></p>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>

                                                <a class="link link link--blue link--uppercase link--letter-spacing card-course__link" href="<?= get_permalink($home_post->ID) ?>">Подробнее о курсе
                                                    <svg width="16" height="9" aria-hidden="true">
                                                        <use xlink:href="#arrow"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </article>
                                </li>
                            <?php else:?>
                            <li class="courses-block__item">
                                <article class="card-course">
                                    <div class="card-course__img-wrapper card-course__img">
                                        <picture>
                                            <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                        </picture>
                                    </div>
                                    <div class="card-course__text-content">
                                        <p class="card-course__info">

                                            <span class="card-course__format card-course__format <?php echo carbon_get_post_meta($home_post->ID, 'on-off'); ?>">
                                                <?php echo carbon_get_post_meta($home_post->ID, 'on-off'); ?></span>

                                            <span class="card-course__start">
                                                <?php echo carbon_get_post_meta($home_post->ID, 'date-main'); ?></span></p>

                                        <a href="#"><h3 class="title card-course__title"><?= $home_post->post_title ?></h3></a>
                                        <p class="card-course__description"><?php echo carbon_get_post_meta($home_post->ID, 'courses-mini-desc'); ?></p>
                                        <ul class="card-course__speakers">
                                            <?php $speaker = carbon_get_post_meta($home_post->ID,'speakers_association');?>
                                            <?php foreach ($speaker as $speak) :?>
                                            <li class="card-course__speaker">
                                                <picture>
                                                    <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                                </picture>

                                                <p class="card-course__speaker-name"><?= get_the_title($speak['id']) ?></p>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <a class="link link link--blue link--uppercase link--letter-spacing card-course__link" href="<?= get_permalink($home_post->ID) ?>">Подробнее о курсе
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
                    <div class="master-classes">
                        <h2 class="title title--h2 title--center">мастер-классы для&nbsp;стоматологов</h2>
                        <div class="master-classes__wrapper">
                            <ul class="courses-block">
                                <?php
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

                                <?php
                                    $home_posts = get_posts([
                                            'numberposts' => -1,
                                            'post_type' => 'courses',
                                            'tax_query' => [
                                                [
                                                    'taxonomy' => 'courses-categories',
                                                    'field' => 'slug',// тут можно указать slug и ниже вписать ярлыки нужных рубрик
                                                    'terms' => 'master-class',

                                                ]
                                            ],
                                            'orderby' => 'meta_value',
                                            'meta_query' => array(array('key' => 'id-course')),
                                            'order' => 'ASC',
                                        ]
                                    );
                                    ?>
                                <?php foreach ($home_posts as $home_post) :?>
                                        <li class="courses-block__item">
                                            <article class="card-course">
                                                <div class="card-course__img-wrapper">
                                                    <picture>
                                                        <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                                    </picture>
                                                </div>
                                                <div class="card-course__text-content">
                                                    <p class="card-course__info">

                                            <span class="card-course__format card-course__format <?php echo carbon_get_post_meta($home_post->ID, 'on-off'); ?>">
                                                <?php echo carbon_get_post_meta($home_post->ID, 'on-off'); ?></span>

                                                        <span class="card-course__start">
                                                <?php echo carbon_get_post_meta($home_post->ID, 'date-main'); ?></span></p>

                                                    <a href="#"><h3 class="title card-course__title"><?= $home_post->post_title ?></h3></a>
                                                    <p class="card-course__description"><?php echo carbon_get_post_meta($home_post->ID, 'courses-mini-desc'); ?></p>
                                                    <ul class="card-course__speakers">
                                                        <?php $speaker = carbon_get_post_meta($home_post->ID,'speakers_association');?>
                                                        <?php foreach ($speaker as $speak) :?>
                                                            <li class="card-course__speaker">
                                                                <picture>
                                                                    <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                                                </picture>
                                                                <p class="card-course__speaker-name"><?= get_the_title($speak['id']) ?></p>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                    <a class="link link link--blue link--uppercase link--letter-spacing card-course__link" href="<?= get_permalink($home_post->ID) ?>">Подробнее о курсе
                                                        <svg width="16" height="9" aria-hidden="true">
                                                            <use xlink:href="#arrow"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </article>
                                        </li>
                                <?php endforeach; ?>


                            </ul>
                        </div>
                    </div>
                    <div class="master-classes">
                        <h2 class="title title--h2 title--center">курсы для управляющих и&nbsp;главврачей</h2>
                        <div class="master-classes__wrapper">
                            <ul class="courses-block">
                                <?php
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

                                <?php
                                    $home_posts = get_posts([
                                            'numberposts' => -1,
                                            'post_type' => 'courses',
                                            'tax_query' => [
                                                [
                                                    'taxonomy' => 'courses-categories',
                                                    'field' => 'slug',// тут можно указать slug и ниже вписать ярлыки нужных рубрик
                                                    'terms' => 'kursy-dlya-upravlyayushhih-i-glavvrachej',

                                                ]
                                            ],
                                            'orderby' => 'meta_value',
                                            'meta_query' => array(array('key' => 'id-course')),
                                            'order' => 'ASC',
                                        ]
                                    );
                                    ?>
                                <?php foreach ($home_posts as $home_post) :?>
                                        <li class="courses-block__item">
                                            <article class="card-course">
                                                <div class="card-course__img-wrapper">
                                                    <picture>
                                                        <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($home_post->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                                    </picture>
                                                </div>
                                                <div class="card-course__text-content">
                                                    <p class="card-course__info">

                                            <span class="card-course__format card-course__format <?php echo carbon_get_post_meta($home_post->ID, 'on-off'); ?>">
                                                <?php echo carbon_get_post_meta($home_post->ID, 'on-off'); ?></span>

                                                        <span class="card-course__start">
                                                <?php echo carbon_get_post_meta($home_post->ID, 'date-main'); ?></span></p>

                                                    <a href="#"><h3 class="title card-course__title"><?= $home_post->post_title ?></h3></a>
                                                    <p class="card-course__description"><?php echo carbon_get_post_meta($home_post->ID, 'courses-mini-desc'); ?></p>
                                                    <ul class="card-course__speakers">
                                                        <?php $speaker = carbon_get_post_meta($home_post->ID,'speakers_association');?>
                                                        <?php foreach ($speaker as $speak) :?>
                                                            <li class="card-course__speaker">
                                                                <picture>
                                                                    <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                                                </picture>
                                                                <p class="card-course__speaker-name"><?= get_the_title($speak['id']) ?></p>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                    <a class="link link link--blue link--uppercase link--letter-spacing card-course__link" href="<?= get_permalink($home_post->ID) ?>">Подробнее о курсе
                                                        <svg width="16" height="9" aria-hidden="true">
                                                            <use xlink:href="#arrow"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </article>
                                        </li>
                                <?php endforeach; ?>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="courses-schedule">
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


                    <?php
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


                    <?php
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
//                                        'meta_key'       => 'date-start', # поле ACF
//                                        'orderby'        => 'date-start',
                                        'orderby' => 'post_title',
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
<!--                        --><?php // print_r($coursesItems) ?>
                    </pre>
                    <?php foreach ($coursesItems as $coursesItem) :
                        $GLOBALS['start'] = carbon_get_post_meta($coursesItem['id'], 'date-start'); ?>
                        <tr>

                            <td>
                                <time datetime="<?php echo carbon_get_post_meta($coursesItem['id'], 'date-start');?>">
                                    <?php echo date_i18n('d F', strtotime($GLOBALS['start']));?>
                                </time></td>
                            <td><a href="<?= get_permalink($coursesItem['id']) ?>"><?= $coursesItem['title'] ?></a></td>
                                    <td>

                                        <?php $speaker = carbon_get_post_meta($coursesItem['id'],'speakers_association'); ?>
                                        <?php foreach ($speaker as $speak) :?>
                                        <p>
                                            <picture>
                                                <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($speak['id']); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                                            </picture>
                                        <span><?= get_the_title($speak['id']) ?></span>
                                        </p>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <a class="btn btn--white btn--uppercase btn--padding-13-30" href="/raspisanie/">Показать полное расписание
            </a>
        </div>
    </section>
</main>


<?php get_template_part('template-parts/footer'); ?>
