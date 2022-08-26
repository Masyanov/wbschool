<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');

Container::make('theme_options', __('Нaстройки темы'))
    ->add_tab(__('Настройка шапки'), array(
        Field::make('image', 'site_logo', __('Логотип'))
            ->set_width(15),
        Field::make("separator", "links", "Ссылки для верхнего меню"),
        Field::make('text', 'link1', __('КЛИНИКА ДЛЯ ВЗРОСЛЫХ'))
            ->set_width(20),
        Field::make('text', 'link2', __('ДЕТСКИЙ МЕД. ЦЕНТР'))
            ->set_width(20),
        Field::make('text', 'link3', __('МАГАЗИН'))
            ->set_width(20),
    ))
    ->add_tab(__('Настройка подвала'), array(

        Field::make('association', 'lid-footer_association', __('Выбрать курсы для меню в подвале"'))
            ->set_max( 5 )
            ->set_types(array(
                array(

                    'type' => 'post',
                    'post_type' => 'courses',
                ),
            )),
        Field::make('association', 'posts-footer_association', __('Выбрать бесплатные материалы для меню в подвале'))
            ->set_max( 5 )
            ->set_types(array(
                array(

                    'type' => 'post',
                    'post_type' => 'articles',
                ),
            )),
    ))

    ->add_tab(__('Контакты'), array(
        Field::make('text', 'phone', __('Телефон'))
            ->set_width(33),
        Field::make('text', 'adress', __('Город'))
            ->set_width(10),
        Field::make('text', 'street', __('Улица'))
            ->set_width(13),
        Field::make('text', 'tc', __('ТЦ'))
            ->set_width(10),
        Field::make('text', 'email', __('Эл.почта'))
            ->set_width(13),
        Field::make('text', 'time', __('Время работы'))
            ->set_width(20),
        Field::make('text', 'vk', __('Ссылка Вконтакте'))
            ->set_width(33),
        Field::make('text', 'tg', __('Ссылка Телеграм'))
            ->set_width(33),
        Field::make('text', 'wa', __('Ссылка WhatsApp'))
            ->set_width(33),
        Field::make('text', 'youtube', __('Ссылка Youtube'))
            ->set_width(50),
        Field::make('text', 'instagram', __('Ссылка Instagram'))
            ->set_width(50),
        Field::make('text', 'text-contact', __('Комментарий к контактам'))
            ->set_width(100),
    ))
    ->add_tab(__('Выбрать ЛИД-магнит для страниц'), array(
        Field::make('association', 'lid_association', __('Выбрать ЛИДМАГНИТ для страницы "Курсы"'))
            ->set_max( 1 )
            ->set_types(array(
                array(

                    'type' => 'post',
                    'post_type' => 'courses',
                ),
            )),
        Field::make('association', 'posts_association', __('Выбрать ЛИДМАГНИТ для страницы "Статьи"'))
            ->set_max( 1 )
            ->set_types(array(
                array(

                    'type' => 'post',
                    'post_type' => 'free',
                ),
            )),
        Field::make('association', 'posts-free_association', __('Выбрать ЛИДМАГНИТ для страницы "Бесплатные материалы"'))
            ->set_max( 1 )
            ->set_types(array(
                array(

                    'type' => 'post',
                    'post_type' => 'free',
                ),
            )),
    ))



    ->add_tab(__('Форма и карта'), array(
        Field::make('textarea', 'form', __('Код формы'))
            ->set_width(100),
        Field::make('textarea', 'map', __('Код карты'))
            ->set_width(80),
        Field::make('image', 'img-map', __('Фото на карте'))
            ->set_width(15),
    ))

    ->add_tab(__('SEO данные'), array(
        Field::make("separator", "google", "Google"),
        Field::make('textarea', 'gmt-script', __('Google Tag Manager в head'))
            ->set_width(50),
        Field::make('textarea', 'gmt-noscript', __('Google Tag Manager в body'))
            ->set_width(50),

        Field::make("separator", "yandex", "Яндекс"),
        Field::make('textarea', 'yandex-script', __('Яндекс метрика в head'))
            ->set_width(100),

    ));

