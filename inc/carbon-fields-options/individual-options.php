<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', 'crb_attach_post_options');

Container::make('post_meta', 'speaker', __('Основная'))
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'template-page/individual.php')
    ->add_tab(__('Добавить курс'), array(
    Field::make('complex', 'office', __('ОФИС-КУРСЫ'))
        ->setup_labels(
            array(
                'plural_name' => 'курсы',
                'singular_name' => 'курс',
            )
        )
        ->add_fields('office-block', __('Курс'), array(
            Field::make('text', 'title', __('Заголовок'))
                ->set_width(100),

            Field::make('text', 'title2', __('Заголовок внутри блока'))
                ->set_width(100),

            Field::make('rich_text', 'for', __('ДЛЯ КОГО'))
                ->set_width(33),
            Field::make('rich_text', 'know', __('ВЫ УЗНАЕТЕ'))
                ->set_width(33),
            Field::make('rich_text', 'theme', __('ТЕМЫ'))
                ->set_width(33),

            Field::make('rich_text', 'kurator', __('КУРАТОРЫ'))
                ->set_width(45),
            Field::make('rich_text', 'more', __('А ТАКЖЕ'))
                ->set_width(45),
            Field::make('image', 'img', __('Изображение'))
                ->set_value_type('url')
                ->set_width(10),

            Field::make('text', 'time', __('ДЛИТЕЛЬНОСТЬ'))
                ->set_width(33),
            Field::make('text', 'date', __('ДАТА ПРОВЕДЕНИЯ'))
                ->set_width(33),
            Field::make('text', 'group', __('ГРУППА'))
                ->set_width(33),


            Field::make('text', 'price', __('СТОИМОСТЬ'))
                ->set_width(10),
            Field::make('textarea', 'link-price', __('Ссылка на оплату'))
                ->set_width(23),
            Field::make('text', 'price-one', __('СТОИМОСТЬ ДЛЯ ОДНОГО ЧЕЛОВЕКА'))
                ->set_width(10),
            Field::make('textarea', 'link-price-one', __('Ссылка на оплату'))
                ->set_width(23),
            Field::make('text', 'price-two', __('СТОИМОСТЬ ДЛЯ ДВУХ ЧЕЛОВЕК'))
                ->set_width(10),
            Field::make('textarea', 'link-price-two', __('Ссылка на оплату'))
                ->set_width(23),

            )),

    ));
