<?php
/*
Template Name: Статья
*/

get_template_part('template-parts/header');
?>


<main>
    <section class="card-free">
        <div class="container">
            <?php get_template_part('template-parts/breadcrumb'); ?>


            <div class="card-free__wrapper">
                <svg class="background-image" width="1100" height="1166" aria-hidden="true">
                    <use xlink:href="#background-image"></use>
                </svg>
                <div class="card-free__image-wrapper" style="margin-bottom: 50px">
                    <picture>
                        <?= get_the_post_thumbnail(get_the_ID(), 'full') ?>
                    </picture>
                </div>
                <article class="card-free__article">
                    <h1 class="title--h10"><?= get_the_title() ?></h1>
                    <p class="card-free__article-description"><?php echo carbon_get_post_meta(get_the_ID(), 'free-mini-desc'); ?></p>
                    <?php if ((carbon_get_post_meta(get_the_ID(), 'tg-bot')) != "" or (carbon_get_post_meta(get_the_ID(), 'vk-bot')) != ""): ?>
                    <div class="card-free__social-links">
                        <h2 class="title--h11">Куда вам отправить файл?</h2>
                        <div class="card-free__buttons">
                            <?php if (carbon_get_post_meta(get_the_ID(), 'tg-bot') != ""): ?>
                            <a class="btn card-free__buttons-bg-tg" href="<?= carbon_get_post_meta(get_the_ID(), 'tg-bot'); ?>">telegram&nbsp;
                                <svg width="26" height="23" aria-hidden="true">
                                    <use xlink:href="#icon-telegram"></use>
                                </svg>
                            </a>
                            <?php endif; ?>
                            <?php if (carbon_get_post_meta(get_the_ID(), 'vk-bot') != ""): ?>
                            <a class="btn card-free__buttons-bg-vk" href="<?= carbon_get_post_meta(get_the_ID(), 'vk-bot'); ?>">вконтакте&nbsp;
                                <svg width="28" height="17" aria-hidden="true">
                                    <use xlink:href="#icon-vkontakte"></use>
                                </svg>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="card-free__info">
                        <?php $descFree = carbon_get_post_meta(get_the_ID(), 'desc-free'); ?>
                        <?php foreach ($descFree as $df) : ?>
                        <h3 class="title--h12"><?= $df['title'] ?></h3>
                        <div class="card-free__info-description">
                            <p><?= $df['text'] ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </article>
            </div>
        </div>
    </section>
</main>




<?php get_template_part('template-parts/footer'); ?>
