<?php
/*
Template Name: Расписание
*/

get_template_part('template-parts/header');
?>

<main>

    <section class="courses-schedule">

        <div class="container">
            <?php get_template_part('template-parts/breadcrumb'); ?>
            <h1 class="title title--h2">Расписание офлайн курсов на&nbsp;2022 год</h1>
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
                            'numberposts' => -1,
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
<?php if(carbon_get_post_meta($coursesItem['id'], 'date-start') != ""):?>
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

        </div>
    </section>
</main>


<?php get_template_part('template-parts/footer'); ?>
