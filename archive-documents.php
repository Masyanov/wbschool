<?php
/*
Template Name: Документы
*/

get_template_part('template-parts/header');
?>
<main>
    <section class="documents">
        <div class="container" style="padding-top: 9px;">
            <?php get_template_part('template-parts/breadcrumb'); ?>

            <h1 class="title title--h13 title--center">Регулирующие документы</h1>

            <?
            $documents = get_posts([
                    'numberposts' => -1,
                    'post_type' => 'documents',
                    'orderby' => 'date',
                    'order' => 'ASC',
                ]
            );
            ?>
            <ul class="documents__list">
                <? foreach ($documents as $document) :?>
                <li class="documents__item">
                    <p class="documents__text"><?= $document->post_title ?></p>
                    <a class="link link link--blue link--uppercase link--letter-spacing" href="<?= get_permalink($document->ID) ?>">ознакомиться
                        <svg width="12" height="9" aria-hidden="true">
                            <use xlink:href="#arrow"></use>
                        </svg>
                    </a>
                </li>
                <? endforeach; ?>

            </ul>
            <div class="documents__btn">
                <a class="btn btn--light-gray btn--uppercase btn--padding-13-74" href="/">На главную
                </a>
            </div>
        </div>
    </section>
</main>


<?php get_template_part('template-parts/footer'); ?>
