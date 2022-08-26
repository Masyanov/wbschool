/* globals Swiper */
function initMainSlider() {
  const sliderProcess = document.querySelector('.process__slider');

  if (!sliderProcess) {
    return;
  }
  // eslint-disable-next-line
  const slider = new Swiper(sliderProcess, {
    a11y: {
      enabled: true,
      firstSlideMessage: 'Первый слайд',
      lastSlideMessage: 'Последний слайд',
      nextSlideMessage: 'Следующий слайд',
      prevSlideMessage: 'Предыдущий слайд',
      paginationBulletMessage: 'Перейти к слайду {{index}}',
      slideLabelMessage: 'Слайд {{index}} из {{slidesLength}}',
    },
    navigation: {
      nextEl: '.process__slider-button--next',
      prevEl: '.process__slider-button--prev',
    },
    scrollbar: {
      el: '.swiper-scrollbar',
      draggable: true,
    },
    loop: false,
    keyboard: {
      enabled: true,
    },
    slidesPerView: 'auto',
    resistance: true,
    resistanceRatio: 0,
    breakpoints: {
      320: {
        slidesPerGroup: 1,
      },
      1439: {
        slidesPerGroup: 2,
      },
    },
  });

  // eslint-disable-next-line consistent-return
  return slider;
}

export {initMainSlider};
