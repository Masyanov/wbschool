<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', 'crb_attach_post_options');

Container::make('post_meta', 'post-details', __('Детали'))
    ->where('post_type', '=', 'articles')
    ->add_fields(array(
        Field::make('textarea', 'post-details-mini-desc', __('Короткое описание'))
            ->set_width(100),
        Field::make('association', 'speakers_association', __('Выбрать автора из списка спикеров'))
            ->set_types(array(
                array(
                    'type' => 'post',
                    'post_type' => 'speakers',
                ),
            )),
    ))
    ->add_fields(array(
        Field::make('association', 'courses-one_association', __('Выбрать ЛИДМАГНИТ для cтатьи'))
            ->set_max( 1 )
            ->set_types(array(
                array(

                    'type' => 'post',
                    'post_type' => 'free',
                ),
            )),
    ))
    ->add_tab(__('Выбрать рекомендованные статьи для страницы "статья"'), array(
        Field::make('association', 'rec_posts_association', __('Статьи'))
            ->set_max( 3 )
            ->set_types(array(
                array(

                    'type' => 'post',
                    'post_type' => 'articles',
                ),
            )),
    ));
