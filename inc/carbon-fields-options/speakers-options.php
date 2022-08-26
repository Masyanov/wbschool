<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', 'crb_attach_post_options');

Container::make('post_meta', 'speaker', __('О спикере'))
    ->where('post_type', '=', 'speakers')
    ->add_fields(array(

    Field::make('text', 'id-speaker', __('ID для сортировки спикеров на странице '))
        ->set_default_value(500)
        ->help_text( '(числовое значение)' )
        ->set_width(25),

        Field::make('text', 'fb', __('Ссылка Facebook'))
            ->set_width(25),
        Field::make('text', 'youtube', __('Ссылка Youtube'))
            ->set_width(25),
        Field::make('text', 'instagram', __('Ссылка Instagram'))
            ->set_width(25),
        Field::make('textarea', 'speaker-title1', __('Левый заголовок'))
            ->set_width(50),
        Field::make('textarea', 'speaker-title2', __('Подзаголовок для курсов'))
            ->set_width(50),
        Field::make('rich_text', 'speaker-left-column', __('Левая колонка'))
            ->set_width(50),
        Field::make('rich_text', 'speaker-right-column', __('Правая колонка'))
            ->set_width(50),
    ))

    ->add_tab(__('Слово спикера и его образование'), array(
        Field::make('rich_text', 'word-speaker', __('Слово спикера'))
            ->set_width(100),

        Field::make('complex', 'base', __('Базовое образование'))
            ->setup_labels(
                array(
                    'plural_name' => 'Учебное заведение',
                    'singular_name' => 'Учебное заведение',
                )
            )
            ->add_fields('base-obrazovanie', __('Учебное заведение'), array(
                Field::make('text', 'base-god', __('Год окончания'))
                    ->set_width(10),
                Field::make('text', 'base-zavedenie', __('Наименование учреждения'))
                    ->set_width(90),
            )),
        Field::make('complex', 'congress', __('Конгрессы и стажировки'))
            ->setup_labels(
                array(
                    'plural_name' => 'Конгрессы и стажировки',
                    'singular_name' => 'Конгрессы и стажировки',
                )
            )
            ->add_fields('base-congress', __('Конгрессы и стажировки'), array(
                Field::make('text', 'base-congress-god', __('Год участия'))
                    ->set_width(10),
                Field::make('text', 'base-congress-name', __('Наименование'))
                    ->set_width(90),
            )),
    ))
    ->add_tab(__('Видео спикера'), array(
         Field::make('complex', 'video-speaker', __('Видео спикера'))
            ->setup_labels(
                array(
                    'plural_name' => 'Видео спикера',
                    'singular_name' => 'Видео спикера',
                )
            )
            ->add_fields('video-speaker-block', __('Видео спикера'), array(

                Field::make('text', 'code', __('Код из ссылки на видео https://www.youtube.com/watch?v= ...'))
                    ->set_width(100),
                Field::make('text', 'desc', __('Комментарий'))
                    ->set_width(100),
            )),
    ));
