<?php
/*
Template Name: Спасибо за заказ
*/

get_template_part('template-parts/header');
?>

<main>
    <div class="thanks">
        <div class="container">
            <div class="thanks__content">
                <div class="thanks__info">
                    <h1 class="title title--h9"><? echo carbon_get_post_meta(get_the_ID(), 'title'); ?></h1>
                    <p class="thanks__info-order-number"><? echo carbon_get_post_meta(get_the_ID(), 'titletwo'); ?></p>
                    <p class="thanks__info-order-note"><? echo carbon_get_post_meta(get_the_ID(), 'desc'); ?></p>
                </div>
                <div class="thanks__widget">
                    <p class="thanks__widget-paragraph"><? echo carbon_get_post_meta(get_the_ID(), 'desc-w'); ?></p>
                    <div class="thanks__widget-item">


                        <!-- Put this div tag to the place, where the Group block will be -->
                        <div id="vk_groups"></div>
                        <script type="text/javascript">
                            VK.Widgets.Group("vk_groups", {mode: 4, wide: 1, height: 300, color1: "FFFFFF", color2: "000000", color3: "5181B8"}, <? echo carbon_get_post_meta(get_the_ID(), 'code'); ?>);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/footer'); ?>
