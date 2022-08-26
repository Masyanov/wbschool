<?php
/*
Template Name: Контакты
*/

get_template_part('template-parts/header');
?>

<main class="main--flex">
    <section class="page-contacts">
        <div class="container">
            <?php get_template_part('template-parts/breadcrumb'); ?>
            <h1 class="title title--h1 title--center page-contacts__title">Контакты</h1>
            <div class="page-contacts__wrapper" itemscope itemtype="https://schema.org/EducationalOrganization">
                <div class="page-contacts__column1">
                    <div class="page-contacts__item">
                        <h2 class="page-contacts__subtitle"> адрес клиники и&nbsp;учебного центра</h2>
                        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress"><span itemprop="addressLocality"><?= carbon_get_theme_option('adress'); ?></span><span>, </span><span itemprop="streetAddress"><?= carbon_get_theme_option('street'); ?></span><span>, <?= carbon_get_theme_option('tc'); ?></span></p>
                    </div>
                    <p class="page-contacts__item page-contacts__description"><?= carbon_get_theme_option('text-contact'); ?></p>
                </div>
                <div class="page-contacts__column2">
                    <div class="page-contacts__item">
                        <h2 class="page-contacts__subtitle"> телефон</h2>
                        <a class="link" href="tel:<?= carbon_get_theme_option('phone'); ?>" itemprop="telephone" content="<?= carbon_get_theme_option('phone'); ?>"><?= carbon_get_theme_option('phone'); ?>
                        </a>
                    </div>
                    <div class="page-contacts__item">
                        <h2 class="page-contacts__subtitle"> эл.почта</h2>
                        <a class="link link--decoration link--blue" href="mailto:<?= carbon_get_theme_option('email'); ?>" itemprop="email"><?= carbon_get_theme_option('email'); ?>
                        </a>
                    </div>
                </div>
                <div class="page-contacts__column2">
                    <div class="page-contacts__item">
                        <h2 class="page-contacts__subtitle"> график работы</h2><span itemprop="openingHours" content="Mo-Su 8:00-21:00"><?= carbon_get_theme_option('time'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <section class="page-contacts__container-bottom">
            <h2 class="visually-hidden">Стоматологическая клиника Белая медведица на карте</h2>
            <div class="page-contacts__map-container">
                <div class="map" width="100%" height="528">
                    <?= carbon_get_theme_option('map'); ?>
                </div>
            </div>
            <div class="page-contacts__photo">
                <picture>
                    <? $GLOBALS['imgMap'] = carbon_get_theme_option( 'img-map' ); ?>
                    <?= wp_get_attachment_image($GLOBALS['imgMap'], 'full') ?>
                </picture>
            </div>
        </section>
    </section>
</main>


<?php get_template_part('template-parts/footer'); ?>
