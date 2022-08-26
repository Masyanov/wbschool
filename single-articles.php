<?php
/*
Template Name: Статья
*/

get_template_part('template-parts/header');
?>

<main>
    <section class="article" itemscope itemtype="https://schema.org/Article">
        <div class="container">

                <?php get_template_part('template-parts/breadcrumb'); ?>

            <div class="article__wrapper"><time"><?php the_date( 'd F Y' ); ?></time>
                <?php $speaker = carbon_get_post_meta(get_the_ID(),'speakers_association');?>
                <div class="row_author">
                    <?php foreach ($speaker as $speak) : ?>
                        <div class="article__author">
                            <picture>
                                <?= get_the_post_thumbnail($speak['id'], 'full') ?>
                            </picture>

                            <div class="article__author-text">
                                <a href="<?= get_permalink($speak['id']) ?>">
                                    <p class="article__author-name"
                                       itemprop="author"><?= get_the_title($speak['id']) ?></p>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="article__content">
                    <h1 itemprop="name"><?= get_the_title() ?></h1>
                    <div class="article__lead">
                        <p><?php echo carbon_get_post_meta(get_the_ID(), 'post-details-mini-desc'); ?></p>
                    </div>
                    <figure class="article__img-wrapper">
                        <div class="article__img">
                            <picture>
                                <source type="image/webp" srcset="<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp, <?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>.webp 2x"><img src="<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>" srcset="<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?> 2x" width="800" height="432" alt="">
                            </picture>
                        </div>

                    </figure>
                    <?= the_content() ?>
                </div>
            </div>
        </div>
        <ul class="materials-block" style="margin-bottom: 50px">

            <!--                ВЫВОД ЛИДМАГНИТА-->
            <?php $postsMain = carbon_get_theme_option('courses-one_association');?>
            <?php foreach ($postsMain as $post) :?>
                <li class="materials-block__item materials-block__item--big">
                    <article class="card-article card-article--big">
                        <div class="card-article__img-wrapper">
                            <picture>
                                <?= get_the_post_thumbnail($post['id'], 'full') ?>
                            </picture>
                        </div>
                        <div class="card-article__text-content"><a>
                                <h3 class="title card-article__title"><?= get_the_title($post['id']) ?></h3></a>
                            <p class="card-article__description"><?php echo carbon_get_post_meta($post['id'], 'courses-mini-desc'); ?></p>
                            <ul class="card-article__authors">
                                <?php $speaker = carbon_get_post_meta($post['id'],'speakers_association');?>
                                <?php foreach ($speaker as $speak) :?>
                                    <li class="card-article__author">
                                        <picture>
                                            <?= get_the_post_thumbnail($speak['id'], 'full') ?>
                                        </picture>
                                        <p class="card-article__author-name"><?= get_the_title($speak['id']) ?></p>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <a class="link link link--blue link--uppercase link--letter-spacing card-article__link" href="<?= get_permalink($post['id']) ?>">Читать далее
                                <svg width="16" height="9" aria-hidden="true">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </a>
                        </div>
                    </article>
                </li>
            <?php endforeach; ?>

            <!--               конец кода ВЫВОД ЛИДМАГНИТА-->

            <!--                ВЫВОД ЛИДМАГНИТА-->
            <?php $lidMain = carbon_get_post_meta(get_the_ID(),'courses-one_association');?>
            <?php foreach ($lidMain as $lid) :?>
            <li class="materials-block__item materials-block__item--big">
                <article class="card-article card-article--big">
                    <div class="card-article__img-wrapper">
                        <picture>
                            <?= get_the_post_thumbnail($lid['id'], 'full') ?>
                        </picture>
                    </div>
                    <div class="card-article__text-content">
                            <h3 class="title card-article__title"><?= get_the_title($lid['id']) ?></h3>
                        <p class="card-article__description"><?php echo carbon_get_post_meta($lid['id'], 'free-mini-desc'); ?></p>
                        <ul class="card-article__authors">
                            <?php $speaker = carbon_get_post_meta($lid['id'],'speakers_association');?>
                            <?php foreach ($speaker as $speak) :?>
                                <li class="card-article__author">
                                    <picture>
                                        <?= get_the_post_thumbnail($speak['id'], 'full') ?>
                                    </picture>
                                    <p class="card-article__author-name"><?= get_the_title($speak['id']) ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <a class="link link link--blue link--uppercase link--letter-spacing card-article__link" href="<?= get_permalink($lid['id']) ?>">Читать далее
                            <svg width="16" height="9" aria-hidden="true">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </a>
                    </div>
                </article>
            </li>
            <?php endforeach; ?>
            <!--               конец кода ВЫВОД ЛИДМАГНИТА-->

        </ul>
				<?php $recPost = carbon_get_post_meta(get_the_ID(),'rec_posts_association');?>										
<?php if (($recPost) != null): ?>
        <section class="article__recommend">
            <div class="container article__recommend-slider swiper">
                <h2 class="title article__recommend-title">Рекомендуем статьи</h2>
                <ul class="cards-grid article__recommend-cards swiper-wrapper">
                    
                    <?php foreach ($recPost as $rec) :?>
                        <li class="cards-grid__item swiper-slide">

                            <article class="card-article">
                                <div class="card-article__img-wrapper">
                                    <picture>
                                        <?= get_the_post_thumbnail($rec['id'], 'full') ?>
                                    </picture>
                                </div>
                                <div class="card-article__text-content"><a>
                                        <h3 class="title card-article__title"><?= get_the_title($rec['id']) ?></h3></a>
                                    <p class="card-article__description"><?php echo carbon_get_post_meta($rec['id'], 'post-details-mini-desc'); ?></p>
                                    <ul class="card-article__authors">
                                        <?php $speaker = carbon_get_post_meta($rec['id'],'speakers_association');?>
                                        <?php foreach ($speaker as $speak) :?>

                                            <li class="card-article__author">
                                                <picture>
                                                    <?= get_the_post_thumbnail($speak['id'], 'full') ?>
                                                </picture>
                                                <p class="card-article__author-name"><?= get_the_title($speak['id']) ?></p>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <a class="link link link--blue link--uppercase link--letter-spacing card-article__link" href="<?= get_permalink($rec['id']) ?>">Читать далее
                                        <svg width="16" height="9" aria-hidden="true">
                                            <use xlink:href="#arrow"></use>
                                        </svg>
                                    </a>
                                </div>
                            </article>

                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="article__recommend-buttons">
                    <button class="article__recommend-button article__recommend-button--prev">
                        <svg width="12" height="26" aria-hidden="true">
                            <use xlink:href="#arrow-slider"></use>
                        </svg>
                    </button>
                    <button class="article__recommend-button article__recommend-button--next">
                        <svg width="12" height="26" aria-hidden="true">
                            <use xlink:href="#arrow-slider"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </section>
<?php endif;?>
</main>


<?php get_template_part('template-parts/footer'); ?>
