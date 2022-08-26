<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_post_options');

Container::make('post_meta', __('Вакансии'))
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'template-page/vacancy.php')
    ->add_fields(array(
        Field::make('complex', 'vacancy', __(''))
            ->add_fields('hero_slider_item', __('Вакансия'), array(
                Field::make('image', 'vacancy-image', __('Изображение'))
                    ->set_width(15),
                Field::make('text', 'vacancy-title', __('Заголовок'))
                    ->set_width(25),
                Field::make('rich_text', 'vacancy-desc', __('Описание'))
                    ->set_width(60),
            )),
    ));

