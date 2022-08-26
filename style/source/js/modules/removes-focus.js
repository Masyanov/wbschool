export const removesFocus = () => {
  const links = document.querySelectorAll('a');
  const buttons = document.querySelectorAll('button');

  links.forEach((link) => {
    link.addEventListener('click', () => {
      link.blur();
    });
  });

  buttons.forEach((button) => {
    button.addEventListener('click', () => {
      button.blur();
    });
  });
};
