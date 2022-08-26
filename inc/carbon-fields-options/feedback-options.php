<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', 'crb_attach_post_options');

Container::make('post_meta', 'speaker', __('Дополнительно'))
    ->where('post_type', '=', 'feedback')
    ->add_fields(array(

        Field::make('text', 'frame-video', __('Код из ссылки на видео https://www.youtube.com/watch?v= ...'))
            ->set_width(100),

        Field::make('rich_text', 'desc', __('Отзыв'))
            ->set_width(100),
        Field::make('image', 'img', __('Фото'))
            ->set_value_type('url')
            ->set_width(10),
        Field::make('text', 'contact', __('Контакт'))
            ->set_width(40),
        Field::make('text', 'link', __('Ссылка'))
            ->set_width(40),

    ));


