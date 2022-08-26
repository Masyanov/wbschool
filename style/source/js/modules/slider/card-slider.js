import {A11Y} from '../../constants';

const initCardsSlider = () => {
  const cardsSlider = document.querySelector('.article__recommend-slider');
  let swiper;

  const initSlider = () => {
    if (!cardsSlider) {
      return;
    }

    const nextBtn = cardsSlider.querySelector('.article__recommend-button--next');
    const prevBtn = cardsSlider.querySelector('.article__recommend-button--prev');

    swiper = new Swiper(cardsSlider, {
      navigation: {
        nextEl: nextBtn,
        prevEl: prevBtn,
      },

      slidesPerView: 'auto',
      spaceBetween: 40,
      slideToClickedSlide: true,
      a11y: A11Y,
    });
  };

  const breakpoint = window.matchMedia(`(max-width: 1439px) and (min-width: 767px)`);
  const breakpointChecker = () => {
    if (breakpoint.matches) {
      initSlider();
    } else {
      if (swiper) {
        swiper.destroy(true, true);
      }
    }
  };

  breakpoint.addListener(breakpointChecker);
  breakpointChecker();
};

export {initCardsSlider};
