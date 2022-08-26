<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_post_options');



Container::make('post_meta', __('Инфоблок'))
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'template-page/thanx.php')
    ->add_fields(array(

        Field::make('text', 'title', __('Заголовок'))
            ->set_width(30),
        Field::make('text', 'titletwo', __('Второй заголовок'))
            ->set_width(80),
        Field::make('text', 'desc', __('Подпись'))
            ->set_width(100),

        Field::make('textarea', 'desc-w', __('Подпись над виджетом'))
            ->set_width(100),
        Field::make('text', 'code', __('Код группы в ВК'))
            ->help_text('Например https://vk.com/club14355812 кодом является - 14355812')
            ->set_width(100),

    ));



