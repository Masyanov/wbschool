const videos = document.querySelectorAll('.video');

const initVideo = () => {
  if (!videos) {
    return;
  }

  document.addEventListener('click', (evt) => {
    const video = evt.target.closest('.video');

    if (video) {
      const player = video.querySelector('iframe');
      const cover = video.querySelector('.video__cover');
      const btn = video.querySelector('.video__btn');

      // eslint-disable-next-line no-inner-declarations
      function playVideo() {
        if (btn) {
          btn.remove();
        }
        if (cover) {
          cover.remove();
        }
        player.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
      }
      playVideo();
    }
  });
};

export {initVideo};
