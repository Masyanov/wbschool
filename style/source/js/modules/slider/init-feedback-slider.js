import {A11Y} from '../../constants';

/* globals Swiper */
export const initFeedbackSlider = () => {
  const feedbackSlider = document.querySelector('[data-feedback-slider]');
  let feedbackSwiper;

  const initSlider = () => {
    if (!feedbackSlider) {
      return;
    }

    feedbackSwiper = new Swiper(feedbackSlider, {
      wrapperClass: 'slider__wrapper',
      watchOverflow: true,
      roundLengths: true,
      slidesPerView: 2.5,
      spaceBetween: 40,
      speed: 400,
      a11y: A11Y,

      navigation: {
        prevEl: '.slider__button--prev',
        nextEl: '.slider__button--next',
      },

      pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
      },
    });
  };

  const breakpoint = window.matchMedia(`(max-width: 1023px)`);
  const breakpointChecker = () => {
    if (breakpoint.matches) {
      if (feedbackSwiper) {
        feedbackSwiper.destroy(true, true);
      }
    } else {
      initSlider();
    }
  };

  breakpoint.addListener(breakpointChecker);
  breakpointChecker();
};
