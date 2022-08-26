<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;



add_action('carbon_fields_register_fields', 'crb_attach_post_options');

Container::make('post_meta', __('Короткое описание'))
    ->where( 'post_type', '=', 'courses' )
    ->add_fields(array(
        Field::make('text', 'id-course', __('ID для сортировки материалов на странице '))
            ->set_default_value(500)
            ->help_text( '(числовое значение)' )
            ->set_width(10),
        Field::make("select", "on-off", "Форма проведения")
            ->set_width( 29)
            ->add_options(array(
                'online' => 'Онлайн',
                'offline' => 'Оффлайн',
            )),
        Field::make('text', 'date-main', __('Дата проведения или СТАРТ В ЛЮБОЙ МОМЕНТ'))
            ->set_width( 29),
        Field::make('textarea', 'courses-mini-desc', __('Короткое описание'))
            ->set_width(29),

        Field::make('association', 'speakers_association', __('Выбрать спикера из существующих'))
            ->set_types(array(
                array(
                    'type' => 'post',
                    'post_type' => 'speakers',
                ),
            ))
    ));


Container::make('post_meta', __('Полное описание'))
    ->where('post_type', '=', 'courses')
    ->add_fields(array(


        Field::make('text', 'time', __('Время проведения'))
            ->set_width(100),


        Field::make('complex', 'for-list', __('Для кого курс'))
            ->setup_labels(
                array(
                    'plural_name' => 'Пункты',
                    'singular_name' => 'Пункт',
                )
            )
            ->add_fields('for-items', __(''), array(

                    Field::make('text', 'for-item', __('Для кого'))
                        ->set_width(100),
                )
            ),

    ));

Container::make('post_meta', __('ПРИГЛАШЕНИЕ НА КУРС'))
    ->where('post_type', '=', 'courses')
    ->add_fields(array(
        Field::make('text', 'frame-video', __('Код из ссылки на видео https://www.youtube.com/watch?v= ...'))
            ->set_width(100),
        Field::make('textarea', 'text1', __('Первый абзац'))
            ->set_width(25),
        Field::make('textarea', 'text2', __('Второй абзац'))
            ->set_width(25),
        Field::make('textarea', 'text3', __('Третий абзац'))
            ->set_width(25),
        Field::make('textarea', 'text4', __('Четвертый абзац'))
            ->set_width(25),
    ));

Container::make('post_meta', __('ПРОГРАММА КУРСА'))
    ->where( 'post_type', '=', 'courses' )
    ->add_fields(array(

        Field::make('rich_text', 'teoretic-main', __('ТЕОРИЯ'))
            ->set_width(49),
        Field::make('rich_text', 'practic-main', __('ПРАКТИКА'))
            ->set_width(49),

        Field::make('complex', 'program', __('Циклы или этапы'))
            ->setup_labels(
                array(
                    'plural_name' => 'Циклы или этапы',
                    'singular_name' => 'Цикл или этап',
                )
            )
            ->add_fields('cicle-desc', __(''), array(

                    Field::make('text', 'cicle-title', ('Заголовок, например: "Цикл 1"'))
                        ->set_width( 80),
                    Field::make('text', 'cicle-date', ('Дата'))
                        ->set_width( 20),
                    Field::make('rich_text', 'teoriya', __('Теория'))
                        ->set_width(25),
                    Field::make('rich_text', 'bonus', __('Бонус'))
                        ->set_width(25),
                    Field::make('rich_text', 'practic', __('Практика'))
                        ->set_width(25),
                    Field::make('rich_text', 'resultat', __('Результат'))
                        ->set_width(25),
                )
            ),
    ));

Container::make('post_meta', __('РАСПИСАНИЕ КУРСА'))
    ->where( 'post_type', '=', 'courses' )
    ->add_fields(array(

        Field::make('complex', 'schedules', __('Время'))
            ->setup_labels(
                array(
                    'plural_name' => 'Время',
                    'singular_name' => 'Время',
                )
            )
            ->add_fields('schedules-desc', __(''), array(

                    Field::make('text', 'schedules-time', ('Временной промежуток'))
                        ->set_width( 30),
                    Field::make('rich_text', 'schedules-text', __('Подпись'))
                        ->set_width(60),
                )
            ),
    ));
Container::make('post_meta', __('ЗАБРОНИРУЙТЕ МЕСТО НА КУРСЕ'))
    ->where( 'post_type', '=', 'courses' )
    ->add_fields(array(
        Field::make("date", "date-start", "СТАРТ КУРСА")
            ->help_text('Когда стартует курс? *обязательное поле для оффлайн курсов'),
        Field::make("text", "link-for-pay", "Ссылка для кнопки")
            ->set_width( 100)
            ->help_text('Ссылка виджета регистрации и оплаты из GetCourse'),
        Field::make("text", "link-for-pay-off", "Ссылка для кнопки")
            ->set_width( 100)
            ->help_text('Ссылка из Robokassa'),
        Field::make("rich_text", "text-under-icon", "Короткое расписание (маркированный список)")
            ->set_width( 100)
            ->help_text('Например "цикл 1: 23-24.06"'),

        Field::make('complex', 'bronirovanie', __('Пакеты'))
            ->setup_labels(
                array(
                    'plural_name' => 'Пакеты',
                    'singular_name' => 'Пакет',
                )
            )
            ->add_fields('bronirovanie-desc1', __(''), array(

                    Field::make('text', 'bronirovanie-title', ('Заголовок например: "ЦЕНА ЗА ВСЕ 3 ЦИКЛА"'))
                        ->set_width( 100),

                    Field::make("separator", "crb_style_options_simple", "Первый блок"),

                    Field::make('text', 'bronirovanie-paket', ('ПАКЕТ'))
                        ->set_width( 40),
                    Field::make('text', 'bronirovanie-q', ('Сколько мест'))
                        ->set_width( 10),
                    Field::make('text', 'bronirovanie-iz', ('Из скольки'))
                        ->set_width( 10),
                    Field::make('text', 'bronirovanie-new-price', ('Новая цена'))
                        ->set_width( 20),
                    Field::make('text', 'bronirovanie-old-price', ('Старая цена (перечеркнуто)'))
                        ->set_width( 20),
                    Field::make("text", "link-for-pay-paket", "Ссылка для кнопки ЗАПИСАТЬСЯ")
                        ->set_width( 100)
                        ->help_text('Ссылка виджета регистрации и оплаты из GetCourse'),
                    Field::make("text", "link-for-pay-paket-off", "Ссылка для кнопки ОПЛАТИТЬ")
                        ->set_width( 100)
                        ->help_text('Ссылка из Robokassa'),

                    Field::make("separator", "crb_style_options_simple2", "Второй блок"),

                    Field::make('text', 'bronirovanie-paket2', ('ПАКЕТ'))
                        ->set_width( 40),
                    Field::make('text', 'bronirovanie-q2', ('Сколько мест'))
                        ->set_width( 10),
                    Field::make('text', 'bronirovanie-iz2', ('Из скольки'))
                        ->set_width( 10),
                    Field::make('text', 'bronirovanie-new-price2', ('Новая цена'))
                        ->set_width( 20),
                    Field::make('text', 'bronirovanie-old-price2', ('Старая цена (перечеркнуто)'))
                        ->set_width( 20),
                    Field::make("text", "link-for-pay-paket2", "Ссылка для кнопки ЗАПИСАТЬСЯ")
                        ->set_width( 100)
                        ->help_text('Ссылка виджета регистрации и оплаты из GetCourse'),
                    Field::make("text", "link-for-pay-paket2-off", "Ссылка для кнопки ОПЛАТИТЬ")
                        ->set_width( 100)
                        ->help_text('Ссылка из Robokassa'),

                    Field::make("separator", "crb_style_options_simple3", "Третий блок"),

                    Field::make('text', 'bronirovanie-paket3', ('ПАКЕТ'))
                        ->set_width( 40),
                    Field::make('text', 'bronirovanie-q3', ('Сколько мест'))
                        ->set_width( 10),
                    Field::make('text', 'bronirovanie-iz3', ('Из скольки'))
                        ->set_width( 10),
                    Field::make('text', 'bronirovanie-new-price3', ('Новая цена'))
                        ->set_width( 20),
                    Field::make('text', 'bronirovanie-old-price3', ('Старая цена (перечеркнуто)'))
                        ->set_width( 20),
                    Field::make("text", "link-for-pay-paket3", "Ссылка для кнопки ЗАПИСАТЬСЯ")
                        ->set_width( 100)
                        ->help_text('Ссылка виджета регистрации и оплаты из GetCourse'),
                    Field::make("text", "link-for-pay-paket3-off", "Ссылка для кнопки ОПЛАТИТЬ")
                        ->set_width( 100)
                        ->help_text('Ссылка из Robokassa'),
                )
            ),


    ));
Container::make('post_meta', __('Отзывы'))
    ->where( 'post_type', '=', 'courses' )
    ->add_fields(array(

        Field::make('association', 'feedback-video_association', __('Выбрать видеоотзывы'))
            ->set_types(array(
                array(
                    'type' => 'post',
                    'post_type' => 'feedback',
                ),
                array(
                    'type' => 'term',
                    'taxonomy' => 'video-otzyvy',
                ),
            )),
        Field::make('association', 'feedback-text_association', __('Выбрать текстовые отзывы'))
            ->set_types(array(
                array(
                    'type' => 'post',
                    'post_type' => 'feedback',
                ),
                array(
                    'type' => 'term',
                    'taxonomy' => 'tekstovye-otzyvy',
                ),
            ))

    ));