
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:image" content="/wp-content/uploads/2022/05/ogimage.jpg" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <!-- Put this script tag to the <head> of your page -->
    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>

    <?php wp_head(); ?>

    <?= carbon_get_theme_option('gmt-script'); ?>
    <?= carbon_get_theme_option('yandex-script'); ?>
</head>