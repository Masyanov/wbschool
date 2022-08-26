<?php
/**
 * wbdent functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wbdent
 */




function my_template_redirect(){
    if( is_404() && $_SERVER["REQUEST_URI"] != '/404/' ){
        wp_redirect( home_url( '/404/' ) );
        exit();
    }
}

add_action( 'template_redirect', 'my_template_redirect' );

add_filter( 'get_the_archive_title', function( $title ){
    return preg_replace('~^[^:]+: ~', '', $title );
});

add_filter( 'document_title_separator', function( $sep ) {
    return '|';
} );

add_filter( 'wpseo_next_rel_link', '__return_false' );

function customize_tinymce_settings($mceInit) {	// Отключает функцию очистки от тегов <p></p> при переключении редактора в HTML-режим
    $mceInit['wpautop'] = false;				return $mceInit;}
add_filter( 'tiny_mce_before_init', 'customize_tinymce_settings' );

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wbdent_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wbdent, use a find and replace
		* to change 'wbdent' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wbdent', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wbdent' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wbdent_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'wbdent_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wbdent_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wbdent_content_width', 640 );
}
add_action( 'after_setup_theme', 'wbdent_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wbdent_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wbdent' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wbdent' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wbdent_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wbdent_scripts()
{
//    Подключаем стили
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style/build/css/style.css', array(), _S_VERSION);
    wp_enqueue_style('main-fancyapps', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css', array(), _S_VERSION);


//    Подключаем скрипты
    wp_enqueue_script('main-fontawesome', 'https://kit.fontawesome.com/50b5b125bb.js', array(), _S_VERSION, true);
    wp_enqueue_script('main-fancyapps', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', array(), _S_VERSION, true);
    wp_enqueue_script('main-script', get_template_directory_uri() . '/wp-content/themes/wbdent/style/build/js/main.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('main-scriptvendor', get_template_directory_uri() . '/style/build/js/vendor.min.js', array(), _S_VERSION, true);

}


add_action( 'wp_enqueue_scripts', 'wbdent_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Подключаем плагин carbon-fields
 */
add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once(get_template_directory() . '/inc/carbon-fields/vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

/**
 * Подключаем настройки произвольных полей. Все произвольные поля находятся в inc/carbon-fields-options
 */

add_action('carbon_fields_register_fields', 'register_carbon_fields');
function register_carbon_fields()
{
    /** Настройки темы */
    require_once(get_template_directory() . '/inc/carbon-fields-options/theme-options.php');
    /** О компании */
    require_once(get_template_directory() . '/inc/carbon-fields-options/about-options.php');
    /** Контакты */
    require_once(get_template_directory() . '/inc/carbon-fields-options/contacts-options.php');
    /** Главная */
    require_once(get_template_directory() . '/inc/carbon-fields-options/home-options.php');
    /** Курс */
    require_once(get_template_directory() . '/inc/carbon-fields-options/courses-options.php');
    /** Спикеры */
    require_once(get_template_directory() . '/inc/carbon-fields-options/speakers-options.php');
    /** Спикеры */
    require_once(get_template_directory() . '/inc/carbon-fields-options/feedback-options.php');
    /** Статьи */
    require_once(get_template_directory() . '/inc/carbon-fields-options/posts-options.php');
    /** Статьи */
    require_once(get_template_directory() . '/inc/carbon-fields-options/free-options.php');
    /** Индивидуальное обучение */
    require_once(get_template_directory() . '/inc/carbon-fields-options/individual-options.php');
    /** Документы */
    require_once(get_template_directory() . '/inc/carbon-fields-options/docs-options.php');
    /** Спасибо */
    require_once(get_template_directory() . '/inc/carbon-fields-options/thanks.php');

}

/** Добавляем новый тип поста для услуг  */

add_action('init', 'register_post_types');
function register_post_types()
{
    register_taxonomy('courses-categories', 'courses', [
        'label' => 'Категория курса',
        'labels' => [
            'name' => 'Категория курса',
            'singular_name' => 'Категория курса',
            'search_items' => 'Искать курс',
            'popular_items' => 'Популярные категории',
            'all_items' => 'Все категории',
            'edit_item' => 'Изменить категорию',
            'update_item' => 'Обновить категорию',
            'add_new_item' => 'Добавить новую категорию',
            'new_item_name' => 'Новое название категории',
            'separate_items_with_commas' => 'Отделить категории запятыми',
            'add_or_remove_items' => 'Добавить или удалить категорию',
            'choose_from_most_used' => 'Выбрать самую популярную категорию',
            'menu_name' => 'Категории',
        ],
        'public' => true,
        'description' => 'Категории для курса', // описание таксономии
        'hierarchical' => true,
        'publicly_queryable' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false, // равен аргументу public
        'show_ui' => true, // равен аргументу public
        'show_tagcloud' => false, // равен аргументу show_ui
        'hierarchical' => true,
        'rewrite' => true,
    ]);
    register_post_type('courses', [
        'labels' => [
            'name' => 'Курсы', // основное название для типа записи
            'singular_name' => 'Курс', // название для одной записи этого типа
            'add_new' => 'Добавить курс', // для добавления новой записи
            'add_new_item' => 'Добавление курса', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование курса', // для редактирования типа записи
            'new_item' => 'Новая курса', // текст новой записи
            'view_item' => 'Смотреть курс', // для просмотра записи этого типа.
            'search_items' => 'Искать курс', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'menu_name' => 'Курсы', // название меню
        ],
        'menu_icon' => 'dashicons-welcome-learn-more',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_rest' => false,
        'rest_base' => '',
        'show_in_menu' => true,
        'menu_position' => 2,
        'map_meta_cap' => true,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'courses'],
        'taxonomies' => array('courses-categories'),
    ]);

//    Спикеры

    register_post_type('speakers', [
        'labels' => [
            'name' => 'Спикеры', // основное название для типа записи
            'singular_name' => 'Спикер', // название для одной записи этого типа
            'add_new' => 'Добавить спикера', // для добавления новой записи
            'add_new_item' => 'Добавление спикера', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование спикера', // для редактирования типа записи
            'new_item' => 'Новая спикера', // текст новой записи
            'view_item' => 'Смотреть спикера', // для просмотра записи этого типа.
            'search_items' => 'Искать спикера', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'menu_name' => 'Спикеры', // название меню
        ],
        'menu_icon' => 'dashicons-admin-users',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_rest' => false,
        'rest_base' => '',
        'show_in_menu' => true,
        'menu_position' => 2,
        'map_meta_cap' => true,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => ['title', 'thumbnail'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'speakers'],
    ]);


    //    Бесплатные материалы

    register_post_type('free', [
        'labels' => [
            'name' => 'Бесплатные материалы', // основное название для типа записи
            'singular_name' => 'Бесплатный материал', // название для одной записи этого типа
            'add_new' => 'Добавить бесплатный материал', // для добавления новой записи
            'add_new_item' => 'Добавление бесплатного материала', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование бесплатного материала', // для редактирования типа записи
            'new_item' => 'Новый бесплатный материал', // текст новой записи
            'view_item' => 'Смотреть бесплатный материал', // для просмотра записи этого типа.
            'search_items' => 'Искать бесплатный материал', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'menu_name' => 'Бесплатные материалы', // название меню
        ],
        'menu_icon' => 'dashicons-carrot',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_rest' => false,
        'rest_base' => '',
        'show_in_menu' => true,
        'menu_position' => 3,
        'map_meta_cap' => true,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => ['title', 'thumbnail'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'free'],
    ]);


    //    Документы

    register_post_type('documents', [
        'labels' => [
            'name' => 'Документы', // основное название для типа записи
            'singular_name' => 'Документ', // название для одной записи этого типа
            'add_new' => 'Добавить документ', // для добавления новой записи
            'add_new_item' => 'Добавление документа', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование документа', // для редактирования типа записи
            'new_item' => 'Новый документ', // текст новой записи
            'view_item' => 'Смотреть документ', // для просмотра записи этого типа.
            'search_items' => 'Искать документ', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'menu_name' => 'Документы', // название меню
        ],
        'menu_icon' => 'dashicons-media-document',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_rest' => false,
        'rest_base' => '',
        'show_in_menu' => true,
        'menu_position' => 3,
        'map_meta_cap' => true,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => ['title', 'editor'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'documents'],
    ]);

//    ПОСТЫ

    register_taxonomy('articles-categories', 'articles', [
        'label' => 'Категория статьи',
        'labels' => [
            'name' => 'Категория статьи',
            'singular_name' => 'Категория статьи',
            'search_items' => 'Искать статьи',
            'popular_items' => 'Популярные категории',
            ' ' => 'Все категории',
            'edit_item' => 'Изменить категорию',
            'update_item' => 'Обновить категорию',
            'add_new_item' => 'Добавить новую категорию',
            'new_item_name' => 'Новое название категории',
            'separate_items_with_commas' => 'Отделить категории запятыми',
            'add_or_remove_items' => 'Добавить или удалить категорию',
            'choose_from_most_used' => 'Выбрать самую популярную категорию',
            'menu_name' => 'Категории',
        ],
        'public' => true,
        'description' => 'Категории для статей', // описание таксономии
        'hierarchical' => true,
        'publicly_queryable' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false, // равен аргументу public
        'show_ui' => true, // равен аргументу public
        'show_tagcloud' => false, // равен аргументу show_ui
        'hierarchical' => true,
        'rewrite' => true,
    ]);
    register_post_type('articles', [
        'labels' => [
            'name' => 'Статьи', // основное название для типа записи
            'singular_name' => 'Статья', // название для одной записи этого типа
            'add_new' => 'Добавить статью', // для добавления новой записи
            'add_new_item' => 'Добавление статьи', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование статьи', // для редактирования типа записи
            'new_item' => 'Новая статья', // текст новой записи
            'view_item' => 'Смотреть статью', // для просмотра записи этого типа.
            'search_items' => 'Искать статью', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'menu_name' => 'Статьи', // название меню
        ],
        'menu_icon' => 'dashicons-edit',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_rest' => false,
        'rest_base' => '',
        'show_in_menu' => true,
        'menu_position' => 2,
        'map_meta_cap' => true,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'articles'],
        'taxonomies' => array('articles-categories'),
    ]);

//    отзывы

    register_taxonomy('feedback-categories', 'feedback', [
        'label' => 'Категория отзыва',
        'labels' => [
            'name' => 'Категория отзыва',
            'singular_name' => 'Категория отзыва',
            'search_items' => 'Искать отзыв',
            'popular_items' => 'Популярные отзывы',
            ' ' => 'Все отзывы',
            'edit_item' => 'Изменить отзыв',
            'update_item' => 'Обновить отзыв',
            'add_new_item' => 'Добавить новую категорию',
            'new_item_name' => 'Новое название категории',
            'separate_items_with_commas' => 'Отделить категории запятыми',
            'add_or_remove_items' => 'Добавить или удалить категорию',
            'choose_from_most_used' => 'Выбрать самую популярную категорию',
            'menu_name' => 'Категории',
        ],
        'public' => true,
        'description' => 'Категории для отзывов', // описание таксономии
        'hierarchical' => true,
        'publicly_queryable' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false, // равен аргументу public
        'show_ui' => true, // равен аргументу public
        'show_tagcloud' => false, // равен аргументу show_ui
        'hierarchical' => true,
        'rewrite' => true,
    ]);
    register_post_type('feedback', [
        'labels' => [
            'name' => 'Отзывы', // основное название для типа записи
            'singular_name' => 'Отзыв', // название для одной записи этого типа
            'add_new' => 'Добавить отзыв', // для добавления новой записи
            'add_new_item' => 'Добавление отзыва', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование отзыва', // для редактирования типа записи
            'new_item' => 'Новый отзыв', // текст новой записи
            'view_item' => 'Смотреть отзыв', // для просмотра записи этого типа.
            'search_items' => 'Искать отзыв', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'menu_name' => 'Отзывы', // название меню
        ],
        'menu_icon' => 'dashicons-testimonial',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_rest' => false,
        'rest_base' => '',
        'show_in_menu' => true,
        'menu_position' => 2,
        'map_meta_cap' => true,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => ['title'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'feedback'],
        'taxonomies' => array('feedback-categories'),
    ]);

}

add_filter('wpseo_canonical', 'removeCanonicalArchivePagination');

function removeCanonicalArchivePagination($link) {
    $link = preg_replace('#\\??/page[\\/=]\\d+#', '', $link);
    return $link;
}

/* 220210-1 */
function video_src( $src ){
$subject = $src;
$pattern = '/watch\?v=(.*)/';
$check = preg_match( $pattern, $subject, $matches );
if( $check ){
 //print_r( $matches );
 if( isset( $matches[1] ) ){
  $src = 'https://www.youtube.com/embed/' . $matches[1];
 }
}
else{
 $src = 'https://www.youtube.com/embed/LsE7sfh28u0';
}      
return $src;        
} // function 

/*
Будет работать только для ссылок вида
https://youtube.com/watch?v=LsE7sfh28u0
*/ 
function add_my_video( $content ) {

$keys = get_post_custom_keys();
$meta_ind = array_search('dp_video_url', $keys);
if( $meta_ind ){
 $meta_values = get_post_custom_values( 'dp_video_url' );
 $meta_value = $meta_values[0];
 $meta_value = trim( $meta_value );
 $video_src = video_src( $meta_value );
 $video_frame = '<iframe width="641" height="361" src="{{dp_video_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
 $video_frame = str_replace( '{{dp_video_url}}', $video_src, $video_frame );
 return $video_frame . $content;
}

return $content;
}

add_filter( 'the_content', 'add_my_video' );


