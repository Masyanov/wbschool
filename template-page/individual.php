<?php
/*
Template Name: Индивидуальное обучение
*/

get_template_part('template-parts/header');
?>

<main>
    <section class="individual">
        <div class="container container--no-padding-mobile-767">
            <div class="individual__bg individual__bg--left">
                <svg width="1152" height="772" aria-hidden="true">
                    <use xlink:href="#great-bear"></use>
                </svg>
            </div>
            <div class="individual__bg individual__bg--right">
                <svg width="665" height="1029" aria-hidden="true">
                    <use xlink:href="#little-bear2"></use>
                </svg>
            </div>
            <?php get_template_part('template-parts/breadcrumb'); ?>

            <h1 class="title title--h1 title--center individual__title">офис-курсы</h1>
            <? $office = carbon_get_post_meta(get_the_ID(), 'office'); ?>
            <? foreach ($office as $of) : ?>
                <section class="card-individual">
                    <h2 class="title title--h2 title--center card-individual__title"><?= $of['title'] ?></h2>
                    <div class="card-individual__wrapper-card">
                        <div class="card-individual__wrapper">
                            <p class="card-individual__about-programm"><?= $of['title2'] ?></p>
                            <div class="card-individual__wrapper-column">
                                <ul class="card-individual__column-descriptions">
                                    <?php if (($of['for']) != ""): ?>
                                        <li class="card-individual__item">
                                            <p class="card-individual__item-title">для кого</p>
                                            <div class="card-individual__descripton-list">
                                                <p class="card-individual__descripton"><?= $of['for'] ?></p>
                                            </div>
                                        </li>
                                    <? endif; ?>
                                    <?php if (($of['know']) != ""): ?>
                                        <li class="card-individual__item">
                                            <p class="card-individual__item-title">вы узнаете</p>
                                            <div class="card-individual__descripton-list">
                                                <p class="card-individual__descripton"><?= $of['know'] ?></p>
                                            </div>
                                        </li>
                                    <? endif; ?>
                                    <?php if (($of['theme']) != ""): ?>
                                        <li class="card-individual__item">
                                            <p class="card-individual__item-title">тема</p>
                                            <div class="card-individual__descripton-list">
                                                <p class="card-individual__descripton"><?= $of['theme'] ?></p>
                                            </div>
                                        </li>
                                    <? endif; ?>
                                    <?php if (($of['kurator']) != ""): ?>
                                        <li class="card-individual__item">
                                            <p class="card-individual__item-title">кураторы</p>
                                            <div class="card-individual__descripton-list">
                                                <p class="card-individual__descripton"><?= $of['kurator'] ?></p>
                                            </div>
                                        </li>
                                    <? endif; ?>
                                    <?php if (($of['more']) != ""): ?>
                                        <li class="card-individual__item">
                                            <p class="card-individual__item-title">а также</p>
                                            <div class="card-individual__descripton-list">
                                                <p class="card-individual__descripton"><?= $of['more'] ?></p>
                                            </div>
                                        </li>
                                    <? endif; ?>
                                </ul>
                                <ul class="card-individual__column-specifications">
                                    <?php if (($of['time']) != ""): ?>
                                        <li class="card-individual__item">
                                            <p class="card-individual__item-title">длительность</p>
                                            <p class="card-individual__item-specification"><?= $of['time'] ?></p>
                                        </li>
                                    <? endif; ?>
                                    <?php if (($of['date']) != ""): ?>
                                        <li class="card-individual__item">
                                            <p class="card-individual__item-title">Дата проведения</p>
                                            <p class="card-individual__item-specification"><?= $of['date'] ?></p>
                                        </li>
                                    <? endif; ?>
                                    <?php if (($of['group']) != ""): ?>
                                        <li class="card-individual__item">
                                            <p class="card-individual__item-title">Группа</p>
                                            <p class="card-individual__item-specification"><?= $of['group'] ?></p>
                                        </li>
                                    <? endif; ?>
                                    <?php if (($of['price']) != ""): ?>
                                        <li class="card-individual__item">
                                            <p class="card-individual__item-title">стоимость</p>
                                            <p class="card-individual__item-specification"><?= $of['price'] ?> ₽</p>
                                            <a class="btn btn--iris-blue btn--uppercase btn--fw-bold btn--small card-individual__btn"
                                               href="<?= $of['link-price'] ?>" target="_blank" rel="nofollow noopener noreferrer">оплатить
                                            </a>
                                        </li>
                                    <? endif; ?>
                                    <?php if (($of['price-one']) != ""): ?>
                                    <li class="card-individual__item">
                                        <p class="card-individual__item-title">стоимость для одного человека</p>
                                        <p class="card-individual__item-specification"><?= $of['price-one'] ?> ₽</p>
                                        <a class="btn btn--iris-blue btn--uppercase btn--fw-bold btn--small card-individual__btn"
                                           href="<?= $of['link-price-one'] ?>" target="_blank" rel="nofollow noopener noreferrer">оплатить
                                        </a>
                                    </li>
                                    <? endif; ?>
                                    <?php if (($of['price-two']) != ""): ?>
                                    <li class="card-individual__item">
                                        <p class="card-individual__item-title">стоимость для двух человек</p>
                                        <p class="card-individual__item-specification"><?= $of['price-two'] ?> ₽</p>
                                        <a class="btn btn--iris-blue btn--uppercase btn--fw-bold btn--small card-individual__btn"
                                           href="<?= $of['link-price-two'] ?>" target="_blank" rel="nofollow noopener noreferrer">оплатить
                                        </a>
                                    </li>
                                    <? endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="card-individual__img">
                            <picture>
                                <picture>
                                    <source type="image/webp" srcset="<?= $of['img'] ?>.webp, <?= $of['img'] ?>.webp 2x"><img src="<?= $of['img'] ?>" srcset="<?= $of['img'] ?> 2x" width="800" height="432" alt="">
                                </picture>
                            </picture>
                        </div>
                    </div>
                </section>
            <? endforeach; ?>

</main>

<?php get_template_part('template-parts/footer'); ?>
