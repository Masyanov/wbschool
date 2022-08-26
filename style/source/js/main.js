import {iosVhFix} from './utils/ios-vh-fix';
import {removesFocus} from './modules/removes-focus';
import {openMenu} from './modules/menu';
import {initFeedbackSlider} from './modules/slider/init-feedback-slider';
import {initMainSlider} from './modules/slider/main-slider';
import {initVideoSlider} from './modules/slider/video-slider';
import {initVideo} from './modules/video';
import {initReviewsSlider} from './modules/slider/init-reviews-slider';
import {initCardsSlider} from './modules/slider/card-slider';
import {initTabs} from './modules/init-tabs';
import {initMap} from './modules/map';
import {initFormValidate} from './modules/form/init-form-validate';
import {initModals} from './modules/modals/init-modals';

// ---------------------------------

window.addEventListener('DOMContentLoaded', () => {
  openMenu();
  initVideo();

  // Utils
  // ---------------------------------

  iosVhFix();

  // Modules
  // ---------------------------------
  initMainSlider();
  initVideoSlider();
  initTabs();

  // все скрипты должны быть в обработчике 'DOMContentLoaded', но не все в 'load'
  // в load следует добавить скрипты, не участвующие в работе первого экрана
  window.addEventListener('load', () => {
    removesFocus();
    initFeedbackSlider();
    initReviewsSlider();
    initCardsSlider();
    initVideoSlider();
    initMap();
    initFormValidate();
    initModals();
  });
});

// ---------------------------------

// ❗❗❗ обязательно установите плагины eslint, stylelint, editorconfig в редактор кода.

// привязывайте js не на классы, а на дата атрибуты (data-validate)

// вместо модификаторов .block--active используем утилитарные классы
// .is-active || .is-open || .is-invalid и прочие (обязателен нейминг в два слова)
// .select.select--opened ❌ ---> [data-select].is-open ✅

// выносим все в дата атрибуты
// url до иконок пинов карты, настройки автопрокрутки слайдера, url к json и т.д.

// для адаптивного JS используейтся matchMedia и addListener
// const breakpoint = window.matchMedia(`(min-width:1024px)`);
// const breakpointChecker = () => {
//   if (breakpoint.matches) {
//   } else {
//   }
// };
// breakpoint.addListener(breakpointChecker);
// breakpointChecker();

// используйте .closest(el)
