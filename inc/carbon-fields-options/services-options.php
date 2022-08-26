<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_post_options');

Container::make('post_meta', __('Список проектов'))
    ->where('post_type', '=', 'service')
    ->add_fields(array(
        Field::make('complex', 'list-project', __('Список проектов'))
            ->setup_labels(
                array(
                    'plural_name' => 'Проекты',
                    'singular_name' => 'Проект',
                )
            )
            ->add_fields('list-project', __('Список проектов'), array(
                    Field::make('text', 'list-project-title', __('Заголовок'))
                        ->set_width(33),
                    Field::make('text', 'list-project-year', __('Год'))
                        ->set_width(33),
                    Field::make('textarea', 'list-project-desc', __('Подпись'))
                        ->set_width(33),
                )
            ),
    ));

