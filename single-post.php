<?php
/*
Template Name: Статья
*/

get_template_part('template-parts/header');
?>

<main>
    <section class="article">
        <div class="container">
            <div class="container">
                <?php get_template_part('template-parts/breadcrumb'); ?>
            </div>
            <div class="article__wrapper">
                <div class="article__author">
                    <picture>
                        <source type="image/webp" srcset="img/content/image-author-1.webp, img/content/image-author-1@2x.webp 2x"><img src="img/content/image-author-1.jpg" srcset="img/content/image-author-1@2x.jpg 2x" width="56" height="56" alt="Фото автора статьи">
                    </picture>
                    <div class="article__author-text">
                        <p class="article__author-name">Варвара Висленко</p>
                        <time datetime="2022-02-17">17 февраля 2022</time>
                    </div>
                </div>
                <div class="article__content">
                    <h1>Связь между эмоциональным состоянием взрослого и&nbsp;состоянием ребенка&nbsp;/ h1</h1>
                    <div class="article__lead">
                        <p>Лид — первый абзац статьи, информативный отрывок, который захватывает внимание читателя на данном материале. Для этого лид набирают шрифтом большего кегля.</p>
                    </div>
                    <figure class="article__img-wrapper">
                        <div class="article__img">
                            <picture>
                                <source type="image/webp" srcset="img/content/article-1.webp, img/content/article-1@2x.webp 2x"><img src="img/content/article-1.jpg" srcset="img/content/article-1@2x.jpg 2x" width="960" height="536" alt="Alt-text изображения">
                            </picture>
                        </div>
                        <figcaption>Подпись к изображению может быть длинной и занимать две строки</figcaption>
                    </figure>
                    <p>Ребенок рождается полностью зависимым от&nbsp;взрослого, его самая главная задача&nbsp;&mdash; выжить. Эти два условия&nbsp;&mdash; выживание и&nbsp;зависимость, а&nbsp;также незрелость мозга и&nbsp;отсутствие логического мышления в&nbsp;раннем возрасте, сделали ребенка очень настроенным на&nbsp;значимого взрослого и&nbsp;его эмоциональное состояние.</p>
                    <p>До&nbsp;двух-трехлетнего возраста ребенок не&nbsp;ощущает себя отдельным человеком, он&nbsp;находится в&nbsp;слиянии со&nbsp;своим взрослым, чаще всего это мама. В&nbsp;этом возрасте чувствительность особенно развита, чтобы подстроиться под эмоциональное состояние взрослого и&nbsp;таким образом обеспечить себе выживание.</p>
                    <h2>Многострочный заголовок для&nbsp;проверки&nbsp;/ h2</h2>
                    <p>В&nbsp;дошкольном возрасте несмотря на&nbsp;сильно развитую чувствительность, распознавать, а&nbsp;тем более регулировать свои чувства ребенок еще не&nbsp;может. В&nbsp;это время на&nbsp;взрослого ложится двойная нагрузка&nbsp;&mdash; с&nbsp;одной стороны заботится о&nbsp;своем эмоциональном состоянии, а&nbsp;с&nbsp;другой контейнировать чувства ребенка (то&nbsp;есть помогать с&nbsp;ними справляться), а&nbsp;также подробно рассказывать про каждую новую ситуацию.</p>
                    <div class="article__accent-text">
                        <p>В&nbsp;дошкольном возрасте несмотря на&nbsp;сильно развитую чувствительность, распознавать, а&nbsp;тем более регулировать свои чувства ребенок еще не&nbsp;может.</p>
                    </div>
                    <p>Для улучшения эмоционального состояния в&nbsp;нашей клинике во&nbsp;время лечения ребенка в&nbsp;наркозе рядом с&nbsp;родителем находится психолог.</p>
                    <h3>Может пригодится в&nbsp;объемной статье. Эта строка показывает интерлиньяж&nbsp;/ h3</h3>
                    <p>Мы&nbsp;понимаем, что чувства родителя могут быть разные, а&nbsp;также&nbsp;то, что после пробуждения ребенку нужны спокойные мама и&nbsp;папа. Родители могут рассказать психологу о&nbsp;своих волнениях, тревогах, вместе подышать, сделать медитацию, получить поддержку, обсудить вопросы дальнейшей адаптации и&nbsp;любые другие, которые интересуют родителей.</p>
                </div>
                <h2 class="title article__video-title">Видеообзор / h2</h2>
                <figure class="article__video-wrapper">
                    <div class="article__video-block">
                        <div class="video">
                            <iframe src="https://www.youtube.com/embed/ft2X_gXN-Ec?enablejsapi=1" title="видео" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
                            <div class="video__cover">
                                <picture>
                                    <source type="image/webp" srcset="img/content/preview-video.webp, img/content/preview-video@2x.webp 2x"><img src="img/content/preview-video.jpg" srcset="img/content/preview-video@2x.jpg 2x" width="960" height="536" alt="Обложка для видео">
                                </picture>
                            </div>
                            <button class="video__btn" type="button" aria-label="Начать воспроизведение">
                                <svg width="44" height="44" aria-hidden="true">
                                    <use xlink:href="#icon-play"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <figcaption class="article__video-caption">Подпись к изображению может быть длинной и занимать две строки</figcaption>
                </figure>
                <h2>Списки и таблица</h2>
                <p>Маркированный список:</p>
                <ul>
                    <li>Если пункты списка длинные и&nbsp;представляют собой развернутые предложения, они должны начинаться с&nbsp;прописной буквы и&nbsp;заканчиваться точкой.</li>
                    <li>Короткий пункт списка;</li>
                    <li>Если пункты списка короткие, не&nbsp;являются самостоятельной законченной конструкцией и&nbsp;грамматически тесно связаны с&nbsp;предшествующей списку вводной фразой, они должны начинаться со&nbsp;строчной буквы и&nbsp;заканчиваться точкой с&nbsp;запятой (в&nbsp;конце последнего пункта&nbsp;&mdash; точка).</li>
                    <li>Последний пункт списка.</li>
                </ul>
                <p>Нумерованный список:</p>
                <ol>
                    <li>Если пункты списка длинные и&nbsp;представляют собой развернутые предложения, они должны начинаться с&nbsp;прописной буквы и&nbsp;заканчиваться точкой.</li>
                    <li>Короткий пункт списка;</li>
                    <li>Если пункты списка короткие, не&nbsp;являются самостоятельной законченной конструкцией и&nbsp;грамматически тесно связаны с&nbsp;предшествующей списку вводной фразой, они должны начинаться со&nbsp;строчной буквы и&nbsp;заканчиваться точкой с&nbsp;запятой (в&nbsp;конце последнего пункта&nbsp;&mdash; точка).</li>
                    <li>Последний пункт списка.</li>
                </ol>
                <table>
                    <caption>Услуги и цены / заголовок таблицы</caption>
                    <thead>
                    <tr>
                        <th scope="col">Услуга</th>
                        <th scope="col">Врач</th>
                        <th scope="col">Цена</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th colspan="3" scope="colgroup">КОМПЛЕКСНОЕ ЛЕЧЕНИЕ ЗУБОВ / подзаголовок</th>
                    </tr>
                    <tr>
                        <td>Комплексная консультация двух и более специалистов</td>
                        <td>М. Гогуев, А. Вадахов</td>
                        <td>от 3500 ₽</td>
                    </tr>
                    <tr>
                        <td>Диагностика (Депрограмматор Коиса, определение центрального соотношения, лицевая дуга)</td>
                        <td>К. Акмуллина</td>
                        <td>25 000 ₽</td>
                    </tr>
                    <tr>
                        <td>Цельнокерамические виниры</td>
                        <td>В. Висленко</td>
                        <td>37 000 ₽</td>
                    </tr>
                    <tr>
                        <td>Эстетико-функциональное восстановление зуба искусственной коронкой на основе диоксида циркония</td>
                        <td>В. Висленко</td>
                        <td>от 50 000 ₽</td>
                    </tr>
                    <tr>
                        <th colspan="3" scope="colgroup">Хирургия / подзаголовок</th>
                    </tr>
                    <tr>
                        <td>Зубосохраняющая операция (апикальная хирургия)</td>
                        <td>И. Курдюмов</td>
                        <td>37 000 ₽</td>
                    </tr>
                    <tr>
                        <td>Синус-лифтинг открытый с учетом материалов 1 зона</td>
                        <td>И. Курдюмов</td>
                        <td>от 61 700 ₽</td>
                    </tr>
                    <tr>
                        <td>Костная пластика в области 1 зуба</td>
                        <td>М. Гогуев</td>
                        <td>от 37 000 ₽</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--.container.container--no-padding-mobile
        .article__video
          h2.title.article__video-title Видеообзор / h2
          .article__video-wrapper
            +video(content.videoData, content.imgData)
          p.article__video-caption Подпись к изображению может быть длинной и занимать две строки
        -->
        <!--.container
        .article__wrapper.article__wrapper--table
          h2 Списки и таблица
          p Маркированный список:
          ul
            each item in content.markedList
              li!=item
          p Нумерованный список:
          ol
            each item in content.markedList
              li!=item

          table
            caption Услуги и цены / заголовок таблицы
            thead
              tr
                each item in content.table.head
                  th(scope="col")!=item
            tbody
              each item in content.table.body
                if typeof(item) === "string"
                  tr
                    th(colspan="3" scope="colgroup")!=item
                else
                  tr
                    each data in item
                      td!=data
        -->
        <section class="article__recommend">
            <div class="container article__recommend-slider swiper">
                <h2 class="title article__recommend-title">Рекомендуем статьи</h2>
                <ul class="cards-grid article__recommend-cards swiper-wrapper">
                    <li class="cards-grid__item swiper-slide">
                        <article class="card-article">
                            <div class="card-article__img-wrapper">
                                <picture>
                                    <source type="image/webp" srcset="img/content/image-article-1.webp, img/content/image-article-1@2x.webp 2x"><img src="img/content/image-article-1.jpg" srcset="img/content/image-article-1@2x.jpg 2x" width="360" height="200" alt="">
                                </picture>
                            </div>
                            <div class="card-article__text-content"><a>
                                    <h3 class="title card-article__title">40&nbsp;идей для stories на&nbsp;каждый день в&nbsp;блоге врача-стоматолога</h3></a>
                                <p class="card-article__description">Чтобы удержать текущих и&nbsp;привлечь новых подписчиков&nbsp;&mdash; потенциальных клиентов</p>
                                <ul class="card-article__authors">
                                    <li class="card-article__author">
                                        <picture>
                                            <source type="image/webp" srcset="img/content/image-author-1.webp, img/content/image-author-1@2x.webp 2x"><img src="img/content/image-author-1.jpg" srcset="img/content/image-author-1@2x.jpg 2x" width="56" height="56" alt="Фото спикера">
                                        </picture>
                                        <p class="card-article__author-name">Варвара<br>Висленко</p>
                                    </li>
                                </ul>
                                <a class="link link link--blue link--uppercase link--letter-spacing card-article__link" href="#">Читать далее
                                    <svg width="16" height="9" aria-hidden="true">
                                        <use xlink:href="#arrow"></use>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </li>
                    <li class="cards-grid__item swiper-slide">
                        <article class="card-article">
                            <div class="card-article__img-wrapper">
                                <picture>
                                    <source type="image/webp" srcset="img/content/image-article-2.webp, img/content/image-article-2@2x.webp 2x"><img src="img/content/image-article-2.jpg" srcset="img/content/image-article-2@2x.jpg 2x" width="360" height="200" alt="">
                                </picture>
                            </div>
                            <div class="card-article__text-content"><a>
                                    <h3 class="title card-article__title">Краткая инструкция: как раскрутить клинику в&nbsp;инстаграме</h3></a>
                                <p class="card-article__description">Чтобы удержать текущих и&nbsp;привлечь новых подписчиков&nbsp;&mdash; потенциальных клиентов</p>
                                <ul class="card-article__authors">
                                    <li class="card-article__author">
                                        <picture>
                                            <source type="image/webp" srcset="img/content/image-author-1.webp, img/content/image-author-1@2x.webp 2x"><img src="img/content/image-author-1.jpg" srcset="img/content/image-author-1@2x.jpg 2x" width="56" height="56" alt="Фото спикера">
                                        </picture>
                                        <p class="card-article__author-name">Варвара<br>Висленко</p>
                                    </li>
                                </ul>
                                <a class="link link link--blue link--uppercase link--letter-spacing card-article__link" href="#">Читать далее
                                    <svg width="16" height="9" aria-hidden="true">
                                        <use xlink:href="#arrow"></use>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </li>
                    <li class="cards-grid__item swiper-slide">
                        <article class="card-article">
                            <div class="card-article__img-wrapper">
                                <picture>
                                    <source type="image/webp" srcset="img/content/image-article-3.webp, img/content/image-article-3@2x.webp 2x"><img src="img/content/image-article-3.jpg" srcset="img/content/image-article-3@2x.jpg 2x" width="360" height="200" alt="">
                                </picture>
                            </div>
                            <div class="card-article__text-content"><a>
                                    <h3 class="title card-article__title">Первичная консультация на&nbsp;детском приеме: время, объем и&nbsp;нюансы</h3></a>
                                <p class="card-article__description">Что ожидают родители, которые пришли на&nbsp;прием к&nbsp;стоматологу с&nbsp;ребенком?</p>
                                <ul class="card-article__authors">
                                    <li class="card-article__author">
                                        <picture>
                                            <source type="image/webp" srcset="img/content/image-author-2.webp, img/content/image-author-2@2x.webp 2x"><img src="img/content/image-author-2.jpg" srcset="img/content/image-author-2@2x.jpg 2x" width="56" height="56" alt="Фото спикера">
                                        </picture>
                                        <p class="card-article__author-name">Елизавета<br>Александрова</p>
                                    </li>
                                </ul>
                                <a class="link link link--blue link--uppercase link--letter-spacing card-article__link" href="#">Читать далее
                                    <svg width="16" height="9" aria-hidden="true">
                                        <use xlink:href="#arrow"></use>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </li>
                </ul>
                <div class="article__recommend-buttons">
                    <button class="article__recommend-button article__recommend-button--prev">
                        <svg width="12" height="26" aria-hidden="true">
                            <use xlink:href="#arrow-slider"></use>
                        </svg>
                    </button>
                    <button class="article__recommend-button article__recommend-button--next">
                        <svg width="12" height="26" aria-hidden="true">
                            <use xlink:href="#arrow-slider"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </section>
    </section>
</main>


<?php get_template_part('template-parts/footer'); ?>
