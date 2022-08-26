<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', 'crb_attach_post_options');

Container::make('post_meta', 'post-details', __('Детали'))
    ->where('post_type', '=', 'free')
    ->add_fields(array(
        Field::make('text', 'id-speaker', __('ID для сортировки материалов на странице '))
            ->set_default_value(500)
            ->help_text( '(числовое значение)' )
            ->set_width(10),
        Field::make('textarea', 'free-mini-desc', __('Короткое описание'))
            ->set_width(90),
        Field::make('text', 'vk-bot', __('Ссылка Вконтакте'))
            ->set_width(50),
        Field::make('text', 'tg-bot', __('Ссылка Телеграм'))
            ->set_width(50),

        Field::make('complex', 'desc-free', __('Описание материала'))
            ->setup_labels(
                array(
                    'plural_name' => 'Пункты',
                    'singular_name' => 'Пункт',
                )
            )
            ->add_fields('desc-block', __('Пункт с заголовком'), array(
                Field::make('text', 'title', __('Заголовок'))
                    ->set_width(50),

                Field::make('textarea', 'text', __('Текст'))
                    ->set_width(50),

            )),
    ));
