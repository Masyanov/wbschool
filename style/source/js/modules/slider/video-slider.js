import {A11Y} from '../../constants';

const videoSlider = document.querySelector('.video-slider');

const initSlider = (slider) => {
  const nextBtn = slider.querySelector('.video-slider__button--next');
  const prevBtn = slider.querySelector('.video-slider__button--prev');

  if (slider) {
    const mySwiper = new Swiper(slider, {
      navigation: {
        nextEl: nextBtn,
        prevEl: prevBtn,
      },
      a11y: A11Y,
    });
  }
};

const initVideoSlider = () => {
  if (videoSlider) {
    initSlider(videoSlider);
  }
};

export {initVideoSlider};
