<?php
/*
Template Name: Спикеры
*/

get_template_part('template-parts/header');
?>
<main>
    <section class="speakers">
        <div class="container">

            <div class="speakers__bg speakers__bg--left">
                <svg width="1152" height="772" aria-hidden="true">
                    <use xlink:href="#great-bear"></use>
                </svg>
            </div>
            <div class="speakers__bg speakers__bg--right">
                <svg width="665" height="1029" aria-hidden="true">
                    <use xlink:href="#little-bear2"></use>
                </svg>
            </div>
            <?php get_template_part('template-parts/breadcrumb'); ?>
            <h1 class="title title--h1 title--center speakers__title">Спикеры</h1>
            <div class="speakers__wrapper">
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
                        'orderby' => 'meta_value',
                        'meta_query' => array(array('key' => 'id-speaker')),
                        'order' => 'ASC',

                    ]
                );
                ?>

                <?php foreach ($speakers as $speaker) : ?>
                    <section class="speakers__card card-speaker">
                        <div class="card-speaker__img">
                            <picture>
                                <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id($speaker->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id($speaker->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id($speaker->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id($speaker->ID); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                            </picture>
                        </div>
                        <h2 class="card-speaker__name"><?= $speaker->post_title ?></h2>
                        <p class="card-speaker__position"><?php echo carbon_get_post_meta($speaker->ID, 'speaker-title1'); ?></p>
                        <?php echo carbon_get_post_meta($speaker->ID, 'speaker-left-column'); ?>

                        <?php
                            $coursesFinal = [];
                            foreach ($coursesSpeakers as $coursesSpeaker): ?>
                                <?php foreach ($coursesSpeaker as $items) : ?>
                                    <?php foreach ($items as $item) : ?>
                                        <?php if ($item['id'] == $speaker->ID): ?>
                                            <?php $coursesFinal[$speaker->ID][$items['courseId']] = $items['courseId'] ?>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php if (($coursesFinal) != null): ?>
                        <h3 class="card-speaker__courses-title"> Автор курсов и&nbsp;мастер-классов</h3>
                        <ul class="card-speaker__courses card-speaker__border-bottom">



                            <?php
                            foreach ($coursesFinal as $course) : ?>
                                <?php foreach ($course as $item) : ?>
                                    <li>
                                        <?= get_the_title($item) ?>
                                        <style>
                                            .offline {
                                                font-family: Roboto;
                                                color: #FB5151;
                                                font-size: 14px;
                                                text-transform: uppercase;
                                                font-weight: 500;
                                            }
                                            .online {
                                                font-family: Roboto;
                                                color: #578DD9 ;
                                                font-size: 14px;
                                                text-transform: uppercase;
                                                font-weight: 500;
                                            }
                                        </style>
                                        <?php if(carbon_get_post_meta($item, 'on-off') == 'online'):?>
                                        <span class="card-course__format card-course__format online">
                                                онлайн</span>
                                        <?php else:?>
                                            <span class="card-course__format card-course__format offline">
                                                оффлайн</span>
                                        <?php endif?>
                                    </li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        <a class="link link--blue link--letter-spacing link--uppercase card-speaker__link"
                           href="<?= get_permalink($speaker->ID) ?>">узнать больше
                        </a>
                    </section>
                <?php endforeach; ?>


            </div>
        </div>
    </section>
</main>


<?php get_template_part('template-parts/footer'); ?>
