<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wbdent
 */

?>

<footer class="footer">
    <div class="container">
        <ul class="footer__top">
            <li class="footer__column">
                <h3 class="footer__title">контакты</h3>
                <p class="footer__clinic-name">Учебный центр &laquo;Белая Медведица&raquo;</p>
                <address class="footer__adress">
                    <p><?= carbon_get_theme_option('adress'); ?> <?= carbon_get_theme_option('street'); ?><?= carbon_get_theme_option('tc'); ?></p>
                </address>
                <a class="link link--light footer__email" href="mailto:<?= carbon_get_theme_option('email'); ?>"><?= carbon_get_theme_option('email'); ?>
                </a>
                <a class="link link--light footer__tel" href="tel:<?= preg_replace('/[^\d^\+]/', '', carbon_get_theme_option( 'phone')) ?>"><?= carbon_get_theme_option('phone'); ?>
                </a>
            </li>
            <li class="footer__column">
                <h3 class="footer__title">Курсы и мастер классы</h3>
                <ul class="footer__list">

                    <? $speaker = carbon_get_theme_option('lid-footer_association');?>
                    <? foreach ($speaker as $speak) :?>
                        <li class="footer__item">
                            <a class="link link--light" href="<?= get_permalink($speak['id']) ?>"><?= get_the_title($speak['id']) ?></a>
                        </li>
                    <? endforeach; ?>

                </ul>
            </li>
            <li class="footer__column">
                <h3 class="footer__title">Статьи</h3>
                <ul class="footer__list">
                    <? $speaker = carbon_get_theme_option('posts-footer_association');?>
                    <? foreach ($speaker as $speak) :?>
                        <li class="footer__item">
                            <a class="link link--light" href="<?= get_permalink($speak['id']) ?>"><?= get_the_title($speak['id']) ?></a>
                        </li>
                    <? endforeach; ?>
                </ul>
            </li>
        </ul>
        <div class="footer__bottom">
            <div class="footer__wrapper-agreement"><span class="logo--footer logo">
                <svg width="128" height="38" aria-hidden="true">
                  <use xlink:href="#logo-footer"></use>
                </svg></span>
                <a class="link link--light footer__agreement" href="/documents/">Регулирующие документы
                </a>
            </div>
            <ul class="social-links">
                <?php if ((carbon_get_theme_option('vk')) != ""): ?>
                <li class="social-links__item">
                    <a class="link link--uppercase link--letter-spacing" href="<?= carbon_get_theme_option('vk'); ?>" target="_blank" rel="nofollow noopener noreferrer">вконтакте
                    </a>
                </li>
                <? endif; ?>
                <?php if ((carbon_get_theme_option('youtube')) != ""): ?>
                <li class="social-links__item">
                    <a class="link link--uppercase link--letter-spacing" href="<?= carbon_get_theme_option('youtube'); ?>" target="_blank" rel="nofollow noopener noreferrer">youtube
                    </a>
                </li>
                <? endif; ?>
                <?php if ((carbon_get_theme_option('instagram')) != ""): ?>
                <li class="social-links__item">
                    <a class="link link--uppercase link--letter-spacing" href="<?= carbon_get_theme_option('instagram'); ?>" target="_blank" rel="nofollow noopener noreferrer">instagram
                    </a>
                </li>
                <? endif; ?>
            </ul>
            <div class="footer__official"><a class="footer__official-link" href="https://stebunoff.ru" target="_blank" rel="nofollow noopener noreferrer">
                    <svg width="29" height="32" aria-hidden="true">
                        <use xlink:href="#office-logo"></use>
                    </svg>
                    <div class="footer__author">Сделано в&nbsp;Бюро Николая Стебунова</div></a></div>
        </div>
    </div>
</footer>
</div>
<script src="/wp-content/themes/wbdent/style/build/js/vendor.min.js"></script>
<script src="/wp-content/themes/wbdent/style/build/js/main.min.js"></script>
</body>
</html>