<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_post_options');



Container::make('post_meta', __('Инфоблок'))
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'template-page/about.php')
    ->add_fields(array(
        Field::make('image', 'main-image', __('Изображение'))
            ->set_value_type('url')
            ->set_width(15),

        Field::make('rich_text', 'desc', __('Описание'))
            ->set_width(85),

    ))
    ->add_fields(array(
        Field::make('image', 'image1', __('Изображение 1'))
            ->set_value_type('url')
            ->set_width(33),
        Field::make('image', 'image2', __('Изображение 2'))
            ->set_value_type('url')
            ->set_width(33),
        Field::make('image', 'image3', __('Изображение 3'))
            ->set_value_type('url')
            ->set_width(33),

        Field::make('text', 'title-card1', __('Заголовок под изображением'))
            ->set_width(33),
        Field::make('text', 'title-card2', __('Заголовок под изображением 2'))
            ->set_width(33),
        Field::make('text', 'title-card3', __('Заголовок под изображением 3'))
            ->set_width(33),

        Field::make('textarea', 'desc-card1', __('Описание под изображением'))
            ->set_width(33),
        Field::make('textarea', 'desc-card2', __('Описание под изображением 2'))
            ->set_width(33),
        Field::make('textarea', 'desc-card3', __('Описание под изображением 3'))
            ->set_width(33),


    ));

Container::make('post_meta', __('Благодарственные письма'))
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'template-page/about.php')
    ->add_fields(array(
        Field::make('complex', 'object_gallery', __(''))
            ->set_max(6)
            ->setup_labels(
                array(
                    'plural_name' => 'Изображения',
                    'singular_name' => 'Изображение',
                )
            )
            ->add_fields('object_gallery_item', __('Изображение'), array(
                Field::make('image', 'object_gallery_image', __('Изображение'))
				->set_value_type('url')
                   )),
    ));


