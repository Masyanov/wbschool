<?php
/*
Template Name: Документ
*/

get_template_part('template-parts/header');
?>

<main>
    <section class="article documents">
        <div class="container">

            <?php get_template_part('template-parts/breadcrumb'); ?>

            <div class="article__wrapper">
                <div class="article__content">
                    <h1><?= get_the_title() ?></h1>
                    <?php if (carbon_get_post_meta(get_the_ID(), 'post-details-mini-desc') != "") : ?>
                        <div class="article__lead">
                            <p><? echo carbon_get_post_meta(get_the_ID(), 'post-details-mini-desc'); ?></p>
                        </div>
                    <? endif; ?>

                    <?= get_the_content() ?>
                </div>
            </div>
        </div>

</main>


<?php get_template_part('template-parts/footer'); ?>
