import {ScrollLock} from '../utils/scroll-lock';

export const openMenu = () => {
  if (document.querySelector('.main-nav')) {
    const header = document.querySelector('.header');
    const toggle = header.querySelector('.main-nav__toggle');
    const textOpen = toggle.getAttribute('data-text-open');
    const textClose = toggle.getAttribute('data-text-close');
    const scroll = new ScrollLock();

    header.classList.remove('header--nojs');

    toggle.addEventListener('click', () => {
      header.classList.toggle('header--open');
      toggle.classList.toggle('main-nav__toggle--open');

      if (header.classList.contains('header--open')) {
        toggle.setAttribute('aria-label', textClose);
        toggle.setAttribute('aria-pressed', true);
        scroll.disableScrolling();
      } else {
        toggle.setAttribute('aria-label', textOpen);
        toggle.setAttribute('aria-pressed', false);
        scroll.enableScrolling();
      }
    });

    window.addEventListener('resize', (evt) => {
      if (evt.currentTarget.innerWidth >= 1023 && header.classList.contains('header--open')) {
        header.classList.remove('header--open');
        toggle.classList.remove('main-nav__toggle--open');
        window.scrollLock.enableScrolling();
      }
    });
  }
};
