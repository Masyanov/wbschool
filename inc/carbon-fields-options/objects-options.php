<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_post_options');


Container::make('post_meta', __('Описание'))
    ->where('post_type', '=', 'object')
    ->add_fields(array(
        Field::make('text', 'adress', __('Наименование компании'))
            ->set_width(100),
    ));

//Container::make('post_meta', __('Изображения'))
//    ->where('post_type', '=', 'object')
//    ->add_fields(array(
//        Field::make('complex', 'object_gallery', __(''))
//            ->set_max(3)
//            ->setup_labels(
//                array(
//                    'plural_name' => 'Изображения',
//                    'singular_name' => 'Изображение',
//                )
//            )
//            ->add_fields('object_gallery_item', __('Изображение'), array(
//                Field::make('image', 'object_gallery_image', __('Изображение')),
//            )),
//    ));
