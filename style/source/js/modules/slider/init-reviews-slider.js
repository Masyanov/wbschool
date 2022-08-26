import {A11Y} from '../../constants';

/* globals Swiper */
export const initReviewsSlider = () => {
  const reviewsSlider = document.querySelector('[data-reviews-slider]');

  if (!reviewsSlider) {
    return;
  }

  const reviewsSwiper = new Swiper(reviewsSlider, {
    wrapperClass: 'slider__wrapper',
    watchOverflow: true,
    roundLengths: true,
    centeredSlides: true,
    spaceBetween: 40,
    speed: 600,
    a11y: A11Y,

    navigation: {
      prevEl: '.slider__button--prev',
      nextEl: '.slider__button--next',
    },

    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
};
