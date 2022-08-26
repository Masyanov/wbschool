<section class="article__recommend">
    <div class="container article__recommend-slider swiper">
        <h2 class="title article__recommend-title">Рекомендуем статьи</h2>
        <ul class="cards-grid article__recommend-cards swiper-wrapper">
            <? $recPost = carbon_get_theme_option('rec_posts_association');?>
            <? foreach ($recPost as $rec) :?>
            <li class="cards-grid__item swiper-slide">

                <article class="card-article">
                    <div class="card-article__img-wrapper">
                        <picture>
                            <?= get_the_post_thumbnail($rec['id'], 'full') ?>
                        </picture>
                    </div>
                    <div class="card-article__text-content"><a>
                            <h3 class="title card-article__title"><?= get_the_title($rec['id']) ?></h3></a>
                        <p class="card-article__description"><? echo carbon_get_post_meta($rec['id'], 'post-details-mini-desc'); ?></p>
                        <ul class="card-article__authors">
                            <? $speaker = carbon_get_post_meta($rec['id'],'speakers_association');?>
                            <? foreach ($speaker as $speak) :?>

                                <li class="card-article__author">
                                    <picture>
                                        <?= get_the_post_thumbnail($speak['id'], 'full') ?>
                                    </picture>
                                    <p class="card-article__author-name"><?= get_the_title($speak['id']) ?></p>
                                </li>
                            <? endforeach; ?>
                        </ul>
                        <a class="link link link--blue link--uppercase link--letter-spacing card-article__link" href="<?= get_permalink($rec['id']) ?>">Читать далее
                            <svg width="16" height="9" aria-hidden="true">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </a>
                    </div>
                </article>

            </li>
            <? endforeach; ?>
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

