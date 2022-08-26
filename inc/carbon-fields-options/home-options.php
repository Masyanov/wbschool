<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_post_options');

Container::make('post_meta', __('Настройки страницы'))
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'template-page/main.php')
    ->add_tab(__('Блок с видео'), array(
        Field::make('textarea', 'hero-title', __('Заголовок'))
            ->set_width(50),
        Field::make('textarea', 'hero-desc', __('Подпись'))
            ->set_width(50),
        Field::make('textarea', 'video', __('Ссылка на видео'))
            ->set_width(90),
        Field::make('image', 'hero-img', __('Изображение видео'))
            ->set_value_type('url')
            ->set_width(10),
    ))


    ->add_tab(__('Для кого курсы'), array(
        Field::make('image', 'img1', __('Изображение левого блока'))
            ->set_value_type('url')
            ->set_width(10),
        Field::make('textarea', 'title1', __('Заголовок левого блока'))
            ->set_width(40),
        Field::make('textarea', 'desc1', __('Подпись левого блока'))
            ->set_width(50),

        Field::make('image', 'img2', __('Изображение правого блока'))
            ->set_value_type('url')
            ->set_width(10),
        Field::make('textarea', 'title2', __('Заголовок правого блока'))
            ->set_width(40),
        Field::make('textarea', 'desc2', __('Подпись правого блока'))
            ->set_width(50),
    ))

    ->add_tab(__('ПРЕИМУЩЕСТВА НАШИХ КУРСОВ'), array(

        Field::make('text', 'count-adv1', __('Цифра'))
            ->set_width(10),
        Field::make('text', 'title-adv1', __('Подпись справа'))
            ->set_width(20),
        Field::make('text', 'desc-adv1', __('Подпись под цифрой'))
            ->set_width(70),


        Field::make('text', 'count-adv2', __('Цифра'))
            ->set_width(10),
        Field::make('text', 'title-adv2', __('Подпись справа'))
            ->set_width(20),
        Field::make('text', 'desc-adv2', __('Подпись под цифрой'))
            ->set_width(70),


        Field::make('text', 'count-adv3', __('Цифра'))
            ->set_width(10),
        Field::make('text', 'title-adv3', __('Подпись справа'))
            ->set_width(20),
        Field::make('text', 'desc-adv3', __('Подпись под цифрой'))
            ->set_width(70),
    ))

    ->add_tab(__('КУРСЫ И МАСТЕР-КЛАССЫ'), array(

            Field::make('association', 'lid_association', __('Выбрать ЛИДМАГНИТ курс для главной станицы'))
            ->set_max( 1 )
            ->set_types(array(
                array(

                    'type' => 'post',
                    'post_type' => 'courses',
                ),
            )),

        Field::make('association', 'courses_association', __('Выбрать курсы для главной станицы'))
            ->set_max( 3 )
            ->set_types(array(
                array(

                    'type' => 'post',
                    'post_type' => 'courses',
                ),
            ))
    ))

    ->add_tab(__('КАК ПРОХОДИТ ОБУЧЕНИЕ'), array(
        Field::make('separator', 'crb_text_1', 'Оффлайн'),

        Field::make('text', 'how-title1', __('Заголовок 1'))
            ->set_width(33),
        Field::make('text', 'how-title2', __('Заголовок 2'))
            ->set_width(33),
        Field::make('text', 'how-title3', __('Заголовок 3'))
            ->set_width(33),

        Field::make('textarea', 'how-desc1', __('Описание 1'))
            ->set_width(33),
        Field::make('textarea', 'how-desc2', __('Описание 2'))
            ->set_width(33),
        Field::make('textarea', 'how-desc3', __('Описание 3'))
            ->set_width(33),

        Field::make('separator', 'crb_text_2', 'Онлайн'),

        Field::make('text', 'how-title12', __('Заголовок 1'))
            ->set_width(33),
        Field::make('text', 'how-title22', __('Заголовок 2'))
            ->set_width(33),
        Field::make('text', 'how-title32', __('Заголовок 3'))
            ->set_width(33),

        Field::make('textarea', 'how-desc12', __('Описание 1'))
            ->set_width(33),
        Field::make('textarea', 'how-desc22', __('Описание 2'))
            ->set_width(33),
        Field::make('textarea', 'how-desc32', __('Описание 3'))
            ->set_width(33),

        Field::make('complex', 'how-photo', __(''))
            ->setup_labels(
                array(
                    'plural_name' => 'Фото',
                    'singular_name' => 'Фото',
                )
            )
            ->add_fields('how-photo', __('Фото'), array(
                Field::make('image', 'how-photo_image', __('Фото'))
                    ->set_value_type('url')
                    ->set_width(10),
            ))

    ))
    ->add_tab(__('СЛОВА ОСНОВАТЕЛЯ'), array(

        Field::make('text', 'word-main-title', __('Заголовок'))
            ->set_width(33),
        Field::make('text', 'word-main-fi', __('ФИ'))
            ->set_width(33),
        Field::make('text', 'word-main-pro', __('Должность'))
            ->set_width(33),

        Field::make('image', 'word-main-image', __('Фото'))
            ->set_value_type('url')
            ->set_width(10),
        Field::make('textarea', 'word-main-text', __('Первый абзац'))
            ->set_width(45),
        Field::make('textarea', 'word-main-text2', __('Второй абзац'))
            ->set_width(45),

    ))
    ->add_tab(__('БЕСПЛАТНЫЕ МАТЕРИАЛЫ НА ГЛАВНОЙ'), array(

        Field::make('association', 'free_association', __('Выбрать бесплатные материалы'))
            ->set_max( 6 )
            ->set_types(array(
                array(

                    'type'      => 'post',
                    'post_type' => 'free',
                ),
            ))
    ));


