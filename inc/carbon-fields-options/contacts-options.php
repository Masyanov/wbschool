<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_post_options');

Container::make('post_meta', __('Контакты'))
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'template-page/contacts.php')
    ->add_fields(array(



    ));
